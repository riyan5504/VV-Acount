<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $vendors = Vendor::where('vendor_name', 'like', '%' . $request->term . '%')
            ->get(['id', 'vendor_name', 'phone', 'email', 'address']);

        $data = [];
        foreach ($vendors as $vendor) {
            $data[] = [
                'label' => $vendor->vendor_name,
                'value' => $vendor->vendor_name,
                'phone' => $vendor->phone,
                'email' => $vendor->email,
                'address' => $vendor->address,
            ];
        }
        return response()->json($data);
    }

    public function searchItem(Request $request)
    {
        $items = Item::where('name', 'like', '%' . $request->term . '%')
            ->get(['id', 'name', 'code', 'pack_size', 'unit', 'price']);

        $data = [];
        foreach ($items as $item) {
            $data[] = [
                'label' => $item->name,
                'value' => $item->name,
                'pack_size' => $item->pack_size,
                'unit' => $item->unit,
                'unit_price' => $item->price,
            ];
        }
        return response()->json($data);
    }
    
}
