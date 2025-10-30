@extends('backend.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Production Batches</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/production') }}">Production</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Batches</li>
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
                    <dev class="card card-primary card-outline">
                        <dev class="ms-2 pt-3">
                            <h5>Batch List</h5>
                        </dev>
                        <div class="card mt-3 ms-1 me-1 mb-3">
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Sl. No.</th>
                                            <th>Date</th>
                                            <th>Product Name</th>
                                            <th>Batch No.</th>
                                            <th>Batch Size</th>
                                            <th>Actual Production Qty</th>
                                            <th>Total Cost</th>
                                            <th>Cost per Unit</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productions as $production)
                                            <tr class="align-middle">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $production->date->format('d-m-Y') }}</td>
                                                <td>{{ $production->name }}</td>
                                                <td>{{ $production->batch_no }}</td>
                                                <td>{{ $production->batch_size }}</td>
                                                {{-- <td>{{$production->productionGt->final_qty}} {{$production->productionGt->final_unit}}</td>
                                                <td>{{$production->productionGt->grand_total}}</td>
                                                <td>{{$production->productionGt->unit_cost}}</td> --}}
                                                <td>{{ $production->productionGt->final_qty ?? '' }}
                                                    {{ $production->productionGt->final_unit ?? '' }}</td>
                                                <td>{{ $production->productionGt->grand_total ?? '' }}</td>
                                                <td>{{ $production->productionGt->unit_cost ?? '' }}</td>
                                                <td style="text-align: center">
                                                    <a href="{{url('/production/edit/'.$production->id)}}" class="btn ms-0 me-0">
                                                        <i class="bi bi-pencil text-primary"></i>
                                                    </a>
                                                    <a href="{{url('/production/delete/'.$production->id)}}" class="btn me-0 ms-0">
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
