@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
	<img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
	<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
	<h2 class="title text-center">Kết Quả Tìm Kiếm</h2>
		@foreach ($search_product as $item_product)
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="productinfo text-center">
						<form>
							{{ csrf_field() }}
							<input type="hidden" value="{{$item_product->product_id}}" class="cart_product_id_{{$item_product->product_id}}">
							<input type="hidden" value="{{$item_product->product_name}}" class="cart_product_name_{{$item_product->product_id}}">
							<input type="hidden" value="{{$item_product->product_image}}" class="cart_product_image_{{$item_product->product_id}}">
							<input type="hidden" value="{{$item_product->product_price}}" class="cart_product_price_{{$item_product->product_id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$item_product->product_id}}">
							<a href="{{ URL::TO('/chi-tiet-san-pham/'.$item_product->product_id)}}"><img src="{{('public/uploads/product/'.$item_product->product_image)}}" alt="" /></a>
							<h2>{{ number_format($item_product->product_price) }} VND</h2>
							<p>{{ $item_product->product_name }}</p>
							{{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a> --}}
							<button type="button" data-id_product="{{$item_product->product_id}}" class="btn btn-default add-to-cart" name="add-to-cart" >Thêm Vào Giỏ Hàng</button>
						</form>
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
@endsection
