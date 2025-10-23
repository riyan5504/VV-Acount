@extends('backend.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Purchase Entry</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase Entry</li>
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

                                    {{-- Vendor Details --}}
                                    <div
                                        class="bg-primary text-white d-flex justify-content-between align-items-center mb-1 px-2 py-2">
                                        <h4 class="mb-0">Vendor Details</h4>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="v_name" class="form-label">Vendor Name</label>
                                        <input type="text" name="v_name" class="form-control" id="v_name" required />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="number" name="phone" class="form-control" id="phone" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" />
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea name="address" class="form-control" id="address" rows="1" required></textarea>
                                    </div>

                                    {{-- Product Details....... --}}

                                    <div class="col-md-2 mb-3">
                                        <label for="date" class="form-label">Purchase Date</label>
                                        <input type="date" name="date" class="form-control" id="date" required />
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="purchase_no" class="form-label">Invoice Number</label>
                                        <input type="text" name="purchase_no" class="form-control" id="purchase_no" />
                                    </div>

                                    {{-- Start::Item Entry........... --}}
                                    <div class="row border-0 shadow-sm" id="itemsContainer">
                                        <div
                                            class="bg-primary text-white d-flex justify-content-between align-items-center mb-1 px-2 py-2">
                                            <h4 class="mb-0">Item Details</h4>
                                            <button type="button" id="addItem" class="btn btn-light btn-sm text-dark">+
                                                Add Item</button>
                                        </div>

                                        <!-- ✅ First Row (with labels) -->
                                        <div class="item-row row g-2 mb-1">
                                            <div class="col-md-3">
                                                <label for="item_name" class="form-label">Item Name</label>
                                                <input type="text" name="item_name[]" id="item_name"
                                                    class="form-control item_name" />
                                            </div>
                                            <div class="col-md-2">
                                                <label for="pack_size" class="form-label">Pack Size</label>
                                                <input type="number" name="pack_size[]" class="form-control pack_size" />
                                            </div>
                                            <div class="col-md-1">
                                                <label for="unit" class="form-label">Unit</label>
                                                <select name="unit" class="form-control unit">
                                                    <option selected disabled>Select Unit</option>
                                                    <option value="ml">ml</option>
                                                    <option value="gm">gm</option>
                                                    <option value="kg">Kg</option>
                                                    <option value="ltr">Ltr</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="qty" class="form-label">Quentity</label>
                                                <input type="number" step="0.01" name="qty[]"
                                                    class="form-control qty" />
                                            </div>
                                            <div class="col-md-2">
                                                <label for="unit_price" class="form-label">Unit Price</label>
                                                <input type="number" step="0.01" name="unit_price[]"
                                                    class="form-control unit_price" />
                                            </div>
                                            <div class="col-md-3 d-flex">
                                                <div class="w-100">
                                                    <label for="total_price" class="form-label">Total Price</label>
                                                    <input type="number" step="0.01" name="total_price[]"
                                                        class="form-control total_price"readonly />
                                                </div>
                                                <button type="button"
                                                    class="btn btn-danger btn-sm ms-2 removeItem mt-auto">×</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End::Item Entry........... --}}

                                    <div class="col-md-4 mb-3">
                                        <label for="grand_total" class="form-label">Grand Total</label>
                                        <input type="number" step="0.01" name="grand_total"
                                            class="form-control grand_total" readonly />
                                    </div>
                                </div>
                                <!--end::Product-->
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const container = document.getElementById('itemsContainer');
            const addButton = document.getElementById('addItem');
            const grandTotalInput = document.querySelector('.grand_total'); // ✅ Grand Total field

            // ✅ নতুন Row যোগ করা
            addButton.addEventListener('click', function() {
                const firstRow = container.querySelector('.item-row');
                const newRow = firstRow.cloneNode(true);

                // Label বাদ
                newRow.querySelectorAll('label').forEach(label => label.remove());
                // Input clear
                newRow.querySelectorAll('input').forEach(input => input.value = '');
                // id remove (duplicate সমস্যা এড়াতে)
                newRow.querySelectorAll('[id]').forEach(el => el.removeAttribute('id'));

                container.appendChild(newRow);
                attachRowListeners(newRow);
            });

            // ✅ Row remove
            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('removeItem')) {
                    const rows = container.querySelectorAll('.item-row');
                    if (rows.length > 1) {
                        e.target.closest('.item-row').remove();
                        calculateGrandTotal(); // remove করলে grand total আবার হিসাব হবে
                    } else {
                        alert('At least one item row is required!');
                    }
                }
            });

            // ✅ প্রতি Row এ listener attach
            function attachRowListeners(row) {
                const itemQty = row.querySelector('.qty');
                const itemPrice = row.querySelector('.unit_price');
                const totalPrice = row.querySelector('.total_price');

                function recalc() {
                    const qty = parseFloat(itemQty.value) || 0;
                    const price = parseFloat(itemPrice.value) || 0;
                    const total = qty * price;
                    totalPrice.value = total.toFixed(2);
                    calculateGrandTotal(); // প্রতিবার হিসাব আপডেট
                }

                itemQty.addEventListener('input', recalc);
                itemPrice.addEventListener('input', recalc);
            }

            // ✅ সব total_price যোগ করে grand_total হিসাব
            function calculateGrandTotal() {
                let grandTotal = 0;
                container.querySelectorAll('.total_price').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });
                grandTotalInput.value = grandTotal.toFixed(2);
            }

            // প্রথম Row এ listener attach
            attachRowListeners(container.querySelector('.item-row'));
        });
    </script>
@endpush
