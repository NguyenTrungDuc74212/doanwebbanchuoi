@extends('website.layout_site.index')
@section('content')
<section id="layout-content">
    <div class="fixed-container mb-5"><img class="banner" src="public/public_site/image/img_banner_cate.png" alt="Hoa quả sạch Fuji"></div>
    <div class="container" id="list-product-page">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
        <h3 class="title text-center text-primary">Tìm thấy {{count($product)}} kết quả </h3>
        <div class="row" style="padding: 20px;">
        <div class="col-md-6">
            <label for="amount">Sắp xếp theo</label>
            <form>
                @csrf
                <select class="form-control" name="sort" id="sort">
                    <option value="{{ Request::url()}}?sort_by=none">---Lọc---</option>
                    <option value="{{ Request::url()}}?sort_by=tang_dan" {{ Request()->sort_by=='tang_dan'?'selected':'' }}>--Giá tăng dần--</option>
                    <option value="{{ Request::url()}}?sort_by=giam_dan" {{ Request()->sort_by=='giam_dan'?'selected':'' }} >--Giá giảm dần--</option>
                    <option value="{{ Request::url()}}?sort_by=kytu_az" {{ Request()->sort_by=='kytu_az'?'selected':'' }}>--Lọc theo tên từ A-Z--</option>
                    <option value="{{ Request::url()}}?sort_by=kytu_za" {{ Request()->sort_by=='kytu_za'?'selected':'' }}>--Lọc theo tên từ Z-A--</option>
                </select>
            </form>
        </div>
        <div class="col-md-6">
            <label for="amount">Sắp xếp theo</label>
            <form>
               <div id="slider_filter"></div>
               <label for="amount">Giá sản phẩm:</label>
               <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;width: 100%;">
               <input type="hidden" id="start_price" name="start_price"value="">
               <input type="hidden" id="end_price" name="end_price" value="">
               <br>
               <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-primary">
            </form>
        </div>
    </div>
        <div class="des text-center mb-4 w-75 mx-auto">Với mong muốn mang tới cho khách hàng sự thuận tiện nhất
            và dẫn thay đổi thói quen đi chợ truyền thống cũng như đa số khách hàng đều được sử dụng các sản
        phẩm hoa quả sạch chất lượng cao nhất.</div>
        <div class="row mb-5">
            @foreach ($product as $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <form>
                        @csrf
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

    </div>
</section>
@endsection