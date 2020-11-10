@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::TO ('/') }}">Trang Chủ</a></li>
              <li class="active">Giỏ Hàng Của Bạn</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

            <?php
               $content = Cart::content();    
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình Ảnh</td>
                        <td class="description">Mô Tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số Lượng</td>
                        <td class="total">Tổng Tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $item_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{('public/uploads/product/'.$item_content->options->image)}}" width="50" height="70" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $item_content->name }}</a></h4>
                            <p>ID sản phẩm: {{ $item_content->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($item_content->price)}} VND</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{ URL::To('/update-cart-quantity') }}" method="post">
                                    {{ csrf_field() }}
                                    <input name="rowId_hidden" type="hidden" value="{{ $item_content->rowId }}" >
                                    <input class="cart_quantity_input" type="text" name="quantity" min="1" value="{{ $item_content->qty }}" autocomplete="off" size="2">
                                    <button name="update_bt" type="submit" class=" cart_quantity_input "> Cập Nhật </button>
                                </form>
                            </div>
                        </td>   
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                    $subtotal=$item_content->qty*$item_content->price;
                                    echo number_format($subtotal).' VND';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ URL::TO('/delete-cart/'.$item_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach                                     
                </tbody>
            </table>
        </div>
    </div>
</section> 
<section id="do_action">
    <div class="container">
        
        <div class="row">
           
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng : <span>{{ Cart::subtotal()}} VND</span></li>
                        <li>Thuế: <span>{{ Cart::tax()}} VND</span></li>
                        <li>Phí Vận Chuyển:<span>Free</span></li>
                        <li>Thành Tiền: <span>{{ Cart::total()}} VND</span></li>
                    </ul>
                    <?php
                        $customer_id=Session::get('customer_id');
                        $shipping_id=Session::get('shipping_id');
                        if($customer_id!=null && $shipping_id==null){
                    ?>	
                        <a class="btn btn-default check_out" href="{{ URL::TO('/show-checkout') }}">Thanh Toán</a>
                    <?php
                        }elseif($customer_id!=null && $shipping_id!=null) {
                    ?>
                        <a class="btn btn-default check_out" href="{{ URL::TO('/payment') }}">Thanh Toán</a>
                    <?php
						}else{
					?>	
						 <a class="btn btn-default check_out" href="{{ URL::TO('/login-checkout') }}">Thanh Toán</a>
					<?php
						}
					?>
                        
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection