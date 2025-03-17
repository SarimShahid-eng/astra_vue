@extends('frontend.layouts.master')
@section('content')
    <section id="account-section"
        style="background: url('{{ asset('front_end_assets/asseted/images/01.jpg') }}') no-repeat
        center center/cover;">
        <!-- Text Container with Class -->
        <div class="account-text-container">
            <h1 id="account-title">My Account</h1>
            <div class="breadcrumb">
                <i class="fa fa-home"></i> <a href="{{route('index')}}">Home </a> > <b>  My Account</b>
            </div>
        </div>
    </section>
    <!-- Content -->
    <form action="{{route('user.update_form')}}" method="POST">

    <section class="bg-light p-08">
        <div class="container pt-60">
            <div class="row">
                <!-- Widget -->
               @include('frontend.layouts.profile_sidebar')
                <div class="col-md-9">
                    <div class="utf-user-profile-item">
                        <div class="utf-submit-page-inner-box">
                            <h3>My Account</h3>
                            @csrf
                            <div class="content with-padding">
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input value="{{Auth::user()->name}}" disabled type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>NIC</label>
                                    <input value="{{Auth::user()->email}}" disabled type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Phone Number</label>
                                    <input value="0{{Auth::user()->phone}}" type="text" name="phone">
                                </div>
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input value="{{Auth::user()->address}}" type="text" name="address">
                                </div>
                                <!-- <div class="col-md-12 margin-bottom-0">
                                                                <label>Message</label>
                                                                <textarea name="about" id="about" cols="20" rows="5">Lorem Ipsum is simply dummy text of printing and type setting industry Lorem Ipsum been industry standard dummy text ever since. Lorem Ipsum is simply dummy text of printing and type setting industry Lorem Ipsum been industry standard dummy text ever since.</textarea>
                                                            </div> -->

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="utf-centered-button button margin-top-0 margin-bottom-20" type="submit" >Save
                                    Changes</button>
                            </div>
                        </div>
                        <div class="utf-submit-page-inner-box" id="maani">
                            <h3>Product Details</h3>
                            <div class="content with-padding">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Warranty</th>
                                            <th>Extended Warranty</th>
                                            <th>Serial Number</th>
                                            <th>Purchase Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->product->name}}</td>
                                            <td>{{$product->sub_category->name}}</td>
                                            <td>{{$product->product->warranty_years}} Year</td>
                                            <td></td>
                                            <td>{{$product->product->serial_num}}</td>
                                            <td>{{$product->sell_date}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
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
