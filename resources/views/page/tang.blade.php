@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<li><a href="{{route('loaisanpham','1')}}">sách</a></li>
							<li><a href="{{route('loaisanpham','2')}}">Đồ dùng học tập</a></li>
							<li><a href="{{route('loaisanpham','3')}}">Đồ điện tử</a></li>
							<li><a href="{{route('loaisanpham','4')}}">Phương tiện đi lại</a></li>
							<li><a href="{{route('loaisanpham','5')}}">Vật nuôi- thú cưng </a></li>
							<li><a href="{{route('loaisanpham','6')}}">Trang phục,phụ kiện</a></li>
							<li><a href="{{route('loaisanpham','7')}}">Vật dụng trong nhà</a></li>
							
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">tìm thấy {{count($sanpham_hientang)}}</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
					@foreach($sanpham_hientang as $new)
					<div class="col-sm-3">
								<article class="thumbnail h__thumbnail item">
									<div class="single-item">


										<div class="single-item-header">
											<a style="cursor: pointer; text-decoration: none;" class="image" href="{{route('chitietsanpham',$new->id)}}">
												<img src="source/image/product/{{$new->image}}" alt=""height="250px" width="250px"/>
											</a>
										</div>

										<a class="media" href="{{route('chitietsanpham',$new->id)}}" style="cursor: pointer; text-decoration: none;">
											<div class="media-left">
												<img class="media-object img-circle" ng-src="http://graph.facebook.com/1897187680569543/picture?type=large" src="http://graph.facebook.com/1897187680569543/picture?type=large">
											</div>
											<div class="media-body">
												<h4 class="media-heading ng-binding" title="{{$new->full_name}}">{{$new->full_name}}</h4>
												<p title="{{$new->address}}" class="ng-binding">{{$new->address}}</p>
											</div>
										</a>

										<a class="caption" href="{{route('chitietsanpham',$new->id)}}" style="cursor: pointer; text-decoration: none;">
											<h3 title="{{$new->name}}" class="ng-binding">{{$new->name}}</h3>
											<h4 class="h__detail__gia ng-binding" >Giá: {{$new->unit_price}} 000.VNĐ</h4>
											<h4 class="h__detail__gia ng-binding" typesell="">Trạng thái : {{$new->state}}</h4>
										</a>
									</div>
								</article>


							</div>
					@endforeach

				</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
	@endsection
