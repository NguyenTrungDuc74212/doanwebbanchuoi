@extends('website.layout_site.index')
@section('content')
<section id="layout-content">
    <div class="fixed-container mb-5"><img class="banner" src="public/public_site/image/img_banner_cate.png" alt="Hoa quả sạch Fuji"></div>
    <div class="container" id="list-product-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->category_name}}</li>
            </ol>
        </nav>
        <h1 class="title-page text-center text-primary">{{$category->category_name}}</h1>
        <div class="description text-justify mb-5">
        </div>
        <div class="row mb-5">
            @foreach ($product as $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <form>
                        @csrf
                        @if($item->persent_discount>0)
                        <div class="discount">{{$item->persent_discount}}%</div>
                        @endif
                        <div class="rate">
                            @if($item->quantity>0)
                               <p class="status-product">Còn hàng</p>
                            @else
                                <p class="status-product" style="background-color: #b90f0fde !important;">Hết hàng</p>
                            @endif
                        </div>
                    <div class="card-img hvr-grow">
                        <a href="{{route('get_product_detail',$item->slug)}}"><img class="card-img-top"
                            src="{{asset('public/upload/product/'.$item->image)}}" id="withlist_product_img_{{ $item->id }}"
                            alt="{{$item->name}}"></a>
                            <div class="box-control">
                                <div class="item">
                                    <button class="cart_thanhtoan" data-id="{{ $item->id }}" type="button" style="display: block;
                                    margin: 0 auto;
                                    background: 0 0;
                                    border: 0;
                                    cursor: pointer;
                                    color: #269300;">
                                    <i class="fas fa-shopping-cart"></i></button>
                                    <span class="text">Thêm giỏ hàng</span>
                                </div>
                                <div class="item">
                                    <button class="button_withlist_1" onclick="add_withlist(this.id)" id="{{ $item->id }}" type="button" style="display: block;
                                    margin: 0 auto;
                                    background: 0 0;
                                    border: 0;
                                    cursor: pointer;
                                    color: #269300;">
                                    <i class="fas fa-heart"></i></button>
                                    <span class="text">Like sản phẩm</span>
                                </div>
                                <div class="item">
                                    <a href="{{route('get_product_detail',$item->slug)}}" class="cart_product_url_{{ $item->id }}"><i class="fas fa-plus"></i></a>
                                    <span class="text">Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $item->id }}" class="cart_product_id_{{$item->id}}">
                        <input type="hidden" value="{{ $item->name }}" class="cart_product_name_{{$item->id}}">
                        <input type="hidden" value="{{ $item->image}}" class="cart_product_image_{{$item->id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$item->id}}">
                        <input type="hidden" value="{{$item->quantity}}" class="cart_product_storage_{{$item->id}}">
                        <input type="hidden" value="{{$item->unit}}" class="cart_product_unit_{{$item->id}}">
                        <input type="hidden" value="{{$item->persent_discount}}" class="cart_product_discount_{{$item->id}}">
                        @if (Session::get('id_customer'))
                        <input type="hidden" value="{{ Session::get('id_customer') }}" id="customer_id">
                        @endif
                        <div class="card-body">
                            <h2><a href="{{route('get_product_detail',$item->slug)}}">{{$item->name}}</a></h2>
                            <div class="box-price">
                                @if($item->persent_discount>0)
                                <div class="price">{{currency_format($item->price*((100-$item->persent_discount)/100))}}/{{$item->unit}}</div>
                                <div class="old-price">{{currency_format($item->price)}}/{{$item->unit}}</div>
                                <input type="hidden" value="{{ $item->price*((100-$item->persent_discount)/100)}}" class="cart_product_price_{{$item->id}}">
                                <input type="hidden" value="{{ $item->price}}" class="cart_product_price_off_{{$item->id}}">
                                @else
                                <div class="price">{{currency_format($item->price)}}/{{$item->unit}}</div>
                                <input type="hidden" value="{{ $item->price}}" class="cart_product_price_{{$item->id}}">
                                <input type="hidden" value="{{ $item->price}}" class="cart_product_price_off_{{$item->id}}">
                                @endif
                            </div>
                        </div>
                    </form>
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
                        <form>
                          @csrf
                          @if($product_watched->persent_discount>0)
                          <div class="discount">{{$product_watched->persent_discount}}%</div>
                          @endif
                          <div class="rate">
                            @if($product_watched->quantity>0)
                               <p class="status-product">Còn hàng</p>
                            @else
                                <p class="status-product" style="background-color: #b90f0fde !important;">Hết hàng</p>
                            @endif
                        </div>
                        <div class="card-img hvr-grow">

                            <a href="{{route('get_product_detail',$product_watched->slug)}}"><img class="card-img-top"
                                src="{{asset('public/upload/product/'.$product_watched->image)}}" id="withlist_product_img_{{ $product_watched->id }}"
                                alt="{{$product_watched->name}}"></a>
                                <div class="box-control">
                                    <div class="item">
                                        <button class="cart_thanhtoan" data-id="{{ $product_watched->id }}" type="button" style="display: block;
                                        margin: 0 auto;
                                        background: 0 0;
                                        border: 0;
                                        cursor: pointer;
                                        color: #269300;">
                                        <i class="fas fa-shopping-cart"></i></button>
                                        <span class="text">Thêm giỏ hàng</span>
                                    </div>
                                    <div class="item">
                                        <button class="button_withlist_1" onclick="add_withlist(this.id)" id="{{ $product_watched->id }}" type="button" style="display: block;
                                        margin: 0 auto;
                                        background: 0 0;
                                        border: 0;
                                        cursor: pointer;
                                        color: #269300;">
                                        <i class="fas fa-heart"></i></button>
                                        <span class="text">Like sản phẩm</span>
                                    </div>
                                    <div class="item">
                                        <a href="{{route('get_product_detail',$product_watched->slug)}}" class="cart_product_url_{{ $product_watched->id }}"><i class="fas fa-search fa-2x"></i></a>
                                        <span class="text">Xem chi tiết</span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $product_watched->id }}" class="cart_product_id_{{$product_watched->id}}">
                            <input type="hidden" value="{{ $product_watched->name }}" class="cart_product_name_{{$product_watched->id}}">
                            <input type="hidden" value="{{ $product_watched->image}}" class="cart_product_image_{{$product_watched->id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$product_watched->id}}">
                            <input type="hidden" value="{{$product_watched->quantity}}" class="cart_product_storage_{{$product_watched->id}}">
                            <input type="hidden" value="{{$product_watched->unit}}" class="cart_product_unit_{{$product_watched->id}}">
                            <input type="hidden" value="{{$product_watched->persent_discount}}" class="cart_product_discount_{{$product_watched->id}}">
                                        @if (Session::get('id_customer'))
                                            <input type="hidden" value="{{ Session::get('id_customer') }}" id="customer_id">
                                        @endif
                            <div class="card-body">
                                <h2><a href="{{route('get_product_detail',$product_watched->slug)}}">{{$product_watched->name}}</a></h2>
                                <div class="box-price">
                                    @if($product_watched->persent_discount>0)
                                    <div class="price">{{currency_format($product_watched->price*((100-$product_watched->persent_discount)/100))}}/{{$product_watched->unit}}</div>
                                    <div class="old-price">{{currency_format($product_watched->price)}}/{{$product_watched->unit}}</div>
                                    <input type="hidden" value="{{ $product_watched->price*((100-$product_watched->persent_discount)/100)}}" class="cart_product_price_{{$product_watched->id}}">
                                    <input type="hidden" value="{{ $product_watched->price}}" class="cart_product_price_off_{{$product_watched->id}}">
                                    @else
                                    <div class="price">{{currency_format($product_watched->price)}}/{{$product_watched->unit}}</div>
                                    <input type="hidden" value="{{ $product_watched->price}}" class="cart_product_price_{{$product_watched->id}}">
                                    <input type="hidden" value="{{ $product_watched->price}}" class="cart_product_price_off_{{$product_watched->id}}">
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Card -->
                </div>
            </div>
            @endif
        </section>
    </div>
</section>
@endsection