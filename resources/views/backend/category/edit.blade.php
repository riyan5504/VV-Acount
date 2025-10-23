@extends('backend.master')

@section('content')
     <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Item Category Entry</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category Entry</li>
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
                                <form action="{{ url('/category/update/'.$category->id) }}" method="POST">
                                    @csrf
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="cat_name" class="form-label">Item Category Name</label>
                                            <input type="text" value="{{$category->name}}" name="cat_name" class="form-control"
                                                id="cat_name" />
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                    <!--begin::Footer-->
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    <!--end::Footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Quick Example-->
                            <dev class="card card-primary card-outline mt-5">
                                <dev class="ms-2 pt-3">
                                    <h5>Item Category List</h5>
                                </dev>
                                <div class="card mt-3 ms-1 me-1 mb-3">
                                    <div class="card-body p-0">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th style="width: 150px">Sl. No.</th>
                                                    <th style="width: 600px">Category Name</th>
                                                    <th style="text-align: center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr class="align-middle">
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td style="text-align: center">
                                                            <a href="{{url('/category/edit/'.$category->id)}}" class="btn ms-0 me-0">
                                                                <i class="bi bi-pencil text-primary"></i>
                                                            </a>
                                                            <a href="{{url('/category/delete/'.$category->id)}}" class="btn me-0 ms-0">
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