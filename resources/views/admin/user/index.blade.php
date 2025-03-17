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
                            <h4 class="card-title mb-0">Customer List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('user.add') }}" class="btn btn-success add-btn"
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
                                                <th class="sort" data-sort="customer_name">Customer Name </th>
                                                <th class="sort" data-sort="email">User Name (NIC)</th>
                                                <th class="sort" data-sort="email">Role</th>
                                                <th class="sort" data-sort="date">Password</th>

                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($users as $user)
                                                <tr>
                                                    @if ($user->id == 1)
                                                    @else
                                                        
                                                        <td class="customer_name">{{ $user->name }}</td>
                                                        <td class="customer_name">{{ $user->email }}</td>
                                                        <td class="customer_name">{{ $user->role }}</td>
                                                        <td class="customer_name">{{ $user->number }}</td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                                        class="btn btn-sm btn-warning edit-item-btn">Edit</a>
                                                                </div>
                                                                <div class="edit">
                                                                    <a href="{{ route('user.user_products', $user->id) }}"
                                                                        class="btn btn-sm btn-success edit-item-btn">View</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                </tr>
                                            @endif
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
