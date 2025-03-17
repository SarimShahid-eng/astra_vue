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
                            <h4 class="card-title mb-0">Product List</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('product.add') }}" class="btn btn-success add-btn"
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

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Weight</th>
                                                <th>Dimensions</th>
                                                <th>Warranty</th>
                                                <th>Images</th>
                                                <th>Videos</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <!-- Product Details -->
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->category }}</td>
                                                    <td>{{ $product->weight }}</td>
                                                    <td>{{ $product->dimensions }}</td>
                                                    <td>{{ $product->warranty_years }} years</td>
                            
                                                    <!-- Product Images -->
                                                    <td>
                                                        @if ($product->product_images)
                                                            @foreach (json_decode($product->product_images) as $image)
                                                                <img src="{{ asset('images/product_images/'.$image) }}" alt="Product Image" width="50" height="50" class="me-1">
                                                            @endforeach
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                            
                                                    <!-- Product Videos -->
                                                    <td>
                                                        @if ($product->videos->count())
                                                            @foreach ($product->videos as $video)
                                                                <div>
                                                                    <strong>{{ $video->title }}</strong><br>
                                                                    <img src="{{ asset('images/video_images/'.$video->image) }}" alt="Video Image" width="50" height="50">
                                                                    <a href="{{ $video->link }}" target="_blank">View Video</a>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                            
                                                    <!-- Actions -->
                                                    <td>
                                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                        {{--
                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" 
                                                            data-bs-target="#deleteModal{{ $product->id }}">Delete</button> --}}
                            
                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Confirm Deletion</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete <strong>{{ $product->name }}</strong>?
                                                                    </div>
                                                                    {{-- <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                                        </form>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
