@extends('backend.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Production Entry</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Production Entry</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Form-->
                        <form action="{{ url('/production/update/'.$production->id) }}" method="POST">
                            @csrf
                            <!--begin::Product-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="date" class="form-label">Production Date</label>
                                        <input type="date" name="date" value="{{ $production->date }}"
                                            class="form-control" id="date" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" name="name" value="{{ $production->name }}"
                                            class="form-control" id="name" required />
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="batch_no" class="form-label">Batch Number</label>
                                        <input type="text" name="batch_no" value="{{ $production->batch_no }}"
                                            class="form-control" id="batch_no" value="" readonly />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="batch_size" class="form-label">Batch Size</label>
                                        <input type="text" name="batch_size" value="{{ $production->batch_size }}"
                                            class="form-control" id="batch_size" readonly />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_qty" class="form-label">Raw Qty</label>
                                        <input type="number" name="raw_qty" value="{{ $production->raw_qty }}"
                                            class="form-control" id="raw_qty" required />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_unit" class="form-label">Unit</label>
                                        <select name="raw_unit" class="form-control" id="raw_unit">
                                            <option value="ml" @if ($production->raw_unit == 'ml') selected @endif>ml
                                            </option>
                                            <option value="gm" @if ($production->raw_unit == 'gm') selected @endif>gm
                                            </option>
                                            <option value="Kg" @if ($production->raw_unit == 'Kg') selected @endif>Kg
                                            </option>
                                            <option value="Ltr" @if ($production->raw_unit == 'Ltr') selected @endif>Ltr
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_u_price" class="form-label">Unit Price</label>
                                        <input type="number" step="0.01" name="raw_u_price"
                                            value="{{ $production->raw_u_price }}" class="form-control" id="raw_u_price" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_t_price" class="form-label">Total Price</label>
                                        <input type="number" step="0.01" name="raw_t_price"
                                            value="{{ $production->raw_t_price }}" class="form-control" id="raw_t_price"
                                            readonly />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="pulp" class="form-label">Pulp</label>
                                        <input type="number" name="pulp" value="{{ $production->pulp }}"
                                            class="form-control" id="pulp" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="pulp_unit" class="form-label">Unit</label>
                                        <select name="pulp_unit" class="form-control" id="pulp_unit">
                                            <option value="ml" @if ($production->pulp_unit == 'ml') selected @endif>ml
                                            </option>
                                            <option value="gm" @if ($production->pulp_unit == 'gm') selected @endif>gm
                                            </option>
                                            <option value="Kg" @if ($production->pulp_unit == 'Kg') selected @endif>Kg
                                            </option>
                                            <option value="Ltr" @if ($production->pulp_unit == 'Ltr') selected @endif>Ltr
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="yield" class="form-label">Yield Qty</label>
                                        <input type="number" name="yield" value="{{ $production->yield }}"
                                            class="form-control" id="yield" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="yield_unit" class="form-label">Unit</label>
                                        <select name="yield_unit" class="form-control" id="yield_unit">
                                            <option value="ml" @if ($production->yield_unit == 'ml') selected @endif>ml
                                            </option>
                                            <option value="gm" @if ($production->yield_unit == 'gm') selected @endif>gm
                                            </option>
                                            <option value="Kg" @if ($production->yield_unit == 'Kg') selected @endif>Kg
                                            </option>
                                            <option value="Ltr" @if ($production->yield_unit == 'Ltr') selected @endif>Ltr
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="ex_qty" class="form-label">Extract Qty</label>
                                        <input type="number" step="0.01" value="{{ $production->ex_qty }}"
                                            name="ex_qty" class="form-control" id="ex_qty" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="ex_unit" class="form-label">Unit</label>
                                        <select name="ex_unit" class="form-control" id="ex_unit">
                                            <option value="ml" @if ($production->ex_unit == 'ml') selected @endif>ml
                                            </option>
                                            <option value="gm" @if ($production->ex_unit == 'gm') selected @endif>gm
                                            </option>
                                            <option value="Kg" @if ($production->ex_unit == 'Kg') selected @endif>Kg
                                            </option>
                                            <option value="Ltr" @if ($production->ex_unit == 'Ltr') selected @endif>Ltr
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="yield_percent" class="form-label">Extract Yield
                                            (%)</label>
                                        <input type="number" step="0.01" value="{{ $production->yield_percent }}"
                                            name="yield_percent" class="form-control" id="yield_percent" readonly />
                                    </div>
                                </div>
                                <!--end::Product-->

                                <!--begin::Raw Material-->
                                <div class="row border-0 shadow-sm" id="rawMaterialsContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-2 py-2">
                                        <h4 class="mb-0">Chemicals</h4>
                                        <button type="button" id="addRawMaterial"
                                            class="btn btn-light btn-sm text-dark">+ Add New Chemicals</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->rawMaterial && count($production->rawMaterial) > 0)
                                        <div class="raw-material-row ms-1 row g-2">
                                            @foreach ($production->rawMaterial as $singleRaw)
                                                <div class="col-md-3">
                                                    <label for="raw_name" class="form-label">Chemical Name</label>
                                                    <select name="raw_name[]" class="form-control raw_name">
                                                        <option value="{{ $singleRaw->raw_name }}">
                                                            {{ $singleRaw->raw_name }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="used_percent" class="form-label">Used (%)</label>
                                                    <input type="number" step="0.01"
                                                        value="{{ $singleRaw->used_percent }}" name="used_percent[]"
                                                        class="form-control used_percent" id="used_percent"
                                                        placeholder="Used (%)" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="used_qty" class="form-label">Used Qty</label>
                                                    <input type="number" step="0.01"
                                                        value="{{ $singleRaw->used_qty }}" name="used_qty[]"
                                                        class="form-control used_qty" id="used_qty"
                                                        placeholder="Used Qty" readonly />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="u_price" class="form-label">Unit Price</label>
                                                    <input type="number" step="0.01"
                                                        value="{{ $singleRaw->u_price }}" name="u_price[]"
                                                        class="form-control u_price" placeholder="Unit Price" readonly />
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="w-100">
                                                        <label for="t_price" class="form-label">Total Price</label>
                                                        <input type="number" step="0.01"
                                                            value="{{ $singleRaw->t_price }}" name="t_price[]"
                                                            class="form-control t_price" id="t_price"
                                                            placeholder="Total Price" readonly />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeRawMaterial mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="raw_grand_price" class="form-label">Total Chemical Cost</label>
                                    <input type="number" step="0.01"
                                        value="{{ $production->productionGp->raw_grand_price }}" name="raw_grand_price"
                                        class="form-control raw_grand_price" id="raw_grand_price" readonly />
                                </div>
                                <!--end::Raw Material-->

                                <!--begin::Labor Cost-->
                                <div class="row border-0 shadow-sm" id="laborContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-2 py-2">
                                        <h4 class="mb-0">Labor Cost</h4>
                                        <button type="button" id="addLabor" class="btn btn-light btn-sm text-dark">+
                                            Add Labor</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->laborCost && count($production->laborCost) > 0)
                                        <div class="labor-row row ms-1 g-2">
                                            @foreach ($production->laborCost as $labor)
                                                <div class="col-md-3">
                                                    <label for="labor_name" class="form-label">Name</label>
                                                    <input type="text" name="labor_name[]"
                                                        value="{{ $labor->labor_name }}" id="labor_name"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="duty_day" class="form-label">Total Duty Day</label>
                                                    <input type="number" name="duty_day[]"
                                                        value="{{ $labor->duty_day }}" class="form-control duty_day"
                                                        id="duty_day" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="d_pay" class="form-label">Daily Pay</label>
                                                    <input type="number" step="0.01" value="{{ $labor->d_pay }}"
                                                        name="d_pay[]" class="form-control d_pay" id="d_pay" />
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="w-100">
                                                        <label for="total_pay" class="form-label">Total Pay</label>
                                                        <input type="number" step="0.01"
                                                            value="{{ $labor->total_pay }}" name="total_pay[]"
                                                            class="form-control total_pay" id="total_pay" readonly />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeLabor mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="labor_grand_price" class="form-label">Total Labor Cost</label>
                                    <input type="number" step="0.01"
                                        value="{{ $production->productionGp->labor_grand_price }}"
                                        name="labor_grand_price" class="form-control labor_grand_price"
                                        id="labor_grand_price" readonly />
                                </div>
                                <!--end::Labor Cost-->

                                <!--begin::Packaging Material-->
                                <div class="row border-0 shadow-sm" id="packContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-2 py-2">
                                        <h4 class="mb-0">Packaging Material</h4>
                                        <button type="button" id="addPack" class="btn btn-light btn-sm text-dark">+
                                            Add Packaging</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->packagingMaterial && count($production->packagingMaterial) > 0)
                                        <div class="pack-row row ms-1 g-2">
                                            @foreach ($production->packagingMaterial as $singlePackag)
                                                <div class="col-md-3">
                                                    <label for="pack_name" class="form-label">Name</label>
                                                    {{-- <input type="text" name="pack_name[]" id="pack_name" class="form-control"
                                                required /> --}}
                                                    <select name="pack_name[]" class="form-control pack_name">
                                                        <option value="{{ $singlePackag->pack_name }}">
                                                            {{ $singlePackag->pack_name }}
                                                        </option>

                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="pack_qty" class="form-label">Quantity</label>
                                                    <input type="number" value="{{ $singlePackag->pack_qty }}"
                                                        step="0.01" name="pack_qty[]" class="form-control pack_qty"
                                                        id="pack_qty" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="pack_size" class="form-label">Size</label>
                                                    <input type="text" step="0.01"
                                                        value="{{ $singlePackag->pack_size }}" name="pack_size[]"
                                                        class="form-control pack_size" id="pack_size" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="pack_price" class="form-label">Unit Price</label>
                                                    <input type="number" step="0.01"
                                                        value="{{ $singlePackag->pack_price }}" name="pack_price[]"
                                                        class="form-control pack_price" id="pack_price" readonly />
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="w-100">
                                                        <label for="total_price" class="form-label">Total Price</label>
                                                        <input type="number" step="0.01"
                                                            value="{{ $singlePackag->total_price }}" name="total_price[]"
                                                            class="form-control total_price" id="total_price" readonly />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removePack mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="pack_grand_price" class="form-label">Total Packaging Cost</label>
                                    <input type="number" step="0.01" name="pack_grand_price"
                                        value="{{ $production->productionGp->pack_grand_price }}"
                                        class="form-control pack_grand_price" id="pack_grand_price" readonly />
                                </div>
                                <!--end::Packaging Material-->

                                <!--begin::Utility Cost-->
                                <div class="row border-0 shadow-sm" id="utilityContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-3 py-2">
                                        <h4 class="mb-0">Utility Cost</h4>
                                        <button type="button" id="addUtility" class="btn btn-light btn-sm text-dark">+
                                            Add Utility Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->utilityCost && count($production->utilityCost) > 0)
                                        <div class="utility-row row ms-1 g-2">
                                            @foreach ($production->utilityCost as $singleUtility)
                                                <div class="col-md-8">
                                                    <label for="utility_name" class="form-label">Name</label>
                                                    <input type="text" value="{{ $singleUtility->utility_name }}"
                                                        name="utility_name[]" id="utility_name" class="form-control" />
                                                </div>
                                                <div class="col-md-4 d-flex">
                                                    <div class="w-100">
                                                        <label for="cost_amt" class="form-label">Cost Amount</label>
                                                        <input type="number" step="0.01"
                                                            value="{{ $singleUtility->cost_amt }}" name="cost_amt[]"
                                                            class="form-control cost_amt" id="cost_amt" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeUtility mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="utility_grand_price" class="form-label">Total Utility Cost</label>
                                    <input type="number" step="0.01" name="utility_grand_price"
                                        value="{{ $production->productionGp->utility_grand_price }}"
                                        class="form-control utility_grand_price" id="utility_grand_price" readonly />
                                </div>
                                <!--end::Utility Cost-->

                                <!--begin::Machinery Depreciation Cost-->
                                <div class="row border-0 shadow-sm" id="machineContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-2 py-2">
                                        <h4 class="mb-0">Machinery Depreciation Cost</h4>
                                        <button type="button" id="addMachine" class="btn btn-light btn-sm text-dark">+
                                            Add Depreciation Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->depreciation && count($production->depreciation) > 0)
                                        <div class="machine-row row ms-1 g-2">
                                            @foreach ($production->depreciation as $singleDep)
                                                <div class="col-md-4">
                                                    <label for="machine_name" class="form-label">Machine Name</label>
                                                    <input type="text" value="{{ $singleDep->machine_name }}"
                                                        name="machine_name[]" id="machine_name" class="form-control" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="depreciation_rate" class="form-label">Depreciation
                                                        Rate</label>
                                                    <input type="number" value="{{ $singleDep->depreciation_rate }}"
                                                        name="depreciation_rate[]" class="form-control depreciation_rate"
                                                        id="depreciation_rate" />
                                                </div>
                                                <div class="col-md-4 d-flex">
                                                    <div class="w-100">
                                                        <label for="machine_cost_amt" class="form-label">Cost
                                                            Amount</label>
                                                        <input type="number" step="0.01"
                                                            value="{{ $singleDep->machine_cost_amt }}"
                                                            name="machine_cost_amt[]"
                                                            class="form-control machine_cost_amt" id="machine_cost_amt" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeMachine mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="depreciation_grand_price" class="form-label">Total Depreciation
                                        Cost</label>
                                    <input type="number" step="0.01"
                                        value="{{ $production->productionGp->depreciation_grand_price }}"
                                        name="depreciation_grand_price" class="form-control depreciation_grand_price"
                                        id="depreciation_grand_price" readonly />
                                </div>
                                <!--end::Machinery Depreciation Cost-->

                                <!--begin::Factory Overhead Cost-->
                                <div class="row border-0 shadow-sm" id="overheadContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-2 py-2">
                                        <h4 class="mb-0">Factory Overhead Cost</h4>
                                        <button type="button" id="addOverhead" class="btn btn-light btn-sm text-dark">+
                                            Add Overhead Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->overheadCost && count($production->overheadCost) > 0)
                                        <div class="overhead-row row ms-1 g-2">
                                            @foreach ($production->overheadCost as $singleOverhead)
                                                <div class="col-md-9">
                                                    <label for="overhead_type" class="form-label">Description</label>
                                                    <textarea name="overhead_type[]" class="form-control overhead_type" rows="1" id="overhead_type">{{ $singleOverhead->overhead_type }}</textarea>
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="w-100">
                                                        <label for="fo_cost_amt" class="form-label">Cost Amount</label>
                                                        <input type="number" value="{{ $singleOverhead->fo_cost_amt }}"
                                                            step="0.01" name="fo_cost_amt[]"
                                                            class="form-control fo_cost_amt" id="fo_cost_amt" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeOverhead mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="overhead_grand_price" class="form-label">Total Overhead
                                        Cost</label>
                                    <input type="number" step="0.01" name="overhead_grand_price"
                                        value="{{ $production->productionGp->overhead_grand_price }}"
                                        class="form-control overhead_grand_price" id="overhead_grand_price" readonly />
                                </div>
                                <!--end::Factory Overhead Cost-->

                                <!--begin::Transport Cost-->
                                <div class="row border-0 shadow-sm" id="transportContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-2 px-2 py-2">
                                        <h4 class="mb-0">Transport Cost</h4>
                                        <button type="button" id="addTransport" class="btn btn-light btn-sm text-dark">+
                                            Add Transport Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->transportCost && count($production->transportCost) > 0)
                                        <div class="transport-row row ms-1 g-2">
                                            @foreach ($production->transportCost as $singleTransport)
                                                <div class="col-md-9">
                                                    <label for="transport_type" class="form-label">Transport Type</label>
                                                    <input type="text" value="{{ $singleTransport->transport_type }}"
                                                        name="transport_type[]" class="form-control transport_type"
                                                        id="transport_type" />
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="w-100">
                                                        <label for="transport_amt" class="form-label">Cost Amount</label>
                                                        <input type="number"
                                                            value="{{ $singleTransport->transport_amt }}" step="0.01"
                                                            name="transport_amt[]" class="form-control transport_amt"
                                                            id="transport_amt" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeTransport mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="transport_grand_price" class="form-label">Total Transport
                                        Cost</label>
                                    <input type="number" step="0.01" name="transport_grand_price"
                                        value="{{ $production->productionGp->transport_grand_price }}"
                                        class="form-control transport_grand_price" id="transport_grand_price" readonly />
                                </div>
                                <!--end::transport Cost-->

                                <!--begin::Quality Control Cost-->
                                <div class="row border-0 shadow-sm" id="qcContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center ms-1 px-2 py-2">
                                        <h4 class="mb-0">Quality Control Cost</h4>
                                        <button type="button" id="addQc" class="btn btn-light btn-sm text-dark">+
                                            Add QC Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    @if ($production->qcCost && count($production->qcCost) > 0)
                                        <div class="qc-row row g-2 ms-1">
                                            @foreach ($production->qcCost as $singleQc)
                                                <div class="col-md-9">
                                                    <label for="test_name" class="form-label">Test Name</label>
                                                    <input type="text" value="{{ $singleQc->test_name }}"
                                                        name="test_name[]" class="form-control test_name"
                                                        id="test_name" />
                                                </div>
                                                <div class="col-md-3 d-flex">
                                                    <div class="w-100">
                                                        <label for="qc_amt" class="form-label">Cost Amount</label>
                                                        <input type="number" value="{{ $singleQc->qc_amt }}"
                                                            step="0.01" name="qc_amt[]" class="form-control qc_amt"
                                                            id="qc_amt" />
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm ms-2 removeQc mt-auto">×</button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4 mt-1 mb-2">
                                    <label for="qc_grand_price" class="form-label">Total QC
                                        Cost</label>
                                    <input type="number" step="0.01"
                                        value="{{ $production->productionGp->qc_grand_price }}" name="qc_grand_price"
                                        class="form-control qc_grand_price" id="qc_grand_price" readonly />
                                </div>
                                <!--end::Quality Control Cost-->
                            </div>
                            <div class="row">
                                <div class="col-md-3 ms-3 mt-1 mb-2">
                                    <label for="grand_total" class="form-label">Grand Total</label>
                                    <input type="number" step="0.01" name="grand_total"
                                        value="{{ $production->productionGt->grand_total }}"
                                        class="form-control grand_total" id="grand_total" readonly />
                                </div>
                                <div class="col-md-3 mt-1 mb-2">
                                    <label for="final_qty" class="form-label">Actual Production Qty</label>
                                    <input type="number" step="0.01"
                                        value="{{ $production->productionGt->final_qty }}" name="final_qty"
                                        class="form-control final_qty" id="final_qty" />
                                </div>
                                <div class="col-md-2 mt-1 mb-2">
                                    <label for="final_unit" class="form-label">Unit</label>
                                    <select name="final_unit" class="form-control" id="final_unit">
                                        <option value="ml" @if ($production->yield_unit == 'ml') selected @endif>ml
                                        </option>
                                        <option value="gm" @if ($production->yield_unit == 'gm') selected @endif>gm
                                        </option>
                                        <option value="Kg" @if ($production->yield_unit == 'Kg') selected @endif>Kg
                                        </option>
                                        <option value="Ltr" @if ($production->yield_unit == 'Ltr') selected @endif>Ltr
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-1 mb-2">
                                    <label for="unit_cost" class="form-label">Cost per Unit</label>
                                    <input type="number" step="0.01"
                                        value="{{ $production->productionGt->unit_cost }}" name="unit_cost"
                                        class="form-control unit_cost" id="unit_cost" readonly />
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const exQtyInput = document.getElementById('ex_qty');
            const exUnitSelect = document.getElementById('ex_unit');
            const batchSizeInput = document.getElementById('batch_size');

            function updateBatchSize() {
                const qty = exQtyInput.value.trim();
                const unit = exUnitSelect.value;
                batchSizeInput.value = qty && unit ? `${qty} ${unit}` : '';
            }

            exQtyInput.addEventListener('input', updateBatchSize);
            exUnitSelect.addEventListener('change', updateBatchSize);
        });
    </script>
    {{-- Raw Material Price............ --}}
    <script>
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('raw_name')) {
                const selectedOption = e.target.selectedOptions[0];
                const price = selectedOption.getAttribute('data-price');

                // বর্তমান row খুঁজে বের করো
                const row = e.target.closest('.raw-material-row');
                const priceInput = row.querySelector('.u_price');

                priceInput.value = price || '';
            }
        });
    </script>

    {{-- Raw Material Calculet............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyInput = document.getElementById('raw_qty');
            const unitPriceInput = document.getElementById('raw_u_price');
            const totalPriceInput = document.getElementById('raw_t_price');
            const extractInput = document.getElementById('ex_qty');
            const yieldPercentInput = document.getElementById('yield_percent');
            const container = document.getElementById('rawMaterialsContainer');
            const addButton = document.getElementById('addRawMaterial');
            const grandPriceInput = document.getElementById('raw_grand_price'); // ✅ Grand Total field

            // ✅ raw_t_price = raw_qty * raw_u_price
            function calculateRawTotal() {
                const qty = parseFloat(qtyInput.value) || 0;
                const unitPrice = parseFloat(unitPriceInput.value) || 0;
                totalPriceInput.value = (qty * unitPrice).toFixed(2);
                calculateYieldPercent();
                updateAllRows();
            }

            qtyInput.addEventListener('input', calculateRawTotal);
            unitPriceInput.addEventListener('input', calculateRawTotal);

            // ✅ yield_percent = (ex_qty / raw_qty) * 100
            function calculateYieldPercent() {
                const exQty = parseFloat(extractInput.value) || 0;
                const rawQty = parseFloat(qtyInput.value) || 0;

                if (rawQty > 0) {
                    yieldPercentInput.value = ((exQty / rawQty) * 100).toFixed(2);
                } else {
                    yieldPercentInput.value = '';
                }

                updateAllRows();
            }

            extractInput.addEventListener('input', calculateYieldPercent);

            // ✅ Row যোগ করা
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.raw-material-row');
                const newRow = firstRow.cloneNode(true);

                // Label বাদ
                newRow.querySelectorAll('label').forEach(label => label.remove());
                // Input clear
                newRow.querySelectorAll('input').forEach(input => input.value = '');
                // Duplicate id remove
                newRow.querySelectorAll('[id]').forEach(el => el.removeAttribute('id'));

                container.appendChild(newRow);
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeRawMaterial')) {
                    const rows = container.querySelectorAll('.raw-material-row');
                    if (rows.length > 1) {
                        e.target.closest('.raw-material-row').remove();
                        calculateGrandTotal(); // remove হলে grand total আপডেট হবে
                    } else {
                        alert('At least one raw material row is required!');
                    }
                }
            });

            // ✅ প্রতি Row এ listener attach
            function attachRowListeners(row) {
                const usedPercent = row.querySelector('.used_percent');
                const usedQty = row.querySelector('.used_qty');
                const uPrice = row.querySelector('.u_price');
                const tPrice = row.querySelector('.t_price');

                function recalc() {
                    const exQty = parseFloat(extractInput.value) || 0;
                    const percent = parseFloat(usedPercent.value) || 0;
                    const unitPrice = parseFloat(uPrice.value) || 0;

                    const usedQuantity = (exQty * percent) / 100;
                    const total = usedQuantity * unitPrice;

                    usedQty.value = usedQuantity.toFixed(3);
                    tPrice.value = total.toFixed(2);

                    calculateGrandTotal(); // ✅ total change হলে grand total হিসাব হবে
                }

                usedPercent.addEventListener('input', recalc);
                uPrice.addEventListener('input', recalc);
                extractInput.addEventListener('input', recalc);
            }

            // ✅ সব Row রিফ্রেশ করে হিসাব করা
            function updateAllRows() {
                const rows = container.querySelectorAll('.raw-material-row');
                rows.forEach(row => {
                    const usedPercent = row.querySelector('.used_percent');
                    const uPrice = row.querySelector('.u_price');
                    if (usedPercent && uPrice) {
                        const event = new Event('input');
                        usedPercent.dispatchEvent(event);
                    }
                });
            }

            // ✅ Grand Total হিসাব ফাংশন
            function calculateGrandTotal() {
                let grandTotal = 0;
                container.querySelectorAll('.t_price').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });
                grandPriceInput.value = grandTotal.toFixed(2);
            }

            // প্রথম Row এ listener attach
            attachRowListeners(container.querySelector('.raw-material-row'));
        });
    </script>


    {{-- Labor Cost Row Add & Calculet............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('laborContainer');
            const addButton = document.getElementById('addLabor');
            const grandPriceInput = document.getElementById('labor_grand_price'); // ✅ ঠিক নাম

            // ✅ নতুন Row যোগ করা
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.labor-row');
                const newRow = firstRow.cloneNode(true);

                // Label বাদ
                newRow.querySelectorAll('label').forEach(label => label.remove());
                // Input clear
                newRow.querySelectorAll('input').forEach(input => input.value = '');
                // id ডুপ্লিকেট এড়াতে remove
                newRow.querySelectorAll('[id]').forEach(el => el.removeAttribute('id'));

                container.appendChild(newRow);
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeLabor')) {
                    const rows = container.querySelectorAll('.labor-row');
                    if (rows.length > 1) {
                        e.target.closest('.labor-row').remove();
                        calculateGrandTotal(); // remove করলে grand total আপডেট হবে
                    } else {
                        alert('At least one labor row is required!');
                    }
                }
            });

            // ✅ প্রতি Row এ হিসাব
            function attachRowListeners(row) {
                const dutyDay = row.querySelector('.duty_day');
                const dailyPay = row.querySelector('.d_pay');
                const totalPay = row.querySelector('.total_pay');

                function recalc() {
                    const dDay = parseFloat(dutyDay.value) || 0;
                    const dPay = parseFloat(dailyPay.value) || 0;
                    const total = dDay * dPay;
                    totalPay.value = total.toFixed(2);
                    calculateGrandTotal(); // ✅ total change হলে grand total আপডেট
                }

                dutyDay.addEventListener('input', recalc);
                dailyPay.addEventListener('input', recalc);
            }

            // ✅ Grand Total হিসাব
            function calculateGrandTotal() {
                let grandTotal = 0;
                container.querySelectorAll('.total_pay').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });
                grandPriceInput.value = grandTotal.toFixed(2);
            }

            // ✅ সব Row রিফ্রেশ করে হিসাব করা
            function updateAllRows() {
                const rows = container.querySelectorAll('.labor-row');
                rows.forEach(row => {
                    const dutyDay = row.querySelector('.duty_day');
                    const dailyPay = row.querySelector('.d_pay');
                    if (dutyDay && dailyPay) {
                        const event = new Event('input');
                        dutyDay.dispatchEvent(event);
                    }
                });
            }

            // ✅ প্রথম Row এ listener attach
            attachRowListeners(container.querySelector('.labor-row'));
        });
    </script>

    {{-- Packaging Material Calculet............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('packContainer');
            const addButton = document.getElementById('addPack');
            const grandPriceInput = document.getElementById('pack_grand_price');

            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.pack-row');
                const newRow = firstRow.cloneNode(true);

                // Label বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // নতুন Row এর হিসাব কাজ করবে
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removePack')) {
                    const rows = container.querySelectorAll('.pack-row');
                    if (rows.length > 1) {
                        e.target.closest('.pack-row').remove();
                        calculateGrandTotal(); // Row মুছে ফেলার পর Grand Total আপডেট করো
                    } else {
                        alert('At least one pack row is required!');
                    }
                }
            });

            // ✅ Grand Total হিসাব
            function calculateGrandTotal() {
                let grandTotal = 0;
                container.querySelectorAll('.total_price').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });
                grandPriceInput.value = grandTotal.toFixed(2);
            }

            // ✅ প্রতি Row এ calculation listener attach
            function attachRowListeners(row) {
                const packQty = row.querySelector('.pack_qty');
                const packPrice = row.querySelector('.pack_price');
                const totalPrice = row.querySelector('.total_price');

                function recalc() {
                    const qty = parseFloat(packQty.value) || 0;
                    const price = parseFloat(packPrice.value) || 0;
                    const total = qty * price;

                    totalPrice.value = total.toFixed(2);
                    calculateGrandTotal(); // প্রতিবার পরিবর্তনের পর grand total আপডেট করো
                }

                packQty.addEventListener('input', recalc);
                packPrice.addEventListener('input', recalc);
            }

            // ✅ সব Row আপডেট করার ফাংশন (optional)
            function updateAllRows() {
                const rows = container.querySelectorAll('.pack-row');
                rows.forEach(row => {
                    const packQty = row.querySelector('.pack_qty');
                    const packPrice = row.querySelector('.pack_price');
                    if (packQty && packPrice) {
                        const event = new Event('input');
                        packQty.dispatchEvent(event);
                    }
                });
            }

            // প্রথম Row এ listener attach
            attachRowListeners(container.querySelector('.pack-row'));
        });
    </script>

    {{-- Packaging Material Price............ --}}
    <script>
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('pack_name')) {
                const selectedOption = e.target.selectedOptions[0];
                const price = selectedOption.getAttribute('data-price');

                // বর্তমান row খুঁজে বের করো
                const row = e.target.closest('.pack-row');
                const priceInput = row.querySelector('.pack_price');

                priceInput.value = price || '';
            }
        });
    </script>

    {{-- Utility Cost Row Add............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ---------- Universal Dynamic Section ----------
            function setupDynamicSection({
                containerId,
                addButtonId,
                rowClass,
                amountClass,
                removeBtnClass,
                totalInputId
            }) {
                const container = document.getElementById(containerId);
                const addButton = document.getElementById(addButtonId);
                const totalInput = document.getElementById(totalInputId);

                if (!container || !addButton || !totalInput) return;

                // ➕ Add new row
                addButton.addEventListener('click', function() {
                    const firstRow = container.querySelector(`.${rowClass}`);
                    const newRow = firstRow.cloneNode(true);

                    newRow.querySelectorAll('label').forEach(label => label.remove());
                    newRow.querySelectorAll('input, textarea').forEach(input => input.value = '');

                    container.appendChild(newRow);
                    attachRowListener(newRow);
                });

                // ❌ Remove row
                container.addEventListener('click', function(e) {
                    if (e.target.classList.contains(removeBtnClass)) {
                        const rows = container.querySelectorAll(`.${rowClass}`);
                        if (rows.length > 1) {
                            e.target.closest(`.${rowClass}`).remove();
                            calculateTotal();
                        } else {
                            alert('At least one row is required!');
                        }
                    }
                });

                // 💰 Calculate section total
                function calculateTotal() {
                    let total = 0;
                    container.querySelectorAll(`.${amountClass}`).forEach(input => {
                        total += parseFloat(input.value) || 0;
                    });
                    totalInput.value = total.toFixed(2);
                    updateGrandTotal(); // 🔁 Update overall total
                }

                function attachRowListener(row) {
                    const costInput = row.querySelector(`.${amountClass}`);
                    if (costInput) costInput.addEventListener('input', calculateTotal);
                }

                attachRowListener(container.querySelector(`.${rowClass}`));
            }

            // ---------- Section Setup ----------
            setupDynamicSection({
                containerId: 'utilityContainer',
                addButtonId: 'addUtility',
                rowClass: 'utility-row',
                amountClass: 'cost_amt',
                removeBtnClass: 'removeUtility',
                totalInputId: 'utility_grand_price'
            });

            setupDynamicSection({
                containerId: 'machineContainer',
                addButtonId: 'addMachine',
                rowClass: 'machine-row',
                amountClass: 'machine_cost_amt',
                removeBtnClass: 'removeMachine',
                totalInputId: 'depreciation_grand_price'
            });

            setupDynamicSection({
                containerId: 'overheadContainer',
                addButtonId: 'addOverhead',
                rowClass: 'overhead-row',
                amountClass: 'fo_cost_amt',
                removeBtnClass: 'removeOverhead',
                totalInputId: 'overhead_grand_price'
            });

            setupDynamicSection({
                containerId: 'qcContainer',
                addButtonId: 'addQc',
                rowClass: 'qc-row',
                amountClass: 'qc_amt',
                removeBtnClass: 'removeQc',
                totalInputId: 'qc_grand_price'
            });

            setupDynamicSection({
                containerId: 'transportContainer',
                addButtonId: 'addTransport',
                rowClass: 'transport-row',
                amountClass: 'transport_amt',
                removeBtnClass: 'removeTransport',
                totalInputId: 'transport_grand_price'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // 🔹 Function: calculate and set grand total
            function calculateGrandTotal() {
                let raw_t_price = parseFloat($('#raw_t_price').val()) || 0;
                let raw_grand_price = parseFloat($('#raw_grand_price').val()) || 0;
                let labor_grand_price = parseFloat($('#labor_grand_price').val()) || 0;
                let pack_grand_price = parseFloat($('#pack_grand_price').val()) || 0;
                let utility_grand_price = parseFloat($('#utility_grand_price').val()) || 0;
                let depreciation_grand_price = parseFloat($('#depreciation_grand_price').val()) || 0;
                let overhead_grand_price = parseFloat($('#overhead_grand_price').val()) || 0;
                let transport_grand_price = parseFloat($('#transport_grand_price').val()) || 0;
                let qc_grand_price = parseFloat($('#qc_grand_price').val()) || 0;

                let total = raw_t_price + raw_grand_price + labor_grand_price + pack_grand_price +
                    utility_grand_price + depreciation_grand_price + overhead_grand_price +
                    transport_grand_price + qc_grand_price;

                $('#grand_total').val(total.toFixed(2));
            }

            // 🔹 Whenever any grand total field changes → recalculate grand total
            $(document).on('input',
                '#raw_t_price, #raw_grand_price, #labor_grand_price, #pack_grand_price, #utility_grand_price, #depreciation_grand_price, #overhead_grand_price, #transport_grand_price, #qc_grand_price',
                function() {
                    calculateGrandTotal();
                });

            // 🔹 If you calculate total price automatically elsewhere, call this again after those updates
            // For example, when total price changes dynamically from unit price * qty:
            $(document).on('input',
                '.t_price, .total_pay, .total_price, .cost_amt, .fo_cost_amt, .transport_amt, .qc_amt',
                function() {
                    calculateGrandTotal();
                });
        });
    </script>
    <script>
        $(document).ready(function() {
            function calculateUnitCost() {
                let grandTotal = parseFloat($('#grand_total').val()) || 0;
                let finalQty = parseFloat($('#final_qty').val()) || 0;

                if (finalQty > 0) {
                    let unitCost = grandTotal / finalQty;
                    $('#unit_cost').val(unitCost.toFixed(2));
                } else {
                    $('#unit_cost').val('');
                }
            }

            // যখনই qty পরিবর্তন হবে
            $('#final_qty').on('input', function() {
                calculateUnitCost();
            });

            // যদি grand total পরে change হয়
            $('#grand_total').on('input', function() {
                calculateUnitCost();
            });
        });
    </script>
@endpush
