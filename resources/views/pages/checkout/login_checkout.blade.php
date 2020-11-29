
@extends('layout')
@section('content')
<img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng Nhập Tài Khoản</h2>
                    <form action="{{ URL::TO('/login-customer') }}" method="POST">
                        {{ csrf_field() }}  
                        <input name="custumer_email" type="text" placeholder="Tài Khoản " />
                        <input name="custumer_password" type="password" placeholder="Mật Khẩu " />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Nhớ Đăng Nhập !
                        </span>
                        <button type="submit" class="btn btn-default">Đăng Nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng Ký</h2>
                    <form action="{{ URL::To('/add-customer') }}" method="post">
                        {{ csrf_field() }}
                        <input name="customer_name" type="text" placeholder="Họ và Tên"/>
                        <input name="customer_email" type="email" placeholder="Địa Chỉ Email"/>
                        <input name="customer_password" type="password" placeholder="Mật Khẩu"/>
                        <input name="customer_phone" type="text" placeholder="Số Điện Thoại"/>
                        <button  type="submit" class="btn btn-default">Đăng Ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection