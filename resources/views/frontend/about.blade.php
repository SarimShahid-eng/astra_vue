@extends('frontend.layouts.master')
@section('content')
<main>

    <!-- about-area-start -->
    <div class="about-area about-pb pt-120 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img pos-rel mb-30">
                        <img src="{{ asset('images/' . $about[0]->colum1) }}" alt="">
                        <div class="about-tag">
                            <h2>{{$about[0]->colum2}}</h2>
                            <span>Years of <br> experience</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-wrapper pos-rel mb-30 mt-0">
                        <div class="section-title mb-20">
                            <h2>Our Story</h2>
                            <p>{{ $about[0]->colum3}}</p>
                        </div>
                        <div class="about-item">
                            <ul>
                                <li>
                                    <div class="about-text">
                                        <h4><i class="far fa-check-circle"></i>Our MIssion</h4>
                                        <p>{{ $about[0]->colum4}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="about-text">
                                        <h4><i class="far fa-check-circle"></i>Our Vision</h4>
                                        <p>{{ $about[0]->colum5}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="about-button mt-30">
                            <a href="{{route('contact_us')}}" class="c-btn">For Any Query 
                                <!-- <i class="far fa-plus"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area-end -->

    <!-- counter-area-start -->
    <div class="counter-area pb-70">
        <div class="container">
            <div class="counter-bg pt-50">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <i class="fal fa-heart"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter">{{ $about[1]->colum1}}</h2>
                                <span>Saticfied Clients</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <i class="fal fa-praying-hands"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter">{{ $about[1]->colum2}}</h2>
                                <span>Finished Works</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <i class="fal fa-users"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter">{{ $about[1]->colum3}}</h2>
                                <span>covid -19 specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="counter-wrapper text-center mb-30">
                            <div class="counter-icon">
                                <i class="fal fa-history"></i>
                            </div>
                            <div class="counter-text">
                                <h2 class="counter">{{ $about[1]->colum4}}</h2>
                                <span>global brands</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter-area-end -->

    <!-- features-area-start -->
    <div class="features-02-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-65">
                        <h2>Our Main Goals</h2>
                        <p>Driving Innovation, Ensuring Quality, Empowering Care.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="feature-02-wrapper text-center mb-30">
                        <div class="p-feature-text">
                            <h3> Innovate Airway Solutions</h3>
                            <div class="feature-02-icon">
                                <img src="{{ asset('images/icon/goals1.png') }}" alt="" width="70px">
                            </div>
                            <p>{{ $about[2]->colum1}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="feature-02-wrapper text-center mb-30">
                        <div class="p-feature-text">
                            <h3>Always Prioritize Quality</h3>
                            <div class="feature-02-icon">
                                <img src="{{ asset('images/icon/goals2.png') }}" alt="" width="70px">
                            </div>
                            <p>{{ $about[2]->colum2}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="feature-02-wrapper text-center mb-30">
                        <div class="p-feature-text">
                            <h3>Enhance Patient Outcomes</h3>
                            <div class="feature-02-icon">
                                <img src="{{ asset('images/icon/goals3.png') }}" alt="" width="70px">
                            </div>
                            <p>{{ $about[2]->colum3}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="feature-02-wrapper text-center mb-30">
                        <div class="p-feature-text">
                            <h3>Build Trusted Partnerships</h3>
                            <div class="feature-02-icon">
                                <img src="{{ asset('images/icon/goals4.png') }}" alt="" width="70px">
                            </div>
                            <p>{{ $about[2]->colum4}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features-area-end -->

    <!-- cta-area-start -->
    <div class="cta-area">
        <div class="container">
            <div class="cta-bg pt-80 pb-80" data-background="{{ asset('images/img4.jfif') }}">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="cta-wrapper">
                            <div class="cta-text">
                                <span>Have a Query?</span>
                                <h2>Connect with Our Experts Today!</h2>
                                <a href="{{route('contact_us')}}" class="c-btn">For any Query</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta-area-end -->

</main>
@endsection
