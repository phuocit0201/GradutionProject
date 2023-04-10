@extends('layouts.client')
@section('content-client')
<style>
  .a-hover:hover{
    color:black !important;
  }
</style>
<div class="container_fullwidth">
    <div class="container shopping-cart">
      <div class="row">
        <div class="col-md-12">
          <h3 class="title">
            Lịch Sử Mua Hàng
          </h3>
          <div class="clearfix">
          </div>
          <table class="table table-bordered table-cart">
            <thead>
              <tr>
                <th scope="col" class="text-center">Mã ĐH</th>
                <th scope="col" class="text-center">Tổng Tiền</th>
                <th scope="col" class="text-center">Ngày Đặt Hàng</th>
                <th scope="col" class="text-center">Phương Thức TT</th>
                <th scope="col" class="text-center">Trạng Thái Đơn</th>
                <th scope="col" class="text-center">Ghi chú</th>
                <th scope="col" class="text-center">Thao Tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orderHistorys as $orderHistory)
                <tr>
                  <td>{{ $orderHistory->id }}</td>
                  <td>{{ format_number_to_money($orderHistory->total_money) }}</td>
                  <td>{{ $orderHistory->created_at }}</td>
                  <td>{{ $orderHistory->payment_name }}</td>
                  <td>
                    @if ($orderHistory->order_status == 0)
                        <span class="badge badge-warning">Chờ xử lý</span>
                    @elseif($orderHistory->order_status == 1)
                        <span class="badge badge-info">Đang giao hàng</span>
                    @elseif($orderHistory->order_status == 2)
                        <span class="badge badge-danger">Đã hủy</span>
                    @elseif($orderHistory->order_status == 3)
                        <span class="badge badge-success">Đã nhận hàng</span>
                    @endif
                  </td>
                  <td>{{ $orderHistory->note }}</td>
                  <td>
                    <div style="padding: 8px; display: flex; justify-content: start;">
                      <a class="btn-a" href="{{ route('order_history.show', $orderHistory->id) }}">Chi tiết</a>
                      @if ($orderHistory->order_status == 0)
                        <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Hủy Đơn</a>
                      @elseif($orderHistory->order_status == 1)
                        <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xác Nhận</a>
                      @elseif($orderHistory->order_status == 2)
                        <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Đặt Lại</a>
                      @elseif($orderHistory->order_status == 3)
                        <a class="btn-a" style="margin-left: 20px;" href="{{ route('order_history.update', $orderHistory->id) }}">Xóa Đơn</a>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>
</div>
@vite(['resources/client/css/cart.css'])
@endsection