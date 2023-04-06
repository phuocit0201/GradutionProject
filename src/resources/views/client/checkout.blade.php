@extends('layouts.client')
@section('content-client')
<style>
  .info-order{
    padding: 15px 30px;
  }
  .info__order-box{
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 600;
  }
  .discount{
    display: flex;
    padding-bottom: 20px;
    border-bottom: 2px solid rgba(135, 151, 174, 0.15);
  }

  .payment-method{
    border-top: 2px solid rgba(135, 151, 174, 0.15);
    font-size: 16px;
    font-weight: 600;
    padding-top: 20px; 
    padding-bottom: 10px;
  }
  
  .discount input{
    flex-grow: 1;
  }
  .discount div{
    padding-left: 20px;
  }
  .payment-method-select{
    border: 1px solid rgba(135, 151, 174, 0.15);
    border-radius: 5px;
    padding: 10px; 
    margin-bottom: 5px; 
    }
  .payment-method-select--check{
    display: flex;
    align-items: center;
    justify-content: space-between
  }
  .payment-method-select--check img{
    width: 30px;
  }
  .payment-method-select--check span{
    margin-top: 4px;
    margin-left: 10px;
  }
  #payment_method-error{
    font-size: 12px;
    font-weight: 400;
  }
</style>
<div class="container_fullwidth">
    <div class="container">
      <form action="{{ route('checkout.index') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-7">
            <ol class="checkout-steps">
              <li class="steps active">
                <h4 class="title-steps">
                  Thông Tin Cá Nhân
                </h4>
                <div class="step-description">
                  <div class="your-details row">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Họ Và Tên</label>
                      <input type="text" class="form-control" disabled value="{{ $fullName }}" id="name" name="name" placeholder="Nhập họ và tên">
                      @if ($errors->get('name'))
                        <span id="name-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('name')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="text" class="form-control" disabled value="{{ $email }}" id="email" name="email" placeholder="Nhập địa chỉ email">
                      @if ($errors->get('email'))
                        <span id="email-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('email')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Số điện thoại</label>
                      <input type="text" class="form-control" disabled value="{{ $phoneNumber }}" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại">
                      @if ($errors->get('phone_number'))
                        <span id="phone_number-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('phone_number')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tỉnh, Thành Phố</label>
                      <select class="form-control form-select" disabled id="city" name="city">
                        @foreach ($citys as $item)
                            <option value="{{ $item['ProvinceID'] }}"
                            @if ( $item['ProvinceID'] == $city)
                                selected
                            @endif
                            >{{ $item['NameExtension'][1] }}</option>
                        @endforeach
                      </select>
                      @if ($errors->get('city'))
                        <span id="city-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('city')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Quận, Huyện</label>
                      <select class="form-control form-select" id="district" disabled name="district">
                        @foreach ($districts as $item)
                            <option value="{{ $item['DistrictID'] }}"
                            @if ( $item['DistrictID'] == $district)
                                selected
                            @endif
                            >{{ $item['DistrictName'] }}</option>
                        @endforeach
                      </select>
                      @if ($errors->get('district'))
                        <span id="district-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('district')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phường Xã</label>
                      <select class="form-control form-select" id="ward" disabled name="ward">
                        @foreach ($wards as $item)
                            <option value="{{ $item['WardCode'] }}"
                            @if ( $item['WardCode'] == $ward)
                              selected
                            @endif
                            >{{ $item['WardName'] }}</option>
                        @endforeach
                      </select>
                      @if ($errors->get('ward'))
                        <span id="ward-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('ward')) }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa Chỉ Nhà</label>
                      <input type="text" class="form-control" disabled value="{{ $apartment_number}}" id="apartment_number" name="apartment_number" aria-describedby="emailHelp" placeholder="Nhập địa chỉ nhà">
                      @if ($errors->get('apartment_number'))
                        <span id="apartment_number-error" class="error invalid-feedback" style="display: block">
                          {{ implode(", ",$errors->get('apartment_number')) }}
                        </span>
                      @endif
                    </div>
                  </div>
                </div>
              </li>
            </ol>
          </div>
          <div class="col-md-5">
            <div>
                <ol class="checkout-steps">
                  <li class="steps active">
                    <h4 class="title-steps">
                      Thông Tin Đơn Hàng
                    </h4>
                    <div class="step-description">
                      <div class="your-details row">
                        <div class="info-order">
                          <div class="discount">
                              <input type="text" name="discount_code" placeholder="Nhập mã giảm giá nếu có">
                              <div>
                                <button>Áp dụng</button>
                              </div>
                          </div>
                        </div>
                        <div class="info-order">
                          <div class="info__order-box">
                            <span>Tổng tiền sản phẩm</span>
                            <span id="total-product">{{ format_number_to_money(Cart::getTotal()) }}</span>
                          </div>
                        </div>
                        <div class="info-order">
                          <div class="info__order-box">
                            <span>Phí vận chuyển</span>
                            <span id="fee">0</span>
                          </div>
                        </div>
                        <div class="info-order">
                          <div class="info__order-box">
                            <span>Áp dụng giảm giá</span>
                            <span>0</span>
                          </div>
                        </div>
                        <div class="info-order">
                          <div class="info__order-box">
                            <span>Tổng đơn hàng</span>
                            <input id="total-order-input" value="{{ Cart::getTotal() }}" type="text" hidden>
                            <span id="total-order">0</span>
                          </div>
                        </div>
                        <div class="info-order">
                          <div class="payment-method">
                            <span>Chọn phương thức thanh toán</span>
                            @if ($errors->get('payment_method'))
                              <span id="payment_method-error" class="error invalid-feedback" style="display: block">
                                {{ implode(", ",$errors->get('payment_method')) }}
                              </span>
                            @endif
                          </div>
                          <div class="payment-method-select">
                            <label for="momo" class="payment-method-select--check">
                              <div>
                                <input type="radio" value="1" name="payment_method" id="momo">
                                <span  class="label-momo">
                                  Thanh toán khi nhận hàng
                                </span>
                              </div>
                            </label>
                          </div>
                          <div class="payment-method-select">
                            <label for="receive" class="payment-method-select--check">
                              <div>
                                <input type="radio" value="2" name="payment_method" id="receive">
                                <span  class="label-momo">
                                  Ví điện tử momo
                                </span>
                              </div>
                              <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-MoMo-Square.png" alt="">
                            </label>
                          </div>
                          <div style="padding-top: 5px;" class="text-center">
                            <button>Thanh Toán Đơn Hàng</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ol>
            </div>
          </div>
        </div>
      </form>
      <div class="clearfix">
      </div>
    </div>
  </div>
@vite(['resources/client/js/checkout.js'])

@endsection