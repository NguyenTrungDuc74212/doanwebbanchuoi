@extends('website.layout_site.index')
@section('content')
<section id="layout-content">

    <div class="container" id="list-news">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                @if($posts->first()!=null)
                <li class="breadcrumb-item active" aria-current="page">{{$posts->first()->name_category}}</li>
                @endif
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-9">
                @foreach ($posts as $item)
                <div class="media mb-4 pb-4">
                    <a href="{{ route('get_view_blog_details', $item->slug) }}"><img class="mr-3" src="{{asset('public/upload/post/'.$item->image)}}" alt="SINH NHẬT LỚN-SALE CỰC LỚN" style="width: 250px;height: 150px;object-fit: cover"></a>
                    <div class="media-body">
                        <h2 class="mt-0"><a href="{{ route('get_view_blog_details', $item->slug) }}">{{$item->title}}</a></h2>
                        {!!$item->desc!!}
                    </div>
                </div>
                @endforeach
                <ul class="pagination">
                    {{ $posts->appends(Request()->all())}}
                </ul>

            </div>
            <!-- End left-content -->
  <!-- End left-content -->
  <div class="col-md-3">
    <section class="camket-right border">
        <div class="title-section">Cam kết</div>
        <ul class="list-unstyled p-3">
            <li class="animated bounceInLeft fast delay-1"><i
                    class="fas fa-thumbs-up mr-2 text-primary"></i>Hoa quả tươi sạch</li>
            <li class="animated bounceInRight fast delay-3"><i
                    class="fas fa-thumbs-up mr-2 text-primary"></i>Không chất bảo quản</li>
            <li class="animated bounceInLeft fast delay-6"><i
                    class="fas fa-thumbs-up mr-2 text-primary"></i>Dịch vụ chuyên nghiệp</li>
            <li class="animated bounceInRight fast delay-9"><i
                    class="fas fa-thumbs-up mr-2 text-primary"></i>Không thuốc biến đổi gien</li>
            <li class="animated bounceInLeft fast delay-12"><i
                    class="fas fa-thumbs-up mr-2 text-primary"></i>Không hàng Trung Quốc</li>
            <li class="animated bounceInRight fast delay-15"><i
                    class="fas fa-thumbs-up mr-2 text-primary"></i>Giá cả cạnh tranh</li>
        </ul>
    </section>
    <section class="news sidebar border mb-3">
        <div class="title-section">Sản phẩm cùng loại</div>
        @foreach ($product_related as $item)
            <ul class="list-unstyled row">
                <li class="animated zoomInUp slow delay-1 col-12 col-md-6 col-lg-12">
                    <div class="p-3">
                        <div class="media">
                            <a href="{{ route('get_product_detail', $item->slug) }}"><img
                                    class="mr-3 hvr-grow"
                                    src="{{ asset('public/upload/product/' . $item->image) }}"
                                    alt="{{ $item->name }}"
                                    style="width: 64px;height: 64px;object-fit: cover"></a>
                            <div class="media-body">
                                <h5 class="mt-0"><a
                                        href="{{ route('get_product_detail', $item->slug) }}">{{ $item->name }}</a>
                                </h5>
                                <a href="{{ route('get_product_detail', $item->slug) }}">Xem ngay</a>
                            </div>
                        </div>
                </li>
            </ul>
        @endforeach
    </section>
    <section class="news sidebar border">
        <div class="title-section">Tin tức</div>
        <ul class="list-unstyled row">
            @foreach ($postTop3 as $item)
                <li class="animated zoomInUp slow delay-1 col-md-6 col-lg-12 col-12">
                    <div class="p-3">
                        <div class="media">
                            <a href="{{ route('get_view_blog_details', $item->slug) }}"><img class="mr-3 hvr-grow"
                                    src="{{ asset('public/upload/post/' . $item->image) }}"
                                    alt="{{$item->title}}"
                                    style="width: 64px;height: 64px;object-fit: cover"></a>
                            <div class="media-body">
                                <h5 class="mt-0"><a
                                        href="{{ route('get_view_blog_details', $item->slug) }}">{{ $item->title }}</a>
                                </h5>
                            </div>
                        </div>
                        {!! $item->desc !!}
                    </div>
                </li>
            @endforeach

        </ul>
    </section>
</div>
</div>
<section class="viewed mb-5">
<div class="title-section">Sản phẩm vừa xem</div>
@if($product_watched!=null)
<div class="row mb-5 mt-3">
    <div class="col-md-3">
        <div class="card">
            @if ($product_watched->persent_discount > 0)
                <div class="discount">{{ $product_watched->persent_discount }}%</div>
            @endif
            {{-- <div class="rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div> --}}
            <div class="card-img hvr-grow">
                <a href="{{ route('get_product_detail', $product_watched->slug) }}"><img
                        class="card-img-top"
                        src="{{ asset('public/upload/product/' . $product_watched->image) }}"
                        alt="{{ $product_watched->name }}"></a>
                <div class="box-control">
                    <div class="item">
                        <a data-request="onAddCart" data-request-data="temp_id: 22, quantity: 1"
                            data-request-update="'orderProduct::cartInfo' : '#cart-info','orderProduct::cart-in-navbar' : '#btn-cart-navbar' "
                            data-request-flash>
                            <i class="fas fa-cart-plus fa-2x"></i></a>
                        <span class="text">Thêm giỏ hàng</span>
                    </div>
                    <div class="item">
                        <a href="{{ route('get_product_detail', $product_watched->slug) }}"><i
                                class="fas fa-search fa-2x"></i></a>
                        <span class="text">Xem chi tiết</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h2><a
                        href="{{ route('get_product_detail', $product_watched->slug) }}">{{ $product_watched->name }}</a>
                </h2>
                <div class="box-price">
                    @if ($product_watched->persent_discount > 0)
                        <div class="price">
                            {{ currency_format($product_watched->price * ((100 - $product_watched->persent_discount) / 100)) }}<sup>đ</sup>
                        </div>
                        <div class="old-price">{{ currency_format($product_watched->price) }}</div>
                    @else
                        <div class="price">{{ currency_format($product_watched->price) }}</div>
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
@stop