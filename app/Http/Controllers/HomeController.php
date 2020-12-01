<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\CatePost;
use App\Post;
session_start();

class HomeController extends Controller
{
    public function index(){
        
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->paginate(9);
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('product',$all_product)->with('slider',$slider)->with(compact('cate_post'));
    }
    public function search_home(Request $request){    
        $keywords_home=$request->keyword_home;
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();
        $search_product=DB::table('tbl_product')->where('product_name','Like','%' .$keywords_home. '%')->orderby('product_id','desc')->limit(9)->get();

        return view('pages.product.search_home')->with('category',$cate_product)->with('brand',$brand_product)->with(compact('cate_post'))->with('search_product',$search_product)->with('slider',$slider);;

    }
    public function autocomplete_ajax(Request $request){    
        $keywords_home=$request->all();
        
        $name_product=Product::where('product_name','like','%'.$keywords_home['query'].'%')->where('product_status',1)->get();
        if( $name_product ){
                $ouput='<ul class="dropdown-menu" style="display:block;position:relative;" >';
                foreach($name_product as $item){
                    $ouput.='<li class="li_search_ajax"><a href="#">'.$item->product_name.'</a></li>';             
                }
            $ouput.='</ul>';
        }else
         { 
            $ouput='sadas';
         }

        return $ouput;
    }
    public function show_post($cate_post_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();

        $post=Post::with('cate_post')->where('cate_post_id',$cate_post_id)->orderBy('post_id','desc')->where('post_status',1)->paginate(3);
        return view('pages.post.show_post')->with('category',$cate_product)->with('brand',$brand_product)->with('post',$post)->with('slider',$slider)->with(compact('cate_post'));
        
    }
    public function detail_post($post_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get(); 
        $cate_post= CatePost::where('cate_post_status','1')->get();

        $post=Post::where('post_id',$post_id)->orderBy('post_id','desc')->where('post_status',1)->take(1)->get();
        return view('pages.post.detail_post')->with('category',$cate_product)->with('brand',$brand_product)->with('post',$post)->with('slider',$slider)->with(compact('cate_post'));
        
    }
}
 