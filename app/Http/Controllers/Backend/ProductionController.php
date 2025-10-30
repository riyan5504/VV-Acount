<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Depreciation;
use App\Models\Item;
use App\Models\LaborCost;
use App\Models\OverheadCost;
use App\Models\PackagingMaterial;
use App\Models\Production;
use App\Models\ProductionGp;
use App\Models\ProductionGt;
use App\Models\QcCost;
use App\Models\RawMatreial;
use App\Models\TransportCost;
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
                $utilityCost->cost_amt = $request->cost_amt[$key];

                $utilityCost->save();
            }
        }

        //Machinery Depreciation cost save.............
        if ($request->machine_name) {
            foreach ($request->machine_name as $key => $singlemachine) {
                $machineCost = new Depreciation();

                $machineCost->pro_id = $product->id;
                $machineCost->machine_name = $singlemachine;
                $machineCost->depreciation_rate = $request->depreciation_rate[$key];
                $machineCost->machine_cost_amt = $request->machine_cost_amt[$key];

                $machineCost->save();
            }
        }

        //Overhead cost save.............
        if ($request->overhead_type) {
            foreach ($request->overhead_type as $key => $singleOverhead) {
                $overheadCost = new OverheadCost();

                $overheadCost->pro_id = $product->id;
                $overheadCost->overhead_type = $singleOverhead;
                $overheadCost->fo_cost_amt = $request->fo_cost_amt[$key];

                $overheadCost->save();
            }
        }

        //transport cost save.............
        if ($request->transport_type) {
            foreach ($request->transport_type as $key => $singletransport) {
                $transportCost = new TransportCost();

                $transportCost->pro_id = $product->id;
                $transportCost->transport_type = $singletransport;
                $transportCost->transport_amt = $request->transport_amt[$key];

                $transportCost->save();
            }
        }

        //qc cost save.............
        if ($request->test_name) {
            foreach ($request->test_name as $key => $singleqc) {
                $qcCost = new QcCost();

                $qcCost->pro_id = $product->id;
                $qcCost->test_name = $singleqc;
                $qcCost->qc_amt = $request->qc_amt[$key];

                $qcCost->save();
            }
        }

        //for Grand price.........
        $gp = new ProductionGp();
        $gp->pro_id = $product->id;
        $gp->raw_grand_price = $request->raw_grand_price;
        $gp->labor_grand_price = $request->labor_grand_price;
        $gp->pack_grand_price = $request->pack_grand_price;
        $gp->utility_grand_price = $request->utility_grand_price;
        $gp->depreciation_grand_price = $request->depreciation_grand_price;
        $gp->overhead_grand_price = $request->overhead_grand_price;
        $gp->transport_grand_price = $request->transport_grand_price;
        $gp->qc_grand_price = $request->qc_grand_price;
        $gp->save();

        //for Grand total.........
        $gt = new ProductionGt();
        $gt->pro_id = $product->id;
        $gt->grand_total = $request->grand_total;
        $gt->final_qty = $request->final_qty;
        $gt->final_unit = $request->final_unit;
        $gt->unit_cost = $request->unit_cost;
        $gt->save();

        return redirect()->back();
    }

    public function productionList()
    {
        $productions = Production::with('productionGt')->get();

        return view('production.product.list', compact('productions'));
    }

    public function productionEdit($id)
    {
        $production = Production::where('id', $id)
            ->with(
                'rawMaterial',
                'laborCost',
                'packagingMaterial',
                'utilityCost',
                'qcCost',
                'overheadCost',
                'transportCost',
                'productionGt',
                'productionGp',
                'depreciation'
            )->find($id);

        return view('production.product.edit', compact('production'));
    }

    public function productionUpdate(Request $request, $id)
    {
        $product = Production::find($id);

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

        if (isset($request->raw_name) && $request->raw_name[0] != null) {
            $rawMaterials = RawMatreial::where('pro_id', $product->id)->get();
            foreach ($rawMaterials as $singleRaw) {
                $singleRaw->delete();
            }
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
        if (isset($request->labor_name) && $request->labor_name[0] != null) {
            $laborCost = LaborCost::where('pro_id', $product->id)->get();
            foreach ($laborCost as $singleLabor) {
                $singleLabor->delete();
            }
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
        if (isset($request->pack_name) && $request->pack_name[0] != null) {
            $packMaterials = PackagingMaterial::where('pro_id', $product->id)->get();
            foreach ($packMaterials as $singlePack) {
                $singlePack->delete();
            }
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
        if (isset($request->utility_name) && $request->utility_name[0] != null) {
            $utilityCost = UtilityCost::where('pro_id', $product->id)->get();
            foreach ($utilityCost as $singleUtility) {
                $singleUtility->delete();
            }
            foreach ($request->utility_name as $key => $singleutility) {
                $utilityCost = new UtilityCost();

                $utilityCost->pro_id = $product->id;
                $utilityCost->utility_name = $singleutility;
                $utilityCost->cost_amt = $request->cost_amt[$key];

                $utilityCost->save();
            }
        }

        //Machinery Depreciation cost save.............
        if (isset($request->machine_name) && $request->machine_name[0] != null) {
            $machineCost = Depreciation::where('pro_id', $product->id)->get();
            foreach ($machineCost as $singlemachine) {
                $singlemachine->delete();
            }
            foreach ($request->machine_name as $key => $singlemachine) {
                $machineCost = new Depreciation();

                $machineCost->pro_id = $product->id;
                $machineCost->machine_name = $singlemachine;
                $machineCost->depreciation_rate = $request->depreciation_rate[$key];
                $machineCost->machine_cost_amt = $request->machine_cost_amt[$key];

                $machineCost->save();
            }
        }

        //Overhead cost save.............
        if (isset($request->overhead_type) && $request->overhead_type[0] != null) {
            $overheadCost = OverheadCost::where('pro_id', $product->id)->get();
            foreach ($overheadCost as $singleOverhead) {
                $singleOverhead->delete();
            }
            foreach ($request->overhead_type as $key => $singleOverhead) {
                $overheadCost = new OverheadCost();

                $overheadCost->pro_id = $product->id;
                $overheadCost->overhead_type = $singleOverhead;
                $overheadCost->fo_cost_amt = $request->fo_cost_amt[$key];

                $overheadCost->save();
            }
        }

        //transport cost save.............
        if (isset($request->transport_type) && $request->transport_type[0] != null) {
            $transportCost = TransportCost::where('pro_id', $product->id)->get();
            foreach ($transportCost as $singleTransport) {
                $singleTransport->delete();
            }
            foreach ($request->transport_type as $key => $singletransport) {
                $transportCost = new TransportCost();

                $transportCost->pro_id = $product->id;
                $transportCost->transport_type = $singletransport;
                $transportCost->transport_amt = $request->transport_amt[$key];

                $transportCost->save();
            }
        }

        //qc cost save.............
        if (isset($request->test_name) && $request->test_name[0] != null) {
            $qcCost = QcCost::where('pro_id', $product->id)->get();
            foreach ($qcCost as $singleQc) {
                $singleQc->delete();
            }
            foreach ($request->test_name as $key => $singleqc) {
                $qcCost = new QcCost();

                $qcCost->pro_id = $product->id;
                $qcCost->test_name = $singleqc;
                $qcCost->qc_amt = $request->qc_amt[$key];

                $qcCost->save();
            }
        }

        //for Grand price.........
        $gp = ProductionGp::where('pro_id', $product->id)->first();

        if (!$gp) {
            $gp = new ProductionGp();
            $gp->pro_id = $product->id;
        }
        $gp->raw_grand_price = $request->raw_grand_price;
        $gp->labor_grand_price = $request->labor_grand_price;
        $gp->pack_grand_price = $request->pack_grand_price;
        $gp->utility_grand_price = $request->utility_grand_price;
        $gp->depreciation_grand_price = $request->depreciation_grand_price;
        $gp->overhead_grand_price = $request->overhead_grand_price;
        $gp->transport_grand_price = $request->transport_grand_price;
        $gp->qc_grand_price = $request->qc_grand_price;
        $gp->save();

        //for Grand total.........
        $gt = ProductionGt::where('pro_id', $product->id)->first();

        if (!$gt) {
            $gt = new ProductionGt();
            $gt->pro_id = $product->id;
        }
        $gt->grand_total = $request->grand_total;
        $gt->final_qty = $request->final_qty;
        $gt->final_unit = $request->final_unit;
        $gt->unit_cost = $request->unit_cost;
        $gt->save();

        return redirect('/production/list');
    }

    public function productionDelete($id)
    {
        $product = Production::find($id);

        //Raw Materials Save...........
        $rawMaterials = RawMatreial::where('pro_id', $product->id)->delete();  

        //labor cost save.............
        $laborCost = LaborCost::where('pro_id', $product->id)->delete();

        //Packaging Materials Save...........
        $packMaterials = PackagingMaterial::where('pro_id', $product->id)->delete();

        //utility cost save.............
        $utilityCost = UtilityCost::where('pro_id', $product->id)->delete();

        //Machinery Depreciation cost save.............
        $machineCost = Depreciation::where('pro_id', $product->id)->delete();

        //Overhead cost save.............
        $overheadCost = OverheadCost::where('pro_id', $product->id)->delete();

        //transport cost save.............
        $transportCost = TransportCost::where('pro_id', $product->id)->delete();

        //qc cost save.............
        $qcCost = QcCost::where('pro_id', $product->id)->delete();

        //for Grand price.........
        $gp = ProductionGp::where('pro_id', $product->id)->first();
        if ($gp) {
            $gp->delete();
        }

        //for Grand total.........
        $gt = ProductionGt::where('pro_id', $product->id)->first();
        if ($gt) {
            $gt->delete();
        }

        $product->delete();

        return redirect()->back();
    }
}
