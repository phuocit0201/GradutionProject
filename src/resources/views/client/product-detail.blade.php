@extends('layouts.client')
@section('content-client')
<div class="container_fullwidth">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="products-details">
            <div class="preview_image">
              <div class="preview-small">
                <img id="zoom_03" src="{{ asset("asset/client/images/products/medium/products-01.jpg") }}" data-zoom-image="{{ asset("asset/client/images/products/Large/products-01.jpg") }}" alt="">
              </div>
              <div class="thum-image">
                <ul id="gallery_01" class="prev-thum">
                  @foreach ($productColor as $color)
                    <li class="sub-img">
                      <a href="#" data-image="{{ asset("asset/client/images/products/medium/$color->img") }}" data-zoom-image="{{ asset("asset/client/images/products/Large/products-01.jpg") }}">
                        <img src="{{ asset("asset/client/images/products/thum/products-01.png") }}" alt="">
                      </a>
                    </li>
                  @endforeach
                </ul>
                <a class="control-left" id="thum-prev" href="javascript:void(0);">
                  <i class="fa fa-chevron-left">
                  </i>
                </a>
                <a class="control-right" id="thum-next" href="javascript:void(0);">
                  <i class="fa fa-chevron-right">
                  </i>
                </a>
              </div>
            </div>
            <div class="products-description">
              <h5 class="name">
                {{ $product->name }}
              </h5>
              <p>
                Số lượng đã bán: 
                <span class=" light-red">
                  {{ $productSold->sum ?? 0}}
                </span>
              </p>
              <p>
                {{ $product->description }}
              </p>
              <hr class="border">
              <div class="price">
                Price : 
                <span class="new_price">
                  {{ format_number_to_money($product->price_sell) }}
                  <sup>
                    VNĐ
                  </sup>
                </span>
              </div>
              <hr class="border">
              <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <div class="wided row">
                  <div class="col-md-3 wided-box">
                    Màu &nbsp;&nbsp;: 
                    <select id="data-color">
                      @foreach ($productColor as $color)
                        <option value="{{ $color->id }}">
                          {{ $color->color_name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3 wided-box">
                    Kích thước &nbsp;&nbsp;: 
                    <select id="data-size" data-sizes="{{ json_encode($productSize) }}" name="id">
                      
                    </select>
                  </div>
                  <div class="col-md-3 wided-box">
                    <div style="display: flex; align-items: center; height: 30px;">
                      Số lượng còn &nbsp;&nbsp;: <span id="quantity_remain" style="margin-left: 10px;"></span>
                    </div>
                  </div>
                  <div class="col-md-3 wided-box" style="display: flex">
                    <div style="display: flex; align-items: center;">
                      <span>Số lượng&nbsp;&nbsp;:</span>
                    </div>
                    <div style="margin-left: 10px;">
                      <input type="number" value="1" min="1" name="quantity" style="max-width: 70px; height: 30px;">
                    </div>
                  </div>
                  <div class="col-md-12 wided-box text-center">
                    <button class="button add-to-cart-btn" >
                      Thêm Vào Giỏ Hàng
                    </button>
                  </div>
                </div>
              </form>
              <div class="clearfix">
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div class="tab-box">
            <div id="tabnav">
              <ul>
                <li>
                  <a href="#Descraption">
                    DESCRIPTION
                  </a>
                </li>
                <li>
                  <a href="#Reviews">
                    REVIEW
                  </a>
                </li>
                
              </ul>
            </div>
            <div class="tab-content-wrap">
              <div class="tab-content" id="Descraption">
                <p>
                  Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibu um ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae...
                </p>
                <p>
                  Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibu um ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae Aenean eleifend laoreet congue. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc...
                </p>
              </div>
              <div class="tab-content" id="Reviews">
                <form>
                  <table>
                    <thead>
                      <tr>
                        <th>
                          &nbsp;
                        </th>
                        <th>
                          1 star
                        </th>
                        <th>
                          2 stars
                        </th>
                        <th>
                          3 stars
                        </th>
                        <th>
                          4 stars
                        </th>
                        <th>
                          5 stars
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          Quality
                        </td>
                        <td>
                          <input type="radio" name="quality" value="Blue"/>
                        </td>
                        <td>
                          <input type="radio" name="quality" value="">
                        </td>
                        <td>
                          <input type="radio" name="quality" value="">
                        </td>
                        <td>
                          <input type="radio" name="quality" value="">
                        </td>
                        <td>
                          <input type="radio" name="quality" value="">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Price
                        </td>
                        <td>
                          <input type="radio" name="price" value="">
                        </td>
                        <td>
                          <input type="radio" name="price" value="">
                        </td>
                        <td>
                          <input type="radio" name="price" value="">
                        </td>
                        <td>
                          <input type="radio" name="price" value="">
                        </td>
                        <td>
                          <input type="radio" name="price" value="">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Value
                        </td>
                        <td>
                          <input type="radio" name="value" value="">
                        </td>
                        <td>
                          <input type="radio" name="value" value="">
                        </td>
                        <td>
                          <input type="radio" name="value" value="">
                        </td>
                        <td>
                          <input type="radio" name="value" value="">
                        </td>
                        <td>
                          <input type="radio" name="value" value="">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-row">
                        <label class="lebel-abs">
                          Your Name 
                          <strong class="red">
                            *
                          </strong>
                        </label>
                        <input type="text" name="" class="input namefild">
                      </div>
                      <div class="form-row">
                        <label class="lebel-abs">
                          Your Email 
                          <strong class="red">
                            *
                          </strong>
                        </label>
                        <input type="email" name="" class="input emailfild">
                      </div>
                      <div class="form-row">
                        <label class="lebel-abs">
                          Summary of You Review 
                          <strong class="red">
                            *
                          </strong>
                        </label>
                        <input type="text" name="" class="input summeryfild">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-row">
                        <label class="lebel-abs">
                          Your Name 
                          <strong class="red">
                            *
                          </strong>
                        </label>
                        <textarea class="input textareafild" name="" rows="7" >
                        </textarea>
                      </div>
                      <div class="form-row">
                        <input type="submit" value="Submit" class="button">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
          <div id="productsDetails" class="hot-products">
            <h3 class="title">
              Sản Phẩm Liên Quan
            </h3>
            <div class="control">
              <a id="prev_hot" class="prev" href="#">
                &lt;
              </a>
              <a id="next_hot" class="next" href="#">
                &gt;
              </a>
            </div>
            <ul id="hot">
              <li>
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <div class="products">
                      <div class="offer">
                        - %20
                      </div>
                      <div class="thumbnail">
                        <img src="{{ asset("asset/client/images/products/small/products-01.png") }}" alt="Product Name">
                      </div>
                      <div class="productname">
                        Iphone 5s Gold 32 Gb 2013
                      </div>
                      <h4 class="price">
                        $451.00
                      </h4>
                      <div class="button_group">
                        <button class="button add-cart" type="button">
                          Add To Cart
                        </button>
                        <button class="button compare" type="button">
                          <i class="fa fa-exchange">
                          </i>
                        </button>
                        <button class="button wishlist" type="button">
                          <i class="fa fa-heart-o">
                          </i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="clearfix">
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>
</div>
@vite(['resources/client/js/product-detail.js', 'resources/client/css/product-detail.css'])
@endsection