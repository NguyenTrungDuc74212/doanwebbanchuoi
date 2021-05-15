@extends('website.layout_site.index')
@section('content')    
<section id="layout-content">
            <div class="fixed-container d-none d-md-block">
                <!-- Swiper -->
                <div class="swiper-container main-slider mb-5">
                    <div class="swiper-wrapper">
                            @foreach ($slides as $item)
                            <div class="swiper-slide"><a href="#"><img src="{{asset('public/upload/slide/'.$item->image)}}" alt=""></a>
                            </div>
                            @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination main-slider-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next main-slider-button-next"></div>
                    <div class="swiper-button-prev main-slider-button-prev"></div>
                </div>
            </div>
            <div class="container" id="news-detail">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/news/tin-nong-san">{{$postDetails->first()->category_post->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$postDetails->title}}</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="post">
                            <div class="post-content">
                                <h2 class="post-title">{{$postDetails->title}}</h2>
                                <div class="post-image"><img
                                        src="{{asset('public/upload/post/'.$postDetails->image)}}"
                                        alt="SINH NHẬT LỚN-SALE CỰC LỚN"></div>
                                <div class="post-introductory">
                                    <h4 dir="ltr"><strong>{!!$postDetails->desc!!}</strong></span></h4>
                                </div>
                                <div class="post-content">
                                    <p>
                                        <br>
                                    </p>

                                    <p dir="ltr">{{$postDetails->title}}</p>
                                    {!!$postDetails->content!!}
                                    <p>
                                        <br>
                                    </p>

                                    <p>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="more-info border-top pt-3 border-primary">
                            <p style="text-align: center;"><strong>TÔN CHỈ HOẠT ĐỘNG CỦA HỆ THỐNG HOA QUẢ SẠCH FUJI
                                    FRUIT</strong></p>

                            <p>1. Hoa quả luôn tươi sạch</p>

                            <p>2. Không chất bảo quản</p>

                            <p>3. Dịch vụ chuyên nghiệp, đổi trả miễn phí 100%</p>

                            <p>4. Không biến đổi gien</p>

                            <p>5. Không hàng Trung Quốc</p>

                            <p>6. Giá cả cạnh tranh</p>

                            <p style="text-align: center;"><img
                                    src="https://hoaquafuji.com/post/sinh-nhat-lon-sale-cuc-lon/storage/app/media/uploaded-files/7d6822194a09af57f618-min.jpg"
                                    style="width: 900px;" class="fr-fic fr-dib" data-result="success"></p>

                            <p style="text-align: center;">
                                <br>
                            </p>

                            <p><strong>Mọi thông tin chi tiết vui lòng liên hệ:</strong></p>

                            <p>CÔNG TY CP XUẤT NHẬP KHẨU FUJI</p>

                            <p>Trụ sở: Số nhà 24 D7, KĐT Đại Kim - Định Công, P.Đại Kim, Q.Hoàng Mai, TP.HN</p>

                            <p>Điện thoại: 1900 2268 - 0988 444 123</p>

                            <p>Hệ thống cửa hàng Fuji Fruit: <a
                                    href="http://hoaquafuji.com/danh-sach-cua-hang-fuji-fruit">http://hoaquafuji.com/danh-sach-cua-hang-fuji-fruit</a>
                            </p>

                            <p>Website: www.hoaquafuji.com</p>
                        </div> --}}

                        <div class="box-comment my-5">
                            <div class="fb-comments" data-href="http://hoaquafuji.local/post/sinh-nhat-lon-sale-cuc-lon"
                                data-numposts="5" data-width="100%"></div>
                        </div>
                    </div>
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
                                                <a href="/post/sinh-nhat-lon-sale-cuc-lon"><img class="mr-3 hvr-grow"
                                                        src="{{ asset('public/upload/post/' . $item->image) }}"
                                                        alt="SINH NHẬT LỚN-SALE CỰC LỚN"
                                                        style="width: 64px;height: 64px;object-fit: cover"></a>
                                                <div class="media-body">
                                                    <h5 class="mt-0"><a
                                                            href="/post/sinh-nhat-lon-sale-cuc-lon">{{ $item->title }}</a>
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
                    @if($product_watched!=null)
                    <div class="title-section">Sản phẩm vừa xem</div>
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