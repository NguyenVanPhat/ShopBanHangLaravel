





@extends('layout')
@section('content2')
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>
					
					<div class="carousel-inner">
						@php 
						$i = 0;
					@endphp
					@foreach($slider as $key => $slide)
						@php 
							$i++;
						@endphp
						<div class="item {{$i==1 ? 'active' : '' }}">
						   
							<div class="col-sm-12">
								<img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}"  class="img img-responsive">
							   
							</div>
						</div>
					@endforeach  							
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->
@endsection

@section('content')
<img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
<div class="features_items"><!--features_items-->
	
	{{-- <div class="fb-share-button" data-href="http://localhost/phanvietcode/shopbanhanglaravel/" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fphanvietcode%2Fshopbanhanglaravel%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> --}}
	<h2 class="title text-center">Sản Phẩm Mới</h2>
		@foreach ($product as $item_product)
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
							<div class="productinfo text-center">
								<form>
									{{ csrf_field() }}
									<input type="hidden" value="{{$item_product->product_id}}" class="cart_product_id_{{$item_product->product_id}}">
									<input type="hidden" value="{{$item_product->product_name}}" class="cart_product_name_{{$item_product->product_id}}">
									<input type="hidden" value="{{$item_product->product_image}}" class="cart_product_image_{{$item_product->product_id}}">
									<input type="hidden" value="{{$item_product->product_price}}" class="cart_product_price_{{$item_product->product_id}}">
									<input type="hidden" value="1" class="cart_product_qty_{{$item_product->product_id}}">
									<a href="{{ URL::TO('/chi-tiet-san-pham/'.$item_product->product_id)}}"><img height="250" src="{{('public/uploads/product/'.$item_product->product_image)}}" alt="" /></a>
									<h2>{{ number_format($item_product->product_price) }} VND</h2>
									<p>{{ $item_product->product_name }}</p>
									{{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a> --}}
									<button type="button" data-id_product="{{$item_product->product_id}}" class="btn btn-default add-to-cart" name="add-to-cart" >Thêm Vào Giỏ Hàng</button>
								</form>
							</div>			
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Thêm Yêu Thích</a></li>
							<li><a href="#"><i class="fa fa-plus-square"></i>Thêm So Sánh</a></li>
						</ul>
					</div>
				</div>
			</div>
		@endforeach																								
</div><!--features_items-->
<div class="row ">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<ul class="pagination pagination-sm m-t-none m-b-none">
				{!!$product->links()!!}
			</ul>
		</div>
		<div class="col-md-4"></div>
</div>
@endsection