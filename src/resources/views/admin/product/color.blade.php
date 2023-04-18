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
						@foreach ($productColors as $productColor)
							<div class="col-12">
								<form class="form-edit" url-store="{{ route('admin.products_color_store', $product->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="card-body container-fluid">
										<div class="card card-default">
											<!-- /.card-header -->
											<div class="card-body" >
												<div class="row item-color">
													<!-- /.col -->
													<div class="col-sm-12">
														<div class="form-group">
															<x-admin-input-prepend label="Màu" width="auto">
																<select class="form-control" name="color_id" id="color_id" @disabled(true)>
																	@foreach ($colors as $color)
																			<option value="{{ $color->id }}" @if ($color->id == $productColor->color_id) @selected(true) @endif>{{ $color->name }}</option>
																	@endforeach
																</select>
															</x-admin-input-prepend>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<div class="preview">
																<img id="img-preview" style="width: 60px" src="{{ asset("asset/client/images/products/small/$productColor->img") }}" />
																<label for="file-input" id="lable-img">Chọn Hình Ảnh</label>
																<input @disabled(true) class="img-color" hidden accept="image/*" type="file" id="file-input" name="img"/>
															</div>
														</div>
													</div>
													<!-- /.col -->
													<div class="col-sm-12 text-center">
														<div class="form-group">
															<button class="btn btn-primary">
																<i class="fas fa-save"></i> Chỉnh Sửa
															</button>
														</div>
													</div>
												</div>
												<!-- /.row -->
											</div>
										</div>    
									</div>
								</form>
							</div>
						@endforeach
						<div class="col-12 hidden" id="box-color">
							<form class="form-submit" url-store="{{ route('admin.products_color_store', $product->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
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
															<select class="form-control" name="color_id" id="color_id">
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
															<input class="img-color" hidden accept="image/*" type="file" id="file-input" name="img"/>
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