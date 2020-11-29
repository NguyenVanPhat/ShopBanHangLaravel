<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatePost;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class PostController extends Controller
{
    public function add_post(){
        $catepost=CatePost::orderBy('cate_post_id','desc')->where('cate_post_status',1)->get();
        return view('admin.post.add_post')->with(compact('catepost'));
    }
    public function save_add_post(Request $request){
        $data=$request->all();
        $post=new Post();
        $get_image=$request->file('post_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            
            $post->post_title=$data['post_title'];
            $post->post_desc=$data['post_desc'];
            $post->post_content=$data['post_content'];
            $post->post_status=$data['post_status'];
            $post->cate_post_id=$data['cate_post_id'];

            $post->post_image=$new_image;
            $post->save();
            Session::put('message','Thêm Bài Viết Thành Công');
            return redirect::to('add-post');
        }
        
        Session::put('message','Xin Vui Lòng Thêm Hình Ảnh !');
        return redirect::to('add-post');
    }
    public function all_post(){
        $post=Post::orderBy('post_id','desc')->get();
        
        return view('admin.post.all_post')->with(compact('post'));
    }

}
