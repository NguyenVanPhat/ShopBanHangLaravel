@extends('layout')
@section('content')
@foreach ($product as $item_product)
    

<div class="product-details">
    <img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
	<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
    <!--product-details-->
<style type="text/css">
    .lSSlideOuter .lSPager.lSGallery img {
    display: block;
     max-width: 100%;
    height: 80px;
}
</style>
    <div class="col-sm-5">
    <ul id="imageGallery">
        @foreach($gallery as $item_gal)
        <li data-thumb="{{asset('/public/uploads/gallery/'.$item_gal->gallery_image)}}" data-src="{{asset('/public/uploads/gallery/'.$item_gal->gallery_image)}}">
            <img  width="100%" src="{{asset('/public/uploads/gallery/'.$item_gal->gallery_image)}}" />
        </li>
       @endforeach
</ul>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h1>{{ $item_product->product_name }}</h1>
            {{-- <p>ID Sản Phẩm: {{ $item_product->product_id }}</p>
            <img src="{{URL::TO('public/frontend/images/rating.png')}}" alt="" /> --}}
            <form action="{{ URL::TO('/add-cart-ajax') }}" method="post">
                {{ csrf_field() }}
                <span>

                    <input type="hidden" value="{{$item_product->product_id}}" class="cart_product_id_{{$item_product->product_id}}">
                    <input type="hidden" value="{{$item_product->product_name}}" class="cart_product_name_{{$item_product->product_id}}">
                    <input type="hidden" value="{{$item_product->product_image}}" class="cart_product_image_{{$item_product->product_id}}">
                    <input type="hidden" value="{{$item_product->product_price}}" class="cart_product_price_{{$item_product->product_id}}">
                    <input type="hidden" value="1" class="cart_product_qty_{{$item_product->product_id}}">

                    <span>{{number_format($item_product->product_price)}} VND</span>
                    <label>Quantity:</label>
                    <input class="cart_product_qty_{{$item_product->product_id}}" min="1" type="number" value="1" />
                    <input name="product_id_hidden" min="1" type="hidden" value="{{ $item_product->product_id }}" />
                    <button type="button" data-id_product="{{$item_product->product_id}}" class="btn btn-default add-to-cart" name="add-to-cart" >Thêm Vào Giỏ Hàng</button>
                </span>
            </form>

            <p><b>Tình Trạng:</b> Còn Hàng</p>
            <p><b>Điều Kiện:</b> Mới</p>
            <p><b>Thương hiệu:</b> {{ $item_product->brand_name }}</p>
            <p><b>Danh Mục:</b> {{ $item_product->category_name }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Thông Số Kỹ Thuật </a></li>
            <li><a href="#companyprofile" data-toggle="tab">Nội Dung Sản Phẩm</a></li>
            <li ><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
        </ul>
    </div>
    <div class="tab-content ">
        <div class="tab-pane fade active in" id="details" >
            <p> {!!$item_product->product_desc!!} </p>
          
        </div> 
        <div class="tab-pane fade " id="companyprofile" >
            <p> {!!$item_product->product_content!!} </p>
          
        </div>                              
        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
                <div class="fb-comments" data-href="http://localhost/phanvietcode/shopbanhanglaravel/chi-tiet-san-pham/21" data-numposts="5" data-width=""></div>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->
@endforeach
{{-- <div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản Phẩm Liên Quan</h2>   
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($related_product as $item_related_product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::TO('public/uploads/product/'.$item_related_product->product_image) }}" alt="" />
                                    <h2>{{number_format($item_related_product->product_price) }}</h2>
                                    <p>{{ $item_related_product->product_name }}</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                @endforeach
                             
            </div>
            
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>			
    </div>
</div><!--/recommended_items--> --}}
@endsection