@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
	<div class="fb-like" data-href="http://localhost/phanvietcode/shopbanhanglaravel/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
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
@endsection