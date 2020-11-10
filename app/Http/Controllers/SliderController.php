<?php

namespace App\Http\Controllers;


use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
    public function add_slider(){
        return view('admin.slider.add_slider');
    }
    public function save_slider(Request $request){      
        $data=$request->all();   
        $slider= new Slider();      
        $get_image=$request->file('slider_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            
            $slider->slider_name=$data['slider_name'];
            $slider->slider_desc=$data['slider_desc'];
            $slider->slider_status=$data['slider_status'];
            $slider->slider_image=$new_image;
            $slider->save();
            Session::put('message','Thêm Slider Thành Công');
            Session::put('message','Thêm Slider Thành Công !');
        return redirect::to('add-slider');
        }
        
        Session::put('message','Xin Vui Lòng Thêm Hình Ảnh !');
        return redirect::to('add-slider');
    }
    public function manage_slider(){
    	$all_slide = Slider::orderBy('slider_id','DESC')->get();
    	return view('admin.slider.list_slider')->with(compact('all_slide'));
    }
    public function unactive_slide($slide_id){
       
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>0]);
        Session::put('message','Không kích hoạt slider thành công');
        return Redirect::to('manage-slider');

    }
    public function active_slide($slide_id){
   
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt slider thành công');
        return Redirect::to('manage-slider');

    }
    public function delete_slide($slider_id){
    
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
        Session::put('message','Xóa Slider thành công');
        return Redirect::to('manage-slider');
    }
}
