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
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($user) ? 'Edit' : 'Add' }} Device configuration</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate
                            action="{{ route('device_info.product_config_store') }}" method="post">
                            @csrf

                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Products</label>
                                <select class="form-control" name="product_id" id="category" data-toggle="select2"
                                    required>
                                    <option value="">Select Products</option>
                                    @foreach ($device_products as $device_product)
                                        <option @selected(@$device_product->id === @$device_product_config->product_id) value="{{ $device_product->id }}">
                                            {{ $device_product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Configuration</label>
                                <input type="text" class="form-control" name="configuration"
                                    value="{{ @$device_product_config->configuration ?? '' }}" placeholder="configuration"
                                    required>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Sku</label>
                                <input type="text" class="form-control" name="sku"
                                    value="{{ @$device_product_config->sku ?? '' }}" placeholder="sku" required>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"
                                    placeholder="Description">{{ @$device_product_config->description ?? '' }}</textarea>
                            </div>

                            @isset($device_product_config)
                                <input type="hidden" name="device_product_config_id" value="{{ $device_product_config->id }}">
                            @endisset
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">
                                    {{ isset($device_product_config) ? 'Edit' : 'Add' }}
                                    product config</button>
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
