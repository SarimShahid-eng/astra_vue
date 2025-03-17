@extends('frontend.layouts.master')

@section('content')
    <style>
        .product-details-wrapper {
            max-height: 440px;
            /* Set a fixed height for the column */
            overflow-y: auto;
            /* Enable vertical scrollbar when content overflows */
            padding-right: 15px;
            /* Adjust padding for better scrollbar visibility */
            margin-bottom: 30px;
        }
    </style>
    <section class="shop-banner-area pt-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="product-details-img mb-30">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                <div class="product-large-img">
                                    <img src="{{ asset('images/product_images/' . json_decode($product->product_images)[0]) }}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel">
                                <div class="product-large-img">
                                    <img src=" {{ asset('images/product_images/' . json_decode($product->product_images)[2]) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile1" role="tabpanel">
                                <div class="product-large-img">
                                    <img src=" {{ asset('images/product_images/' . json_decode($product->product_images)[1]) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="shop-thumb-tab">
                                <ul class="nav thumbnails-row" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-selected="true">
                                            <img src=" {{ asset('images/product_images/' . json_decode($product->product_images)[1]) }}"
                                                alt="">
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-selected="false">
                                            <img src=" {{ asset('images/product_images/' . json_decode($product->product_images)[2]) }}">
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile1"
                                            role="tab" aria-selected="false">
                                            <img src=" {{ asset('images/product_images/' . json_decode($product->product_images)[3]) }}">
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="popup-youtube nav-link video-card"
                                            href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                                            <img src=" {{ asset('front_end_assets') }}/assets/img/bg/video-bg.jpg"
                                                alt="Video Thumbnail">
                                            <i class="fad fa-play-circle"></i>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-7 col-lg-7">
                    <div class="product-details-wrapper mb-30">
                        <div class="product-text">
                            <h5>{{ $product->sub_catgory->name }}</h5>
                            <h4>{{ $product->name }}</h4>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="event-text pr-5">
                                        <p>
                                            {{ $product->detail }}
                                        </p>
                                        <ul class="between-list mb-3">
                                            @foreach ($check_data as $item)
                                                <li>{{$item}}</li>
                                            @endforeach
                                        </ul>


                                        <div class="row mt-50">
                                            <div class="col-xl-8 col-lg-8 col-md-8 mb-15">
                                                <div class="blog-post-tag">
                                                    <span>Configurations</span>
                                                    <a href="#">Product</a>
                                                    <!--<a href="#">Medical</a>-->

                                                </div>
                                            </div>

                                        </div>
                                        <p>
                                            {{ $product->more_detail }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="product-desc-area">
                <div class="container p-0">
                    <div class="row" style="flex-direction:column;">
                        <div class="bakix-details-tab">
                            <ul class="nav text-center mb-55" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#id-desc"
                                        role="tab" aria-controls="home" aria-selected="true">Description </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="id-add-in" data-toggle="tab" href="#id-add" role="tab"
                                        aria-controls="profile" aria-selected="false">Additional Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="id-video-in" data-toggle="tab" href="#id-video"
                                        role="tab" aria-controls="Video" aria-selected="false">Videos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-100" id="myTabContent">
                            <div class="tab-pane fade show active" id="id-desc" role="tabpanel"
                                aria-labelledby="desc-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="event-text">
                                            <p>
                                                {{$product->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="id-add" role="tabpanel" aria-labelledby="id-add-in">
                                <div class="additional-info">
                                    <div class="table-responsive">
                                        <h4>Product information</h4>
                                        <table class="table" style="max-width:600px">
                                            <tbody>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td class="product_weight">{{ $product->weight}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dimensions</th>
                                                    <td class="product_dimensions">{{ $product->dimensions}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Size</th>
                                                    <td class="product_dimensions">{{ $product->size}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade hide " id="id-video" role="tabpanel"
                                aria-labelledby="id-video-in">
                                <div class="row">
                                    @foreach ($product->videos as $item)
                                        
                                    <div class="col-md-3">
                                        <a class="popup-youtube" href="{{$item->link}}">
                                            <div class="video-card">
                                                <img src="{{ asset('images/video_images/'.$item->image) }}">
                                                <i class="fad fa-play-circle"></i>
                                            </div>
                                            <h4>{{$item->title}}</h4>
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--    </div>-->
            <!--</div>-->
        </div>
    </section>
    <!-- shop-banner-area end -->

    <!-- product-desc-area start -->

    <!-- product-desc-area end -->

    <!-- product-area-start -->
    <div class="product-area pb-60 pt-60 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                    <div class="section-title text-center mb-65">
                        <h2>Features Products</h2>
                        <p>Easy to handle with reliable performance</p>
                    </div>
                </div>
            </div>
            <div class="row pro-active">
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
                <div class="col-xl-4">
                    
                </div>
                <div class="col-xl-4">
                   
                </div>
                
            </div>
        </div>
    </div>
    <!-- product-area-end -->
@endsection
