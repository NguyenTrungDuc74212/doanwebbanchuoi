@extends('website.layout_site.index')
@section('content')
    <!-- Content -->
    <section id="layout-content">
        <div class="container" id="product-detail">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/products/"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-9">
                    <div class="top-left-content">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- start slide thumb img product -->
                                <!-- Swiper -->
                                <div class="swiper-container gallery-top gallery-top">
                                    <div class="swiper-wrapper">
                                        @if (count($gallery_all) > 0)
                                            @foreach ($gallery_all as $item)
                                                <div class="swiper-slide"
                                                    style="background-image:url({{ asset('public/upload/gallery/' . $item->image) }})">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide"
                                                style="background-image:url({{ asset('public/upload/product/' . $product->image) }})">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next gallery-next-top"></div>
                                    <div class="swiper-button-prev gallery-prev-top"></div>
                                </div>
                                <div class="swiper-container gallery-thumbs gallery-thumbs">
                                    <div class="swiper-wrapper">
                                        @if (count($gallery_all) > 0)
                                            @foreach ($gallery_all as $item)
                                                <div class="swiper-slide"
                                                    style="background-image:url({{ asset('public/upload/gallery/' . $item->image) }})">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide"
                                                style="background-image:url({{ asset('public/upload/product/' . $product->image) }})">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- end start slide thumb img product -->
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-between">
                                <h1 class="title">{{ $product->name }}</h1>
                                <div class="box-info">
                                    {{-- <p class="rate">
                                        <strong>Đánh giá:</strong>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p> --}}
                                    <p>
                                        @if ($product->persent_discount > 0)
                                            <strong>Giá</strong>:{{ currency_format($product->price * ((100 - $product->persent_discount) / 100)) }}
                                            <span class="old-price">{{ currency_format($product->price) }}</span>
                                        @else
                                            <strong>Giá</strong>:{{ currency_format($product->price) }}
                                        @endif
                                    </p>
                                    <p><strong>Mã sản phẩm</strong>: SP{{ $product->id }}</p>
                                    <p><strong>Đơn vị tính</strong>: Kg</p>
                                    @if ($product->quantity > 0)
                                        <p><strong>Tình trạng</strong>: <span class="text-primary">Còn hàng</span></p>
                                    @else
                                        <p><strong>Tình trạng</strong>: <span class="text-primary">Hết hàng</span></p>
                                    @endif
                                </div>
                                <div class="more-info">
                                    Liên hệ trực tiếp hotline: <strong>1900 2268</strong> để nhận được sự tư vấn tốt nhất về
                                    các sản phẩm của chúng tôi.
                                </div>
                                <section class="order">
                                    <form data-request="onAddCart"
                                        data-request-update="'orderProduct::cartInfo' : '#cart-info','orderProduct::cart-in-navbar' : '#btn-cart-navbar'"
                                        data-request-flash>
                                        <div class="form-group row">
                                            <label for="inputNumber" class="col-sm-4 col-form-label">Số lượng</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" name="temp_id" value="22">
                                                <input type="number" class="form-control" id="inputNumber" name="quantity"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputProperties" class="col-sm-4 col-form-label">Kích cỡ</label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" id="inputProperties" name="property">
                                                    <option value="289000">Nho ngón tay Hello Úc - Giá: 289,000/Kg</option>
                                                    <option value="339000">Nho ngón tay Oliver Úc - Giá: 339,000/Kg</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control">
                                            <button type="submit" class="btn btn-secondary"><i
                                                    class="fas fa-cart-plus mr-2"></i>Thêm giỏ hàng</button>
                                            <button type="submit" class="btn btn-second"><i
                                                    class="fas fa-share-square mr-2"></i>Đặt hàng</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                    <!-- end top-product -->
                    <div class="detail-product">
                        <ul class="nav nav-tabs" id="detailProductTabs" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link active" id="des-tab" data-toggle="tab" href="#des" role="tab"
                                    aria-controls="des" aria-selected="true">Mô tả</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab"
                                    aria-controls="detail" aria-selected="false">Chi tiết sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Liên hệ</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="detailProductTabsContent">
                            {{-- <div class="tab-pane fade show active p-4" id="des" role="tabpanel" aria-labelledby="des-tab">
                                <p>{{$product->desc}}
                                    <br>
                                </p>
                            </div> --}}
                            <div class="tab-pane fade show active p-4" id="detail" role="tabpanel"
                                aria-labelledby="detail-tab">
                                <h1 style="text-align: center;"><strong>{{ $product->name }}</strong>
                                    <br>
                                </h1>
                                {!! $product->desc !!}

                            </div>
                            <div class="tab-pane fade p-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <p style="text-align: center;"><strong>TÔN CHỈ HOẠT ĐỘNG CỦA HỆ THỐNG HOA QUẢ SẠCH FUJI
                                        FRUIT</strong></p>

                                <p>1. Hoa quả luôn tươi sạch</p>

                                <p>2. Không chất bảo quản</p>

                                <p>3. Dịch vụ chuyên nghiệp, đổi trả miễn phí 100%</p>

                                <p>4. Không biến đổi gien</p>

                                <p>5. Không hàng Trung Quốc</p>

                                <p>6. Giá cả cạnh tranh</p>

                                <p style="text-align: center;"><img
                                        src="https://hoaquafuji.com/news/tin-nong-san/storage/app/media/uploaded-files/7d6822194a09af57f618-min.jpg"
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
                            </div>
                        </div>
                    </div>
                    <!-- End detail -->
                    <div class="box-comment">
                        <div class="fb-comments" data-href="http://hoaquafuji.local/product/nho-ngon-tay-uc"
                            data-numposts="5" data-width="100%"></div>
                    </div>
                </div>
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

        <style type="text/css">
            .swiper-container {
                width: 100%;
                height: 300px;
                margin-left: auto;
                margin-right: auto;
            }

            .swiper-slide {
                background-size: cover;
                background-position: center;
            }

            .gallery-top {
                height: 80%;
                width: 100%;
            }

            .gallery-thumbs {
                height: 20%;
                box-sizing: border-box;
                padding: 10px 0;
            }

            .gallery-thumbs .swiper-slide {
                width: 25%;
                height: 100%;
                opacity: 0.4;
            }

            .gallery-thumbs .swiper-slide-thumb-active {
                opacity: 1;
            }

        </style>
    </section>
@stop
