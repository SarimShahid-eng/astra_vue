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
                            <h4 class="card-title mb-0">Complain List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort" data-sort="customer_name">Customer Name </th>
                                                <th class="sort" data-sort="email">User Name (NIC)</th>
                                                <th class="sort" data-sort="email">Product</th>
                                                <th class="sort" data-sort="date">Complain title</th>
                                                <th class="sort" data-sort="date">Complain Subject</th>
                                                <th class="sort" data-sort="date">Complain Message</th>

                                                <th class="sort" data-sort="action">Product Purchase Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($complains as $complain)
                                                <tr>
                                                   
                                                        
                                                        <td class="customer_name">{{ $complain->user->name }}</td>
                                                        <td class="customer_name">{{ $complain->user->email }}</td>
                                                        <td class="customer_name">{{ $complain->product->name }}</td>
                                                        <td class="customer_name">{{ $complain->title }}</td>
                                                        <td class="customer_name">{{ $complain->subject }}</td>
                                                        <td class="customer_name">{{ $complain->message }}</td>
                                                        <td class="customer_name">{{ $complain->purchase_date }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
