@extends('website.layout_site.index')
@section('content')
    <section id="layout-content">
        <div class="my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 height-450">
                        {{-- <form class="form-inline mb-3 form-search-store">
                            <div class="form-group">
                                <input class="form-control-plaintext p-2" type="text" name="search-store" placeholder="Tìm kiếm tỉnh thành">
                            </div>
                            <button class="btn btn-secondary" data-request="onSearch" data-request-update="'stores::items': '#stores'"><i class="fas fa-search-location"></i></button>
                        </form> --}}
                        <div id="stores">
                            <div class="list-store">
                                <h4>Hải Phòng</h4>
                                <div class="detail-store">
                                    <div class="item-store">
                                        {{-- <h5 data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d231.8557076716865!2d105.82432838570432!3d21.59796883862404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313527837aea2127%3A0xdc62d7b56a5f34e0!2zQ-G7rWEgaMOgbmcgaG9hIHF14bqjIHPhuqFjaCBGdWppIEZydWl0!5e0!3m2!1svi!2s!4v1594368863822!5m2!1svi!2s"
                                            onclick="change_src($(this).attr('data-src'))">HQS Thái Nguyên 1</h5> --}}
                                        {{-- <a href="#!" class="view-maps" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d231.8557076716865!2d105.82432838570432!3d21.59796883862404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313527837aea2127%3A0xdc62d7b56a5f34e0!2zQ-G7rWEgaMOgbmcgaG9hIHF14bqjIHPhuqFjaCBGdWppIEZydWl0!5e0!3m2!1svi!2s!4v1594368863822!5m2!1svi!2s"
                                            onclick="change_src($(this).attr('data-src'))"><i class="fas fa-map-marker-alt mr-2"></i> Xem bản đồ</a> --}}
                                        <p>
                                        <p>Chuối Việt Nam - Số 180 Trung Hành, Đằng Lâm, Hải An, Hải Phòng</p>

                                        <p>Hotline: 0373.163.163
                                            <br>
                                        </p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.0215638517766!2d106.71097851439296!3d20.830835686105882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7007f5512e3d%3A0x936fffaec297a28d!2zMTgwIFRydW5nIEjDoG5oLCDEkOG6sW5nIEzDom0sIEjhuqNpIEFuLCBI4bqjaSBQaMOybmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1621154281332!5m2!1svi!2s"
                            width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
