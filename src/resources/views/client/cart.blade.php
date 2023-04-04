@extends('layouts.client')
@section('content-client')
<style>
  .input-address{
    height: 30px !important;
  }
  .fa-times-circle{
    font-size: 24px;
  }
  .table-cart{
    border-collapse: separate !important;
  }
  .table-cart  tr td{
    vertical-align: middle !important;
    text-align: center !important;
  }
</style>
<div class="container_fullwidth">
    <div class="container shopping-cart">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title">
            Giỏ Hàng
          </h3>
          <div class="clearfix">
          </div>
          <table class="table table-bordered table-cart">
            <thead>
              <tr>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Chi Tiết</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Thành Tiền</th>
                <th scope="col">Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($carts as $cart)
                <form action="{{ route('cart.update') }}" method="post">
                  @csrf
                  <tr>
                    <td>
                      <img style="max-height: 130px;" src="{{ asset("asset/client/images/products/small/" . $cart->attributes->image . "") }}" alt="">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                            {{ $cart->name }}
                        </div>
                        <p>
                            Màu sản phẩm : 
                            <strong>
                                {{ $cart->attributes->color }}
                            </strong>
                        </p>
                        <p>
                            Kích thước sản phẩm
                            <strong>
                                {{ $cart->attributes->size }}
                            </strong>
                        </p>
                      </div>
                    </td>
                    <td>
                      <h5>
                      {{ format_number_to_money($cart->price) }}
                      </h5>
                    </td>
                    <td>
                        <input type="text" value="{{ $cart->id }}" hidden name="id">
                        <input name="quantity" type="number" min="1" style="width:70px;" value="{{ $cart->quantity }}">
                    </td>
                    <td>
                        <h5>
                            {{ format_number_to_money($cart->price * $cart->quantity) }}
                        </h5>
                    </td>
                    <td>
                      <div style="display: flex; align-items: center; height: 100%; justify-content: center;">
                        <button style="padding: 5px 20px;">Cập Nhật</button>
                        <a style="margin-left: 20px;" href="{{ route('cart.delete', $cart->id) }}">
                          <i class="fas fa-times-circle"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                </form>
              @endforeach
            </tbody>
          </table>
          <div class="clearfix">
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-6">
              <div class="shippingbox">
                <div class="subtotal">
                  <div class="grandtotal">
                    <h5>
                      Tổng tiền sản phẩm
                    </h5>
                    <span>
                      {{ format_number_to_money(Cart::getTotal()) }} VNĐ
                    </span>
                  </div>
                  <div class="grandtotal">
                    <h5>
                      Tổng số lượng sản phẩm
                    </h5>
                    <span>
                      {{ Cart::getTotalQuantity() }}
                    </span>
                  </div>
                  <div class="text-center">
                    <button>
                      Thanh Toán
                    </button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="our-brand">
        <h3 class="title">
          <strong>
            Our 
          </strong>
          Brands
        </h3>
        <div class="control">
          <a id="prev_brand" class="prev" href="#">
            &lt;
          </a>
          <a id="next_brand" class="next" href="#">
            &gt;
          </a>
        </div>
        <ul id="braldLogo">
          <li>
            <ul class="brand_item">
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/envato.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/themeforest.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/photodune.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/activeden.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/envato.png" alt="">
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <ul class="brand_item">
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/envato.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/themeforest.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/photodune.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/activeden.png" alt="">
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="brand-logo">
                    <img src="images/envato.png" alt="">
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</div>
@endsection