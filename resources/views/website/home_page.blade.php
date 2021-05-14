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
    <div class="d-md-none banner-mobile">
        <img src="https://hoaquafuji.com/themes/hoaquafuji/assets/img/banner-mobile.jpg">
    </div>
    <!--.service-->
    <section class="service mb-5">
        <div class="container">
            <h2 class="text-center mb-4 text-uppercase">Đưa chuối Việt Nam vươn tầm thế giới</h2>
            <div class="row">
                <div class="col-4 text-center">
                    <img class="hvr-grow" src="https://hoaquafuji.com/storage/app/media/t1_3.png"
                        alt="HOA QUẢ TƯƠI SẠCH">
                    <h3 class="text-primary">ĐẢM BẢO TƯƠI VÀ SẠCH</h3>
                    <p class="d-none d-lg-block">Quy trình nhập hàng, vận chuyển, bảo quản chuyên nghiệp.
                    </p>
                </div>
                <div class="col-4 text-center">
                    <img class="hvr-grow" src="https://hoaquafuji.com/storage/app/media/t1_4.png"
                        alt="ĐỔI TRẢ MIỄN PHÍ">
                    <h3 class="text-primary">CHƯA NGHĨ RA</h3>
                    <p class="d-none d-lg-block">Bổ sung sau
                    </p>
                </div>
                <div class="col-4 text-center">
                    <img class="hvr-grow" src="https://hoaquafuji.com/storage/app/media/t1_5.png"
                        alt="GIÁ CẢ CẠNH TRANH">
                    <h3 class="text-primary">GIÁ CẢ CẠNH TRANH</h3>
                    <p class="d-none d-lg-block">Chúng tôi luôn đặt lợi ích cho người tiêu dùng lên hàng đầu.
                    </p>
                </div>
            </div>
            <div class="text-center hoavan"><img
                    src="https://hoaquafuji.com/themes/hoaquafuji/assets/img/border.png" alt=""></div>
        </div>
    </section>
    <!--/.service-->
    <!--.about-->
    <section class="about mb-5 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 left">
                    <h3 class="title text-primary"><i class="fas fa-comments mr-2"></i>ĐÔI NÉT VỀ FUJI</h3>
                    <p class="text-justify">Với tôn chỉ “Mang đến cho khách hàng không chỉ là những sản phẩm trái
                        cây an toàn, chất lượng cao, mà kèm theo đó là những dịch vụ tiện ích thân thiện. ”Công ty
                        CP xuất nhập khẩu Fuji” - đơn vị chuyên nhập khẩu các loại trái cây cao cấp từ các nước trên
                        thế giới đang từng bước phát triển và chiếm được lòng tin của người tiêu dùng Việt Nam. Hiện
                        tại, công ty có hệ thống các cửa hàng mang thương hiệu Hoa quả sạch Fuji được phân bố rộng
                        khắp trên địa bàn các tỉnh phía Bắc phục vụ đủ nhu cầu cho mọi khách hàng. Bằng những nỗ lực
                        không ngừng theo thời gian, hệ thống Hoa quả sạch Fuji từng ngày hoàn thiện hơn về tất cả
                        mọi mặt.</p>
                    <div class="text-right">
                        <a href="https://hoaquafuji.com/doi-net-ve-fuji" class="readmore hvr-forward">Giới thiệu
                            chung</a>
                    </div>
                </div>
                <div class="col-md-4 text-center"><span class="hvr-float-shadow"><img
                            src="https://hoaquafuji.com/themes/hoaquafuji/assets/img/t2_img.png" alt=""></span>
                </div>
                <div class="col-md-4 right">
                    <h3 class="title text-primary"><i class="far fa-newspaper mr-2"></i>Giới thiệu chung</h3>
                    <ul class="list-unstyled">
                        @foreach ($postIntro as $item)
                        <li class="media mb-4">
                            <a href=" /gioi-thieu-chung/van-hoa-fuji"><img class="d-flex mr-3 hvr-grow"
                                    src="{{asset('public/upload/post/'.$item->image)}}" alt="{{$item->title}}"></a>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1 font-weight-bold text-truncate"><a href="#">{{$item->title}}</a></h5>
                               {!!$item->desc!!}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="text-right d-none">
                        <a href="#!" class="hvr-forward readmore">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/.about-->
    <!---.camket --->
    <section class="camket fixed-container">
        <div class="container">
            <h3 class="title text-center text-white mb-3">
                <svg aria-hidden="true" data-prefix="fas" data-icon="shield-check" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="svg-inline--fa fa-shield-check fa-w-16 fa-5x" style="width: 28px">
                    <path fill="currentColor"
                        d="M496 128c0 221.282-135.934 344.645-221.539 380.308a48 48 0 0 1-36.923 0C130.495 463.713 16 326.487 16 128a48 48 0 0 1 29.539-44.308l192-80a48 48 0 0 1 36.923 0l192 80A48 48 0 0 1 496 128zM235.313 381.941l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.248-16.379-6.249-22.628 0L224 302.745l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.248 6.25 16.379 6.25 22.627.001z"
                        class="text-white"></path>
                </svg>
                Cam kết chất lượng
            </h3>
            <ul class="mx-auto mb-3 list-unstyled">
                <li><i class="fas fa-user-check text-white fa-2x mr-md-2 i-1"></i> Hoa quả tươi sạch</li>
                <li><i class="fas fa-user-check text-white fa-2x mr-md-2 i-2"></i> Không chất bảo quản</li>
                <li><i class="fas fa-user-check text-white fa-2x mr-md-2 i-3"></i> Dịch vụ chuyên nghiệp</li>
            </ul>
            <ul class="m-auto list-unstyled">
                <li><i class="fas fa-user-check text-white fa-2x mr-md-2 i-4"></i> Không thuốc biến đổi gen</li>
                <li><i class="fas fa-user-check text-white fa-2x mr-md-2 i-5"></i> Không hàng Trung Quốc</li>
                <li><i class="fas fa-user-check text-white fa-2x mr-md-2 i-6"></i> Giá cả cạnh tranh</li>
            </ul>
        </div>
    </section>
    <!---/.camket --->
    <!--- .sanpham --->
    <section class="product mb-5">
        <div class="container">
            <h3 class="title text-center text-primary">SẢN PHẨM BÁN CHẠY</h3>
            <div class="des text-center mb-4 w-75 mx-auto">Với mong muốn mang tới cho khách hàng sự thuận tiện nhất
                và dẫn thay đổi thói quen đi chợ truyền thống cũng như đa số khách hàng đều được sử dụng các sản
                phẩm hoa quả sạch chất lượng cao nhất.</div>
            <!-- Swiper -->
            <div class="swiper-container home-product-slide d-none d-md-block">
                <div class="swiper-wrapper">
                    @foreach ($product_top_sale as $item)
                    <div class="swiper-slide">
                        <div class="card">
                            @if($item->persent_discount>0)
                            <div class="discount">{{$item->persent_discount}}%</div>
                            @endif
                            <div class="rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="card-img hvr-grow">
                                <a href="/product/tao-envy-new-zealand"><img class="card-img-top"
                                        src="{{asset('public/upload/product/'.$item->image)}}"
                                        alt="{{$item->name}}"></a>
                                <div class="box-control">
                                    <div class="item">
                                        <a data-request="onAddCart" data-request-data="temp_id: 11, quantity: 1"
                                            data-request-update="'orderProduct::cartInfo' : '#cart-info','orderProduct::cart-in-navbar' : '#btn-cart-navbar' "
                                            data-request-flash>
                                            <i class="fas fa-shopping-cart"></i></a>
                                        <span class="text">Thêm giỏ hàng</span>
                                    </div>
                                    <div class="item">
                                        <a href="/product/tao-envy-new-zealand"><i class="fas fa-plus"></i></a>
                                        <span class="text">Xem chi tiết</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h2><a href="/product/tao-envy-new-zealand">{{$item->name}}</a></h2>
                                <div class="box-price">
                                    @if($item->persent_discount>0)
                                    <div class="price">{{currency_format($item->price*((100-$item->persent_discount)/100))}}<sup>đ</sup></div>
                                    <div class="old-price">{{currency_format($item->price)}}<sup>đ</sup></div>
                                    @else
                                    <div class="price">{{currency_format($item->price)}}<sup>đ</sup></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <!-- <div class="swiper-pagination home-product-slide-pagination"></div> -->
            </div>
            <div class="row mb-5 d-md-none">
                @foreach ($product_top_sale as $item)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        @if($item->persent_discount>0)
                        <div class="discount">{{$item->persent_discount}}%</div>
                        @endif
                        <div class="rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="card-img hvr-grow">
                            <a href="/product/tao-envy-new-zealand"><img class="card-img-top"
                                src="{{asset('public/upload/product/'.$item->image)}}"
                                alt="{{$item->name}}"></a>
                            <div class="box-control">
                                <div class="item">
                                    <a data-request="onAddCart" data-request-data="temp_id: 11, quantity: 1"
                                        data-request-update="'orderProduct::cartInfo' : '#cart-info'"
                                        data-request-flash>
                                        <i class="fas fa-shopping-cart"></i></a>
                                    <span class="text">Thêm giỏ hàng</span>
                                </div>
                                <div class="item">
                                    <a href="/product/tao-envy-new-zealand"><i class="fas fa-plus"></i></a>
                                    <span class="text">Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2><a href="/product/tao-envy-new-zealand">{{$item->name}}</a></h2>
                            <div class="box-price">
                                @if($item->persent_discount>0)
                                    <div class="price">{{currency_format($item->price*((100-$item->persent_discount)/100))}}<sup>đ</sup></div>
                                    <div class="old-price">{{currency_format($item->price)}}<sup>đ</sup></div>
                                    @else
                                    <div class="price">{{currency_format($item->price)}}<sup>đ</sup></div>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                @endforeach
                    <!-- Card -->
                </div>
            </div>
        </div>
    </section>
    <!--- /.sanpham --->
    <!--- .category-product --->
    <section class="category-product">
        <div class="title-section">DANH MỤC SẢN PHẨM</div>
        <div class="container">
            <div class="row">
                @foreach ($productCategory as $item)
                <div class="col-md-4 mb-5">
                    <div class="box-category" style="background-image:url('https://hoaquafuji.com/storage/app/uploads/public/463/6a0/ad7/thumb__525_420_0_0_auto.jpg') ">
                        <h3 class="title"><a href=" /products/gio-trai-cay">{{$item->name}}</a></h3>
                        <p><br></p> <p><br></p> <p><br></p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--- /.category-product --->
    <!--- .customer --->
    <section class="customer fixed-container mb-4">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-md-5">
                    <div class="title">VIDEO</div>
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_Pw4ZO2WZBg"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="title">Ý KIẾN KHÁCH HÀNG</div>
                    <!-- Swiper -->
                    <div class="swiper-container customer-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item">
                                    <p>Bà Hậu Phương </p>
                                    <p> Giám đốc công ty TNHH Phát triển công nghệ 2MG</p>
                                    <p><img src="https://hoaquafuji.com/storage/app/uploads/public/cad/0f0/2c2/thumb__150_150_0_0_auto.jpg"
                                            alt="Khách hàng fuij"></p>
                                    <p>“ Là người thường xuyên phải chuẩn bị hậu cần ở công ty, tôi luôn phải tìm
                                        nguồn trái cây nhập khẩu tươi ngon, an toàn cho cả công ty mỗi dịp liên
                                        hoan, hội nghị....Sau khi tìm hiểu rất kỹ, tôi đã lựa chọn Hoa quả sạch Fuji
                                        và tôi không còn lo lắng chất lượng hoa quả nữa”
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <p>Ông Ngô Quyền </p>
                                    <p> Giám đốc công ty nội thất ADhome</p>
                                    <p><img src="https://hoaquafuji.com/storage/app/uploads/public/4b4/d0e/ca8/thumb__150_150_0_0_auto.jpg"
                                            alt="Khách hàng fuij"></p>
                                    <p>“Hoa quả sạch FUJI luôn tươi ngon với đầy đủ giấy tờ chứng minh nguồn gốc rõ
                                        ràng nên tôi rất yên tâm lựa chọn cho gia đình cũng như tặng người thân, bạn
                                        bè!”
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <p>Ông Trần Tuấn </p>
                                    <p> CEO &amp; founder Công ty in, thiết kế Tuấn Hoàng</p>
                                    <p><img src="https://hoaquafuji.com/storage/app/uploads/public/ac5/83b/43f/thumb__150_150_0_0_auto.jpg"
                                            alt="Khách hàng fuij"></p>
                                    <p>“Tôi thích nhất chính sách đổi trả của Hoa quả sạch Fuji. Có lần mình mua
                                        trái lựu bị khô bên trong, các bạn nhân viên đã tư vấn nhiệt tình và đổi trả
                                        100% Miễn phí. Từ đó, tôi không cần lo lắng về chất lượng sản phẩm mua tại
                                        hệ thống hoa quả sạch nhập khẩu Fuji”.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item">
                                    <p>Ông Minh </p>
                                    <p> Giám đốc công ty cổ phần phần mềm POS 365</p>
                                    <p><img src="https://hoaquafuji.com/storage/app/uploads/public/9bc/681/458/thumb__150_150_0_0_auto.jpg"
                                            alt="Khách hàng fuij"></p>
                                    <p>"Có lần, tôi muốn đặt giỏ quà tặng sinh nhật đối tác, nhân viên đã gọi điện
                                        tư vấn rất nhiệt tình, trang trí rất đẹp và sáng tạo, tôi rất ưng ý và sẽ
                                        thường xuyên ghé mua hàng tại hệ thống HQS Fuji!"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--- /.customer --->
    <!--- .news --->
    <section class="news">
        <div class="title text-center font-weight-bold mb-4">TIN TỨC</div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="hvr-outline-out p-3">
                        <div class="media align-items-center">
                            <a href="/post/sinh-nhat-lon-sale-cuc-lon"><img class="mr-3 hvr-grow"
                                    src="https://hoaquafuji.com/storage/app/uploads/public/93c/0e1/4cd/thumb__300_300_0_0_auto.jpg"
                                    alt="SINH NHẬT LỚN-SALE CỰC LỚN"
                                    style="width: 150px;height: 150px;object-fit: cover"></a>
                            <div class="media-body">
                                <h5 class="mt-0"><a href="/post/sinh-nhat-lon-sale-cuc-lon">SINH NHẬT LỚN-SALE CỰC
                                        LỚN</a></h5>
                                <p class="des">🎂 Nhân dịp sinh nhật #FujiFruit tròn 6 tuổi, từ ngày
                                    09/05-09/05/2021&nbsp;thay lời cảm ơn chân thành nhất dành cho quý khách hàng đã
                                    luôn ủng hộ Fuji, Fuji xin gửi tới quý khách "SALE CỰC LỚN" lớn nhất tháng 5
                                    này!&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hvr-outline-out p-3">
                        <div class="media align-items-center">
                            <a href="/post/sinh-nhat-fuji-cung-di-rinh-vang"><img class="mr-3 hvr-grow"
                                    src="https://hoaquafuji.com/storage/app/uploads/public/ac8/77a/8e3/thumb__300_300_0_0_auto.jpg"
                                    alt="Sinh nhật Fuji cùng đi rinh “ VÀNG “"
                                    style="width: 150px;height: 150px;object-fit: cover"></a>
                            <div class="media-body">
                                <h5 class="mt-0"><a href="/post/sinh-nhat-fuji-cung-di-rinh-vang">Sinh nhật Fuji
                                        cùng đi rinh “ VÀNG “</a></h5>
                                <p class="des">
                                    Nhân dịp kỷ niệm 6 năm thành lập, Fuji Fruit &nbsp;triển khai nhiều khuyến mãi
                                    với quà tặng hấp dẫn, tổng trị giá lên đến 30 triệu đồng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hvr-outline-out p-3">
                        <div class="media align-items-center">
                            <a href="/post/hqs-fuji-nhung-hoat-dong-xa-hoi-tu-thien-y-nghia"><img
                                    class="mr-3 hvr-grow"
                                    src="https://hoaquafuji.com/storage/app/uploads/public/387/f7f/933/thumb__300_300_0_0_auto.jpg"
                                    alt="HQS FUJI &amp; NHỮNG HOẠT ĐỘNG XÃ HỘI, TỪ THIỆN Ý NGHĨA"
                                    style="width: 150px;height: 150px;object-fit: cover"></a>
                            <div class="media-body">
                                <h5 class="mt-0"><a
                                        href="/post/hqs-fuji-nhung-hoat-dong-xa-hoi-tu-thien-y-nghia">HQS FUJI &amp;
                                        NHỮNG HOẠT ĐỘNG XÃ HỘI, TỪ THIỆN Ý NGHĨA</a></h5>
                                <p class="des"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hvr-outline-out p-3">
                        <div class="media align-items-center">
                            <a href="/post/gio-qua-fuji-trao-loi-yeu-thuong-2010"><img class="mr-3 hvr-grow"
                                    src="https://hoaquafuji.com/storage/app/uploads/public/a0b/f0e/402/thumb__300_300_0_0_auto.jpg"
                                    alt="GIỎ QUẢ FUJI - TRAO LỜI YÊU THƯƠNG 20/10"
                                    style="width: 150px;height: 150px;object-fit: cover"></a>
                            <div class="media-body">
                                <h5 class="mt-0"><a href="/post/gio-qua-fuji-trao-loi-yeu-thuong-2010">GIỎ QUẢ FUJI
                                        - TRAO LỜI YÊU THƯƠNG 20/10</a></h5>
                                <p class="des">&nbsp;Nhân dịp ngày Phụ nữ Việt Nam, Fuji xin gợi ý món quà để tri ân
                                    tới một nửa thế giới: GIỎ QUÀ TRÁI CÂY - THAY LỜI YÊU THƯƠNG</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--- /.news --->
</section>
@stop