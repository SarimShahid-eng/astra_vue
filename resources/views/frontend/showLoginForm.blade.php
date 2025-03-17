@extends('frontend.layouts.master')
@section('content')
    <!-- breadcrumb-area-start -->
    <div class="breadcrumb-area pt-125 pb-125"
        style="background-image:url('{{ asset('front_end_assets/assets/img/bg/04.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-wrapper">
                        <div class="breadcrumb-text">
                            <h2>login</h2>
                        </div>
                        <ul class="breadcrumb-menu">
                            <li><a href="index.html">home</a></li>
                            <li><span>login</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- login Area Strat-->
    <section class="login-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">Login From Here</h3>
                        <form action="register.html">
                            <label for="name">Email Address <span>**</span></label>
                            <input id="name" type="text" placeholder="Enter Username or Email address..." />
                            <label for="pass">Password <span>**</span></label>
                            <input id="pass" type="password" placeholder="Enter password..." />
                            <div class="login-action mb-20 fix">
                                <span class="log-rem f-left">
                                    <input id="remember" type="checkbox" />
                                    <label for="remember">Remember me!</label>
                                </span>
                                <span class="forgot-login f-right">
                                    <a href="#">Lost your password?</a>
                                </span>
                            </div>
                            <button class="c-btn theme-btn-2 w-100">Login Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <button class="c-btn theme-btn w-100">Register Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area End-->


    <!-- instagram-area-start -->
    <div class="instagram-area pl-130 pr-130">
        <div class="container-fluid">
            <div class="row instagram-active">
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/01.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/02.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/03.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/04.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/05.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/06.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 p-0">
                    <div class="instagram-wrapper">
                        <div class="instagram-img">
                            <a href="#"><img src="{{ asset('front_end_assets') }}/assets/img/instagram/01.jpg"
                                    alt="">
                                <div class="instagram-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instagram-area-end -->
@endsection
