@extends('layout')
@section('content')
<div class="features_items">
    <img class="leftgame" style="position: fixed;left: 205.5px;top: 55px;" src="{{URL::TO('public/frontend/images/left-min.png')}}" alt="" />
	<img class="rightgame" style="position: fixed;right: 234.5px;top: 55px;" src="{{URL::TO('public/frontend/images/RIGHT-min.png')}}" alt="" />
    <!--features_items-->
	<h2 class="title text-center"> Bài Viết</h2>
        @foreach ($post as $item_post)
        
			<div class="single-products ">
                <div>
                    <h3 class="text-center">{!! $item_post->post_title !!}</h3>
                </div>
                {!! $item_post->post_content !!}
            </div>
        @endforeach
       																					
</div><!--features_items-->
@endsection
