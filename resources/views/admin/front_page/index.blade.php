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
                            <h4 class="card-title mb-0">Front Page List</h4>
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
                                                <th>Content Name </th>
                                                <th>Heading 1 </th>
                                                <th>Heading  2</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($contents as $key => $content)
                                                <tr>
                                                    <!-- Product Details -->
                                                    @if($key < 6)
                                                    <td>Product</td>
                                                    <td>{{ $content->product->sub_catgory->name }}</td>
                                                    <td>{{ $content->product->name }}</td>
                                                    @endif
                                                    @if($key > 5 && $key < 8)
                                                    <td>Why Choose Us</td>
                                                    <td>{{ $content->content1 }}</td>
                                                    <td>{{ $content->content3 }}</td>

                                                    @endif
                                                    @if($key > 7 && $key < 11)
                                                    <td>Most asked Questions</td>
                                                    <td>{{ $content->content1 }}</td>
                                                    <td>{{ $content->content3 }}</td>

                                                    @endif
                                                    <!-- Actions -->
                                                    <td>
                                                        @if($key < 6)
                                                            <a href="{{ route('front.edit',['id' => 'main_images', 'data' => 'main_images']) }}" class="btn btn-sm btn-success">Edit</a>
                                                        @else
                                                            <a href="{{ route('front.edit', ['id' => $content->id, 'data' => 'box']) }}" class="btn btn-sm btn-success">Edit</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Partner Images </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($partners as $key => $partner)
                                                <tr>
                                                    <!-- Product Details -->
                                                    <td>
                                                    <img class="img" height="100px" src="{{ asset('images')}}/partner/{{$partner->name}}"  alt=""></td>

                                                
                                                    <!-- Actions -->
                                                    <td>
                                                        <a href="{{ route('front.partner_edit',$partner->id) }}" class="btn btn-sm btn-success">Edit</a>
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
