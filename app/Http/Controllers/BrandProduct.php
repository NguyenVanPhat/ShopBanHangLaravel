<?php

namespace App\Http\Controllers;
use App\Slider;
use App\CatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function add_brand(){
        return view ('admin.add_brand_product');
    }
    public function all_brand(){
        $all_brand=DB::table('tbl_brand')->get();
        $manager_brand_product=view('admin.all_brand_product')->with('all_brand',$all_brand);
        return view('admin_layout')->with('admin.all_brand_prodct',$manager_brand_product);       
    }
   
    public function save_brand(Request $request){
        $data = array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        $data['brand_status']=$request->brand_status;
        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm Thương Hiệu Sản Phẩm Thành Công');
        return redirect::to('add-brand');
    }
    public function unactive_brand($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=> 0]);
       Session::put('message','Không Kích hoạt thương hiệu thành công !');
       return redirect::to('all-brand');
    }

    public function active_brand($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=> 1]);
       Session::put('message',' Kích hoạt thương hiệu thành công !');
       return redirect::to('all-brand');
    }

    public function edit_brand($brand_id){
        $edit_brand=DB::table('tbl_brand')->where('brand_id',$brand_id)->get();
       
        $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand',$edit_brand);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);  
    }
    public function updata_brand(Request $request,$brand_id){
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data); 
        Session::put('message','Cập Nhật Thương Hiệu Sản Phẩm Thành Công !');
        return redirect::to('all-brand');
    }
    public function delete_brand($brand_id){
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete(); 
        Session::put('message','Xóa Thương Hiệu Sản Phẩm Thành Công !');
        return redirect::to('all-brand');
    }
/// en funtion bage admin
public function show_brand_home($brand_id){
        
    $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
    $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
    $slider=Slider::where('slider_status','1')->get();
    $cate_post= CatePost::where('cate_post_status','1')->get();
    $brand_name=DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->get();
    $brand_by_id=DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
    return view ('pages.brand.show_brand')->with(compact('cate_post'))->with('category',$cate_product)->with('brand',$brand_product)->with('product',$brand_by_id)->with('brand_name',$brand_name)->with('slider',$slider);
}
}
