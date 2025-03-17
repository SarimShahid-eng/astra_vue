@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Product List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('user.index') }}" class="btn btn-warning add-btn"
                                                id="create-btn"><i class="ri-arrow-left-line align-bottom me-1"></i> Back</a>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">Product Name </th>
                                                <th class="sort" data-sort="date">Serial Number</th>
                                                <th class="sort" data-sort="email">Waranty</th>
                                                <th class="sort" data-sort="email">Warnty Start</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($products as $product)
                                                <tr>
                                                        <td class="customer_name">{{ $product->product->name }}</td>
                                                        <td class="customer_name">{{ $product->product->serial_num }}</td>
                                                        <td class="customer_name">{{ $product->product->warranty_years }} Years</td>
                                                        <td class="customer_name">{{ $product->sell_date }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    
@endsection
