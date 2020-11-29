<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Slider;
use App\CatePost;
session_start();

class CardController extends Controller
{
    /////// create giỏ hàng bằng bumbum99
   public function save_cart(Request $request){
  
      //   $product_id=$request->product_id_hidden;
      //   $quantity=$request->qty;

      //   $product_info=DB::table('tbl_product')->where('tbl_product.product_id',$product_id)->first();
      //   $data['id']=$product_info->product_id;
      //   $data['name']=$product_info->product_name;
      //   $data['qty']=$quantity;
      //   $data['price']=$product_info->product_price;
      //   $data['weight']=$product_info->product_price;
      //   $data['options']['image']=$product_info->product_image;

      //   Cart::add($data);
        Cart::destroy();
       return redirect::TO('/show-cart');
   }
   public function show_cart(Request $request){
      $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
      $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
      $slider=Slider::where('slider_status','1')->get();
      return view('pages.cart.show_card')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
   }
   public function delete_cart($rowid){
      Cart::remove($rowid);
      return redirect::TO('/show-cart');
   }
   public function update_cart_quantity(Request $request){
      $qty=$request->quantity;
      $rowId=$request->rowId_hidden;
      Cart::update($rowId,$qty);
      return redirect::TO('/show-cart');
   }
   /////// create giỏ hàng bằng ajax
   public function add_cart_ajax(Request $request){
      $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();
   }
   public function gio_hang(){
      $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
      $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
      $slider=Slider::where('slider_status','1')->get();
      $cate_post= CatePost::where('cate_post_status','1')->get();
      return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider)->with(compact('cate_post'));
   }
   public function delete_sp($cart_id){
      $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
      $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
     
      $cart=Session::get('cart');

      if($cart==true){
         foreach($cart as $key => $val){
             if($val['session_id']==$cart_id){
                 unset($cart[$key]);
             }
         }
         Session::put('cart',$cart);
         return redirect()->back()->with('message','Xóa sản phẩm thành công');

     }else{
         return redirect()->back()->with('message','Xóa sản phẩm thất bại');
     }

      return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product);
   }
   public function update_cart_ajax(Request $request){
      $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
      $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
      $slider=Slider::where('slider_status','1')->get();
      $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Cập nhật số lượng thành công');
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }

      return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product);
   }
   public function delete_all_cart(){    
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
        }
        return redirect()->back()->with('message','Xóa tất cả sản phẩm thanh công !');
   }
   

}
