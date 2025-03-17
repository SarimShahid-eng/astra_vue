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
                            <h4 class="card-title mb-0">Contact Page</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Head Office
                                                </th>
                                                <th>phone number</th>
                                                <th>email number
                                                </th>
                                                <th>Head Office
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <!-- Product Details -->
                                                <td> <img src="{{ asset('images/' . $contact->colum1) }}"
                                                        alt="Contact Image" width="50" height="50" class="me-1"></td>
                                                <td>{{ $contact->colum2 }}</td>
                                                <td>{{ $contact->colum3 }}</td>
                                                <td>{{ $contact->colum4 }}</td>
                                                <td>{{ $contact->colum5 }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <a href="{{ route('contact.edit', $contact->id) }}"
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
