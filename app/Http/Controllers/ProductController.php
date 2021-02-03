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

class ProductController extends Controller
{
    //
    public function add_pro(){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_pro')->orderby('brand_id','desc')->get();
        return view('admin.add_pro')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function show_pro(){
        $show_pro = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_pro','tbl_brand_pro.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $manager_pro = view('admin.show_pro')->with('show_pro', $show_pro);
        return view('admin_layout')->with('admin.show_pro',$manager_pro);
    }
    public function save_pro(Request $req){
        $data = array();
        $data['product_name'] = $req->pro_name;
        $data['product_price'] = $req->pro_price;
        $data['product_desc'] = $req->pro_desc;
        $data['product_content'] = $req->pro_content;
        $data['category_id'] = $req->pro_cate;
        $data['brand_id'] = $req->pro_brand;
        $data['product_status'] = $req->pro_status;

        $get_image = $req->file('pro_image');
        if($get_image){
            //lay ten mac dinh anh khi upload
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return redirect('/add-pro');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return redirect('/add-pro');
    }
    public function unactive_pro($pro_id){
        DB::table('tbl_product')->where('product_id',$pro_id)->update(['product_status'=>1]);
        Session::put('message', 'Thất bại');
        return redirect('/show-pro');
    }
    public function active_pro($pro_id){
        DB::table('tbl_product')->where('product_id',$pro_id)->update(['product_status'=>0]);
        Session::put('message', 'Thành công');
        return redirect('/show-pro');
    }
    public function edit_pro($pro_id){
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_pro')->orderby('brand_id','desc')->get();
        $edit_pro = DB::table('tbl_product')->where('product_id',$pro_id)->get();
        $manager_pro = view('admin.edit_pro')->with('edit_pro', $edit_pro)
        ->with('category_pro',$cate_product)
        ->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_pro',$manager_pro);
    }
    public function update_pro(Request $req,$pro_id){
        $data = array();
        $data['product_name'] = $req->pro_name;
        $data['product_price'] = $req->pro_price;
        $data['product_desc'] = $req->pro_desc;
        $data['product_content'] = $req->pro_content;
        $data['category_id'] = $req->pro_cate;
        $data['brand_id'] = $req->pro_brand;
        $data['product_status'] = $req->pro_status;
        $get_image = $req->file('pro_image');
        if($get_image){
            //lay ten mac dinh anh khi upload
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$pro_id) ->update($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return redirect('/add-pro');
        }
        // $data['product_image'] = '';
        DB::table('tbl_product')->where('product_id',$pro_id) ->update($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return redirect('/show-pro');
        
        // DB::table('tbl_product')->where('brand_id',$product_id)->update($data);
        // Session::put('message', 'Update thành công');
        // return redirect('/show-pro');
    }
    public function delete_pro($pro_id){
        DB::table('tbl_product')->where('product_id',$pro_id)->delete();
        Session::put('message', 'Xóa thành công');
        return redirect('/show-pro');
    }
    public function details_pro($pro_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_pro')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $details_pro = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_pro','tbl_brand_pro.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$pro_id)->get();

        foreach ($details_pro as $key => $pro) {
            # code...
            $cate_id = $pro->category_id;
        }

        $related_pro = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand_pro','tbl_brand_pro.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$cate_id)->whereNotIn('tbl_product.product_id', [$pro_id])->get(); 
        return view('sanpham.show_detail_pro')->with('category',$cate_product)->with('brand',$brand_product)->with('pro_details',$details_pro)
        ->with('relate',$related_pro);
    }
}
