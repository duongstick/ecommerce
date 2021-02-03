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

class CheckoutController extends Controller
{
    //
    public function login_checkout(){
        return view('checkout.login_checkout');
    }
    public function add_customer(request $res){
        $data = array();
        $data['customer_name'] = $res->customer_name;
        $data['customer_email'] = $res->customer_email;
        $data['customer_pass'] = md5($res->customer_pass);
        $data['customer_phone'] = $res->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$res->customer_name);
        return redirect('/checkout');
    }
    public function checkout(){
        // return echo 'test';
        return view('checkout.checkout');
    }
    public function save_checkout_cus(request $req){
        $data = array();
        $data['shipping_name'] = $req->shipping_name;
        $data['shipping_email'] = $req->shipping_email;
        $data['shipping_note'] = $req->shipping_note;
        $data['shipping_phone'] = $req->shipping_phone;
        $data['shipping_add'] = $req->shipping_add;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return redirect('/payment');
    }
    public function payment(){
        return view('checkout.payment');
    }
    public function logout_checkout(){
        Session::flush();
        return redirect('/login-checkout');
    }
    public function login_cus(request $req){
        $email = $req->email_acc;
        $pass = md5($req->password_acc);
        $kq = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_pass',$pass)->first();
        if($kq){
            Session::put('customer_id',$kq->customer_id);
            return redirect('/checkout');
        } else {
            return redirect('/login-checkout');
        }
        
        // Session::put('customer_name',$kq->customer_name);
        
    }
    public function order(request $req){
        //insert payment table
        $data = array();
        $data['payment_method'] = $req->payment_option;
        $data['payment_status'] = 'Dang xu ly';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        //insert order table
        $or_data = array();
        $or_data['customer_id'] = Session::get('customer_id');
        $or_data['shipping_id'] = Session::get('shipping_id');
        $or_data['payment_id'] = $payment_id;
        $or_data['order_total'] = Cart::total();
        $or_data['order_status'] = 'Dang xu ly';
        $order_id = DB::table('tbl_order')->insertGetId($or_data);
        //insert order_details table
        $content = Cart::content();
        foreach ($content as $v_content) {
            # code...
            $or_d_data['order_id'] = $order_id;
            $or_d_data['product_id'] = $v_content->id;
            $or_d_data['product_name'] = $v_content->name;
            $or_d_data['product_price'] = $v_content->price;
            $or_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($or_d_data);            
        }
        if($data['payment_method']==1){
            echo 'Thanh toan the';
        } elseif($data['payment_method']==2){
            Cart::destroy();
            return view('checkout.handcash');
        }else {
            # code...
            echo 'Thanh toan bang paypal';
        }
        //return redirect('/payment');
    }
    public function manager_order(){
        $show_order = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manager_order')->with('show_order', $show_order);
        return view('admin_layout')->with('admin.manager_order',$manager_order);
    }
    public function view_order($orderId){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_order_details.*')->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
    }
}
