@extends('layout')
@section('content')
<section id="cart_items">
    <img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
	<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ URL::TO('/') }}">Trang Chủ</a></li>
              <li class="active">Thanh Toán Giỏ Hàng</li>
            </ol>
        </div><!--/breadcrums-->          
        {{-- <div class="register-req">
            <p>Làm ơn đăng nhập hoặc đăng ký để xem lại lịch sử mua hàng !!!!!!</p>
        </div><!--/register-req--> --}}
        @if(Session::get('cart')==true)
        <div class="shopper-informations">
            <div class="row">              
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        
                        <div class="form-one">
                            <div class="position-center">
                                <form>
                                    @csrf                             
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                      <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    
                                            <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                      <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                            <option value="">--Chọn quận huyện--</option>
                                           
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                      <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">--Chọn xã phường--</option>   
                                    </select>
                                </div>                           
                                <input type="submit" value="Tính Phí Vận Chuyển" name="calculate_delivery"  class="btn btn-primary btn-sm calculate_delivery  "> 
                                </form>
                            </div>                                                     
                        </div>
                    </div>
                       
                </div>
                    
            </div>
                					
        </div>
        @endif
    </div>       
</section>
<section id="cart_items">
    <div class="">
        <h3 class="text-center"> Xem Lại Giỏ Hàng </h3>
        @if(Session::get('cart')==true)
        <div class="table-responsive cart_info">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif               
        <form action="{{ URL::To('/update-cart-ajax') }}" method="post"> 
            {{ csrf_field() }}   
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
                   
                    {{-- @foreach ($content as $item_content) --}}
                    @php
                        $sub_total=0;
                    @endphp
                    @foreach (Session::get('cart') as $item_cart)   
                    
                         <?php
                         
                            $total_price= $item_cart['product_price']*$item_cart['product_qty'];
                            $sub_total +=  $total_price;
                         ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ URL::TO('/public/uploads/product/'.$item_cart['product_image']) }}" width="80" height="70" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""></a></h4>
                            <p>{{ $item_cart['product_name'] }} </p>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($item_cart['product_price']) }} VND</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">                                                                                            
                                    <input name="rowId_hidden" type="hidden" value="">
                                    <input style="width:50px;" class=" cart_quantity_input" type="number" name="cart_qty[{{$item_cart['session_id']}}]" min="1" value="{{ $item_cart['product_qty'] }}" autocomplete="off" size="2">                                                                 
                            </div>
                        </td>   
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php                                   
                                     echo number_format($total_price,0,',',',')." VND" ;
                                ?>                             
                            </p>
                        </td>
                        <td class="cart_delete"> 
                            <a class="cart_quantity_delete" onclick="return confirm('Bạn Có Muốn Xóa sản Phẩm Này ?')" href="{{ URL::TO('/delete-sp/'.$item_cart['session_id']) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td> <button name="update_bt" type="submit" class=" cart_quantity_input btn btn-default  check_out "> Cập Nhật </button></td>
                        <td> <a class="cart_quantity_input btn btn-default  check_out" href="{{ URL::TO('/delete-all-cart') }}">Xóa Tất Cả Giỏ Hàng</a></td>

                    </tr>   
                                                 
                </tbody>
            </table>
        </form>
        </div>
    </div>
</section> 
    <section id="do_action">
        <div class="">      
            <div class="row">
            
                <div class="col-sm-6">
                    <h4 class="text-center">Chi Phí Đơn Hàng</h4>
                    <div class="total_area">
                        <ul>
                            <li>Tổng :  <span>{{ number_format($sub_total )}} VND</span></li>
                            <li>Thuế: <span> VND</span></li>
                            <li>Phí Vận Chuyển :<span>{{number_format(Session::get('fee'),0,',','.')}} VND <a class="" onclick="return confirm('Bạn Có Muốn Xóa sản Phẩm Này ?')" href="{{ URL::TO('/del-fee')}}"><i class="fa fa-times"></i></a></span></li>
                                <?php
                                   $fee= Session::get('fee');
                                ?>
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition']==1)
                                    <li>Mã giảm : <span>{{$cou['coupon_money']}} %</span></li>																					
                                        @php 
                                            $total_coupon = ($sub_total*$cou['coupon_money'])/100;
                                            echo '<li>Tổng giảm: <span> '.number_format($total_coupon,0,',','.').' VND <span></li>';
                                           
                                                Session::put('total_money',$total_coupon/22000);                                          
                                              
                                        @endphp
                                    <li>Thành Tiền :<span>{{number_format($sub_total+$fee-$total_coupon,0,',','.')}} VND</span></li>
                                    @elseif($cou['coupon_condition']==2)
                                    <li>Mã giảm Tiền Mặt : <span> {{number_format($cou['coupon_money'],0,',','.')}} VND</span></li>	                                                                             
                                        @php 
                                            $total_coupon = $sub_total + $fee - $cou['coupon_money'];                           
                                        @endphp                                  
                                        <p><li>Tổng đã giảm :<span>{{number_format($total_coupon,0,',','.')}} VND</span></li></p>
                                        <?php
                                            Session::put('total_money',$total_coupon/22000);                                          
                                        ?>
                                    @endif
                                @endforeach							
                            @else
                           
                            <p><li>Thành Tiền :<span>{{number_format($sub_total,0,',','.')}} VND</span></li></p> 
                            <?php
                                 Session::put('total_money',$sub_total/22000);                                          
                            ?>      
                            @endif
                        </ul> 
                            {{-- <form action="{{ URL::TO('/check-coupon') }} " method="post">
                                {{ csrf_field() }}
                                <input name="coupon" style="border: 2px solid red;background:white;" class="btn check_out" type="text"  placeholder="Mã Giảm Giá !">           
                                <button type="submit" class="btn btn-default check_out" href="">Tính Mã Giảm Giá</button>	
                            </form>                 --}}
                             
                           
                                                                
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="bill-to">
                        <p class="text-center">Điền Thông Tin Gửi Hàng</p>
                        <div class="form-one" style="width:100%;">
                            <form method="POST">
                                @csrf
                                <input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người gửi">
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ gửi hàng">
                                <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
                                <textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
                                
                                @if(Session::get('fee'))
                                    <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                @else 
                                    <input type="hidden" name="order_fee" class="order_fee" value="25000">
                                @endif

                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                                    @endforeach
                                @else 
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                @endif
                                <div class="">
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                          <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
                                                <option value="0">Qua Paypal</option>
                                                <option value="1">Nhận Tiền mặt</option>   
                                        </select>
                                    </div>
                                </div>                               
                                <input type="button" value="Đặt Hàng" name="send_order" class="btn btn-primary btn-sm send_order">
                            </form>
                           
                                                                               
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endif 
        <?php
            if(Session::get('cart')==false){
                echo '<div class="w-100 form form-inline">
                    <h1 class="text-center">Giỏ Hàng Rổng Xin Vui Lòng Quay Lại Trang Chủ </h1>      
                </div> ';
            }
        ?>      
</section> <!--/#cart_items-->
@endsection