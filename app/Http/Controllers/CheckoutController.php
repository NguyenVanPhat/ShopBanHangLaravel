<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\City;
use App\Province;
use App\Wards;
use App\Feeship;
use App\Shipping;
use App\Order;
use App\OrderDetails;
use App\Slider;
use App\CatePost;
session_start();

class CheckoutController extends Controller
{
    
    public function login_checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider)->with(compact('cate_post'));
    }
    public function add_customer(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;

       $customer_id= DB::table('tbl_customer')->insertGetId($data);

       Session::put('customer_id',$customer_id);
       Session::put('customer_name',$request->customer_name);

       return redirect::to('/show-checkout');
    }
    public function show_checkout(){
       
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $city=City::orderby('matp','ASC')->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();
        $custumer_id = Session::get('customer_id');
        if($custumer_id){
            return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city)->with('slider',$slider)->with(compact('cate_post'));
        }else{
            return Redirect::to('login-checkout')->send();
        }
        
    }
    public function save_checkout_customer(Request $request){

        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_notes']=$request->shipping_notes;

       $shipping_id= DB::table('tbl_shipping')->insertGetId($data);     
       
       Session::put('shipping_id',$shipping_id);
       Session::put('shipping_name',$request->shipping_name);  
       
       return redirect::to('/payment');
    }
    public function logout_checkout(){
        Session::flush();
        return redirect('/login-checkout');
    }
    public function login_customer(Request $request){
        $customer_email=$request->custumer_email;

        $customer_password=md5($request->custumer_password);

        $result=DB::table('tbl_customer')->where('tbl_customer.customer_email',$customer_email)->where('tbl_customer.customer_password',$customer_password)->first();

       

        if($result!=null){
            Session::put('customer_id',$result->customer_id);
            return redirect::to('/show-checkout');
        }else{
            return redirect::to('/login-checkout');
        }      
    }
    // public function payment_cart(){
    //     $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
    //     $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
    //     $slider=Slider::where('slider_status','1')->get();
    //     $cate_post= CatePost::where('cate_post_status','1')->get();
    //     return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider)->with(compact('cate_post'));
    // }
    // public function order_place(Request $request){
    //     //insert payment_method
    //     $data=array();
    //     $data['payment_method']=$request->payment_option;
    //     $data['payment_status']="đang chờ sử lý";    
    //     $payment_id= DB::table('tbl_payment')->insertGetId($data); 
          
    //     //insert order
    //     $order_data=array();
    //     $order_data['customer_id']=Session::get('customer_id');
    //     $order_data['shipping_id']=Session::get('shipping_id');
    //     $order_data['payment_id']= $payment_id;
    //     $order_data['order_total']=Cart::total();
    //     $order_data['order_status']="đang chờ sử lý";
    //     $order_id= DB::table('tbl_order')->insertGetId($order_data);

    //     //insert order_detail
    //     $content = Cart::content();  
    //     foreach($content as $item_content){
    //         $order_detail_data=array();
    //         $order_detail_data['order_id']= $order_id;
    //         $order_detail_data['product_id']=$item_content->id;
    //         $order_detail_data['product_name']= $item_content->name;
    //         $order_detail_data['product_price']=$item_content->price;
    //         $order_detail_data['product_sales_quantity']=$item_content->qty;
    //         DB::table('tbl_order_detail')->insertGetId( $order_detail_data); 
    //     }
        
    //     if( $data['payment_method']==1){
    //         echo "Bạn Đã Thanh toán thành cong bằng thẻ ATM";
    //     }elseif($data['payment_method']==2){
    //         $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
    //         $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
    //         $slider=Slider::where('slider_status','1')->get();
    //         $cate_post= CatePost::where('cate_post_status','1')->get();
    //         Cart::destroy();
    //         return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider)->with(compact('cate_post'));
    //     }else{
    //         echo "Bạn Đã Thanh toán thành cong bằng PayPal";
    //     }
    // }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }

            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                     foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{ 
                    Session::put('fee',25000);
                    Session::save();
                }
            }
           
        }
    }
    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }
    public function confirm_order(Request $request){

        $customer_id=Session::get('customer_id');
        if($customer_id){
            $data = $request->all();

            if($data['shipping_method']==1){
             $shipping = new Shipping();
             $shipping->shipping_name = $data['shipping_name'];
             $shipping->shipping_email = $data['shipping_email'];
             $shipping->shipping_phone = $data['shipping_phone'];
             $shipping->shipping_address = $data['shipping_address'];
             $shipping->shipping_notes = $data['shipping_notes'];
             $shipping->shipping_method = $data['shipping_method'];
             $shipping->save();
             $shipping_id = $shipping->shipping_id;
     
             $checkout_code = substr(md5(microtime()),rand(0,26),5);
     
      
             $order = new Order;
             $order->customer_id = Session::get('customer_id');
             $order->shipping_id = $shipping_id;
             $order->order_status = 1;
             $order->order_code = $checkout_code;
     
             date_default_timezone_set('Asia/Ho_Chi_Minh');
             $order->created_at = now();
             $order->save();
     
             if(Session::get('cart')==true){
                foreach(Session::get('cart') as $key => $cart){
                    $order_details = new OrderDetails;
                    $order_details->order_code = $checkout_code;
                    $order_details->product_id = $cart['product_id'];
                    $order_details->product_name = $cart['product_name'];
                    $order_details->product_price = $cart['product_price'];
                    $order_details->product_sales_quantity = $cart['product_qty'];
                    $order_details->product_coupon =  $data['order_coupon'];
                    $order_details->product_feeship = $data['order_fee'];
                    $order_details->save();
                }
             }
             Session::forget('coupon');
             Session::forget('fee');
             Session::forget('cart');
             return 1;
            }
            else{
                 $shipping = new Shipping();
                 $shipping->shipping_name = $data['shipping_name'];
                 $shipping->shipping_email = $data['shipping_email'];
                 $shipping->shipping_phone = $data['shipping_phone'];
                 $shipping->shipping_address = $data['shipping_address'];
                 $shipping->shipping_notes = $data['shipping_notes'];
                 $shipping->shipping_method = $data['shipping_method'];
                 $shipping->save();
                 $shipping_id = $shipping->shipping_id;
     
                 $checkout_code = substr(md5(microtime()),rand(0,26),5);
     
         
                 $order = new Order;
                 $order->customer_id = Session::get('customer_id');
                 $order->shipping_id = $shipping_id;
                 $order->order_status = 1;
                 $order->order_code = $checkout_code;
     
                 date_default_timezone_set('Asia/Ho_Chi_Minh');
                 $order->created_at = now();
                 $order->save();
     
                 if(Session::get('cart')==true){
                     foreach(Session::get('cart') as $key => $cart){
                         $order_details = new OrderDetails;
                         $order_details->order_code = $checkout_code;
                         $order_details->product_id = $cart['product_id'];
                         $order_details->product_name = $cart['product_name'];
                         $order_details->product_price = $cart['product_price'];
                         $order_details->product_sales_quantity = $cart['product_qty'];
                         $order_details->product_coupon =  $data['order_coupon'];
                         $order_details->product_feeship = $data['order_fee'];
                         $order_details->save();
                     }
                 } 
                 Session::forget('coupon');
                 Session::forget('fee');
                 Session::forget('cart');         
                 return 0;
            }
        }else{
            return redirect::to('/login-checkout');
        }
       
   }      
}
