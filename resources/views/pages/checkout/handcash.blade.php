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
            <h2>Cảm ơn bạn đã mua hàng của chúng tôi, chúng tôi sẽ liên hệ bạn sớm nhất !!!</h2>
        </div>          
    </div>       
</section> <!--/#cart_items-->
@endsection