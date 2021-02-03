<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Login;
use App\User;
use Validator;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin_log');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(request $req){
        $admin_email = $req->admin_email;
        $admin_pass = md5($req->admin_pass);
        $login = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_pass',$admin_pass)->first();
        if($login){
            Session::put('admin_name',$login->admin_name);
            Session::put('admin_id',$login->admin_id);
            return Redirect('/dashboard');
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect('/admin');
        }
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect('/admin');
    }
}
