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
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($user) ? 'Edit' : 'Add' }} Sub Category</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('sub_category.store') }}"
                            method="post">
                            @csrf

                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Categories</label>
                                <select class="form-control" name="cat_id" data-toggle="select2">
                                    <option value=" ">Select Categories </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}"
                                    placeholder="Name" required>
                            </div>
                            
                            @isset($user)
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @endisset
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($user) ? 'Edit' : 'Add' }}
                                    Sub Category</button>
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
