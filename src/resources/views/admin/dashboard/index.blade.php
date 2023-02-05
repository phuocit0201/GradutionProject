@extends('layouts.admin')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
           <x-box-dashboard data="100000000" title="Tổng Doanh Thu" route="doanhthu" boxtype="warning"/>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <x-box-dashboard data="1111" title="Tổng Đơn Hàng" route="donhang" boxtype="success"/>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <x-box-dashboard data="10000" title="Tổng Sản Phẩm" route="sanpham" boxtype="info"/>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <x-box-dashboard data="50000000" title="Tổng Lợi Nhuận" route="loinhuan" boxtype="danger"/>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <x-box-dashboard data="3000" title="Tổng Sản Phẩm Tồn Kho" route="tonkho" boxtype="primary"/>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <x-box-dashboard data="5000" title="Tổng Khách Hàng" route="khachhang" boxtype="warning"/>
          </div>
          <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Doanh số 10 sản phẩm bán chạy nhất</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
             <!-- STACKED BAR CHART -->
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Doanh Thu Tháng Này</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @vite(['resources/admin/js/dashboard.js'])
@endsection
