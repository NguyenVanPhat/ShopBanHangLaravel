@extends('layout')
@section('content')
<img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
	<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
<section id="cart_items">
    <div class="">
        <h3 class="text-center"> Xem Giỏ Hàng </h3>
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
                                    <input style="width:50px;" class=" cart_quantity_input" type="number" name="cart_qty[{{$item_cart['session_id']}}]" min="1" min="10" value="{{ $item_cart['product_qty'] }}" autocomplete="off" size="2">                                                                 
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
        <div class="container">      
            <div class="row">
            
                <div class="col-sm-6">
                    <h4 class="text-center">Chi Phí Đơn Hàng</h4>
                    <div class="total_area">
                        <ul>
                            <li>Tổng :  <span>{{ number_format($sub_total )}} VND</span></li>
                            <li>Thuế: <span> VND</span></li>                              
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition']==1)
                                    <li>Mã giảm : <span>{{$cou['coupon_money']}} %</span></li>																					
                                        @php 
                                            $total_coupon = ($sub_total*$cou['coupon_money'])/100;
                                            echo '<li>Tổng giảm: <span> '.number_format($total_coupon,0,',','.').' VND <span></li>';
                                        @endphp
                                    <li>Thành Tiền :<span>{{number_format($sub_total-$total_coupon,0,',','.')}} VND</span></li>
                                    @elseif($cou['coupon_condition']==2)
                                    <li>Mã giảm Tiền Mặt :<span> {{number_format($cou['coupon_money'],0,',','.')}} VND</span></li>	                                                                             
                                        @php 
                                            $total_coupon = $sub_total  - $cou['coupon_money'];                           
                                        @endphp                                  
                                        <p><li>Tổng đã giảm :<span>{{number_format($total_coupon,0,',','.')}} VND</span></li></p>
                                    @endif
                                @endforeach							
                            @else                          
                            <p><li>Thành Tiền :<span>{{number_format($sub_total,0,',','.')}} VND</span></li></p>                        
                            @endif
                        </ul>                       
                            {{-- <form action="{{ URL::TO('/check-coupon') }} " method="post">
                                {{ csrf_field() }}
                                <input name="coupon" style="border: 2px solid red;background:white;" class="btn check_out" type="text"  placeholder="Mã Giảm Giá !">           
                                <button type="submit" class="btn btn-default check_out" href="">Tính Mã Giảm Giá</button>	
                            </form>                 --}}
                          
                                <form method="POST" action="{{url('/check-coupon')}}">
                                    @csrf
                                    <input style="background: darkgray;color: white;" name="coupon" class="btn btn-default check_out" type="text" placeholder="Nhập Mã Giảm Giá" size="30">
                                    <input type="submit" class="btn btn-default check_out" name="check_coupon" value="Tính mã giảm giá"></input>                                    
                                 </form>
                                                           
                            <?php
                                $customer_id=Session::get('customer_id');
                                $shipping_id=Session::get('shipping_id');
                                if($customer_id==null){
                            ?>	
                                
                                <a class="btn btn-default check_out" href="{{ URL::TO('/login-checkout') }}">Thanh Toán</a>
                            <?php
                                }else {
                            ?>
                                <a class="btn btn-default check_out" href="{{ URL::TO('/show-checkout') }}">Thanh Toán</a>
                            <?php
                                }
                            ?>
                                                                
                   
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
</section> 
@endsection