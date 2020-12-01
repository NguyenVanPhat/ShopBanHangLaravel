<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use App\CatePost;
use App\Gallery;
session_start();
class ProductController extends Controller
{
    public function add_product(){
        $category_all=DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_all=DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        return view('admin.add_product')->with('category_all',$category_all)->with('brand_all',$brand_all);
    }
    public function all_product(){
        $all_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderBy('tbl_product.product_id','desc')->get();
        
        return view('admin.all_product')->with('all_product',$all_product);       
    }
   
    public function save_product(Request $request){
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;
        $data['product_status']=$request->product_status;
        $data['product_quantity']=$request->product_quantity;
        $data['product_price']=$request->product_price;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;

        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm Sản Phẩm Thành Công');
            return redirect::to('add-product');
        }
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm Thương Hiệu Sản Phẩm Thành Công');
        return redirect::to('add-product');
    }
    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=> 0]);
       Session::put('message','Không Kích hoạt sản phẩm thành công !');
       return redirect::to('all-product');
    }

    public function active_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=> 1]);
       Session::put('message',' Kích hoạt sản phẩm thành công !');
       return redirect::to('all-product');
    }

    public function edit_product($product_id){
        $category_all=DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $brand_all=DB::table('tbl_brand')->orderBy('brand_id','desc')->get();
        $edit_product=DB::table('tbl_product')->where('product_id',$product_id)->get();
       
        return view('admin.edit_product')->with('category_all',$category_all)->with('brand_all',$brand_all)->with('edit_product',$edit_product);
    }
    public function updata_product(Request $request,$product_id){
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;
        $data['product_quantity']=$request->product_quantity;
        $data['product_status']=$request->product_status;
        $data['product_price']=$request->product_price;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;

        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm Sản Phẩm Thành Công');
            return redirect::to('add-brand');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập Nhật Sản Phẩm Thành Công');
        return redirect::to('all-product');
       
    }
    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete(); 
        Session::put('message','Xóa Sản  Phẩm Thành Công !');
        return redirect::to('all-product');
    }
// end funtion admin bage
    public function details_product($product_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','1')->orderBy('brand_id','desc')->get();
        $slider=Slider::where('slider_status','1')->get();
        $cate_post= CatePost::where('cate_post_status','1')->get();
        $details_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $item){
            $category_id=$item->category_id;
            $product_id=$item->product_id;
        }
        $gallery=Gallery::where('product_id',$product_id)->get();
        $related_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages.product.details_product')->with(compact('gallery'))->with(compact('cate_post'))->with('category',$cate_product)->with('brand',$brand_product)->with('product',$details_product)->with('related_product',$related_product)->with('slider',$slider);
    }
}
