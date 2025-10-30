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
                        <form action="{{ url('/purchase/store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- Start Vendor Details Section --}}
                                <div id="vendorsContainer" class="border-0 shadow-sm">
                                    <div
                                        class="bg-primary text-white d-flex justify-content-between align-vendors-center mb-2 px-2 py-2 rounded">
                                        <h4 class="mb-0">Vendor Details</h4>
                                    </div>

                                    <!-- ✅ Proper Row Structure -->
                                    <div class="row g-2 align-vendors-end mb-2">
                                        <div class="col-md-5">
                                            <label for="vendor_name" class="form-label">Vendor Name</label>
                                            <input type="text" name="vendor_name" class="form-control vendor_name"
                                                id="vendor_name" required>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control phone" id="phone">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control email" id="email">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea name="address" class="form-control address" id="address" rows="1" required></textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control date" id="date"
                                                required>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="purchase_no" class="form-label">Invoice Number</label>
                                            <input type="text" name="purchase_no" class="form-control" id="purchase_no"
                                                value="{{ $newPurchaseNo ?? '' }}" readonly />
                                        </div>

                                    </div>
                                </div>
                                {{-- End Vendor Details Section --}}

                                {{-- Start Item Details Section --}}
                                <div id="itemsContainer" class="border-0 shadow-sm">
                                    <div
                                        class="bg-primary text-white d-flex justify-content-between align-items-center mb-2 px-2 py-2 rounded">
                                        <h4 class="mb-0">Item Details</h4>
                                        <button type="button" id="addItem"
                                            class="btn btn-light btn-sm text-dark fw-bold">
                                            + Add Item
                                        </button>
                                    </div>

                                    <!-- ✅ Proper Row Structure -->
                                    <div class="item-row row g-2 align-items-end mb-2">
                                        <div class="col-md-3">
                                            <label class="form-label">Item Name</label>
                                            <input type="text" name="item_name[]" class="form-control item_name"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Select Category</label>
                                            <select name="cat_id[]" class="form-control" required>
                                                <option selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label">Size</label>
                                            <input type="number" name="pack_size[]" class="form-control pack_size">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label">Unit</label>
                                            <input type="text" name="unit[]" class="form-control unit">
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label">Qty</label>
                                            <input type="number" name="qty[]" class="form-control qty" required>
                                        </div>
                                        <div class="col-md-1">
                                            <label class="form-label">Unit Price</label>
                                            <input type="number" step="0.01" name="unit_price[]"
                                                class="form-control unit_price" required>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <div class="w-100">
                                                <label class="form-label">Total Price</label>
                                                <input type="number" step="0.01" name="total_price[]"
                                                    class="form-control total_price" readonly>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm ms-2 removeItem">
                                                ×
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Item Details Section --}}

                                <div class="col-md-4 mt-3">
                                    <label class="form-label">Grand Total</label>
                                    <input type="number" step="0.01" name="grand_total"
                                        class="form-control grand_total" readonly>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
                // Select reset
                newRow.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

                // id remove (duplicate সমস্যা এড়াতে)
                newRow.querySelectorAll('[id]').forEach(el => el.removeAttribute('id'));

                container.appendChild(newRow);
                attachRowListeners(newRow);
                calculateGrandTotal();

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
