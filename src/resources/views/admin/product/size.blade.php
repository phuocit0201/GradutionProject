@extends('layouts.admin')
@section('content')
<section class="content">
  <div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
						<li class="breadcrumb-item active"><a href="{{ $routeColor }}">Màu Sản Phẩm</a></li>
						<li class="breadcrumb-item">
							Kích Thước Sản Phẩm
						</li>
				</ol>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-header text-right">
						<button class="btn btn-success" data-toggle="modal" data-target="#modal-default">
							<i class="fas fa-plus"></i> Thêm Kích Thước
						</button>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						<table class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th>Mã KT</th>
									<th>Tên Kích Thước</th>
									<th>Số lượng</th>
									<th>Thao Tác</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
  <!-- /.container-fluid -->
</section>
@vite(
[
  'resources/admin/js/product-color.js',
  'resources/admin/css/product.css',
])
@endsection