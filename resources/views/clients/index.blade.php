@extends('layout.client')

@section('css')
    
@endsection

@section('content')
<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="{{asset('assets/client/img/slider/slider-1.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-1">
                                    <h2 class="slide-title">APPLE <span>Collection</span></h2>
                                    <h4 class="slide-desc">New Iphone 2024</h4>
                                    <a href="shop.html" class="btn btn-hero">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="{{asset('assets/client/img/slider/slider-2.jpg')}}">
                   
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="{{asset('assets/client/img/slider/slider-3.jpg')}}">
                    
                </div>
            </div>
            <!-- single slider item end -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- twitter feed area start -->
    <div class="twitter-feed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="twitter-feed-content text-center">
                        <p>Check out "Corano - Multipurpose eCommerce Bootstrap 5 template" on #Envato by @<a href="#">Corano</a> #Themeforest <a href="http://1.envato.market/9LbxW">http://1.envato.market/9LbxW</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- twitter feed area end -->

    <!-- service policy area start -->
    <div class="service-policy section-padding">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Free Shipping</h6>
                            <p>Free shipping all order</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Support 24/7</h6>
                            <p>Support 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Money Return</h6>
                            <p>30 days for free return</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>100% Payment Secure</h6>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->

    <!-- banner statistics area start -->
    <div class="banner-statistics-area">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="{{asset('assets/client/img/banner/banner-1.jpg')}}" alt="product banner">
                        </a>
                        
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="{{asset('assets/client/img/banner/banner-2.jpg')}}" alt="product banner">
                        </a>
                       
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="{{asset('assets/client/img/banner/banner-3.jpg')}}" alt="product banner">
                        </a>
                       
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="{{asset('assets/client/img/banner/banner-12.png')}}" alt="product banner">
                        </a>
                       
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">our products</h2>
                        <p class="sub-title">Add our products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- product tab menu start -->
                      
                        <!-- product tab menu end -->

                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">

                                    <!-- product item start -->
                                    @foreach ($sanPham as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{route('products.detail',$item->id)}}">
                                                <img class="pri-img" src="{{Storage::url($item->hinh_anh)}}" alt="product">
                                                <img class="sec-img" src="{{Storage::url($item->hinh_anh)}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                    
                                            <h6 class="product-name">
                                                <a href="{{route('products.detail',$item->id)}}">{{$item->ten_san_pham}}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{number_format($item->gia_san_pham)}} đ</span>
                                                <span class="price-old"><del>{{number_format($item->gia_san_pham)}} đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                    <!-- product item end -->

                                    
                                </div>
                            </div>
                       
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- product banner statistics area start -->
   
    <!-- product banner statistics area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">featured products</h2>
                        <p class="sub-title">Add featured products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        @foreach ($sanPham as $item)
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="{{route('products.detail',$item->id)}}">
                                    <img class="pri-img" src="{{Storage::url($item->hinh_anh)}}" alt="product">
                                    <img class="sec-img" src="{{Storage::url($item->hinh_anh)}}" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                              
                                <h6 class="product-name">
                                    <a href="{{route('products.detail',$item->id)}}">{{$item->ten_san_pham}}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">{{number_format($item->gia_khuyen_mai)}} đ</span>
                                    <span class="price-old"><del>{{number_format($item->gia_san_pham)}} đ</del></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- product item end -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->


    <!-- group product start -->
    <section class="group-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="group-product-banner">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="{{asset('assets/client/img/blog/blog-1.webp')}}" alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style3 text-center">
                                <h6 class="banner-text1 text-white">IPHONE V/N</h6>
                                <h2 class="banner-text2 text-white">Blog Apple</h2>
                                <a href="shop.html" class="btn btn-text text-white">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>Sản Phẩm Lượt Xem Nhiều Nhất</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        @foreach ($sanPhamYeuThich as $item)
                            
                    
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="{{Storage::url($item->hinh_anh)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="{{route('products.detail',$item->id)}}">
                                                {{$item->ten_san_pham}}
                                                    </a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">{{number_format($item->gia_khuyen_mai)}} đ</span>
                                                <span class="price-old"><del>{{number_format($item->gia_san_pham)}} đ</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                         @endforeach
                                
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
              
            </div>
        </div>
    </section>
    <!-- group product end -->

    <!-- latest blog area start -->
   
    <!-- latest blog area end -->

    <!-- brand logo area start -->
    <div class="brand-logo section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/1.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/2.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/3.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/4.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/5.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="assets/img/brand/6.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->
</main>
@endsection

@section('js')
    
@endsection