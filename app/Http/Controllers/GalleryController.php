<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class GalleryController extends Controller
{
    public function show_gallery($product_id){
        
        $pro_id=$product_id;

        return view('admin.gallery.show_gallery')->with(compact('pro_id'));
    }

    public function show_gallery_ajax(Request $request){
        
        $data=$request->all();

        $gallery=Gallery::where('product_id',$data['product_id'])->orderBy('gallery_id','desc')->get();
      
        $out='<form> '.csrf_field().' <table  class="table table-striped b-t b-light" id="myTable">
        <thead>
        <tr>   
            <th>STT</th>
            <th>Name</th>
            <th>Hình Ảnh</th>
            <th>Trạng Thái</th>
        </tr>
        </thead>
        <tbody>';
        if($gallery->count()>0){ 
            $i=0;
            foreach($gallery as $item){
                $out.=' <tr>
                <td><label class="i-checks m-b-none">'.$i.'</label></td>
                <td contenteditable class="edit_gal_name" data-gal_id="'.$item->gallery_id.'">'.$item->gallery_name.'</td>                 
                <td><img width="100px" hight="100px" src="'.url('public/uploads/gallery/'.$item->gallery_name).'" ></td>
                <td><button id="delete_gallery" class="btn btn-danger"> Xóa </button></td>                  
            </tr>';
            $i++;
            }
            $out.='</tbody>
            </table></form> ';       
        }
        return $out;       
    }
    public function insert_gallery(Request $request, $pro_id){
        $get_image =$request->file('file');
        if($get_image){
            foreach($get_image as $image){
                $get_name_image=$image->getClientOriginalName();
                $name_image=current(explode('.',$get_name_image));
                $new_image=$name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/uploads/gallery',$new_image);     
                
                $gallery =new Gallery();
                $gallery->gallery_name=$new_image;
                $gallery->gallery_image=$new_image;
                $gallery->product_id= $pro_id;
                $gallery->save();
            }
        }

        Session::put('message','Thêm Thư Viện Ảnh Thành Công !');
        return redirect()->back();
        
    }
    public function edit_gal_name (Request $request){
        $gal_id=$request->gal_id;
        $gal_name=$request->gal_name;       
        
       $gallery=Gallery::find($gal_id);
        var $name=$gallery->gallery_name;

       dd($name);
       
        
    }
}
