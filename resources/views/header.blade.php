<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Tân Dân-Phú Xuyên-Hà Nội</a></li>
						<li><a href=""><i class="fa fa-phone"></i>0982171667</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">

						@if(Auth::check())
						<li><a href="#"><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('logout')}}"><i class="fa fa-user"></i>Đăng xuất</a></li>
						<li><a href="{{route('addPost')}}"><i class="fa fa-user"></i>Đăng bài</a></li>
						@else
						<li><a href="{{route('sigin')}}">Đăng kí</a></li>
						<li><a href="{{route('login')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div>
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('trang-chu')}}" id="logo"><img src="source/assets/dest/images/logobk.png" width="500px" width="100px" alt=""></a>
				</div>   
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('search')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

				
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a href="{{route('trang-chu')}}">Loại Sản phẩm</a>
							<ul class="sub-menu">

								@foreach($loai as $l)
								<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
								@endforeach
								

							</ul>
						</li>
						<li><a href="{{route('tang')}}">Cho Tặng</a></li>
						<li><a href="{{route('thue')}}">Thuê lại</a></li>
						<li><a href="{{route('traodoi')}}">Trao đổi</a></li>
						<li><a href="{{route('muon')}}">Cho Mượn</a></li>
						<li><a href="{{route('thoathuan')}}">Thỏa Thuận</a></li>
						<li><a href="{{route('tang')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>