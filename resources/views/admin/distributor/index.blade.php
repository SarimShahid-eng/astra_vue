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
                            <h4 class="card-title mb-0">distributor List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('distributor.add') }}" class="btn btn-success add-btn"
                                                id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Add</a>

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

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Firstname</th>
                                                <th>Job_title</th>
                                                <th>Department</th>
                                                <th>W.Email</th>
                                                <th>Company Name</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($distributors as $key => $distributor)
                                                <tr>
                                                    <!-- Product Details -->
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $distributor->firstname }}</td>
                                                    <td>{{ $distributor->job_title }}</td>
                                                    <td>{{ $distributor->department }}</td>
                                                    <td>{{ $distributor->work_email }}</td>
                                                    <td>{{ $distributor->company_name }}</td>
                                                    <td>{{ $distributor->country }}</td>
                                                    <td>{{ $distributor->city }}</td>
                                                    <td>{{ $distributor->province }}</td>
                                                    <td>
                                                        <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <a href="{{ route('distributor.edit', $distributor->id) }}"
                                                                    class="btn btn-sm btn-warning edit-item-btn">Edit</a>
                                                            </div>
                                                            <div class="remove">
                                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#remove_data_{{ $distributor->id }}">Remove</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div id="remove_data_{{ $distributor->id }}" class="modal fade zoomIn"
                                                    tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"
                                                                    id="NotificationModalbtn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mt-2 text-center">
                                                                    <img src="{{ asset('layout_assets/images/bin-file.gif') }}"
                                                                        alt="" height="200" width="200">
                                                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                        <h4>Are you sure ?</h4>
                                                                        <p class="text-muted mx-4 mb-0">Are you sure you
                                                                            want to remove this distributor ?</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                    <button type="button" class="btn w-sm btn-light"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button onclick="ajaxRequest(this)"
                                                                        data-url="{{ route('distributor.delete', $distributor->id) }}"
                                                                        class="btn w-sm btn-danger"
                                                                        id="delete-notification">Yes, Delete
                                                                        It!</button>
                                                                </div>
                                                            </div>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="javascript:void(0);">
                                            Next
                                        </a>
                                    </div>
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
    <script></script>
@endsection
