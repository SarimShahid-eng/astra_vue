<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AstraVue Video Laryngoscope System | Advanced Airway Management </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="">
    <!-- <link rel="shortcut icon" type="image/x-icon" href=""> -->
    <!-- Place favicon.ico in the root directory -->

    {{-- <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/meanmenu.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script> --}}

    <!-- CSS here -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/meanmenu.css?"{{ date('d-m-Y') }}>
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/slick.css">
    {{-- <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/main.css?"{{ date('d-m-Y') }}> --}}
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/main.css?">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/assets/css/responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/asseted/css/stylesheet.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/asseted/css/profile.css">
    <link rel="stylesheet" href="{{ asset('front_end_assets') }}/asseted/css/complanit.css">


</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=923229991969" class="float bounce" target="_blank"><i
            class="fab fa-whatsapp my-float"></i></a>

    <!-- header-start -->
    <header>
        {{-- @dd($categories) --}}
        <div class="header-top-area pl-165 pr-165">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-8 col-lg-6 col-md-6">
                        <div class="header-top-wrapper">
                            <div class="header-top-info d-none d-xl-block f-left">
                                <span>
                                    Welcome to AstraVue. We provides <a href="#">Video Laryngoscope System
                                    </a>Advanced Airway Management</span>
                            </div>
                            <div class="header-link f-left">
                                <span><a href="#"><i class="far fa-phone"></i> +123 (456) 7879</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="header-top-right text-md-right">
                            <div class="shop-menu">
                                <ul>
                                    <li>
                                        
                                        @auth

                                            @if (Auth::user()->role == 'admin')
                                                <a href="{{ route('home') }}">{{ Auth::user()->name }} <i class="fal fa-user-circle"></i></a>
                                            @else
                                                <a href="{{ route('profile') }}">{{ Auth::user()->name }} <i class="fal fa-user-circle"></i></a>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}">My Account <i class="fal fa-user-circle"></i></a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-menu-area menu-01 pl-165 pr-165">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3">
                        <div class="logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('asset') }}/logo/AstraVue.png"
                                    alt="" /></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 d-none d-lg-block">
                        <div class="header-right f-right">

                            <div class="menu-bar info-bar f-right d-none d-md-none d-lg-block">
                                <a href="#"><i class="fal fa-bars"></i></a>
                            </div>
                            <div class="header-search f-right d-none d-xl-block">
                                <form class="header-search-form">
                                    <input placeholder="Search" type="text">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>

                                    <li><a href="{{route('about')}}">About</a></li>

                                    <li class="drop-menu d_none_1024">
                                        <a href="#" class="disab">Categories<i class="fa fa-angle-down"></i></a>
                                        <div class="dropdown-box">
                                            <div class="bg-w">
                                                <div class="row justify-content-around">
                                                    <!-- Categories -->
                                                    <div class="col-md-4">
                                                        <ul class="drop-sub-menu categories-menu">
                                                            @foreach ($categories as $category)
                                                                <li>
                                                                    <a href="#" class="category-link"
                                                                        data-id="category-{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <!-- Subcategories -->
                                                    <div class="col-md-4 none992 subcategories-container">
                                                        @foreach ($categories as $category)
                                                            <div class="subcategory-group"
                                                                id="category-{{ $category->id }}"
                                                                style="display: none;">
                                                                <ul class="drop-sub-menu">
                                                                    @foreach ($category->sub_category as $subcategory)
                                                                        <li>
                                                                            <a href="#" class="subcategory-link"
                                                                                data-id="subcategory-{{ $subcategory->id }}">
                                                                                {{ $subcategory->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- Products -->
                                                    <div class="col-md-4 none992 products-container">
                                                        @foreach ($categories as $category)
                                                            @foreach ($category->sub_category as $subcategory)
                                                                <div class="product-group"
                                                                    id="subcategory-{{ $subcategory->id }}"
                                                                    style="display: none;">
                                                                    <ul class="drop-sub-menu">
                                                                        @foreach ($subcategory->products as $product)
                                                                            <li>
                                                                                <a href="{{route('product_details',$product->id)}}">
                                                                                    {{ $product->name }}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d_b_1024">
                                        <a href="#">Categories <i class="far fa-angle-down"></i></a>
                                        <ul class="sub-menu text-left">
                                            <!-- Categories Loop -->
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="#">
                                                        {{ $category->name }}
                                                        @if ($category->sub_category->isNotEmpty())
                                                            <i class="far fa-angle-right"></i>
                                                        @endif
                                                    </a>
                                                    <!-- Subcategories -->
                                                    @if ($category->sub_category->isNotEmpty())
                                                        <ul class="sub-menu text-left" style="display: none;">
                                                            @foreach ($category->sub_category as $subcategory)
                                                                <li>
                                                                    <a href="#">
                                                                        {{ $subcategory->name }}
                                                                        @if ($subcategory->products->isNotEmpty())
                                                                            <i class="far fa-angle-right"></i>
                                                                        @endif
                                                                    </a>
                                                                    <!-- Products -->
                                                                    @if ($subcategory->products->isNotEmpty())
                                                                        <ul class="sub-menu text-left"
                                                                            style="display: none;">
                                                                            @foreach ($subcategory->products as $product)
                                                                                <li><a
                                                                                        href="product-details.html">{{ $product->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    {{-- old one  --}}
                                    {{-- <li class="d_b_1024"><a href="">Categories <i
                                                class="far fa-angle-down"></i></a>

                                        <ul class="sub-menu text-left" style="display: block;">
                                            <li><a href="product-details.html">Airway Management <i
                                                        class="far fa-angle-right"></i></a>
                                                <ul class="sub-menu text-left" style="display: block; left: 150px;">
                                                    <li><a href="product-details.html">Mini Monitor </a></li>
                                                    <li><a href="product-details.html">Reusable Ultra Blades
                                                            <i class="far fa-angle-right"></i></a>
                                                        <ul class="sub-menu text-left"
                                                            style="display: block; left: 150px;">
                                                            <li><a href="product-details.html">Overview</a></li>
                                                            <li><a href="product-details.html">Macintosh</a></li>
                                                            <li><a href="product-details.html">Miller</a></li>
                                                            <li><a href="product-details.html">Paed</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="product-details.html">Disposable Pro Blades</a></li>
                                                    <li><a href="product-details.html">Disposable Lite Blades
                                                            <i class="far fa-angle-right"></i></a>
                                                        <ul class="sub-menu text-left"
                                                            style="display: block; left: 150px;">
                                                            <li><a href="product-details.html">Lite Blade 1 </a></li>
                                                            <li><a href="product-details.html">Lite Blade 2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="product-details.html">ENT</a></li>
                                            <li><a href="product-details.html">Dermatology</a></li>
                                            <li><a href="product-details.html">Gynecology</a></li>
                                            <li><a href="product-details.html">Gastroenterology</a></li>
                                            <li><a href="product-details.html">Proctology</a></li>
                                            <li><a href="product-details.html">Urology</a></li>
                                            <li><a href="product-details.html">Orthopedics</a></li>
                                            <li><a href="product-details.html">General Surgery</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="{{route('blog_page')}}">News & Events</a></li>
                                    <li><a href="">Career</a></li>
                                    <li><a href="{{ route('contact_us') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="extra-info">
            <div class="close-icon">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="#">
                    <img src="{{ asset('front_end_assets') }} /assets/img/logo/astraVue-white.png" alt="" />
                </a>
            </div>
            @php
                $contact = \App\Models\About::find(4);
            @endphp
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>{!!$contact->colum2!!}</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>{!!$contact->colum3!!}</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>{!!$contact->colum4!!}</p>
                </div>
            </div>
            <!-- <div class="instagram">
                    <a href="#">
                        <img src="assets/img/banner1/img1.jfif" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/img/banner1/img2.jfif" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/img/banner1/img3.jfif" alt="">
                    </a>
                    <a href="#" style="width: 100%;">
                        <img src="assets/img/banner1/img4 -long.jfif" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/img/portfolio/p5.jpg" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/img/portfolio/p6.jpg" alt="">
                    </a>
                </div> -->
            <div class="social-icon-right mt-20">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-google-plus-g"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- header-start -->
