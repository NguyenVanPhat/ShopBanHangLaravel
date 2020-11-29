<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Svg\Tag\Rect;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
   public function register_auth(){
       return view('admin.custom_auth.register');
   }
   public function register(Request $request){
        $this->validation($request);
        $data=$request->all();

        $admin=new Admin();
        $admin->admin_name=$data['admin_name'];
        $admin->admin_email=$data['admin_email'];
        $admin->admin_password=md5($data['admin_password']);
        $admin->admin_phone=$data['admin_phone'];
        $admin->save();

        return redirect('/register-auth')->with('message','Đăng Ký Thành Công !');
    }
    public function validation( $request){
        return $this->validate($request,[
            'admin_name'=>'required|max:255',
            'admin_email'=>'required|max:255',
            'admin_password'=>'required|max:255',
            'admin_phone'=>'required|max:255',
        ]);
       
    } 
    public function login_auth( ){      
       return view('admin.custom_auth.login_auth');       
    } 
    public function logout_auth( ){
        Auth::logout();      
        return view('admin.custom_auth.login_auth');       
     }
    public function login(Request $request ){ 
         
        $this->validate($request,[        
            'admin_email'=>'required|max:255',
            'admin_password'=>'required|max:255',          
        ]); 

        $data=$request->all();

        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
            return redirect('/dashboard');
        }else{
            return redirect('/admin')->with('message','Mật Khẩu Hoặc Tài Khoản Sai !');
        }

     } 
}
