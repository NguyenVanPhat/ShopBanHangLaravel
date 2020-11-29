<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Roles;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index(){
        $admin = Admin::with('roles')->orderBy('admin_id','DESC')->paginate(5);
        return view('admin.users.all_users')->with(compact('admin'));
     }
     public function assign_roles(Request $request){
      $data = $request->all();
        if(Auth::id()==$data['admin_id']){
         return redirect()->back()->with('message','Bạn Không Thể Cấp Quyền Cho Chính Mình');
        }
        
        $user = Admin::where('admin_email',$data['admin_email'])->first();
        $user->roles()->detach();
        if($request->author_role){
           $user->roles()->attach(Roles::where('name','author')->first());     
        }
        if($request->user_role){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        if($request->admin_role){
           $user->roles()->attach(Roles::where('name','admin')->first());     
        }
        return redirect()->back()->with('message','Cấp Quyền Thành Công');
    }
    public function delete_user_roles($admin_id){
      if(Auth::id()==$admin_id){
         return redirect()->back()->with('message','Bạn Không Thể Xóa Chính Mình !');
      }

     $admin =Admin::find($admin_id);
     if($admin){
        $admin->roles()->detach();
        $admin->delete();
     }
     
     return redirect()->back()->with('message','Xóa Thành Công !');
   }
   
     
}
