@extends('frontend.layouts.master')
@section('content')
    <section id="account-section"
        style="background: url('{{ asset('front_end_assets/asseted/images/01.jpg') }}') no-repeat center center/cover;">
        <!-- Text Container with Class -->
        <div class="account-text-container">
            <h1 id="account-title">Complaint Box</h1>
            <div class="breadcrumb">
                <i class="fa fa-home"></i> <a href="index.html">Home </a> > <b style="padding-left: 15px;"> Complaint Box</b>
            </div>
        </div>
    </section>
    <!-- Content -->
    <form action="{{ route('user.add_complain') }}" method="POST">
        @csrf
        <section class="bg-light p-08">
            <div class="container pt-60">
                <div class="row">
                    
                    <!-- Widget -->
                    @include('frontend.layouts.profile_sidebar')
                    <div class="col-md-9">
                        @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                        <div class="utf-user-profile-item">
                            <div class="utf-submit-page-inner-box">
                                <h3>Complaint Box</h3>
                                <div class="content with-padding">
                                    <div class="col-md-6">
                                        <label>Complaint Title</label>
                                        <input value="" placeholder="Enter Your Complaint Title" type="text"
                                            name="title">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Purchase Date</label>
                                        <input value="" placeholder="Enter Your Purchase Date" type="date"
                                            name="purchase_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Subject</label>
                                        <input value="" placeholder="Enter Your Subject" type="text"
                                            name="subject">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Products</label>
                                        <select class="form-control"
                                            style="height: 49px; border-radius: 2px; font-size: 15px;" name="product_id">
                                            @foreach ($products as $product)
                                                <option value="{{ $product->product->id }}">{{ $product->product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 margin-bottom-0">
                                        <label>Message</label>
                                        <textarea name="message" id="message" cols="20" rows="5" placeholder="Enter Your Complaint"></textarea>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit"
                                        class="utf-centered-button button margin-top-0 margin-bottom-20">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <!-- Content -->
@endsection
