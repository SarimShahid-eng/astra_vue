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
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($product) ? 'Edit' : 'Add' }} Product</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('product.save') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Categories Dropdown -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="category" class="form-label">Categories</label>
                                <select class="form-control" name="category" id="category" data-toggle="select2" required>
                                    <option value="">Select Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ isset($product) && $product->category == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Subcategories Dropdown -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="sub_cat" class="form-label">Sub Categories</label>
                                <select class="form-control" name="sub_cat" id="sub_cat" data-toggle="select2" required>
                                    <option value="">Select Sub Categories</option>
                                    @if (isset($sub_categories))
                                        @foreach ($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}"
                                                {{ isset($product) && $product->sub_category == $sub_category->id ? 'selected' : '' }}>
                                                {{ $sub_category->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <!-- Name -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name ?? '' }}"
                                    placeholder="Name" required>
                            </div>

                            <!-- Weight -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" class="form-control" name="weight"
                                    value="{{ $product->weight ?? '' }}" placeholder="Weight" required>
                            </div>

                            <!-- Dimensions -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="dimensions" class="form-label">Dimensions</label>
                                <input type="text" class="form-control" name="dimensions"
                                    value="{{ $product->dimensions ?? '' }}" placeholder="Dimensions" required>
                            </div>

                            <!-- Size -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="size" class="form-label">Size</label>
                                <input type="text" class="form-control" name="size"
                                    value="{{ $product->size ?? '' }}" placeholder="Size" required>
                            </div>

                            <!-- Product Images -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="product_images" class="form-label">Images</label>
                                <input type="file" class="form-control" name="product_images[]" multiple>
                                @if (isset($product->product_images))
                                    <div>
                                        @foreach ($product->product_images as $image)
                                            <small>
                                                Current Image: <a href="{{ asset('images/product_images/' . $image) }}"
                                                    target="_blank">{{ $image }}</a>
                                            </small><br>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Warranty Years -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="waranty_years" class="form-label">Warranty Years</label>
                                <input type="number" class="form-control" name="warranty_years"
                                    value="{{ $product->warranty_years ?? '' }}" placeholder="Warranty Years" required>
                            </div>

                            <!-- Check Data -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="check_data" class="form-label">Check Data</label>
                                <input type="text" class="form-control" name="check_data"
                                    value="{{ $product->check_data ?? '' }}" placeholder="Value, Value 2" required>
                            </div>

                            <!-- Serial Number -->
                            <div class="col-xxl-3 col-md-6">
                                <label for="serial_num" class="form-label">Serial Number</label>
                                <input type="text" class="form-control" name="serial_num"
                                    value="{{ $product->serial_num ?? '' }}" placeholder="Serial Number" required>
                            </div>

                            <!-- Video Fields -->
                            <div id="videoFieldsContainer">
                                @if (isset($product->videos) && $product->videos->count())
                                    @foreach ($product->videos as $key => $video)
                                        <div class="row video-input-group">
                                            <div class="col-xxl-3 col-md-1"></div>
                                            <div class="col-xxl-3 col-md-3">
                                                <label for="video_title" class="form-label">Video Title</label>
                                                <input type="text" class="form-control" name="video_title[]"
                                                    value="{{ $video->title }}" placeholder="Video Title" required>
                                            </div>
                                            <div class="col-xxl-3 col-md-3">
                                                <label for="video_img" class="form-label">Video Image</label>
                                                <input type="file" class="form-control" name="video_img[]">
                                                @if ($video->image)
                                                    <small>Current Image: <a
                                                            href="{{ asset('images/video_images' . $video->image) }}"
                                                            target="_blank">View</a></small>
                                                @endif
                                            </div>
                                            <div class="col-xxl-3 col-md-3">
                                                <label for="video_link" class="form-label">Video Link</label>
                                                <input type="text" class="form-control" name="video_link[]"
                                                    value="{{ $video->link }}" placeholder="Video Link" required>
                                            </div>
                                            <div class="col-xxl-3 col-md-1">
                                                @if ($key == 0)
                                                    <button id="addVideo" class="btn btn-primary mt-4" type="button">+</button>
                                                @else
                                                <button class="btn btn-danger mt-4 removeVideo"
                                                    type="button">-</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row video-input-group">
                                        <div class="col-xxl-3 col-md-1">
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <label for="video_title" class="form-label">Video Title</label>
                                            <input type="text" class="form-control form-control-icon"
                                                name="video_title[]" placeholder="Video Title" required>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <label for="video_img" class="form-label">Video Image</label>
                                            <input type="file" class="form-control form-control-icon"
                                                name="video_img[]" placeholder="Video Image" required>
                                        </div>
                                        <div class="col-xxl-3 col-md-3">
                                            <label for="video_link" class="form-label">Video Link</label>
                                            <input type="text" class="form-control form-control-icon"
                                                name="video_link[]" placeholder="Video Link" required>
                                        </div>
                                        <div class="col-xxl-3 col-md-1">
                                            <button id="addVideo" class="btn btn-primary mt-4" type="button">+</button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Text Areas -->
                            <div class="col-xxl-6 col-md-6">
                                <label for="detail" class="form-label">Detail</label>
                                <textarea name="detail" class="form-control" cols="30" rows="5">{{ $product->detail ?? '' }}</textarea>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <label for="more_detail" class="form-label">More Detail</label>
                                <textarea name="more_detail" class="form-control" cols="30" rows="5">{{ $product->more_detail ?? '' }}</textarea>
                            </div>
                            <div class="col-xxl-6 col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10">{{ $product->description ?? '' }}</textarea>
                            </div>

                            <!-- Hidden Input for Product ID -->
                            @isset($product)
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @endisset

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">{{ isset($product) ? 'Edit' : 'Add' }}
                                    Product</button>
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
            $('#category').on('change', function() {
                const selectedValue = $(this).val();
                getAjaxRequests(`{{ route('sub_category_get') }}/${selectedValue}`, {}, 'GET',
                    function(data) {
                        console.log(data);
                        const selectBox = $(
                            'select[name="sub_cat"]');
                        selectBox.empty();
                        selectBox.append(
                            '<option value="">Select Sub Categories</option>');

                        data.forEach(item => {
                            console.log(item)
                            selectBox.append(
                                `<option value="${item.id}">${item.name}</option>`);
                        });
                    }
                );
            })
            $('#addVideo').on('click', function() {
                var newFields = `
            <div class="row video-input-group">
                <div class="col-xxl-3 col-md-1">
                                    </div>
                <div class="col-xxl-3 col-md-3">
                    <label class="form-label">Video Title</label>
                    <input type="text" class="form-control form-control-icon" name="video_title[]" placeholder="Video Title" required>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <label class="form-label">Video Image</label>
                    <input type="file" class="form-control form-control-icon" name="video_img[]" placeholder="Video Image" required>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <label class="form-label">Video Link</label>
                    <input type="text" class="form-control form-control-icon" name="video_link[]" placeholder="Video Link" required>
                </div>
                <div class="col-xxl-3 col-md-1">
                    <button class="btn btn-danger mt-4 remove-video" type="button">-</button>
                </div>
            </div>`;

                // Append the new fields to the container
                $('#videoFieldsContainer').append(newFields);
            });

            // Remove video input fields
            $('#videoFieldsContainer').on('click', '.remove-video', function() {
                $(this).closest('.video-input-group').remove();
            });

        });
    </script>
@endsection
