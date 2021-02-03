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

class CategoryProController extends Controller
{
    //
    public function add_cate_pro(){
        return view('admin.add_cate_pro');
    }
    public function show_cate_pro(){
        $show_cate_pro = DB::table('tbl_category_product')->get();
        $manager_cate_pro = view('admin.show_cate_pro')->with('show_cate_pro', $show_cate_pro);
        return view('admin_layout')->with('admin.show_cate_pro',$manager_cate_pro);
    }
    public function save_cate_pro(Request $req){
        $data = array();
        $data['category_name'] = $req->cate_pro_name;
        $data['category_desc'] = $req->cate_pro_desc;
        $data['category_status'] = $req->cate_pro_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm thành công');
        return redirect('/add-cate-pro');
    }
    public function unactive_cate_pro($cate_pro_id){
        DB::table('tbl_category_product')->where('category_id',$cate_pro_id)->update(['category_status'=>1]);
        Session::put('message', 'Thất bại');
        return redirect('/show-cate-pro');
    }
    public function active_cate_pro($cate_pro_id){
        DB::table('tbl_category_product')->where('category_id',$cate_pro_id)->update(['category_status'=>0]);
        Session::put('message', 'Thành công');
        return redirect('/show-cate-pro');
    }
    public function edit_cate_pro($cate_pro_id){
        $edit_cate_pro = DB::table('tbl_category_product')->where('category_id',$cate_pro_id)->get();
        $manager_cate_pro = view('admin.edit_cate_pro')->with('edit_cate_pro', $edit_cate_pro);
        return view('admin_layout')->with('admin.edit_cate_pro',$manager_cate_pro);
    }
    public function update_cate_pro(Request $req,$cate_pro_id){
        $data = array();
        $data['category_name'] = $req->cate_pro_name;
        $data['category_desc'] = $req->cate_pro_desc;
        DB::table('tbl_category_product')->where('category_id',$cate_pro_id)->update($data);
        Session::put('message', 'Update thành công');
        return redirect('/show-cate-pro');
    }
    public function delete_cate_pro($cate_pro_id){
        DB::table('tbl_category_product')->where('category_id',$cate_pro_id)->delete();
        Session::put('message', 'Xóa thành công');
        return redirect('/show-cate-pro');
    }

    public function show_cate_home($cate_pro_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_pro')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $cate_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$cate_pro_id)->get();
        return view('category.show_cate')->with('category',$cate_product)->with('brand',$brand_product)->with('cate_by_id',$cate_by_id);
    }
}
