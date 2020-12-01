<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Hồ Văn Nguyên</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Hồ Văn Nguyên" />


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/css/dataTables.min.css')}}" type="text/css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>


</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{ URL::TO('/dashboard') }}" class="logo">
      PN-Shop
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        {{-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> --}}
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img style="height: 33px" alt="" src="{{ URL::TO('/public/backend/images/avatar.jpg') }}">
                <span class="username"> {{  Auth::user()->admin_name  }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                {{-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> --}}
                <li><a href="{{URL::to('/logout-auth') }}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ URL::To('/dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/add-category-product') }}">Thêm Danh Mục Sản Phẩm</a></li>
                        <li><a href="{{ url::to('/all-category-product') }}">Liệt Kê Danh Mục Sản Phẩm</a></li>
						
                    </ul>
				</li> 
				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Hiệu Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/add-brand') }}">Thêm Hiệu Sản Phẩm</a></li>
                        <li><a href="{{ url::to('/all-brand') }}">Liệt Kê Hiệu Sản Phẩm</a></li>
						
                    </ul>
                </li>  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Sản Phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/add-product') }}">Thêm  Sản Phẩm</a></li>
                        <li><a href="{{ url::to('/all-product') }}">Liệt Kê Sản Phẩm</a></li>
						
                    </ul>
                </li>  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Đơn Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/manager-order') }}">Quản Lý Đơn Hàng</a></li>
                       
						
                    </ul>
                </li>   
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản Lý Mã Giảm Giá</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/insert-coupon') }}">Thêm Mã Giảm Giá</a></li>					
                    </ul>
                    <ul class="sub">
                        <li><a href="{{ url::to('/all-coupon') }}">Danh Sách Mã Giảm Giá</a></li>					
                    </ul>
                </li>  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Vận Chuyển</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/delivery') }}">Quản Lý Vận Chuyển</a></li>					
                    </ul>                  
                </li>  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Quản Lý Slider</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/manage-slider') }}">Danh Sách Slider</a></li>					
                    </ul> 
                    <ul class="sub">
                        <li><a href="{{ url::to('/add-slider') }}">Thêm Slider</a></li>					
                    </ul>  

                </li> 
                @hasrole('admin')
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> User</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/users') }}">Danh Sách Người Dùng</a></li>					
                    </ul>                    
               </li> 
                @endhasrole  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Danh Mục Bài Viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/add-category-post') }}">Thêm Danh Mục Bài Viết</a></li>					
                    </ul> 
                    <ul class="sub">
                        <li><a href="{{ url::to('/all-category-post') }}">Liệt Kê Danh Mục Bài Viết</a></li>					
                    </ul>  

                </li>  
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span> Bài Viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url::to('/add-post') }}">Thêm Bài Viết</a></li>					
                    </ul> 
                    <ul class="sub">
                        <li><a href="{{ url::to('/all-post') }}">Liệt Kê Bài Viết</a></li>					
                    </ul>  

                </li>            
            </ul>           
         </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
	
	    <div class="clearfix"> </div>				
    </section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p class="text-center">© 2020 Tập Đoàn Nguyễn Văn Phát Và Hồ Văn Nguyên </a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('public/backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>


<!-- morris JavaScript -->
<!-- Load Gallery -->
<script type="text/javascript">
    $(document).ready( function () {
        load_gallery();

        function load_gallery(){
            var product_id=$('.product_id').val();
            var _token=$('input[name="_token"]').val();

            $.ajax({
                url:'{{ URL('/show-gallery-ajax') }}',
                method:'post',
                data:{product_id:product_id,_token:_token},
                success:function(data){
                    $('#load_gallery').html(data);
                }
            });            
        }
        $('#file').change(function(){
            var error="";
            var files=$('#file')[0].files;

            if(files.length>5){
                error+="<p> Bạn Chọn Tối Đa Chỉ Được 5 Ảnh ! </p>";
            }else if(files.length==''){
                error+="<p> Bạn Chưa Chọn Ảnh </p>";
            }else if(files.size > 2000000){
                error+="<p> File Ảnh Không Được Lớn Hơn 2M</p>";
            }

            if(error==""){
               
            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+ error +'</span>');
            }
        });
        $(document).on('blur','.gal_name',function(){
            var gal_name=$(this).text();
            var gal_id=$(this).data('gal_id');
            var _token=$('input[name="_token"]').val();

            $.ajax({
                url:'{{ url('/edit-gal-name') }}',
                method:'POST',
                data:{gal_name:gal_name,gal_id:gal_id,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-success">Cập Nhật Tên Thành Công</span>');
                }
            });
    
        });
        $(document).on('click','#delete_gal_id',function(){
            var gal_id=$(this).data('gal_id');       
            var _token=$('input[name="_token"]').val();

            $.ajax({
                url:'{{ url('/del-gal')}}',
                method:'post',
                data:{gal_id:gal_id,_token:_token},
                success:function(){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Xóa Ảnh Thành Công !</span>');
                }
            })
           
    
        });
} );
</script>	

<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>	
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('Số lượng bán trong kho không đủ');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        if(j==0){
          
                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('Thay đổi tình trạng đơn hàng thành công');
                                location.reload();
                            }
                });
            
        }

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
             var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function(){

           var city = $('.city').val();
           var province = $('.province').val();
           var wards = $('.wards').val();
           var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
           
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                   fetch_delivery();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);   
                }
            });
        }); 
    })


</script>

<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
    </script>
    <script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('ckeditor4');
        CKEDITOR.replace('ckeditor5');
    </script>
   <script src="{{asset('public/backend/js/formValidation.min.js')}}"></script>
   <script type="text/javascript">
       $.validate({
   
       });
   
   </script>
	<!-- //calendar -->
</body>
</html>
