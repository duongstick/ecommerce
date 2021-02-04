<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Login;
use App\User;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class BrandProController extends Controller
{
    //
    public function add_brand_pro(){
        return view('admin.add_brand_pro');
    }
    public function show_brand_pro(){
        foreach ($details_pro as $key => $value) {
            # code...
            $meta_desc = $value->brand_desc;
            $meta_keywords = $value->brand_desc;
            $meta_title = $value->brand_name; 
            $url_canonical = $req->url();
            //end seo
        }
        $show_brand_pro = DB::table('tbl_brand_pro')->get();
        $manager_brand_pro = view('admin.show_brand_pro')->with('show_brand_pro', $show_brand_pro);
        return view('admin_layout')->with('admin.show_brand_pro',$manager_brand_pro)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);;
    }
    public function save_brand_pro(Request $req){
        $data = array();
        $data['brand_name'] = $req->brand_pro_name;
        $data['brand_desc'] = $req->brand_pro_desc;
        $data['brand_status'] = $req->brand_pro_status;

        DB::table('tbl_brand_pro')->insert($data);
        Session::put('message', 'Thêm thành công');
        return redirect('/add-brand-pro');
    }
    public function unactive_brand_pro($brand_pro_id){
        DB::table('tbl_brand_pro')->where('brand_id',$brand_pro_id)->update(['brand_status'=>1]);
        Session::put('message', 'Thất bại');
        return redirect('/show-brand-pro');
    }
    public function active_brand_pro($brand_pro_id){
        DB::table('tbl_brand_pro')->where('brand_id',$brand_pro_id)->update(['brand_status'=>0]);
        Session::put('message', 'Thành công');
        return redirect('/show-brand-pro');
    }
    public function edit_brand_pro($brand_pro_id){
        $edit_brand_pro = DB::table('tbl_brand_pro')->where('brand_id',$brand_pro_id)->get();
        $manager_brand_pro = view('admin.edit_brand_pro')->with('edit_brand_pro', $edit_brand_pro);
        return view('admin_layout')->with('admin.edit_brand_pro',$manager_brand_pro);
    }
    public function update_brand_pro(Request $req,$brand_pro_id){
        $data = array();
        $data['brand_name'] = $req->brand_pro_name;
        $data['brand_desc'] = $req->brand_pro_desc;
        DB::table('tbl_brand_pro')->where('brand_id',$brand_pro_id)->update($data);
        Session::put('message', 'Update thành công');
        return redirect('/show-brand-pro');
    }
    public function delete_brand_pro($brand_pro_id){
        DB::table('tbl_brand_pro')->where('brand_id',$brand_pro_id)->delete();
        Session::put('message', 'Xóa thành công');
        return redirect('/show-brand-pro');
    }
}
