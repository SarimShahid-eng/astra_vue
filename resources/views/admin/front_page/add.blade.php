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
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($content) ? 'Edit' : 'Add' }} Blog </h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('front.update') }}"
                            method="post">
                            @csrf
                            @if ($data == 'main_images' && isset($contents))
                                <h4> Products</h4>
                                <div id="productAdd" class="container">
                                    @foreach (@$contents as $key => $content)
                                        <div class="row align-items-center">
                                            <input type="hidden" name="content_id[]" value="{{ $content->id }}">
                                            <div class="col-xxl-3 col-md-4">
                                                <label for="category" class="form-label">Categories</label>
                                                <select class="form-control" name="category[]" data-toggle="select2">
                                                    <option value="">Select Categories</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $content->content1 == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-3 col-md-4">
                                                <label for="sub_cat" class="form-label">Sub Categories</label>
                                                <select class="form-control" name="sub_cat[]" data-toggle="select2">
                                                    <option value="">Select Sub Categories</option>
                                                    @foreach ($subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}"
                                                            {{ $content->content3 == $subCategory->id ? 'selected' : '' }}>
                                                            {{ $subCategory->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xxl-3 col-md-4">
                                                <label for="product" class="form-label">Product</label>
                                                <select class="form-control" name="product_id[]" data-toggle="select2">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $content->content4 == $product->id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @endif
                            @if ($data == 'box')
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label">Heading</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10">{{$content->content1}}</textarea>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label">Content</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10">{{$content->content2}}</textarea>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label">Heading</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10">{{$content->content3}}</textarea>
                                </div>
                                <div class="col-xxl-3 col-md-6">
                                    <label for="" class="form-label">Content</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10">{{$content->content4}}</textarea>
                                </div>
                            @endif
                            @isset($content)
                                <input type="hidden" name="user_id" value="{{ $content->id }}">
                            @endisset
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', 'select[name="category[]"]', function() {
                const selectedValue = $(this).val();
                const subCatSelectBox = $(this).closest('.row').find('select[name="sub_cat[]"]');
                const productSelectBox = $(this).closest('.row').find('select[name="product_id[]"]');

                getAjaxRequests(`{{ route('sub_category_get') }}/${selectedValue}`, {}, 'GET', function(
                    data) {
                    console.log(data);
                    subCatSelectBox.empty();
                    subCatSelectBox.append('<option value="">Select Sub Categories</option>');
                    productSelectBox.empty();
                    productSelectBox.append(
                        '<option value="">Select Product</option>'
                    );

                    data.forEach(item => {
                        console.log(item);
                        subCatSelectBox.append(
                            `<option value="${item.id}">${item.name}</option>`);
                    });
                });
            });

            $(document).on('change', 'select[name="sub_cat[]"]', function() {
                const selectedValue = $(this).val();
                const productSelectBox = $(this).closest('.row').find('select[name="product_id[]"]');

                getAjaxRequests(`{{ route('get_product') }}/${selectedValue}`, {}, 'GET', function(data) {
                    console.log(data);
                    productSelectBox.empty();
                    productSelectBox.append('<option value="">Select Product</option>');

                    data.forEach(item => {
                        console.log(item);
                        productSelectBox.append(
                            `<option value="${item.id}">${item.name}</option>`);
                    });
                });
            });

            $('#add_product').on('click', function() {
                var newFields = `
                @if( isset($contents))
                    <div class="row align-items-center mt-3">
                        <div class="col-xxl-3 col-md-3">
                            <label for="category" class="form-label">Categories</label>
                            <select class="form-control" name="category[]" data-toggle="select2">
                                <option value="">Select Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="sub_cat" class="form-label">Sub Categories</label>
                            <select class="form-control" name="sub_cat[]" data-toggle="select2">
                                <option value="">Select Sub Categories</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-md-3">
                            <label for="product" class="form-label">Product</label>
                            <select class="form-control" name="product_id[]" data-toggle="select2">
                                <option value="">Select Product</option>
                            </select>
                        </div>
                        <div class="col-xxl-2 col-md-2">
                            <label for="sell_date" class="form-label">Sell Date</label>
                            <input type="date" class="form-control form-control-icon" name="sell_date[]" value="" required>
                        </div>
                        <div class="col-xxl-1 col-md-1">
                            <button class="btn btn-danger mt-4 remove-product" type="button">-</button>
                        </div>
                    </div>
                    @endif
                `;

                $('#productAdd').append(newFields);

                // Reinitialize Select2 for newly added fields
                $('select[data-toggle="select2"]').select2();
            });

            $(document).on('click', '.remove-product', function() {
                $(this).closest('.row').remove();
            });
        })
    </script>
@endsection
