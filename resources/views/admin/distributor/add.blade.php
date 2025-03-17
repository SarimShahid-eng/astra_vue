@extends('layouts.app')
@section('content')
    {{-- <div class="row">
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
    <div class="page-content pt-0"> --}}
    <div class="container-fluid">
        <div class="row">

            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Company Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#territoryDetails" role="tab">
                                    <i class="fas fa-home"></i> Territory Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#administratorAccount" role="tab">
                                    <i class="fas fa-home"></i> Administrator Account
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('distributor.store') }}" class="ajaxForm" method="POST">
                            @csrf
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <div class="heading-sub_heading mb-3">
                                        <h5 class="mb-0">Company Information</h5>
                                        <p class="text-muted fs-11">Provide your company's official details </p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="companyNameInput" class="form-label">Company Name*</label>
                                                <input type="text" class="form-control" id="companyNameInput"
                                                    placeholder="Enter legal company name" name="company_name"
                                                    value="{{ $distributor->company_name ?? '' }}">
                                                <input type="hidden" name="distributor_id"
                                                    value="{{ $distributor->id ?? '' }}">
                                            </div>
                                        </div>

                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="regNoInput" class="form-label">Business Registation
                                                    Number*</label>
                                                <input type="number" name="registration_number" class="form-control"
                                                    id="regNoInput" placeholder="Enter registration number"
                                                    value="{{ $distributor->reg_no ?? '' }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="yearFoundedInput" class="form-label">Year Founded</label>
                                                <input name="year_founded" type="number" class="form-control"
                                                    id="yearFoundedInput" placeholder="eg.2005"
                                                    value="{{ $distributor->founded_year ?? '' }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="numberOfEmployees" class="form-label">Number of
                                                    Employees</label>
                                                <input type="number" name="no_of_employees" class="form-control"
                                                    id="numberOfEmployees"
                                                    value="{{ $distributor->no_of_employees ?? '' }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="companyDescription" class="form-label">Company
                                                    Description*</label>
                                                <textarea name="company_description" placeholder="Brief Description of your company and services" class="form-control"
                                                    id="" cols="30" rows="10">{{ $distributor->company_desc ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <!--end col-->

                                        <div class="col-lg-6">
                                            <label for="companyWebsite" class="form-label">Company Website</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="ri-global-line"></i></span>
                                                <input name="company_website" type="text" class="form-control"
                                                    placeholder="www.yourcompany.com" aria-label="company_website"
                                                    value="{{ $distributor->company_website ?? '' }}"
                                                    aria-describedby="basic-addon1">
                                            </div>

                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="territoryDetails" role="tabpanel">
                                    <div class="heading-sub_heading mb-3">
                                        <h5 class="mb-0">Territory Details</h5>
                                        <p class="text-muted fs-11">Define the geographical areas you service</p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="heaquartersAddressInput" class="form-label">Headquarters
                                                    Address*</label>
                                                <input type="text" name="headquarters_address" class="form-control"
                                                    value="{{ $distributor->headquarters_address ?? '' }}"
                                                    id="heaquartersAddressInput" placeholder="Street address">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="cityInput" class="form-label">City*</label>
                                                <input type="text" class="form-control" id="cityInput" name="city"
                                                    value="{{ $distributor->city ?? '' }}" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="stateInput" class="form-label">State/Province*</label>
                                                <input type="text" class="form-control" id="stateInput"
                                                    value="{{ $distributor->province ?? '' }}" name="state"
                                                    placeholder="Enter State/Province">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="postalZipCodeInput" class="form-label">Postal/Zip
                                                    Code*</label>
                                                <input type="number" class="form-control" id="postalZipCodeInput"
                                                    value="{{ $distributor->postal_code ?? '' }}" name="postal_code"
                                                    placeholder="Postal/Zip code">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="selectCountry" class="form-label">Country*</label>
                                                <select class="country-select2" name="country">
                                                    <option value="" selected>Select Country</option>
                                                    @foreach ($countries as $key => $country)
                                                        <option @selected(@$distributor->country === $key)
                                                            value="{{ $country . '-' . $key }}">
                                                            {{ $country . ' - ' . $key }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <label for="companyWebsite" class="form-label">Main Phone
                                                Number*</label>
                                            @isset($distributor->mpn)
                                                (<span class="">Current MPN :
                                                    {{ $distributor->mpn ?? '' }}</span>)
                                            @endisset
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <span id="mpnDialCode">Country Dial Code</span>
                                                </span>
                                                <input name="mpn" type="text" class="form-control"
                                                    placeholder="Enter Main Phone number (without country code)"
                                                    aria-label="mpn" aria-describedby="basic-addon1">
                                            </div>

                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="businessEmailInput" class="form-label">Business Email*</label>
                                                <input type="email" class="form-control" id="businessEmailInput"
                                                    value="{{ $distributor->business_email ?? '' }}"
                                                    name="business_email" placeholder="contact@yourcompany.com">
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <div class="tab-pane" id="administratorAccount" role="tabpanel">
                                    <div class="heading-sub_heading mb-3">
                                        <h5 class="mb-0">Administrator Account</h5>
                                        <p class="text-muted fs-11">Create the primary administrator account</p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">First Name*</label>
                                                <input type="text" name="firstname" class="form-control"
                                                    value="{{ $distributor->user->name ?? '' }}" id="firstname"
                                                    placeholder="Enter Firstname">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="lastNameInput" class="form-label">Last Name*</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $distributor->lastname ?? '' }}" id="lastNameInput"
                                                    name="lastname" placeholder="Enter Lastname">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="JobTitleInput" class="form-label">Job Title*</label>
                                                <input type="text" class="form-control" id="JobTitleInput"
                                                    value="{{ $distributor->job_title ?? '' }}" name="job_title"
                                                    placeholder="eg.Distribution Manager">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="departmentInput" class="form-label">Department</label>
                                                <input type="text" class="form-control" id="departmentInput"
                                                    value="{{ $distributor->department ?? '' }}" name="department"
                                                    placeholder="eg.Sales">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="workEmailInput" class="form-label">Work Email*</label>
                                                <input type="email" class="form-control" id="workEmailInput"
                                                    value="{{ $distributor->user->email ?? '' }}" name="work_email"
                                                    placeholder="name@company.com">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <label for="dpn" class="form-label">Direct Phone
                                                Number*</label>
                                            @isset($distributor->user->number)
                                                (<span class="">Current DPN :
                                                    {{ $distributor->user->number ?? '' }}</span>)
                                            @endisset
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <span id="dpnDialCode">Country Dial Code</span>
                                                </span>
                                                <input name="dpn" type="text" class="form-control"
                                                    placeholder="Enter Direct Phone number (without country code)"
                                                    aria-label="dpn" aria-describedby="basic-addon1">
                                            </div>
                                            {{-- mpnDialCode --}}

                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="passwordInput" class="form-label">Password*</label>
                                                <input type="password" class="form-control" id="passwordInput"
                                                    name="password" placeholder="Create Password">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="confirmpasswordInput" class="form-label">Confirm
                                                    Password*</label>
                                                <input type="confirmpassword" class="form-control"
                                                    id="confirmpasswordInput" name="confirmpassword"
                                                    placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
    </div><!-- End Page-content -->
    @push('page-script')
        <script>
            $(document).ready(function() {
                $('.country-select2').select2();
                $('.country-select2').on('select2:select', function() {
                    let selectedCountry = $(this).val(); // Get selected country value

                    $.ajax({
                        url: "{{ route('distributor.get_distributor_country_dialcode') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            country: selectedCountry
                        },
                        success: function(response) {
                            if (response && response.countryDialCode) {
                                $('#dpnDialCode').text(response.countryDialCode);
                                $('#mpnDialCode').text(response.countryDialCode);
                            }
                        },
                        error: function(xhr) {
                            console.log("Error:", xhr.responseText);
                        }
                    });
                });
            })
        </script>
    @endpush
@endsection
