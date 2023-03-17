@extends('layouts.admin')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table-crud" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Mã</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Hình Ảnh</th>
                      <th>Số Lượng</th>
                      <th>Màu</th>
                      <th>Trạng Thái</th>
                      <th>Thao Tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Áo Thun</td>
                      <td class="img">
                        <img src="https://images2.thanhnien.vn/Uploaded/minhnguyet/2021_11_11/trieu-lo-tu-217.jpg" alt="">
                      </td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                    </tr>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
    <!-- /.container-fluid -->
</section>
@vite(
    [
        'resources/admin/js/table-data.js',
        'resources/admin/js/toast-message.js',
        'resources/admin/css/product.css',
    ])
@endsection