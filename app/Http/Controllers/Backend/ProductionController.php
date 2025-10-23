<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\LaborCost;
use App\Models\PackagingMaterial;
use App\Models\Production;
use App\Models\RawMatreial;
use App\Models\UtilityCost;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function production()
    {
        return view('production.home');
    }

    public function productAdd()
    {
        $items = Item::all();
        $today = now()->format('dmy');
        $lastBatch = Production::orderBy('id', 'desc')->first();


        if ($lastBatch) {
            $lastSerial = (int)substr($lastBatch->batch_no, -2);
            $newSerial = str_pad($lastSerial + 1, 2, '0', STR_PAD_LEFT);
        } else {
            $newSerial = '01';
        }

        $nextBatch = $today . $newSerial;

        return view('production.product.index', compact('nextBatch', 'newSerial', 'items'));
    }

    public function productStore(Request $request)
    {
        $exists = Production::Where('name', $request->cat_name)
                    ->orWhere('batch_no', $request->batch_no)
                    ->exists();

        if ($exists) {
            return back()->with('error', 'This item already exists!');
        }
        $product = new Production();

        //Product Save.............
        $product->name = $request->name;
        $product->batch_no = $request->batch_no;
        $product->batch_size = $request->batch_size;
        $product->date = $request->date;
        $product->raw_qty = $request->raw_qty;
        $product->raw_unit = $request->raw_unit;
        $product->raw_u_price = $request->raw_u_price;
        $product->raw_t_price = $request->raw_t_price;
        $product->pulp = $request->pulp;
        $product->pulp_unit = $request->pulp_unit;
        $product->yield = $request->yield;
        $product->yield_unit = $request->yield_unit;
        $product->ex_qty = $request->ex_qty;
        $product->ex_unit = $request->ex_unit;
        $product->yield_percent = $request->yield_percent;

        $product->save();

        //Raw Materials Save...........

        if ($request->raw_name) {
            foreach ($request->raw_name as $key => $singleraw) {
                $rawMaterials = new RawMatreial();
                $rawMaterials->raw_name = $singleraw;
                $rawMaterials->pro_id = $product->id;
                $rawMaterials->used_percent = $request->used_percent[$key] ?? null;
                $rawMaterials->used_qty = $request->used_qty[$key] ?? null;
                $rawMaterials->u_price = $request->u_price[$key] ?? null;
                $rawMaterials->t_price = $request->t_price[$key] ?? null;
                $rawMaterials->save();
            }
        }

        //labor cost save.............
        if ($request->labor_name) {
            foreach ($request->labor_name as $key => $singlelabor) {
                $laborCost = new LaborCost();
                
                $laborCost->pro_id = $product->id;
                $laborCost->labor_name = $singlelabor;                
                $laborCost->duty_day = $request->duty_day[$key];
                $laborCost->d_pay = $request->d_pay[$key];
                $laborCost->total_pay = $request->total_pay[$key];
                
                $laborCost->save();
            }
        }

        //Packaging Materials Save...........

        if ($request->pack_name) {
            foreach ($request->pack_name as $key => $singlepack) {
                $packMaterials = new PackagingMaterial();
                $packMaterials->pro_id = $product->id;
                $packMaterials->pack_name = $singlepack;
                $packMaterials->pack_qty = $request->pack_qty[$key] ?? null;
                $packMaterials->pack_size = $request->pack_size[$key] ?? null;
                $packMaterials->pack_price = $request->pack_price[$key] ?? null;
                $packMaterials->total_price = $request->total_price[$key] ?? null;
                $packMaterials->save();
            }
        }

        //utility cost save.............
        if ($request->utility_name) {
            foreach ($request->utility_name as $key => $singleutility) {
                $utilityCost = new UtilityCost();
                
                $utilityCost->pro_id = $product->id;
                $utilityCost->utility_name = $singleutility;                
                $utilityCost->utility_type = $request->utility_type[$key];
                $utilityCost->cost_amt = $request->cost_amt[$key];
                
                $laborCost->save();
            }
        }



        return redirect()->back();
    }
}
