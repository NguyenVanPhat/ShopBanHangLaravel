@extends('layout')
@section('content')
<div class="features_items">
    <img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
	<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
    <!--features_items-->
	<h2 class="title text-center">Danh Sách Bài Viết</h2>
		@foreach ($post as $item_post)
			<div class="single-products">
                <div class="text-center">
                    <img style="float: left;width: 30%; height:120px;padding: 5px;" src="{{ URL::TO('/public/uploads/post/'.$item_post->post_image) }}">
                    <h4 style="padding: 5px;color:#000;"> {!! $item_post->post_title !!} </h4>
                    <p> {!! $item_post->post_desc !!} <p>
                    
                <div>
                <div class="text-right">
                    <a class="btn btn-default btn-sm" href="{{ URL::To('/detail-post/'.$item_post->post_id) }}"> Xem Bài Viết </a>
                </div>
                    
                    <div class="clearfix"></div>
            </div>
        @endforeach	
        <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$post->links()!!}
        </ul>																						
</div><!--features_items-->
@endsection
