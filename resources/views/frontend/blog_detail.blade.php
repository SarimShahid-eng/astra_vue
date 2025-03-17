@extends('frontend.layouts.master')
@section('content')
<main>



    <!-- blog-area-start -->
    <div class="blog-area pt-55">
        <div class="container">
            <div class="row" style="display: flex; justify-content: center;">
                
                <div class="col-xl-8 col-lg-8 mb-30">
                    <div class="blog-details blog-standard">
                        <div class="blog-wrapper">
                            <div class="blog-img pos-rel">
                                <img src="{{ asset('images/blog_images/'.$blog->image) }}" alt="">
                            </div>
                            <div class="blog-text">
                                <div class="blog-meta">
                                    <span><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</span>
                                </div>
                                <h4>{{$blog->title}}</h4>
                                <p>{{$blog->description}}</p>
                            </div>
                            <div class="post-text  mb-20">
                                {{-- <blockquote>
                                    <p>"Goldstar Medical Instruments is more than a brand—it's a commitment to delivering excellence in every device we create, ensuring healthcare professionals can work with confidence and precision."</p>
                                    <footer>- Rosalina Pong</footer>
                                </blockquote> --}}
                                <p>{{$blog->detail}}</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- blog-area-end -->


</main>
@endsection
