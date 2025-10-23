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
                        <form action="{{ url('/production/product/store') }}" method="POST">
                            @csrf
                            <!--begin::Product-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="date" class="form-label">Production Date</label>
                                        <input type="date" name="date" class="form-control" id="date" required />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required />
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="batch_no" class="form-label">Batch Number</label>
                                        <input type="text" name="batch_no" class="form-control" id="batch_no"
                                            value="{{ $nextBatch }}" readonly />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="batch_size" class="form-label">Batch Size</label>
                                        <input type="text" name="batch_size" class="form-control" id="batch_size"
                                            readonly />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_qty" class="form-label">Raw Qty</label>
                                        <input type="number" name="raw_qty" class="form-control" id="raw_qty" required />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_unit" class="form-label">Unit</label>
                                        <select name="raw_unit" class="form-control" id="raw_unit">
                                            <option selected disabled>Select Unit</option>
                                            <option value="ml">ml</option>
                                            <option value="gm">gm</option>
                                            <option value="kg">Kg</option>
                                            <option value="ltr">Ltr</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_u_price" class="form-label">Unit Price</label>
                                        <input type="number" step="0.01" name="raw_u_price" class="form-control"
                                            id="raw_u_price" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="raw_t_price" class="form-label">Total Price</label>
                                        <input type="number" step="0.01" name="raw_t_price" class="form-control"
                                            id="raw_t_price" readonly />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="pulp" class="form-label">Pulp</label>
                                        <input type="number" name="pulp" class="form-control" id="pulp" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="pulp_unit" class="form-label">Unit</label>
                                        <select name="pulp_unit" class="form-control" id="pulp_unit">
                                            <option selected disabled>Select Unit</option>
                                            <option value="ml">ml</option>
                                            <option value="gm">gm</option>
                                            <option value="kg">Kg</option>
                                            <option value="ltr">Ltr</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="yield" class="form-label">Yield Qty</label>
                                        <input type="number" name="yield" class="form-control" id="yield" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="yield_unit" class="form-label">Unit</label>
                                        <select name="yield_unit" class="form-control" id="yield_unit">
                                            <option selected disabled>Select Unit</option>
                                            <option value="ml">ml</option>
                                            <option value="gm">gm</option>
                                            <option value="kg">Kg</option>
                                            <option value="ltr">Ltr</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="ex_qty" class="form-label">Extract Qty</label>
                                        <input type="number" step="0.01" name="ex_qty" class="form-control"
                                            id="ex_qty" />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="ex_unit" class="form-label">Unit</label>
                                        <select name="ex_unit" class="form-control" id="ex_unit">
                                            <option selected disabled>Select Unit</option>
                                            <option value="ml">ml</option>
                                            <option value="gm">gm</option>
                                            <option value="kg">Kg</option>
                                            <option value="ltr">Ltr</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="yield_percent" class="form-label">Extract Yield
                                            (%)</label>
                                        <input type="number" step="0.01" name="yield_percent" class="form-control"
                                            id="yield_percent" readonly />
                                    </div>
                                </div>
                                <!--end::Product-->

                                <!--begin::Raw Material-->
                                <div class="row border-0 shadow-sm" id="rawMaterialsContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Raw Materials</h4>
                                        <button type="button" id="addRawMaterial"
                                            class="btn btn-light btn-sm text-dark">+ Add Raw Materials</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="raw-material-row row g-2 mb-3">
                                        <div class="col-md-3">
                                            <label for="raw_name" class="form-label">Raw Material Name</label>
                                            <select name="raw_name[]" class="form-control raw_name">
                                                <option selected disabled>select Raw Material</option>
                                                @foreach ($items as $item)
                                                    <option value="{{ $item->name }}" data-price="{{ $item->price }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="used_percent" class="form-label">Used (%)</label>
                                            <input type="number" step="0.01" name="used_percent[]"
                                                class="form-control used_percent" id="used_percent"
                                                placeholder="Used (%)" />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="used_qty" class="form-label">Used Qty</label>
                                            <input type="number" step="0.01" name="used_qty[]"
                                                class="form-control used_qty" id="used_qty" placeholder="Used Qty"
                                                readonly />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="u_price" class="form-label">Unit Price</label>
                                            <input type="number" step="0.01" name="u_price[]"
                                                class="form-control u_price" placeholder="Unit Price" />
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="t_price" class="form-label">Total Price</label>
                                                <input type="number" step="0.01" name="t_price[]"
                                                    class="form-control t_price" id="t_price" placeholder="Total Price"
                                                    readonly />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeRawMaterial mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Raw Material-->

                                <!--begin::Labor Cost-->
                                <div class="row border-0 shadow-sm" id="laborContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Labor Cost</h4>
                                        <button type="button" id="addLabor" class="btn btn-light btn-sm text-dark">+
                                            Add Labor</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="labor-row row g-2 mb-3">
                                        <div class="col-md-3">
                                            <label for="labor_name" class="form-label">Name</label>
                                            <input type="text" name="labor_name[]" id="labor_name"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="duty_day" class="form-label">Total Duty Day</label>
                                            <input type="number" name="duty_day[]" class="form-control duty_day"
                                                id="duty_day" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="d_pay" class="form-label">Daily Pay</label>
                                            <input type="number" step="0.01" name="d_pay[]"
                                                class="form-control d_pay" id="d_pay" />
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="total_pay" class="form-label">Total Pay</label>
                                                <input type="number" step="0.01" name="total_pay[]"
                                                    class="form-control total_pay" id="total_pay" readonly />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeLabor mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Labor Cost-->

                                <!--begin::Packaging Material-->
                                <div class="row border-0 shadow-sm" id="packContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Packaging Material</h4>
                                        <button type="button" id="addPack" class="btn btn-light btn-sm text-dark">+
                                            Add Packag</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="pack-row row g-2 mb-3">
                                        <div class="col-md-3">
                                            <label for="pack_name" class="form-label">Name</label>
                                            {{-- <input type="text" name="pack_name[]" id="pack_name" class="form-control"
                                                required /> --}}
                                            <select name="pack_name[]" class="form-control pack_name">
                                                <option selected disabled>Select Packaging Material</option>
                                                @foreach ($items as $item)
                                                    <option value="{{ $item->name }}" data-price="{{ $item->price }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="pack_qty" class="form-label">Quantity</label>
                                            <input type="number" step="0.01" name="pack_qty[]"
                                                class="form-control pack_qty" id="pack_qty" />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="pack_size" class="form-label">Size</label>
                                            <input type="text" step="0.01" name="pack_size[]"
                                                class="form-control pack_size" id="pack_size" />
                                        </div>
                                        <div class="col-md-2">
                                            <label for="pack_price" class="form-label">Unit Price</label>
                                            <input type="number" step="0.01" name="pack_price[]"
                                                class="form-control pack_price" id="pack_price" />
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="total_price" class="form-label">Total Price</label>
                                                <input type="number" step="0.01" name="total_price[]"
                                                    class="form-control total_price" id="total_price" readonly />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removePack mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Packaging Material-->

                                <!--begin::Utility Cost-->
                                <div class="row border-0 shadow-sm" id="utilityContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Utility Cost</h4>
                                        <button type="button" id="addUtility" class="btn btn-light btn-sm text-dark">+
                                            Add Utility Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="utility-row row g-2 mb-3">
                                        <div class="col-md-4">
                                            <label for="utility_name" class="form-label">Name</label>
                                            <input type="text" name="utility_name[]" id="utility_name"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <label for="utility-type" class="form-label">Type</label>
                                            <input type="number" name="utility-type[]" class="form-control utility-type"
                                                id="utility-type" />
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <div class="w-100">
                                                <label for="cost_amt" class="form-label">Cost Amount</label>
                                                <input type="number" step="0.01" name="cost_amt[]"
                                                    class="form-control cost_amt" id="cost_amt" />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeUtility mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Utility Cost-->

                                <!--begin::Machinery Depreciation Cost-->
                                <div class="row border-0 shadow-sm" id="machineContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Machinery Depreciation Cost</h4>
                                        <button type="button" id="addMachine" class="btn btn-light btn-sm text-dark">+
                                            Add Depreciation Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="machine-row row g-2 mb-3">
                                        <div class="col-md-3">
                                            <label for="machine_name" class="form-label">Machine Name</label>
                                            <input type="text" name="machine_name[]" id="machine_name"
                                                class="form-control" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="machine-type" class="form-label">Type</label>
                                            <input type="number" name="machine-type[]" class="form-control machine-type"
                                                id="machine-type" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="depreciation_rate" class="form-label">Depreciation Rate</label>
                                            <input type="number" name="depreciation_rate[]"
                                                class="form-control depreciation_rate" id="depreciation_rate" />
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="cost_amt" class="form-label">Cost Amount</label>
                                                <input type="number" step="0.01" name="cost_amt[]"
                                                    class="form-control cost_amt" id="cost_amt" />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeMachine mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Machinery Depreciation Cost-->

                                <!--begin::Factory Overhead Cost-->
                                <div class="row border-0 shadow-sm" id="overheadContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Factory Overhead Cost</h4>
                                        <button type="button" id="addOverhead" class="btn btn-light btn-sm text-dark">+
                                            Add Overhead Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="overhead-row row g-2 mb-3">
                                        <div class="col-md-9">
                                            <label for="overhead-type" class="form-label">Description</label>
                                            <textarea name="overhead-type[]" class="form-control overhead-type" rows="1" id="overhead-type"></textarea>
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="fo_cost_amt" class="form-label">Cost Amount</label>
                                                <input type="number" step="0.01" name="fo_cost_amt[]"
                                                    class="form-control fo_cost_amt" id="fo_cost_amt" />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeOverhead mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Factory Overhead Cost-->

                                <!--begin::Transport Cost-->
                                <div class="row border-0 shadow-sm" id="transportContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Transport Cost</h4>
                                        <button type="button" id="addTransport" class="btn btn-light btn-sm text-dark">+
                                            Add Transport Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="transport-row row g-2 mb-3">
                                        <div class="col-md-9">
                                            <label for="transport-type" class="form-label">Transport Type</label>
                                            <input type="text" name="transport-type[]"
                                                class="form-control transport-type" id="transport-type" />
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="transport_amt" class="form-label">Cost Amount</label>
                                                <input type="number" step="0.01" name="transport_amt[]"
                                                    class="form-control transport_amt" id="transport_amt" />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeTransport mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::transport Cost-->

                                <!--begin::Quality Control Cost-->
                                <div class="row border-0 shadow-sm" id="qcContainer">
                                    <div
                                        class="bg-secondary text-white d-flex justify-content-between align-items-center mb-2 px-3 py-2">
                                        <h4 class="mb-0">Quality Control Cost</h4>
                                        <button type="button" id="addQc" class="btn btn-light btn-sm text-dark">+
                                            Add QC Cost</button>
                                    </div>

                                    <!-- ✅ First Row (with labels) -->
                                    <div class="qc-row row g-2 mb-3">
                                        <div class="col-md-9">
                                            <label for="test_name" class="form-label">Test Name</label>
                                            <input type="text" name="test_name[]"
                                                class="form-control test_name" id="test_name" />
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <div class="w-100">
                                                <label for="qc_amt" class="form-label">Cost Amount</label>
                                                <input type="number" step="0.01" name="qc_amt[]"
                                                    class="form-control qc_amt" id="qc_amt" />
                                            </div>
                                            <button type="button"
                                                class="btn btn-danger btn-sm ms-2 removeQc mt-auto">×</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Factory Quality Control Cost-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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
    {{-- Raw Material Batch No............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            const batchInput = document.getElementById('batch_no');
            const serial = "{{ $newSerial }}";

            // Date change হলে ব্যাচ নাম্বার তৈরি করো
            dateInput.addEventListener('change', function() {
                if (this.value) {
                    const dateObj = new Date(this.value);
                    const dd = String(dateObj.getDate()).padStart(2, '0');
                    const mm = String(dateObj.getMonth() + 1).padStart(2, '0');
                    const yy = String(dateObj.getFullYear()).slice(-2);
                    batchInput.value = `${dd}${mm}${yy}${serial}`;
                } else {
                    batchInput.value = '';
                }
            });
        });
    </script>

    {{-- Raw Material Batch Size............ --}}
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

            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.raw-material-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeRawMaterial')) {
                    const rows = container.querySelectorAll('.raw-material-row');
                    if (rows.length > 1) {
                        e.target.closest('.raw-material-row').remove();
                    } else {
                        alert('At least one raw material row is required!');
                    }
                }
            });

            // ✅ প্রতি Row এ calculation listener attach
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

            // প্রথম Row এ listener attach
            attachRowListeners(container.querySelector('.raw-material-row'));
        });
    </script>

    {{-- Labor Cost Row Add & Calculet............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('laborContainer');
            const addButton = document.getElementById('addLabor');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.labor-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeLabor')) {
                    const rows = container.querySelectorAll('.labor-row');
                    if (rows.length > 1) {
                        e.target.closest('.labor-row').remove();
                    } else {
                        alert('At least one labor row is required!');
                    }
                }
            });

            // ✅ প্রতি Row এ calculation listener attach
            function attachRowListeners(row) {
                const dutyDay = row.querySelector('.duty_day');
                const dailyPay = row.querySelector('.d_pay');
                const totalPay = row.querySelector('.total_pay');

                function recalc() {
                    const dDay = parseFloat(dutyDay.value) || 0;
                    const dPay = parseFloat(dailyPay.value) || 0;


                    const total = dDay * dPay;

                    totalPay.value = total.toFixed(2);
                }

                dutyDay.addEventListener('input', recalc);
                dailyPay.addEventListener('input', recalc);
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

            // প্রথম Row এ listener attach
            attachRowListeners(container.querySelector('.labor-row'));
        });
    </script>

    {{-- Packaging Material Calculet............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('packContainer');
            const addButton = document.getElementById('addPack');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.pack-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removePack')) {
                    const rows = container.querySelectorAll('.pack-row');
                    if (rows.length > 1) {
                        e.target.closest('.pack-row').remove();
                    } else {
                        alert('At least one labor row is required!');
                    }
                }
            });

            // ✅ প্রতি Row এ calculation listener attach
            function attachRowListeners(row) {
                const packQty = row.querySelector('.pack_qty');
                const packPrice = row.querySelector('.pack_price');
                const totalPrice = row.querySelector('.total_price');

                function recalc() {
                    const pQty = parseFloat(packQty.value) || 0;
                    const pPrice = parseFloat(packPrice.value) || 0;


                    const total = pQty * pPrice;

                    totalPrice.value = total.toFixed(2);
                }

                packQty.addEventListener('input', recalc);
                packPrice.addEventListener('input', recalc);
            }

            // ✅ সব Row রিফ্রেশ করে হিসাব করা
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

            const container = document.getElementById('utilityContainer');
            const addButton = document.getElementById('addUtility');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.utility-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeUtility')) {
                    const rows = container.querySelectorAll('.utility-row');
                    if (rows.length > 1) {
                        e.target.closest('.utility-row').remove();
                    } else {
                        alert('At least one utility row is required!');
                    }
                }
            });
        });
    </script>

    {{-- Depreciation Cost Row Add............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('machineContainer');
            const addButton = document.getElementById('addMachine');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.machine-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeMachine')) {
                    const rows = container.querySelectorAll('.machine-row');
                    if (rows.length > 1) {
                        e.target.closest('.machine-row').remove();
                    } else {
                        alert('At least one machine row is required!');
                    }
                }
            });
        });
    </script>

    {{-- Overhade Cost Row Add............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('overheadContainer');
            const addButton = document.getElementById('addOverhead');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.overhead-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeOverhead')) {
                    const rows = container.querySelectorAll('.overhead-row');
                    if (rows.length > 1) {
                        e.target.closest('.overhead-row').remove();
                    } else {
                        alert('At least one overhead row is required!');
                    }
                }
            });
        });
    </script>

    {{-- transport Cost Row Add............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('transportContainer');
            const addButton = document.getElementById('addTransport');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.transport-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeTransport')) {
                    const rows = container.querySelectorAll('.transport-row');
                    if (rows.length > 1) {
                        e.target.closest('.transport-row').remove();
                    } else {
                        alert('At least one transport row is required!');
                    }
                }
            });
        });
    </script>

    {{-- transport Cost Row Add............ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('qcContainer');
            const addButton = document.getElementById('addQc');


            // ✅ Row যোগ করা (শুধু একবার listener থাকবে)
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.qc-row');
                const newRow = firstRow.cloneNode(true);

                // Label গুলো বাদ দাও
                newRow.querySelectorAll('label').forEach(label => label.remove());

                // Input গুলো clear করো
                newRow.querySelectorAll('input').forEach(input => input.value = '');

                // নতুন Row container এ যোগ করো
                container.appendChild(newRow);

                // Calculation কাজ করবে নতুন Row এ
                attachRowListeners(newRow);
            });

            // ✅ Row remove করা
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeQc')) {
                    const rows = container.querySelectorAll('.qc-row');
                    if (rows.length > 1) {
                        e.target.closest('.qc-row').remove();
                    } else {
                        alert('At least one qc row is required!');
                    }
                }
            });
        });
    </script>
@endpush
