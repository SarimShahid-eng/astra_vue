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
                    <h4 class="card-title mb-0 flex-grow-1">{{ isset($contact) ? 'Edit' : 'Add' }} Contact</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3 needs-validation ajaxForm" novalidate action="{{ route('contact.save') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                           
                            <div class="col-xxl-3 col-md-6">
                                <label for="" class="form-label">Head Office</label>
                                <textarea type="text" class="form-control" name="colum2" class="form-control form-control-icon" placeholder="Content" cols="30"
                                rows="10">{{ $contact->colum2 ?? '' }}</textarea>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <label for="iconInput" class="form-label">Image</label>
                                <input type="file" class="form-control form-control-icon" name="image"
                                    value="" >
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <label for="iconInput" class="form-label">phone number	 </label>
                                <textarea name="colum3" class="form-control form-control-icon" placeholder="Content" cols="30"
                                rows="5">{{ $contact->colum3 ?? '' }}</textarea>
                            </div>
                                <div class="col-xxl-6 col-md-6">
                                    <img src="{{ asset('images/'.$contact->colum1) }}" alt="contact Image" width="100%" height="300px" class="me-1">
                                </div>
                            <div class="col-xxl-6 col-md-6">
                                <label for="iconInput" class="form-label">email number	 </label>
                                <textarea name="colum4" class="form-control form-control-icon" placeholder="Content" cols="30"
                                    rows="10">{{ $contact->colum4 ?? '' }}</textarea>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <label for="iconInput" class="form-label">Head Office	 </label>
                                <textarea name="colum5" class="form-control form-control-icon" placeholder="Content" cols="30"
                                    rows="10">{{ $contact->colum5 ?? '' }}</textarea>
                            </div>
                            @isset($contact)
                                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                            @endisset
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit"> {{ isset($contact) ? 'Edit' : 'Add' }}
                                    contact</button>
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
