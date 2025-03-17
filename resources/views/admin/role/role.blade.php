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
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($role) ? 'Edit' : 'Add' }} Role</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('role.save') }}" method="post">
                            @csrf
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Role</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name ?? '' }}" required>
                            </div>
                            @isset($role)  
                                <input type="hidden" name="role_id" value="{{$role->id}}">
                            @endisset
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($role) ? 'Edit' : 'Add' }} Role</button>
                            </div>
                        </form>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    </div>
@endsection
