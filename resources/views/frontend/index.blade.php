@extends('frontend.layouts.master')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
                <!-- Begin Slider With Banner Area -->
                @include('frontend.layouts.partials.slider')
                <!-- Slider With Banner Area End Here -->
                <!-- product-area start -->
                <div class="product-area pt-55 pb-25 pt-xs-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm mới</span></a></li>
                                   <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bán chạy</span></a></li>
                                  
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">

                                    @foreach($product as $sp)
                                            <div class="col-lg-12">
                                            <!-- single-product-wrap start -->

                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">
                                                       <img src="{{ asset('storage/images/products/imgs/'.$sp->pro_image) }}" 
                                                       alt="" class="imgproduct" width="210px" height="275px"/>                                                       
                                                    </a>
                                                    <span class="sticker">Mới</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="product-details.html">  {{$sp->mod_name}}</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h4><a class="product_name" href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}"> {{$sp->pro_name}} </a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ number_format($sp->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}} </span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="#">Thêm vào giỏ</a></li>
                                                            <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @foreach($bestsell as $sp)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">
                                                    <img src="{{ asset('storage/images/products/imgs/'.$sp->pro_image) }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">hot</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$sp->mod_name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">{{$sp->pro_name}}</a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price">{{ number_format($sp->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}} </span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Thêm vào giỏ</a></li>
                                                        <li><a class="links-details" href="single-product.html"><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- product-area end -->
            <!-- Begin Li's Static Banner Area -->
            <div class="li-static-banner li-static-banner-4 text-center pt-20">
                <div class="container">
                    <div class="row">
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-6">
                            <div class="single-banner pb-sm-30 pb-xs-30">
                                <a href="{{ route('pages.productdetail', ['id' => $iQC[2]->pro_sku]) }}">
                                    <img src="{{ asset('storage/images/products/imgs/'. $iQC[2]->reimg_name ) }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                        <!-- Begin Single Banner Area -->
                        <div class="col-lg-6">
                            <div class="single-banner">
                                <a href="{{ route('pages.productdetail', ['id' => $iQC[3]->pro_sku]) }}">
                                    <img src="{{ asset('storage/images/products/imgs/'. $iQC[3]->reimg_name ) }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Single Banner Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Static Banner Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Siêu rẻ</span>
                                </h2>  
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                @foreach($bestcheap as $sp)    
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">
                                                    <img src="{{ asset('storage/images/products/imgs/'.$sp->pro_image)  }}" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Cheap</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$sp->mod_name}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">{{$sp->pro_name}}</a></h4>
                                                    <div class="price-box">
                                                        Giá bán: <span class="old-price">{{ number_format($sp->imd_priceExp * 1000 * 1.2 , 0, ' ', ',') . ' VNĐ'}}</span>
                                                        <br>
                                                        Chỉ còn: 
                                                        <span class="new-price">{{ number_format($sp->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}}</span>
                                                         
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Thêm vào giỏ</a></li>
                                                        <li><a class="links-details" href="#" ><i class="fa fa-heart-o"></i></a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
                                                    </ul>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Li's TV & Audio Product Area -->
           
            <!-- Begin Li's Static Home Area -->
            <div class="li-static-home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Static Home Image Area -->
                            <div class="li-static-home-image"></div>
                            <!-- Li's Static Home Image Area End Here -->
                            <!-- Begin Li's Static Home Content Area -->
                            <div class="li-static-home-content">
                                <p>Giá cực rẻ, giảm cực sâu</p>
                                <h4>Siêu khuyến mãi cho dòng sản phẩm</h4>
                                <h2>{{ $bestcheap[0]->mnf_name }}</h2>
                                <p class="schedule">
                                    Giá chỉ từ
                                    <span>{{ number_format($bestcheap[0]->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}}</span>
                                </p>
                                <div class="default-btn">
                                    <a href="{{ route('pages.productdetail', ['id' => $bestcheap[0]->pro_sku]) }}" class="links">Mua ngay</a>
                                </div>
                            </div>
                            <!-- Li's Static Home Content Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Li's Static Home Area End Here -->
            <!-- Begin Group Featured Product Area -->
            <div class="group-featured-product pt-60 pb-40 pb-xs-25">
                <div class="container">
                    <div class="row">
                        <!-- Begin Featured Product Area -->
                        <div class="col-lg-4">
                            <div class="featured-product">
                                <div class="li-section-title">
                                    <h2>
                                        <span>Vivo</span>
                                    </h2>
                                </div>
                                <div class="featured-product-active-2 owl-carousel">
                                    <div class="featured-product-bundle">
                                    @foreach($spVivo as $sp)
                                        <div class="row">
                                            <div class="group-featured-pro-wrapper">
                                                <div class="product-img">
                                                    <a href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">
                                                        <img alt="" src="{{ asset('storage/images/products/imgs/'.$sp->pro_image) }}">
                                                    </a>
                                                </div>
                                                <div class="featured-pro-content">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$sp->mod_name}}</a>
                                                        </h5>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h4><a class="featured-product-name" href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}"> {{$sp->pro_name}} </a></h4>
                                                    <div class="featured-price-box">
                                                        <span class="new-price">{{ number_format($sp->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Product Area End Here -->
                        <!-- Begin Featured Product Area -->
                        <div class="col-lg-4">
                            <div class="featured-product pt-sm-10 pt-xs-25">
                                <div class="li-section-title">
                                    <h2>
                                        <span>SamSung</span>
                                    </h2>
                                </div>
                                <div class="featured-product-active-2 owl-carousel">
                                    <div class="featured-product-bundle">
                                    @foreach ($spSamsung as $sp)

                                        <div class="row">
                                            <div class="group-featured-pro-wrapper">
                                                <div class="product-img">
                                                    <a href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">
                                                        <img alt="" src="{{ asset('storage/images/products/imgs/'.$sp->pro_image)  }}">
                                                    </a>
                                                </div>
                                                <div class="featured-pro-content">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">{{$sp->mod_name}}</a>
                                                        </h5>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h4><a class="featured-product-name" href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}"> {{$sp->pro_name}}</a></h4>
                                                    <div class="featured-price-box">
                                                        <span class="new-price">{{ number_format($sp->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endforeach   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Product Area End Here -->
                        <!-- Begin Featured Product Area -->
                        <div class="col-lg-4">
                            <div class="featured-product pt-sm-10 pt-xs-25">
                                <div class="li-section-title">
                                    <h2>
                                        <span>Oppo</span>
                                    </h2>
                                </div>
                                <div class="featured-product-active-2 owl-carousel">
                                    <div class="featured-product-bundle">
                                    @foreach ($spOppo as $sp) 
                                        <div class="row">
                                            <div class="group-featured-pro-wrapper">
                                                <div class="product-img">
                                                    <a href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">
                                                        <img alt="" src="{{ asset('storage/images/products/imgs/'.$sp->pro_image) }}">
                                                    </a>
                                                </div>
                                                <div class="featured-pro-content">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html"> {{$sp->mod_name}} </a>
                                                        </h5>
                                                    </div>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                    <h4><a class="featured-product-name" href="{{ route('pages.productdetail', ['id' => $sp->pro_sku]) }}">{{$sp->pro_name}} </a></h4>
                                                    <div class="featured-price-box">
                                                        <span class="new-price">{{ number_format($sp->imd_priceExp * 1000, 0, ' ', ',') . ' VNĐ'}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Featured Product Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Group Featured Product Area End Here -->

@endsection