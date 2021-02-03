<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Login;
use App\User;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function save_cart(request $req){
        $productid = $req->productid_hidden;
        $quantity = $req->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productid)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }

    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_pro')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);  
    }

    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return redirect('/show-cart');
    }
}
