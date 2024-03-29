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
        <img src="{{asset('public/upload/slide/'.$slides->first()->image)}}">
    </div>
    <!--.service-->
    <section class="service mb-5">
        <div class="container">
            <h2 class="text-center mb-4 text-uppercase">Đưa chuối Việt Nam vươn tầm thế giới</h2>
            <div class="row">
                <div class="col-4 text-center">
                    <img class="hvr-grow" src="public\public_site\image\t1_3.png"
                    alt="HOA QUẢ TƯƠI SẠCH">
                    <h3 class="text-primary">ĐẢM BẢO TƯƠI VÀ SẠCH</h3>
                    <p class="d-none d-lg-block">Quy trình nhập hàng, vận chuyển, bảo quản chuyên nghiệp.
                    </p>
                </div>
                <div class="col-4 text-center">
                    <img class="hvr-grow" src="public\public_site\image\t1_4.png"
                    alt="ĐỔI TRẢ MIỄN PHÍ">
                    <h3 class="text-primary">HỢP TÁC VÀ PHÁT TRIỂN</h3>
                    <p class="d-none d-lg-block">Hợp tác cùng người nông dân đưa chuối Việt Nam vươn tầm thế giới.
                    </p>
                </div>
                <div class="col-4 text-center">
                    <img class="hvr-grow" src="public\public_site\image\t1_5.png"
                    alt="GIÁ CẢ CẠNH TRANH">
                    <h3 class="text-primary">GIÁ CẢ CẠNH TRANH</h3>
                    <p class="d-none d-lg-block">Chúng tôi luôn đặt lợi ích cho người tiêu dùng lên hàng đầu.
                    </p>
                </div>
            </div>
            <div class="text-center hoavan"><img
                src="public\public_site\image\border.png" alt=""></div>
            </div>
        </section>
        <!--/.service-->
        <!--.about-->
        <section class="about mb-5 d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 left">
                        <h3 class="title text-primary"><i class="fas fa-comments mr-2"></i>ĐÔI NÉT VỀ FRESH BANANA</h3>
                        <p class="text-justify">Với tôn chỉ “Mang đến cho khách hàng không chỉ là những sản phẩm trái
                            cây an toàn, chất lượng cao, mà kèm theo đó là những dịch vụ tiện ích thân thiện. ”Công ty cổ phần VTS Việt Nam” - đơn vị chuyên nhập khẩu các loại trái cây cao cấp từ các nước trên
                            thế giới đang từng bước phát triển và chiếm được lòng tin của người tiêu dùng Việt Nam.Hiện tại công ty đang cung ứng các sản phẩm từ chuối đến tay người tiêu dùng trên khắp đất nước. Bằng những nỗ lực
                            không ngừng theo thời gian, công ty chúng tôi từng ngày hoàn thiện hơn về tất cả
                        mọi mặt.</p>
                        <div class="text-right">
                            <a href="{{route('get_intro')}}" class="readmore hvr-forward">Giới thiệu
                            chung</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center"><span class="hvr-float-shadow"><img
                        src="public/public_site/image/center_img.jpg" alt=""></span>
                    </div>
                    <div class="col-md-4 right">
                        <h3 class="title text-primary"><i class="far fa-newspaper mr-2"></i>Giới thiệu chung</h3>
                        <ul class="list-unstyled">
                            @foreach ($postIntro as $item)
                            <li class="media mb-4">
                                <a href="{{route('get_view_blog_details',$item->slug)}}"><img class="d-flex mr-3 hvr-grow"
                                    src="{{asset('public/upload/post/'.$item->image)}}" alt="{{$item->title}}"></a>
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-weight-bold text-truncate"><a href="{{route('get_view_blog_details',$item->slug)}}">{{$item->title}}</a></h5>
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
                                @php
                                $total_quantity=0;
                              
                                    foreach ($item->warehouse_product as $value) {
                                        if($value->status==0)
                                        {
                                           
                                            $total_quantity+=$value->quantity;
                                        
                                        }
                                    }
                        
                                @endphp
                                <form>
                                    @csrf
                                    @if($item->persent_discount>0)
                                    <div class="discount">{{$item->persent_discount}}%</div>
                                    @endif
                                    <div class="rate">
                                        @if($total_quantity>0)
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
                        <!-- Add Pagination -->
                        <!-- <div class="swiper-pagination home-product-slide-pagination"></div> -->
                    </div>
                    <div class="row mb-5 d-md-none">
                        @foreach ($product_top_sale as $item)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                @php
                                $total_quantity=0;
                              
                                    foreach ($item->warehouse_product as $value) {
                                        if($value->status==0)
                                        {
                                           
                                            $total_quantity+=$value->quantity;
                                        
                                        }
                                    }
                        
                                @endphp
                                <form>
                                    @csrf
                                    @if($item->persent_discount>0)
                                    <div class="discount">{{$item->persent_discount}}%</div>
                                    @endif
                                    <div class="rate">
                                    @if($total_quantity>0)
                                       <p  class="status-product">Còn hàng</p>
                                    @else
                                        <p  class="status-product" style="background-color: #b90f0fde !important;">Hết hàng</p>
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
                                                    color: #269300">
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
                            <!-- Card -->
                        </div>
                    {{-- </div> --}}
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
                            <div class="box-category" style="background-image:url('public/upload/category_product/{{$item->image}}') ">
                                <h3 class="title"><a href="{{route('get_product_by_category',$item->slug)}}">{{$item->name}}</a></h3>
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
                                <iframe width="754" height="424" src="https://www.youtube.com/embed/HQD0WbRUz3A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Ý KIẾN KHÁCH HÀNG</div>
                            <!-- Swiper -->
                            <div class="swiper-container customer-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p>Ông Hiếu Trung </p>
                                            <p> Giám đốc công ty TNHH Phát triển công nghệ 2MG</p>
                                            <p><img src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.15752-9/75369159_461027014766925_532254732689866752_n.jpg?_nc_cat=103&ccb=1-3&_nc_sid=ae9488&_nc_ohc=2cxKWuMTxAIAX-vOBBH&_nc_ht=scontent-hkg4-1.xx&oh=011964adb7914f37f97f0a045bb5f053&oe=60DA113D"
                                                alt="Khách hàng fresh banana"></p>
                                                <p>“ Là người thường xuyên phải chuẩn bị hậu cần ở công ty, tôi luôn phải tìm
                                                    nguồn trái cây nhập khẩu tươi ngon, an toàn cho cả công ty mỗi dịp liên
                                                    hoan, hội nghị....Sau khi tìm hiểu rất kỹ, tôi đã lựa chọn VTS
                                                    và tôi không còn lo lắng chất lượng hoa quả nữa”
                                                </p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <p>Ông Đức Trung Nguyễn </p>
                                                <p> Giám đốc công ty nội thất ADhome</p>
                                                <p><img src="https://scontent-hkt1-1.xx.fbcdn.net/v/t1.6435-9/173720418_545664379750430_6886817172856789631_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=9wYaQhSbWkUAX99lN8J&_nc_ht=scontent-hkt1-1.xx&oh=cc04db7e0287342cad1925149776a73d&oe=60DB88B2"
                                                    alt="Khách hàng fresh banana"></p>
                                                    <p>Những sản phẩm của chuối Việt Nam luôn tươi ngon với đầy đủ giấy tờ chứng minh nguồn gốc rõ
                                                        ràng nên tôi rất yên tâm lựa chọn cho gia đình cũng như tặng người thân, bạn
                                                        bè!”
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="item">
                                                    <p>Ông Đạt Thành </p>
                                                    <p> CEO &amp; founder Công Xinhacoi</p>
                                                    <p><img src="https://scontent-hkt1-2.xx.fbcdn.net/v/t1.15752-9/186540312_495591748452655_2171231043695018312_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=ae9488&_nc_ohc=LmlnglkkDwYAX-My6GB&_nc_ht=scontent-hkt1-2.xx&oh=fd0a07832a2cf33bf041852cf4be828a&oe=60D8BA4A"
                                                        alt="Khách hàng fresh banana"></p>
                                                        <p>“Tôi thích nhất chính sách đổi trả của VTS. Có lần mình mua
                                                            sản phẩm bị dập, các bạn nhân viên đã tư vấn nhiệt tình và đổi trả
                                                            100% Miễn phí. Từ đó, tôi không cần lo lắng về chất lượng sản phẩm mua tại
                                                            VTS”.
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
                                        @foreach ($postTop as $item)
                                        <div class="col-md-6">
                                            <div class="hvr-outline-out p-3">
                                                <div class="media align-items-center">
                                                    <a href="{{route('get_view_blog_details',$item->slug)}}"><img class="mr-3 hvr-grow"
                                                        src="{{asset('public/upload/post/'.$item->image)}}"
                                                        alt="SINH NHẬT LỚN-SALE CỰC LỚN"
                                                        style="width: 150px;height: 150px;object-fit: cover"></a>
                                                        <div class="media-body">
                                                            <h5 class="mt-0"><a href="{{route('get_view_blog_details',$item->slug)}}">{{$item->title}}</a></h5>
                                                            {!!$item->desc!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--- /.news --->
                        </section>
                        @stop
