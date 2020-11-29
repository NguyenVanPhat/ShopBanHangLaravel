<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use App\CatePost;
use App\Exports\ExportCategory;
use App\Imports\ImportCategory;
use Maatwebsite\Excel\Facades\Excel;
session_start();
class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view ('admin.add_category_product');
    }
    public function all_category_product(){
        $all_category_product=DB::table('tbl_category_product')->get();
        $manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_prodct',$manager_category_product);       
    }
   
    public function save_category_product(Request $request){
        $data = array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm Sản Phẩm Thành Công');
        return redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=> 0]);
       Session::put('message','Không Kích hoạt sản phẩm thành công !');
       return redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=> 1]);
        Session::put('message',' Kích hoạt sản phẩm thành công !');
        return redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $edit_category_product=DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
       
        $manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_prodct',$manager_category_product);  
    }
    public function updata_category_product(Request $request,$category_product_id){
        $data=array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data); 
        Session::put('message','Cập Nhật Danh Mục Sản Phẩm Thành Công !');
        return redirect::to('all-category-product');
    }
    public function detele_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete(); 
        Session::put('message','Xóa Danh Mục Sản Phẩm Thành Công !');
        return redirect::to('all-category-product');
    }
//end funtion admin page
    public function show_category_home($category_id){
        
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $category_name=DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();
        $category_by_id=DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();
        return view ('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('product',$category_by_id)->with('category_name',$category_name)->with(compact('cate_post'))->with('slider',$slider);
    }
    public function import_category(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ImportCategory, $path);
        return back();


        
    }
    public function export_category(){
        return Excel::download(new ExportCategory , 'category.xlsx');
    }

    

} 

