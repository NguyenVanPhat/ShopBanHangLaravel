<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	
	
	{{-- <meta property="og:image" content="{{$image_og}}" /> --}}
	<meta property="og:site_name" content="http://localhost/phanvietcode/shopbanhanglaravel/" />
	<meta property="og:description" content="Hồ Văn Nguyên" />
	<meta property="og:title" content="Hồ Văn Nguyên" />
	<meta property="og:url" content="Hồ Văn Nguyên" />
	<meta property="og:type" content="website" />

    <title>Home | PN-Shop</title>
	<link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">

	<link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
	<![endif]-->   
	
	
    <link rel="shortcut icon" href="{{asset('public/frontendimages/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
	
	<script
    	src="https://www.paypal.com/sdk/js?client-id=AR7k3SeD5tRpuiRAt3pUfVC_iPo5zgQxmLIhU4xdz46xlUEL8fuiR_1RrpKwG1O4hEUYSD2wDLKOM7LW"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
	
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0922 207 717</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> vannguyen2441999@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4"> 
						<div class="logo pull-left companyinfo" style="margin-top: 0px;" >					
							<h2><span>PN</span>-SHOP</h2>						
						</div>
						<div class="btn-group pull-right">
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div> --}}
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								{{-- <li><a href="{{ URL::TO('/login-checkout') }}"><i class="fa fa-user"></i> Tài Khoản</a></li> --}}
								{{-- <li><a href="#"><i class="fa fa-star"></i></a></li> --}}
								

								<li><a href="{{ URL::TO('/gio-hang') }}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>

								<?php
									$customer_id=Session::get('customer_id');
									if($customer_id!=null ){
								?>
										<li><a href="{{ URL::TO('/logout-checkout') }}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>
								<?php
									}else {
								?>
										<li><a href="{{ URL::TO('/login-checkout') }}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
								<?php
									}
								?>		
									
								
								

								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ URL::TO('/trang-chu') }}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#">Sản Phẩm<i class="fa fa-angle-down"></i></a>
									
										<ul role="menu" class="sub-menu">
											@foreach ($brand as $item_brand)
												<li><a href="{{URL::To('/thuong-hieu-san-pham/'.$item_brand->brand_id) }}">{{ $item_brand->brand_name}}</a></li>	
											@endforeach
										</ul>
								
                                    
                                </li> 
								<li class="dropdown"><a href="#">Tin Tức<i class="fa fa-angle-down"></i></a>
									
									<ul role="menu" class="sub-menu">
										@foreach ($cate_post as $item_cate_post)
											<li><a href="{{URL::To('/danh-muc-bai-viet/'.$item_cate_post->cate_post_id) }}">{{ $item_cate_post->cate_post_name}}</a></li>	
										@endforeach
									</ul>
							
								
							</li> 
								{{-- <li><a href="404.html">Giỏ Hàng</a></li>
								<li><a href="contact-us.html">Liên Hệ</a></li> --}}
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="search_box pull-right">
							<form action="{{ URL::TO('/tim-kiem-home') }}" method="POST" autocomplete="off">
								{{ csrf_field() }}
								<input id="keyword" name="keyword_home" type="text" placeholder="Tìm Kiếm Sản Phẩm"/>
								<input style="width: 82px;" type="submit" value="Tìm Kiếm " name="search_bt_home"  class="btn btn-success w-50 btn-sm  "> 
								<div id="search_ajax">

								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	
	@yield('content2')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh Mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->	
							@foreach ($category as $item_category)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::To('/danh-muc-san-pham/'.$item_category->category_id) }}">{{ $item_category->category_name }}</a></h4>
								</div>
							</div>
							@endforeach						
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu Sản Phẩm</h2>
							@foreach ($brand as $item_brand)
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="{{URL::To('/thuong-hieu-san-pham/'.$item_brand->brand_id) }}"> <span class="pull-right"></span>{{ $item_brand->brand_name }}</a></li>
							
								</ul>
							</div>
							@endforeach
							
						</div><!--/brands_products-->
						
						{{-- <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range--> --}}
						
						<div class="shipping text-center"><!--shipping-->
							
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					
					
					@yield('content')
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>PN</span>-SHOP</h2>							
							<p>Địa Chỉ:267F, Tô Ngọc Vân, Linh Đông, Thủ Đức, TPHCM</p>
							<p>SDT:0922207717</p>
							<p>Email:Vannguyen2441999@gamil.com</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="video-gallery text-center">
							<h4 style="margin: 0 0 10px 0;"> Đăng Ký Kênh YouTuBe </4>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/0YvVQ2I7uww" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						
						{{-- <div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div> --}}
					</div>
					<div class="col-sm-3">
						<div class="address">
							<h5> Thông Tin Chăm Sóc Mua Hàng</h5>
							<p>Địa Chỉ:267F, Tô Ngọc Vân, Linh Đông, Thủ Đức, TPHCM</p>
							<p>SDT:0922207717</p>
							<p>Email:Vannguyen2441999@gamil.com</p>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row text-center">
						<div class="fb-like" data-href="https://vannguyen.xyz/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
					</div>
				</div>
			</div>
		</div>
		
		{{-- <div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">

					</div>
					<div class="col-sm-7">
						<div class="fb-comments" data-href="http://localhost/phanvietcode/shopbanhanglaravel/" data-numposts="5" data-width=""></div>
					</div>
					
				</div>
			</div>
		</div> --}}
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 PN-SHOP Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="https://vannguyen.xyz/">PN SHOP</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
		
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
	<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
	<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>

	
	<!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  xfbml            : true,
		  version          : 'v9.0'
		});
	  };

	  (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Your Chat Plugin code -->
	<div class="fb-customerchat"
	  attribution=setup_tool
	  page_id="103672578193000"
theme_color="#ff7e29"
logged_in_greeting="Chào bạn ! Bạn có câu hỏi gì cần tư vấn không ?"
logged_out_greeting="Chào bạn ! Bạn có câu hỏi gì cần tư vấn không ?">
	</div>

	<!-- Your Chat Plugin code -->
	<div class="fb-customerchat"
	  attribution=setup_tool
	  page_id="103672578193000"
	theme_color="#ff7e29"
	logged_in_greeting="Chào bạn ! Bạn có câu hỏi gì cần tư vấn không ?"
	logged_out_greeting="Chào bạn ! Bạn có câu hỏi gì cần tư vấn không ?">
	</div>
	<script type="text/javascript">	
		$('#keyword').keyup(function(){
			var query=$(this).val();
			var _token=$('input[name="_token"]').val();
			if(query!=''){
				$.ajax({
					url:'{{ url('/autocomplete-ajax') }}',
					method:'post',
					data:{query:query,_token:_token},
					success:function(data){
						$('#search_ajax').fadeIn();
						$('#search_ajax').html(data);

					}
				});
			}
			else{
				$('#search_ajax').fadeOut();
			}
			$(document).on('click','.li_search_ajax',function(){
				$('#keyword').val($(this).text());
				$('#search_ajax').fadeOut();
			});

		});
	</script>
	<!-- ma chay slider galary  -->
	<script  type="text/javascript">
		$(document).ready(function() {
    		$('#imageGallery').lightSlider({
			gallery:true,
			item:1,
			loop:true,
			thumbItem:3,
			slideMargin:0,
			enableDrag: false,
			currentPagerPosition:'left',
				onSliderLoad: function(el) {
					el.lightGallery({
						selector: '#imageGallery .lslide'
					});
				}   
			});  
  		});
	</script>
	<script type="text/javascript">

		$(document).ready(function(){
		  $('.send_order').click(function(){
			  swal({
				title: "Xác nhận đơn hàng",
				text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Cảm ơn, Mua hàng",

				  cancelButtonText: "Đóng,chưa mua",
				  closeOnConfirm: false,
				  closeOnCancel: false
			  },
			  function(isConfirm){
				   if (isConfirm) {
					  var shipping_email = $('.shipping_email').val();
					  var shipping_name = $('.shipping_name').val();
					  var shipping_address = $('.shipping_address').val();
					  var shipping_phone = $('.shipping_phone').val();
					  var shipping_notes = $('.shipping_notes').val();
					  var shipping_method = $('.payment_select').val();
					  var order_fee = $('.order_fee').val();
					  var order_coupon = $('.order_coupon').val();
					  var _token = $('input[name="_token"]').val();

					  $.ajax({
						  url: '{{url('/confirm-order')}}',
						  method: 'POST',
						  data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
						  success:function(data){
							  if(data==0){
									window.location.href = "{{url('/paypal')}}";
							  }
							  else{
								swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
							  }
							 
						  }
					  });

					//   window.setTimeout(function(){ 
					// 	window.location.href = "{{url('/')}}";
					//   } ,2000);

					} else {
					  swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

					}
			
			  });

			 
		  });
	  });
  

  </script>
	<script type="text/javascript">
		 $(document).ready(function(){
            $('.add-to-cart').click(function(){
				var id=$(this).data('id_product');
				var cart_product_id=$('.cart_product_id_' + id).val();
				var cart_product_name=$('.cart_product_name_' + id).val();
				var cart_product_image=$('.cart_product_image_' + id).val();
				var cart_product_price=$('.cart_product_price_' + id).val();
				var cart_product_qty=$('.cart_product_qty_' + id).val();
				var _token = $('input[name="_token"]').val();
				
				$.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){

                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

                    }

                });				
            });
        });
	</script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });         
	</script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 
        });
    });
    </script>
	<script type="text/javascript">
		
		total= $('#tongtien').val();
		
		
		paypal.Buttons({
		  createOrder: function(data, actions) {
			// This function sets up the details of the transaction, including the amount and line item details.
			return actions.order.create({
			  purchase_units: [{
				amount: {
				  value: total
				}
			  }]
			});
		  },
		  onApprove: function(data, actions) {
			// This function captures the funds from the transaction.
			return actions.order.capture().then(function(details) {
			  // This function shows a transaction success message to your buyer.
				alert('Giao Dịch Thành Công ' + details.payer.name.given_name);
				window.location.href = "{{url('/')}}";
				
			});
		  }
		}).render('#paypal-button-container');

		
		//This function displays Smart Payment Buttons on your web page.
	  </script>
	
	

</body>
</html>