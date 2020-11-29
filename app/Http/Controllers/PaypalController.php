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

class PaypalController extends Controller
{
   public function getExpressCheckout(){
    
    $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
    $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
    $slider=Slider::where('slider_status','1')->get();
    $cate_post= CatePost::where('cate_post_status','1')->get();
    return view('pages.paypal.paypal_success')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider)->with(compact('cate_post'));

   
     
  }
 
//   public function paymentCancel()
//   {
//       dd('Your payment has been declend. The payment cancelation page goes here!');
//   }

//   public function paymentSuccess(Request $request)
//   {
//       $paypalModule = new ExpressCheckout;
//       $response = $paypalModule->getExpressCheckoutDetails($request->token);

//       if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
//           dd('Payment was successfull. The payment success page goes here!');
//       }

//       dd('Error occured!');
//   }
}

