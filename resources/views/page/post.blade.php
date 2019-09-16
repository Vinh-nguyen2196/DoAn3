    @extends('master')
	@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Post</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('savePost')}}" method="post" class="beta-form-checkout" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				
				<div class="row">
					<div class="col-sm-3"></div>
					@if(Session::has('status'))
					@if(isset($error))
					@if(count($error)>1)
					<div class=alert alert-danger>
						@foreach($error->all() as $err)
						{{$err}}
						@endforeach
					</div>
					@endif
					@endif
					<h3 class="alert alert-sucess">{{Session::get('status')}}
						
					</h3>

					@endif



					<div class="col-sm-6">
						<h4>Đăng bài</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="nameproduct">Tên sản phẩm*</label>
							<input type="text" name="nameproduct" required>
						</div>
						@if($Productype != null)

						<div class="form-block">

							<label for="nameproduct" required>Loại sản phẩm*</label>
								<select name="theloai" >
								@foreach($Productype as $ProType)
								<option value="{{$ProType->id}}">{{$ProType->name}}</option>
								@endforeach

								</select>
						</div>
						@endif

						<div class="form-block">
							<label for="adress">Mô tả bài viết*</label>
							<TEXTAREA type="text" name="description" required height="250px">
								</TEXTAREA>
						</div>


						<div class="form-block">
							<label for="hinhanh">Hình ảnh*</label>
							
							  <input type="file" name="pic" id="pic" required>
							
							
						</div>
						
						<div class="form-block">
							<label for="state">Tình trạng*</label>
							<select name="state" class="form-control" required> 
								
								<option value="Cho thuê">cho thuê</option>
								<option value="Tặng">tặng</option>
								<option value="Trao đổi">Trao đổi</option>
								<option value="Mượn">Cho mượn</option>
								<option value="Thỏa thuận">Thỏa thuận</option>


								

								</select>

						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> 
	@endsection