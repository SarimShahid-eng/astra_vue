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
                            <h4 class="card-title mb-0">About Page</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Years of experience</th>
                                                <th>Our Story</th>
                                                <th>Our Mission</th>
                                                <th>Our Vision</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- Product Details -->
                                                <td> <img src="{{ asset('images/' . $about[0]->colum1) }}"
                                                        alt="about Image" width="50" height="50" class="me-1"></td>
                                                <td>{{ $about[0]->colum2 }}</td>
                                                <td>{{ $about[0]->colum3 }}</td>
                                                <td>{{ $about[0]->colum4 }}</td>
                                                <td>{{ $about[0]->colum5 }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('about.edit', $about[0]->id) }}"
                                                                class="btn btn-sm btn-warning edit-item-btn">Edit</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Saticfied Clients</th>
                                                <th>Finished Works</th>
                                                <th>covid -19 specialist</th>
                                                <th>global brands</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- Product Details -->

                                                <td>{{ $about[1]->colum1 }}</td>
                                                <td>{{ $about[1]->colum2 }}</td>
                                                <td>{{ $about[1]->colum4 }}</td>
                                                <td>{{ $about[1]->colum3 }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('about.edit', $about[1]->id) }}"
                                                                class="btn btn-sm btn-warning edit-item-btn">Edit</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h2>Our Main Goals</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Innovate Airway Solutions
                                                </th>
                                                <th>Always Prioritize Quality
                                                </th>
                                                <th>Enhance Patient Outcomes
                                                </th>
                                                <th>Build Trusted Partnerships
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- Product Details -->

                                                <td>{{ $about[2]->colum1 }}</td>
                                                <td>{{ $about[2]->colum2 }}</td>
                                                <td>{{ $about[2]->colum4 }}</td>
                                                <td>{{ $about[2]->colum3 }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('about.edit', $about[2]->id) }}"
                                                                class="btn btn-sm btn-warning edit-item-btn">Edit</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
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
    <script></script>
@endsection
