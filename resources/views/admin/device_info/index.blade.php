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
                            <h4 class="card-title mb-0">Device Info List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('device_info.add') }}" class="btn btn-success add-btn"
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

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="device_model">Model</th>
                                                <th class="sort" data-sort="product_config">Config</th>
                                                <th class="sort" data-sort="manufacture_date">Manufacture Date</th>
                                                <th class="sort" data-sort="expiration_date">Expiration Date</th>
                                                {{-- <th class="sort" data-sort="action">Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($deviceInfos as $deviceInfo)
                                                <tr>
                                                    <td class="device_model">
                                                        {{ $deviceInfo->device_configuration->device_product->name }}</td>
                                                    <td class="product_config">
                                                        {{ $deviceInfo->device_configuration->configuration }}</td>
                                                    <td class="manufacture_date">{{ $deviceInfo->manufacture_date }}</td>
                                                    <td class="expiration_date">{{ $deviceInfo->expiration_date }}</td>
                                                    <td>
                                                        {{-- <div class="d-flex gap-2">
                                                            <div class="edit">
                                                                <a href="{{ route('business.edit', $deviceInfo->id) }}"
                                                                    class="btn btn-sm btn-success edit-item-btn">Edit</a>
                                                            </div>
                                                            <div class="remove">
                                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                                    data-bs-toggle="modal" data-id="{{ $deviceInfo->id }}"
                                                                    data-bs-target="#remove_data">Remove</button>
                                                            </div>
                                                        </div> --}}
                                                    </td>
                                                </tr>
                                                {{-- <div id="remove_data" class="modal fade zoomIn" tabindex="-1"
                                                    aria-hidden="true">
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
                                                                            want to add these remarks ?</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                    <button type="button" class="btn w-sm btn-light"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button onclick="ajaxRequest(this)"
                                                                        data-url="{{ route('business.delete', $deviceInfo->id) }}"
                                                                        class="btn w-sm btn-danger"
                                                                        id="delete-notification">Yes, Delete It!</button>
                                                                </div>
                                                            </div>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal --> --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find
                                                any orders for you search.</p>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('.remove-item-btn').on('click', function() {

            })
        })
        // function  deleteMultiple(){

        //     // var selectedValues = [];
        //     // $("input[name='chk_child']:checked").each(function() {
        //     //     selectedValues.push($(this).val());
        //     // });
        //     // console.log(selectedValues);
        // }

        function deleteMultiple() {
            var selectedValues = [];
            var isChecked = $("input[name='chk_child']").is(":checked");
            if (isChecked) {
                $("input[name='chk_child']:checked").each(function() {
                    selectedValues.push($(this).val());
                });
                delete_data(selectedValues);
            } else Swal.fire({
                title: "Please select at least one checkbox",
                confirmButtonClass: "btn btn-info",
                buttonsStyling: !1,
                showCloseButton: !0
            })
        }

        function delete_data(id) {
            getAjaxRequests(`{{ url('user-delete-all') }}`, {
                    ids: id
                }, 'GET',
                function(data) {
                    console.log(data);
                }
            );
        }
    </script>
@endsection
