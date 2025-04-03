@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Device Information</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($user) ? 'Edit' : 'Add' }} Device Information</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 ajaxForm" action="{{ route('device_info.save') }}" method="post">
                            @csrf

                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Product Model</label>
                                <select class="form-control" name="product_id" id="product_id" data-toggle="select2"
                                    required>
                                    <option value="">Select Product Model</option>
                                    @foreach ($device_products as $device_product)
                                        <option @selected(@$device_product->id === @$device_product_config->product_id) value="{{ $device_product->id }}">
                                            {{ $device_product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Product Configuration</label>
                                <select class="form-control" name="configuration_id" id="product_config"
                                    data-toggle="select2" required>
                                    <option value="">Select Product Config</option>

                                </select>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Serial Number</label>
                                <input type="text" class="form-control" name="serial_number"
                                    value="{{ @$business->serial_number ?? '' }}" placeholder="Serial number" required>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Manufacture Date</label>
                                <input type="date" class="form-control" name="manufacture_date"
                                    value="{{ @$business->manufacture_date ?? '' }}" placeholder="Manufacture date"
                                    required>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Expiration Date</label>
                                <input type="date" class="form-control" name="expiration_date"
                                    value="{{ @$business->expiration_date ?? '' }}" placeholder="Expiration Date" required>
                            </div>

                            @isset($business)
                                <input type="hidden" name="business_id" value="{{ $business->id }}">
                            @endisset
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($business) ? 'Edit' : 'Add' }}
                                    Device Info</button>
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
    @push('page-script')
        <script>
            $(document).ready(function() {
                $('#product_id').on('change', function() {
                    const selectedValue = $(this).val();
                    const url = `{{ route('device_info.get_configurations', ':id') }}`.replace(':id',
                        selectedValue);

                    getAjaxRequests(url, {},
                        'GET',
                        function(data) {
                            console.log(data);
                            const selectBox = $(
                                '#product_config');
                            selectBox.empty();
                            selectBox.append(
                                '<option value="">Select Sub Categories</option>');

                            data.forEach(item => {
                                console.log(item)
                                selectBox.append(
                                    `<option value="${item.id}">${item.configuration}</option>`
                                );
                            });
                        }
                    );
                })
            })
        </script>
    @endpush
@endsection
