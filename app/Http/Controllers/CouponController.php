<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Coupon;
class CouponController extends Controller
{
    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $coupon_session = Session::get('coupon');
            $cou[] = array(
                'coupon_code' => $coupon->coupon_code,
                'coupon_condition' => $coupon->coupon_condition,
                'coupon_money' => $coupon->coupon_money,
            );
            Session::put('coupon',$cou);
            Session::save();
            return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            
            // $count_coupon = $coupon->count();
            // if($count_coupon>0){
            //     $coupon_session = Session::get('coupon');
            //     if($coupon_session==true){
            //         $is_avaiable = 0;
            //         if($is_avaiable==0){
            //             $cou[] = array(
            //                 'coupon_code' => $coupon->coupon_code,
            //                 'coupon_condition' => $coupon->coupon_condition,
            //                 'coupon_number' => $coupon->coupon_number,

            //             );
            //             Session::put('coupon',$cou);
            //         }
            //     }else{
            //         $cou[] = array(
            //                 'coupon_code' => $coupon->coupon_code,
            //                 'coupon_condition' => $coupon->coupon_condition,
            //                 'coupon_number' => $coupon->coupon_number,

            //             );
            //         Session::put('coupon',$cou);
            //     }
            //     Session::save();
            //     return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            // }

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }
    } 
    public function insert_coupon(){    

        return view('admin.coupon.add_coupon');
    }
    public function add_coupon(Request $request){ 
        
        $data=$request->all();

       $coupon=new Coupon();
       $coupon->coupon_name=$data['coupon_name'];
       $coupon->coupon_code=$data['coupon_code'];
       $coupon->coupon_money=$data['coupon_money'];
       $coupon->coupon_qty=$data['coupon_qty'];
       $coupon->coupon_condition=$data['coupon_condition'];     
       $coupon->save();
       Session::put('message','Thêm Mã Giảm GIá Thành Công !');
        return redirect::to('all-coupon');
    }
    public function all_coupon(){              
       $coupon= Coupon::orderby('coupon_id','desc')->get();
       
       return view('admin.coupon.all_coupon')->with(compact('coupon'));
    }
    public function delete_coupon($coupon_id){
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('all-coupon');
    }
}
