<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use App\CatePost;
session_start();
class CategoryPost extends Controller
{
    public function add_category_post(){

        return view ('admin.category_post.add_category');
    }
    public function  save_category_post(Request $request){
        $data=$request->all();
        $category_post=new CatePost();
        $category_post->cate_post_name=$data['cate_post_name'];
        $category_post->cate_post_desc=$data['cate_post_desc'];
        $category_post->cate_post_status=$data['cate_post_status'];
        $category_post->save();

        Session::put('message','Thêm Danh Mục Thành Công !');
        return view ('admin.category_post.add_category');
    }  
    public function all_category_post(){        
        $category_post=CatePost::orderBy('cate_post_id','desc')->paginate(10);
        return view('admin.category_post.all_category_post')->with(compact('category_post'));           
    }
    public function delete_cate_post($cate_post_id){
        
        CatePost::where('cate_post_id',$cate_post_id)->delete();
        Session::put('message','Đã Xóa Thành Công !');

        return redirect('all-category-post');
               
    }
    public function edit_cate_post($cate_post_id){
        
      $catepost=CatePost::where('cate_post_id',$cate_post_id)->get();
      

    return view('admin.category_post.edit_category_post')->with(compact('catepost'));
               
    }
    public function save_edit_category_post(Request $request,$cate_post_id){
        $data=$request->all();     
        $cate_post=CatePost::find($cate_post_id);
        $cate_post->cate_post_name=$data['cate_post_name'];
        $cate_post->cate_post_status=$data['cate_post_status'];
        $cate_post->cate_post_desc=$data['cate_post_desc'];
        $cate_post->save();
        Session::put('message','Cập Nhật Lại Danh Mục Bài Viết Thành Công!');
        return redirect('all-category-post');
    }  
   
    
   
}
