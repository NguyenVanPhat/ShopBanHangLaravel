<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Product;
session_start();

class HomeController extends Controller
{
    public function index(){
        
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $all_product=DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(9)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('product',$all_product)->with('slider',$slider);
    }
    public function search_home(Request $request){    
        $keywords_home=$request->keyword_home;
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $search_product=DB::table('tbl_product')->where('product_name','Like','%' .$keywords_home. '%')->orderby('product_id','desc')->limit(9)->get();

        return view('pages.product.search_home')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('slider',$slider);;

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
}
 