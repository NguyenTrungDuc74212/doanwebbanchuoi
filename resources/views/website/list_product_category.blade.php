@extends('website.layout_site.index')
@section('content')
<section id="layout-content">
    <div class="fixed-container mb-5"><img class="banner" src="https://hoaquafuji.com/themes/hoaquafuji/assets/img/banner-hoa-qua-sach-fuji.jpg" alt="Hoa quả sạch Fuji"></div>
    <div class="container" id="list-product-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->first()->category_name}}</li>
            </ol>
        </nav>
        <h1 class="title-page text-center text-primary">{{$product->first()->category_name}}</h1>
        <div class="description text-justify mb-5">
        </div>
        <div class="row mb-5">
            @foreach ($product as $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    @if($item->persent_discount>0)
                    <div class="discount">{{$item->persent_discount}}%</div>
                    @endif
                    {{-- <div class="rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div> --}}
                    <div class="card-img hvr-grow">
                        <a href="{{route('get_product_detail',$item->slug)}}"><img class="card-img-top" src="{{asset('public/upload/product/'.$item->image)}}" alt="xoài cát chu Đồng Tháp"></a>
                        <div class="box-control">
                            <div class="item">
                                <a data-request="onAddCart" data-request-data="temp_id: 54, quantity: 1" data-request-update="'orderProduct::cartInfo' : '#cart-info','orderProduct::cart-in-navbar' : '#btn-cart-navbar' " data-request-flash>
                                    <i class="fas fa-shopping-cart"></i></a>
                                <span class="text">Thêm giỏ hàng</span>
                            </div>
                            <div class="item">
                                <a href="{{route('get_product_detail',$item->slug)}}"><i class="fas fa-plus"></i></a>
                                <span class="text">Xem chi tiết</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2><a href="{{route('get_product_detail',$item->slug)}}">{{$item->name}}</a></h2>
                        <div class="box-price">
                            @if($item->persent_discount>0)
                                    <div class="price">{{currency_format($item->price*((100-$item->persent_discount)/100))}}/{{$item->unit}}</div>
                                    <div class="old-price">{{currency_format($item->price)}}/{{$item->unit}}</div>
                                    @else
                                    <div class="price">{{currency_format($item->price)}}/{{$item->unit}}</div>
                                    @endif
                        </div>
                    </div>
                </div>
                <!-- Card -->
            </div>
            @endforeach
        </div>
        <ul class="pagination">
            {{ $product->appends(Request()->all())}}
        </ul>

        <section class="viewed mb-5">
            @if($product_watched!=null)
            <div class="title-section">Sản phẩm vừa xem</div>
            <div class="row mb-5 mt-3">
                <div class="col-md-3">
                    <div class="card">
                        @if($product_watched->persent_discount>0)
                        <div class="discount">{{$product_watched->persent_discount}}%</div>
                        @endif
                        {{-- <div class="rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div> --}}
                        <div class="card-img hvr-grow">
                            <a href="{{route('get_product_detail',$product_watched->slug)}}"><img class="card-img-top"
                                    src="{{asset('public/upload/product/'.$product_watched->image)}}"
                                    alt="{{$product_watched->name}}"></a>
                            <div class="box-control">
                                <div class="item">
                                    <a data-request="onAddCart" data-request-data="temp_id: 22, quantity: 1"
                                        data-request-update="'orderProduct::cartInfo' : '#cart-info','orderProduct::cart-in-navbar' : '#btn-cart-navbar' "
                                        data-request-flash>
                                        <i class="fas fa-cart-plus fa-2x"></i></a>
                                    <span class="text">Thêm giỏ hàng</span>
                                </div>
                                <div class="item">
                                    <a href="{{route('get_product_detail',$product_watched->slug)}}"><i class="fas fa-search fa-2x"></i></a>
                                    <span class="text">Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2><a href="{{route('get_product_detail',$product_watched->slug)}}">{{$product_watched->name}}</a></h2>
                            <div class="box-price">
                                @if($product_watched->persent_discount>0)
                                <div class="price">{{currency_format($product_watched->price*((100-$product_watched->persent_discount)/100))}}/{{$product_watched->unit}}</div>
                                <div class="old-price">{{currency_format($product_watched->price)}}/{{$product_watched->unit}}</div>
                                @else
                                <div class="price">{{currency_format($product_watched->price)}}/{{$product_watched->unit}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
            </div>
            @endif
        </section>
    </div>
</section>
@endsection