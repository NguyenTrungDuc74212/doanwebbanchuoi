@extends("website.layout_site.index")
@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all text-nowrap">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        @foreach ($productCategory as $item)
                        <li><a href="#">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                    {{-- <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div> --}}
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('public/upload/slide/' . $slides->last()->image) }}"
                                alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5></b>{!! $slides->last()->desc !!}</b></h5>
                                </div>
                            </div>
                            @foreach ($slides as $item)
                                {{-- <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('public/upload/slide/'.$item->image)}}" alt="First slide">
                            </div> --}}
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('public/upload/slide/' . $item->image) }}"
                                alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><b>{!! $item->desc !!}</b></h5>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    {{-- <style>
                        .owl-item{
                            margin-left: 2px;
                        }
                    </style> --}}
                    @foreach ($productLatest as $item)
                    <div class="col-lg-12">
                        <div class="col img-thumbnail" style="padding: 15px;">
                            <div class="col-inner">
                                <div class="badge-container absolute left top z-1">
                                </div>
                                <div class="product-small box has-hover box-normal box-text-bottom">
                                    <div class="box-image" style="border-radius:3%;">
                                        <div class="image-zoom image-cover" style="">
                                            <a href="{{ route('get_product_detail',$item->slug) }}">
                                                <img width="292.5" height="270"
                                                src="{{ asset('public/upload/product/' . $item->image) }}"
                                                class="attachment-original size-original" alt=""
                                                srcset="{{ asset('public/upload/product/' . $item->image) }}"
                                                sizes="(max-width: 470px) 100vw, 470px"> </a>
                                            </div>
                                            <div class="image-tools top right show-on-hover">
                                            </div>
                                            <div
                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                        </div>
                                    </div><!-- box-image -->

                                    <div class="box-text text-center is-large">
                                        <div class="title-wrapper">
                                            <p class="name product-title"><a
                                                href="{{ route('get_product_detail',$item->slug) }}">{{$item->name}}</a></p>
                                            </div>
                                            <div class="price-wrapper">
                                                <span class="price"><span
                                                    class="woocommerce-Price-amount amount">{{$item->price}}&nbsp;<span
                                                    class="woocommerce-Price-currencySymbol">₫</span></span></span>
                                                </div>
                                            </div><!-- box-text -->
                                        </div><!-- box -->
                                    </div><!-- .col-inner -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <!-- Categories Section End -->

            <!-- Featured Section Begin -->
            <section class="featured spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Sản phẩm nổi bật</h2>
                            </div>
                            <div class="featured__controls">
                                <ul>
                                    <li class="active" data-filter="*">Tất cả</li>
                                    @foreach ($productCategory as $item)
                                    <li data-filter=".{{$item->slug}}">{{$item->name}}</li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row featured__filter">
                        @foreach ($product_all as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{$item->category_product->slug}} fresh-meat">
                            
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/upload/product/' . $item->image) }}">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="{{ route('get_product_detail',$item->slug) }}">{{$item->name}}</a></h6>
                                        <h5>{{currency_format($item->price)}}</h5>
                                    </div>
                                </div>     
                        </div>
                        @endforeach


                    </div>
                </div>
            </section>
            <!-- Featured Section End -->

            <!-- Banner Begin -->
            <div class="banner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="banner__pic">
                                <img src="img/banner/banner-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="banner__pic">
                                <img src="img/banner/banner-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner End -->

            <!-- Latest Product Section Begin -->
            <section class="latest-product spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="latest-product__text">
                                <h4>Sản phẩm mới</h4>
                                <div class="latest-product__slider owl-carousel">

                                   <?php
                                   for ($i=0; $i <6 ; $i=$i+3) { 
                                      ?>
                                      <div class="latest-prdouct__slider__item">
                                        <a href="{{ route('get_product_detail',$productLatest[$i]->slug) }}" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width:110px;height:110px">
                                                <img  src="{{asset('public/upload/product/' . $productLatest[$i]->image) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$productLatest[$i]->name}}</h6>
                                                <span>{{currency_format($productLatest[$i]->price)}}</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('get_product_detail',$productLatest[$i+1]->slug) }}" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width:110px;height:110px">
                                                <img src="{{asset('public/upload/product/' . $productLatest[$i+1]->image) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$productLatest[$i+1]->name}}</h6>
                                                <span>{{currency_format($productLatest[$i+1]->price)}}</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('get_product_detail',$productLatest[$i+2]->slug) }}" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width:110px;height:110px">
                                                <img src="{{asset('public/upload/product/' . $productLatest[$i+2]->image) }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{$productLatest[$i+2]->name}}</h6>
                                                <span>{{currency_format($productLatest[$i+2]->price)}}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>Sản phẩm bán chạy</h4>
                            <div class="latest-product__slider owl-carousel">
                                <?php
                                for ($i=0; $i <6 ; $i=$i+3) { 
                                  ?>
                                  <div class="latest-prdouct__slider__item">
                                    <a href="{{ route('get_product_detail',$product_top_sale[$i]->slug) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic" style="width:110px;height:110px">
                                            <img  src="{{asset('public/upload/product/' . $product_top_sale[$i]->image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$product_top_sale[$i]->name}}</h6>
                                            <span>{{currency_format($product_top_sale[$i]->price)}}</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('get_product_detail',$product_top_sale[$i+1]->slug) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic" style="width:110px;height:110px">
                                            <img src="{{asset('public/upload/product/' . $product_top_sale[$i+1]->image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$product_top_sale[$i+1]->name}}</h6>
                                            <span>{{currency_format($product_top_sale[$i+1]->price)}}</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('get_product_detail',$product_top_sale[$i+2]->slug) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic" style="width:110px;height:110px">
                                            <img src="{{asset('public/upload/product/' . $product_top_sale[$i+2]->image) }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$product_top_sale[$i+2]->name}}</h6>
                                            <span>{{currency_format($product_top_sale[$i+2]->price)}}</span>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm đánh giá tốt</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php
                            for ($i=0; $i <6 ; $i=$i+3) { 
                               ?>
                               <div class="latest-prdouct__slider__item">
                                 <a href="{{ route('get_product_detail',$product_top_sale[$i]->slug) }}" class="latest-product__item">
                                     <div class="latest-product__item__pic" style="width:110px;height:110px">
                                         <img  src="{{asset('public/upload/product/' . $product_top_sale[$i]->image) }}" alt="">
                                     </div>
                                     <div class="latest-product__item__text">
                                         <h6>{{$product_top_sale[$i]->name}}</h6>
                                         <span>{{currency_format($product_top_sale[$i]->price)}}</span>
                                     </div>
                                 </a>
                                 <a href="{{ route('get_product_detail',$product_top_sale[$i+1]->slug) }}" class="latest-product__item">
                                     <div class="latest-product__item__pic" style="width:110px;height:110px">
                                         <img src="{{asset('public/upload/product/' . $product_top_sale[$i+1]->image) }}" alt="">
                                     </div>
                                     <div class="latest-product__item__text">
                                         <h6>{{$product_top_sale[$i+1]->name}}</h6>
                                         <span>{{currency_format($product_top_sale[$i+1]->price)}}</span>
                                     </div>
                                 </a>
                                 <a href="{{ route('get_product_detail',$product_top_sale[$i+2]->slug) }}" class="latest-product__item">
                                     <div class="latest-product__item__pic" style="width:110px;height:110px">
                                         <img src="{{asset('public/upload/product/' . $product_top_sale[$i+2]->image) }}" alt="">
                                     </div>
                                     <div class="latest-product__item__text">
                                         <h6>{{$product_top_sale[$i+2]->name}}</h6>
                                         <span>{{currency_format($product_top_sale[$i+2]->price)}}</span>
                                     </div>
                                 </a>
                             </div>
                             <?php
                         }
                         ?>

                     </div>
                 </div>
             </section>
             <!-- Latest Product Section End -->

             <!-- Blog Section Begin -->
             <section class="from-blog spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title from-blog__title">
                                <h2>From The Blog</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($postTop as $item) 
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('public/upload/post/' . $item->image) }}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i>{{$item->created_at}}</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">{{$item->title}}</a></h5>
                                    <p>{!!$item->desc!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <!-- Blog Section End -->
            @stop
