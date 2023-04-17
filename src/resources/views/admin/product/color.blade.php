@extends('layouts.admin')
@section('content')
<style>
	.hidden{
		display: none;
	}
</style>
<section class="content">
  <div class="container-fluid">
    <div class="row">
			<div class="col-sm-12">
				<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item"><a href="#">Sản Phẩm</a></li>
						<li class="breadcrumb-item active">Màu Sản Phẩm</li>
						<li class="breadcrumb-item"><a href="#">Kích Thước Sản Phẩm</a></li>
				</ol>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="card card-default">
					<div class="card-header">
						<h3 class="card-title">Thông tin màu sản phẩm</h3>
					</div>
					<!-- /.card-header -->
					<div class="row" id="container-color">
						<div class="col-12 hidden" id="box-color">
							<form action="" method="post">
								<div class="card-body container-fluid">
									<div class="card card-default">
										<div class="card-header">
											<div class="card-tools">
												<button type="button" class="btn btn-tool close-color">
													<i class="fas fa-times"></i>
												</button>
											</div>
										</div>
										<!-- /.card-header -->
										<div class="card-body" >
											<div class="row item-color">
												<!-- /.col -->
												<div class="col-sm-12">
													<div class="form-group">
														<x-admin-input-prepend label="Màu" width="auto">
															<select class="form-control" name="brand_id" id="brand">
																@foreach ($colors as $color)
																		<option value="{{ $color->id }}">{{ $color->name }}</option>
																@endforeach
															</select>
														</x-admin-input-prepend>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<div class="preview">
															<img id="img-preview" style="width: 60px" src="" />
															<label for="file-input" id="lable-img">Chọn Hình Ảnh</label>
															<input class="img-color" hidden accept="image/*" type="file" id="file-input" name="avatar"/>
														</div>
													</div>
												</div>
												<!-- /.col -->
												<div class="col-sm-12 text-center">
													<div class="form-group">
														<button class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
													</div>
												</div>
											</div>
											<!-- /.row -->
										</div>
									</div>    
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="card-body container-fluid">
							<div class="card card-default">
								<button id="add-new-color" class="btn btn-success">
									<i class="fas fa-plus"></i> Thêm
								</button>
							</div>
						</div>
					</div>
				</div>
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