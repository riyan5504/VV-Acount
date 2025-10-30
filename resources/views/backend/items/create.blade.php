@extends('backend.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Items Entry</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Items Entry</li>
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
                        <form action="{{ url('/items-entry/save') }}" method="POST">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="code" class="form-label">Item Code</label>
                                        <input type="text" name="code" class="form-control" id="code" readonly placeholder="Auto generated" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="name" class="form-label">Item Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="pack_size" class="form-label">Pack_size</label>
                                        <input type="text" name="pack_size" class="form-control" id="pack_size" />
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="unit" class="form-label">Unit</label>
                                        <select name="unit" class="form-control" id="unit">
                                            <option selected disabled>Select Unit</option>
                                            <option value="ml">ml</option>
                                            <option value="gm">gm</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Ltr">Ltr</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cat_id" class="form-label">Select Category</label>
                                        <select name="cat_id" class="form-control" id="cat_id" required>
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="price" class="form-label">Unit Price</label>
                                        <input type="text" name="price" class="form-control" id="price" required />
                                    </div>

                                </div>
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
                    <!--end::Quick Example-->
                    <dev class="card card-primary card-outline mt-5">
                        <dev class="ms-2 pt-3">
                            <h5>Item List</h5>
                        </dev>
                        <div class="card mt-3 ms-1 me-1 mb-3">
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Pack Size</th>
                                            <th>Category</th>
                                            <th>Unit Price</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr class="align-middle">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->pack_size != null)
                                                        {{ $item->pack_size }} {{ $item->unit }}
                                                    @else
                                                        {{ $item->pack_size = '-' }}
                                                    @endif
                                                </td>
                                                <td>{{ $item->category->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{ url('/items-entry/edit/' . $item->id) }}"
                                                        class="btn ms-0 me-0">
                                                        <i class="bi bi-pencil text-primary"></i>
                                                    </a>
                                                    <a href="{{ url('/items-entry/delete/' . $item->id) }}"
                                                        class="btn me-0 ms-0">
                                                        <i class="bi bi-trash text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </dev>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
