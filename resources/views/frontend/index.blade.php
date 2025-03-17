@extends('frontend.layouts.master')
@section('content')
<style>
    .banner-img{
        position: relative;
        background: url({{ asset('front_end_assets'.'/assets/img/product-bg.jpg') }}) center no-repeat;
        background-size: cover;
        height: 240px;
        transition: background-size 0.5s ease-in-out;
    }
    .banner-img:hover{
        background-size: 120%;
    }
    .banner-img a img{
        max-width: 120px;
        position: absolute;
        right: 5%;
        top: 15%;
    }
</style>
    <!-- hero-area start -->
    <section class="hero-area">
        <div class="hero-slider">
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center"
                    data-background="{{ asset('front_end_assets'.'/assets/img/product-bg.jpg') }}">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6">
                                <div class="hero-text mt-90">
                                    <div class="hero-slider-caption ">
                                        <span data-animation="fadeInUp"
                                            data-delay=".2s">{{ $main_header->product->sub_catgory->name }}</span>
                                        <h2 data-animation="fadeInUp" data-delay=".4s">{{ $main_header->product->name }}
                                        </h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">{{ $main_header->product->detail }}
                                        </p>
                                    </div>
                                    <div class="hero-slider-btn">
                                        <a data-animation="fadeInUp" data-delay=".8s" href="{{route('product_details',$main_header->product->id)}}" class="c-btn">View
                                            More <i class="far fa-plus"></i></a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="slider-img d-none d-lg-block" data-animation="fadeInRight" data-delay=".8s">
                                    <img src="{{ asset('images/product_images/' . json_decode($main_header->product->product_images)[0]) }}"
                                        alt="" style="max-width: 350px; float: inline-end;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero-area end -->

    <!-- banner-area-start -->
    <div class="banner-area banner-pb pt-30 pb-70 pl-55 pr-55">
        <div class="container-fluid">
            <div class="row">
                @foreach ($blades as $blade)
                    <div class="col-xl-4 col-lg-4">
                        <div class="banner-wrapper mb-30">
                            <div class="banner-img pos-rel">
                                <a href="#"><img
                                        src="{{ asset('images/product_images/' . json_decode($blade->product->product_images)[0]) }}"
                                        alt=""></a>
                                <div class="banner-text">
                                    <span>{{ $blade->product->sub_catgory->name }}</span>
                                    <h2>{{ $blade->product->name }}</h2>
                                    <div class="b-button red-b-button">
                                        <a href="{{route('product_details',$blade->product->id)}}">View More <i class="far fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($moniters as $moniter)
                    <div class="col-xl-6 col-lg-6">
                        <div class="banner-wrapper mb-30">
                            <div class="banner-img pos-rel">
                                <a href="#"><img
                                        src="{{ asset('images/product_images/' . json_decode($moniter->product->product_images)[0]) }}"
                                        alt=""></a>
                                <div class="banner-text">
                                    <span>{{ $moniter->product->sub_catgory->name }}</span>
                                    <h2>{{ $moniter->product->name }}</h2>
                                    <div class="b-button red-b-button">
                                        <a href="{{route('product_details',$moniter->product->id)}}">View More <i class="far fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- banner-area-end -->

    <section class="why-choose-us py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-65">
                        <h2>Why Choose Us</h2>
                        <p>
                            Experience excellence with AstraVue Medical Instruments, your trusted partner in airway
                            management solutions.</p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-shield-alt mb-3 fa-3x clr-red"></i>
                            <h5 class="card-title">{{ $content_box1->content1 }}</h5>
                            <p class="card-text">
                                {{ $content_box1->content2 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-first-aid mb-3 fa-3x clr-red"></i>
                            <h5 class="card-title">{{ $content_box1->content3 }}</h5>
                            <p class="card-text">
                                {{ $content_box1->content4 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-heartbeat mb-3 fa-3x clr-red"></i>
                            <h5 class="card-title">{{ $content_box2->content1 }}</h5>
                            <p class="card-text">{{ $content_box2->content2 }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-check-circle mb-3 fa-3x clr-red"></i>
                            <h5 class="card-title">{{ $content_box2->content3 }}</h5>
                            <p class="card-text">
                                {{ $content_box2->content4 }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- product-area-start -->
    <div class="product-area pb-50 pt-50">
        <div class="container">
            <div class="tab-border mb-60">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="section-title mb-25">
                            <h2>Features Products</h2>
                            <p>Easy to handle with reliable performance</p>
                        </div>
                    </div>
                    {{-- <div class="col-xl-5 col-lg-6">
                        <div class="product-tab mb-25">
                            <ul class="nav justify-content-start justify-content-lg-end product-nav" id="myTab"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">
                                        <i class="far fa-trash-alt"></i>
                                        Disposable
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="far fa-recycle"></i>
                                        Reusable
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                        role="tab" aria-controls="contact" aria-selected="false">
                                        <i class="far fa-monitor-heart-rate"></i>
                                        Monitors
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="product-tab-content">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            @foreach ($feature_products as $feature_product)
                            <div class="col-xl-4 cl-lg-4 col-md-6">
                                <div class="product-wrapper text-center mb-45">
                                    <div class="product-img pos-rel home-product">
                                        <a href="#">
                                            <img
                                            src="{{ asset('images/product_images/' . json_decode($feature_product->product_images)[0]) }}"
                                                alt="" class="img-d-none">
                                            <img class="secondary-img"
                                                src="{{ asset('images/product_images/' . json_decode($feature_product->product_images)[1]) }}"
                                                alt="">
                                        </a>
                                        <div class="product-action">

                                            <a class="c-btn" href="{{route('product_details',$feature_product->id)}}">View Details <i class="far fa-plus"></i></a>

                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <h5>{{$feature_product->sub_catgory->name }}</h5>
                                        <h4><a href="{{route('product_details',$feature_product->id)}}">{{$feature_product->name}}</a></h4>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-xl-4 cl-lg-4 col-md-6">
                                <div class="product-wrapper text-center mb-45">
                                    <div class="product-img pos-rel home-product">
                                        <a href="#">
                                            <img src="{{ asset('front_end_assets') }} /assets/img/products/AstraVue Ultra Blade.png"
                                                alt="">
                                            <img class="secondary-img"
                                                src="{{ asset('front_end_assets') }} /assets/img/products/AstraVue Ultra Blade - hover.png"
                                                alt="">
                                        </a>
                                        <div class="product-action">
                                            <!--  -->
                                            <a class="c-btn" href="#">View Detail <i class="far fa-plus"></i></a>
                                            <!--  -->
                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <h5>Reusable</h5>
                                        <h4><a href="#">Ultra Blade</a></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-xl-4 cl-lg-4 col-md-6">
                                <div class="product-wrapper text-center mb-45">
                                    <div class="product-img pos-rel home-product">
                                        <a href="#">
                                            <img src="{{ asset('front_end_assets') }} /assets/img/products/Monitor.png"
                                                alt="">
                                            <img class="secondary-img"
                                                src="{{ asset('front_end_assets') }} /assets/img/products/Monitor - hover.png"
                                                alt="">
                                        </a>
                                        <div class="product-action">

                                            <a class="c-btn" href="#">View Details <i class="far fa-plus"></i></a>

                                        </div>
                                    </div>
                                    <div class="product-text">
                                        <h5>Monitor</h5>
                                        <h4><a href="#">Mini Monitor</a></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
    <!-- product-area-end -->
    <!-- FAQs  -->
    <div class="container-fluid bg-light">
        <div class="container pt-50 pb-50 bg-light">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-65">
                        <h2>Most asked Questions</h2>
                        <p>
                            Find answers to your questions with ease – Your concerns, our solutions!</p>
                    </div>
                </div>
            </div>
            <div class='faq'>
                @foreach ($commetBoxs as $key => $commetBox)
                    <input id='{{ $key }}1' type='checkbox'>
                    <label for='{{ $key }}1'>
                        <p class="faq-heading">{{ $commetBox->content1 }}</p>
                        <div class='faq-arrow'></div>
                        <p class="faq-text">{{ $commetBox->content2 }}</p>
                    </label>
                    <input id='{{ $key }}2' type='checkbox'>
                    <label for='{{ $key }}2'>
                        <p class="faq-heading">{{ $commetBox->content3 }}</p>
                        <div class='faq-arrow'></div>
                        <p class="faq-text">{{ $commetBox->content4 }}</p>
                    </label>
                @endforeach

            </div>
        </div>
    </div>
    <!--FAQs end here-->


    <!-- brand-area-start -->
    <div class="brand-area pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12 ml-lg-5 ml-md-3 ml-sm-1">
                    <div class="section-title mb-30 mt-50">
                        <h2>Our Partners</h2>
                        <p>Together, Building a Future of Precision and Care.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel owl-theme clients-carousel">
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand1.png">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand2.webp">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand3.png">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand4.png">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand1.png">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand2.webp">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand3.png">
                    </div>
                    <div class="item box"><img alt="client logo" class="client-img"
                            src="{{ asset('front_end_assets') }} /assets/img/brand/brand4.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- blog-area-start -->
    <div class="blog-area pt-60 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-65">
                        <h2>Latest News & Events</h2>
                        <p>Catch Up on the Latest News and Highlights</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="blog-wrapper mb-55">
                        <div class="blog-img pos-rel">
                            <a href="blog-details.html"><img src="{{ asset('images/blog_images/'.$blog->image) }}" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar-alt"></i> 
                                    <a href="blog-details.html">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</a>
                                </span>
                            </div>
                            <h4><a href="{{route('blog_detail',$blog->id)}}">{{$blog->title}}</a></h4>
                            <p>{{$blog->description}}</p>
                            <div class="b-button gray-b-button">
                                <a href="{{route('blog_detail',$blog->id)}}">read more <i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- blog-area-end -->


    <!-- features-area-start -->
    <div class="features-area pt-60 pb-30 grey-2-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper mb-30">
                        <div class="features-icon clr-red f-left">
                            <i class="fal fa-certificate"></i>
                        </div>
                        <div class="features-text">
                            <h3>Best Quality</h3>
                            <p>Your Assurance of Unwavering Quality.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper mb-30">
                        <div class="features-icon clr-red f-left">
                            <i class="fal fa-handshake"></i>
                        </div>
                        <div class="features-text">
                            <h3>Reliability</h3>
                            <p>Trust Built on Unwavering Reliability.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper mb-30">
                        <div class="features-icon clr-red f-left">
                            <i class="fal fa-shield-alt"></i>
                        </div>
                        <div class="features-text">
                            <h3>100% Secure</h3>
                            <p>Secured Beyond Measure, Guaranteed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features-area-end -->
@endsection
