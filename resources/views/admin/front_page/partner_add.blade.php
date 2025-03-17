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
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($partner) ? 'Edit' : 'Add' }} Partner </h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('front.partner_update') }}"
                            method="post">
                            @csrf
                            
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label">Select Image</label>
                                    <input class="form-control" type="file" name="name">
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <img class="img" height="200px" src="{{ asset('images')}}/partner/{{$partner->name}}"  alt="">
                                </div>
                                <input type="hidden" name="partner_id" value="{{ $partner->id }}">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">
                                    Update</button>
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
