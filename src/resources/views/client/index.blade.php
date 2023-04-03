@extends('layouts.client')
@section('content-client')
<div class="clearfix"></div>
<div class="hom-slider">
    <div class="container">
        <div id="sequence">
            <div class="sequence-prev"><i class="fa fa-angle-left"></i></div>
            <div class="sequence-next"><i class="fa fa-angle-right"></i></div>
            <ul class="sequence-canvas">
                <li class="animate-in">
                <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Paris show 2014</span></div>
                <div class="flat-caption caption2 formLeft delay400 text-center">
                    <h1>Collection For Winter</h1>
                </div>
                <div class="flat-caption caption3 formLeft delay500 text-center">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
                <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
                <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img src="{{ asset('asset/client/images/slider-image-01.png') }}" alt=""></div>
                </li>
                <li>
                <div class="flat-caption caption2 formLeft delay400">
                    <h1>Collection For Winter</h1>
                </div>
                <div class="flat-caption caption3 formLeft delay500">
                    <h2>Etiam velit purus, luctus vitae velit sedauctor<br>egestas diam, Etiam velit purus.</h2>
                </div>
                <div class="flat-button caption5 formLeft delay600"><a class="more" href="#">More Details</a></div>
                <div class="flat-image formBottom delay200" data-bottom="true"><img src="{{ asset('asset/client/images/slider-image-02.png') }}" alt=""></div>
                </li>
                <li>
                <div class="flat-caption caption2 formLeft delay400 text-center">
                    <h1>New Fashion of 2013</h1>
                </div>
                <div class="flat-caption caption3 formLeft delay500 text-center">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                </div>
                <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="#">More Details</a></div>
                <div class="flat-image formBottom delay200" data-bottom="true"><img src="{{ asset('asset/client/images/slider-image-03.png') }}" alt=""></div>
                </li>
            </ul>
        </div>
    </div>
    <div class="promotion-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="promo-box"><img src="{{ asset('asset/client/images/promotion-01.png') }}" alt=""></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="promo-box"><img src="{{ asset('asset/client/images/promotion-02.png') }}" alt=""></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <div class="promo-box"><img src="{{ asset('asset/client/images/promotion-03.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="container_fullwidth">
    <div class="container">
        <div class="hot-products">
            <h3 class="title">Sản Phẩm Bán Chạy</h3>
            <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>
            <ul id="hot">
                <li>
                <div class="row">
                    @foreach ($bellingProducts as $bellingProduct)
                    <div class="col-md-3 col-sm-6">
                        <div class="products">
                            <div class="offer">Hot</div>
                            <div class="thumbnail">
                                <a href="details.html"><img src="{{ asset("asset/client/images/products/small/$bellingProduct->img") }}" alt="Product Name"></a>
                            </div>
                            <div class="productname">{{ $bellingProduct->name }}</div>
                            <h4 class="price">{{ number_format($bellingProduct->price_sell) }} VNĐ</h4>
                            <div class="button_group"><button class="button add-cart" type="button">Xem Chi Tiết</button></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="featured-products">
            <h3 class="title">Sản Phẩm Mới Nhất</h3>
            <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
            <ul id="featured">
                <li>
                <div class="row">
                    @foreach ($newProducts as $newProduct)
                        <div class="col-md-3 col-sm-6">
                            <div class="products">
                                <div class="thumbnail"><a href="details.html"><img src="{{ asset("asset/client/images/products/small/products-05.png") }}" alt="Product Name"></a></div>
                                <div class="productname">{{ $newProduct->name }}</div>
                                <h4 class="price">{{ number_format($newProduct->price_sell) }} VNĐ</h4>
                                <div class="button_group"><button class="button add-cart" type="button">Xem Chi Tiết</button></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="our-brand">
            <h3 class="title"><strong>Our </strong> Brands</h3>
            <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand" class="next" href="#">&gt;</a></div>
            <ul id="braldLogo">
                <li>
                <ul class="brand_item">
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/envato.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/themeforest.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/photodune.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/activeden.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/envato.png') }}" alt=""></div>
                        </a>
                    </li>
                </ul>
                </li>
                <li>
                <ul class="brand_item">
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/envato.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/themeforest.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/photodune.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/activeden.png') }}" alt=""></div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="brand-logo"><img src="{{ asset('asset/client/images/envato.png') }}" alt=""></div>
                        </a>
                    </li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection