@extends('layout')
@section('content')
<img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
    <input type="hidden" id="tongtien" value="{{(int)Session::get('total_money') }}">
    <h3 class="text-center "> Tiếp Tục Thanh Toán Bằng Paypal </h3>
    <div id="paypal-button-container"></div>

    
@endsection
