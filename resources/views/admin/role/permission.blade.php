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
                            <h4 class="card-title mb-0">Permission List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">


                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table ">
                                        <thead class="table-light">
                                            <tr>
                                                <th >Menu Name</th>
                                                <th >View</th>
                                                <th >Insert</th>
                                                <th >Edit</th>
                                                <th >Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td class="customer_name">{{ $permission->menu_name }}
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                            <input type="checkbox" class="form-check-input" id="view_{{$permission->id}}" {{ $permission->view ? 'checked' : '' }} onclick="check_view({{$permission->id}})">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                            <input type="checkbox" class="form-check-input" id="create_{{$permission->id}}" {{ $permission->insert ? 'checked' : '' }} onclick="check_create({{$permission->id}})">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                            <input type="checkbox" class="form-check-input" id="edit_{{$permission->id}}" {{ $permission->update ? 'checked' : '' }} onclick="check_edit({{$permission->id}})">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                            <input type="checkbox" class="form-check-input" id="delete_{{$permission->id}}" {{ $permission->delete ? 'checked' : '' }} onclick="check_delete({{$permission->id}})">
                                                        </div>
                                                    </td>
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
    <script>
        function check_create(      ) {
            var isChecked = $("#create_"+id).is(":checked");
            if(isChecked){
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:1,p_id:id,column:'insert'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }else{
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:0,p_id:id,column:'insert'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }
        }
        function check_view(id) {
            var isChecked = $("#view_"+id).is(":checked");
            if(isChecked){
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:1,p_id:id,column:'view'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }else{
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:0,p_id:id,column:'view'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }
        }
        function check_edit(id) {
            var isChecked = $("#edit_"+id).is(":checked");
            if(isChecked){
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:1,p_id:id,column:'update'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }else{
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:0,p_id:id,column:'update'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }
        }
        function check_delete(id) {
            var isChecked = $("#delete_"+id).is(":checked");
            if(isChecked){
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:1,p_id:id,column:'delete'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }else{
                getAjaxRequests(`{{ route('role.permission_change') }}`, {status:0,p_id:id,column:'delete'}, 'GET',
                    function(data) {
                        console.log(data);
                    }
                );
            }
        }


    </script>
@endsection
