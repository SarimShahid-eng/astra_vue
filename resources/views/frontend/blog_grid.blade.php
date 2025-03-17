@extends('frontend.layouts.master')
@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                <div class="section-title text-center mt-25 mb-25">
                    <h2>Latest News & Events</h2>
                    <p>Catch Up on the Latest News and Highlights</p>
                </div>
            </div>
        </div>
    </div>

    <!-- blog-area-start -->
    <div class="blog-area pt-55 pb-55">
        <div class="container">
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
            <!-- Pagination Bar -->
            <div class="d-flex justify-content-center mt-4">
                {!! $blogs->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
    <!-- blog-area-end -->


</main>
@endsection
