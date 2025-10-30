<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function itemPurchase()
    {
        return view('purchase.home');
    }

    public function createPurchase()
    {
        // সর্বশেষ purchase_no বের করা
        $lastPurchase = Purchase::latest()->first();

        if ($lastPurchase && $lastPurchase->purchase_no) {
            // সংখ্যা অংশ বের করা (যেমন: PRC-0005 → 5)
            $number = (int) filter_var($lastPurchase->purchase_no, FILTER_SANITIZE_NUMBER_INT);
            $newNumber = $number + 1;
        } else {
            $newNumber = 1;
        }

        // নতুন purchase_no তৈরি করা (PRC-0001 ফরম্যাটে)
        $newPurchaseNo = 'PRC-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        $categories = Category::all();

        // view এ পাঠানো
        return view('purchase.create', compact('categories', 'newPurchaseNo'));
    }

    public function purchaseStore(Request $request)
    {
        // 🔹 Basic Validation
        $request->validate([
            'vendor_name' => 'required|string|max:255',
            'phone' => ['nullable', 'regex:/^01[0-9]{9}$/'],
            'date' => 'required|date',
            'purchase_no' => 'required|string|max:50',
            'item_name.*' => 'required|string|max:255',
            'qty.*' => 'required|numeric|min:1',
            'unit_price.*' => 'required|numeric|min:0',
        ], [
            'phone.regex' => 'Phone number must start with 01 and be 11 digits long.',
        ]);

        // 🔹 Vendor update or create
        $vendor = Vendor::updateOrCreate(
            ['vendor_name' => $request->vendor_name],
            [
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
            ]
        );

        // 🔹 Create Purchase Entry
        $purchase = Purchase::create([
            'vendor_id' => $vendor->id,
            'date' => $request->date,
            'purchase_no' => $request->purchase_no,
            'grand_total' => $request->grand_total ?? 0,
        ]);

        // 🔹 Loop through all purchase items
        if ($request->item_name && count($request->item_name) > 0) {
            foreach ($request->item_name as $key => $name) {

                $cat_id = $request->cat_id[$key] ?? null;
                $pack_size = $request->pack_size[$key] ?? null;
                $unit = $request->unit[$key] ?? null;
                $qty = $request->qty[$key] ?? 0;
                $unit_price = $request->unit_price[$key] ?? 0;
                $total_price = $request->total_price[$key] ?? 0;

                // 🔹 Item update or create
                $item = Item::updateOrCreate(
                    ['name' => $name],
                    [
                        'cat_id' => $cat_id,
                        'pack_size' => $pack_size,
                        'unit' => $unit,
                        'price' => $unit_price,
                    ]
                );

                // 🔹 Create Purchase Item
                PurchaseItem::create([
                    'purchase_id' => $purchase->id,
                    'item_id' => $item->id,
                    'item_name' => $name,
                    'pack_size' => $pack_size,
                    'unit' => $unit,
                    'qty' => $qty,
                    'unit_price' => $unit_price,
                    'total_price' => $total_price,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Purchase saved successfully!');
    }
}
