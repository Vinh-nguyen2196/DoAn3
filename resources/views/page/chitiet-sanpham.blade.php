	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản Phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<h3 class="h__detail__gia ng-binding" style="color:black !important">{{$sanpham->name}}</h3>
								<p class="single-item-price">
									<h4 class="h__detail__gia ng-binding" >Giá: {{$sanpham->unit_price}} 000.VNĐ</h4>
									<h4 class="h__detail__gia ng-binding" typesell="">Trạng thái : {{$sanpham->state}}</h4>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<h6>{{$sanpham->description}}</h6>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					
					<div id="chat-box" class="col-md-12" style="margin:20px 5px;">
						<div class="detail__comment">
							<h3>Bình luận</h3>
							<!-- phần này là để hiển thị nơi nhập comment  -->
							<div class="media detail__comment-box">
								<div class="col-md-1">
									<img class="img-circle img-avatar" src="https://www.gettyimages.com/gi-resources/images/CreativeLandingPage/HP_Sept_24_2018/CR3_GettyImages-159018836.jpg">
								</div>
								<div class="col-md-10">
									<input id="comment" onkeyup="handleOnKeyUp(event)" type="text" class="form form-control" name="" placeholder="comment...">
								</div>
							</div>

							<!-- phần này là để hiển thị các comment đã có -->
							<div class="media detail__comment-box">
								<div class="col-md-1">
									<img class="img-circle img-avatar" src="https://www.gettyimages.com/gi-resources/images/CreativeLandingPage/HP_Sept_24_2018/CR3_GettyImages-159018836.jpg">
								</div>
								<div class="col-md-10">
									<div class="media-heading">
										<a href="" class="username ng-binding" style="cursor: pointer; text-decoration: none;">vinhnguyen</a> 
										<br>
										<span name="eqweqweqw" ></span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Bài viết hôm nay</h3>
						<div class="widget-body">
							@foreach($new_product as $new)
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""height="250px" width="250px"></a>
									<div class="single-item-body">
										<p class="single-item-title"><h8 style="font-family: Time New Roman">{{$new->name}}</h8></p>

										<p class="single-item-price">

											@if ($new->unit_price != 0)


											<span><font>{{$new->unit_price}} 000.VNĐ</font></span>


											@else<span style="font-family: Time New Roman">->{{$new->state}}</span>
											@endif
										</p>

									</div>
								</div>

							</div>
							@endforeach
						</div>
					</div> <!-- best sellers widget -->

					<div class="widget">
						<h3 class="widget-title">Bài Viết Nổi Bật</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>

							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div> <!-- .beta-products-list -->
			</div>
		</div>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.709625950539!2d105.84370131540312!3d21.004273786011744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac768ffe1abd%3A0x22b136bcf1c08e2a!2zQsOhY2ggS2hvYSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1547217025606" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		<div class="space50">&nbsp;</div>
		<div class="beta-products-list">
			<h4>Bài Viết Mới</h4>

			<div class="row">
				@foreach($new_product as $new)
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
		</div>

	</div>

	<!-- #content -->

	<script type="text/javascript" >
		function handleOnKeyUp(event){
			var x = event.which || event.keyCode;
			console.log(x);
			if(x === 13){
				let text = document.getElementById("comment").value;
				console.log(text);
				let data2 = "<h1>hahahaa</h1>";
				let data = "<div class=\"media detail__comment-box\">"+
				"<div class=\"col-md-1\">"+
				"<img class=\"img-circle img-avatar\" src=\"https://www.gettyimages.com/gi-resources/images/CreativeLandingPage/HP_Sept_24_2018/CR3_GettyImages-159018836.jpg\">"+
				"</div>"+
				"<div class=\"col-md-10\">"+
				"<div class=\"media-heading\">"+
				"<a  class=\"username ng-binding\" style=\"cursor: pointer; text-decoration: none;\">vinhnguyen</a> "+
				"<br>"+
				"<span >"+text+"</span>"+
				"</div>"+
				"</div>"+
				"</div>";

				document.getElementById('chat-box').innerHTML += data;			
			}

		}
	</script>
	@endsection
