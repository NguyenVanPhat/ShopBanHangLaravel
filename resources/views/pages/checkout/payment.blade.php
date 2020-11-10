@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::TO('/') }}">Trang Chủ</a></li>
              <li class="active">Payment</li>
            </ol>
        </div><!--/breadcrums-->               
        <div class="review-payment">
            <h2>Xem Lại Giỏ Hàng</h2>
        </div>
        
        <?php
             $content = Cart::content();    
        ?>
        <div class="table-responsive cart_info">
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
        <div class="review-payment">
            <h2 style="text-align: center;margin-bottom: 40px;">Chọn Hình Thức Thanh Toán</h2>
        </div>
        <form action="{{ URL::TO('/order-place') }}" method="post">
            {{ csrf_field() }}
            <div class="payment-options">
                    <span>
                        <label><input name="payment_option" value="1" type="checkbox"> Trản Bằng Thẻ ATM</label>
                    </span>
                    <span>
                        <label><input name="payment_option" value="2"  type="checkbox"> Nhận Tiền Mặt</label>
                    </span>
                    <span>
                        <label><input name="payment_option" value="3"  type="checkbox"> Paypal</label>
                    </span>
                    
            </div> 
            <div><input style="width: 82px;" type="submit" value="Đặt Hàng " name="search_bt_home"  class="btn btn-primary w-50 btn-sm  "> </div> 
            
        </form>        
    </div>
        
</section> <!--/#cart_items-->
@endsection