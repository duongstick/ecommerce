<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/tim-kiem', 'HomeController@search');

//danh muc san pham
Route::get('/danh-muc-san-pham/{cate_pro_id}', 'CategoryProController@show_cate_home');
Route::get('/chi-tiet-sp/{product_id}', 'ProductController@details_pro');

//admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');

//san pham
Route::get('/add-cate-pro', 'CategoryProController@add_cate_pro');
Route::get('/edit-cate-pro/{cate_pro_id}', 'CategoryProController@edit_cate_pro');
Route::get('/delete-cate-pro/{cate_pro_id}', 'CategoryProController@delete_cate_pro');
Route::get('/show-cate-pro', 'CategoryProController@show_cate_pro');
Route::get('/unactive-cate-pro/{cate_pro_id}', 'CategoryProController@unactive_cate_pro');
Route::get('/active-cate-pro/{cate_pro_id}', 'CategoryProController@active_cate_pro');
Route::post('/save-cate-pro', 'CategoryProController@save_cate_pro');
Route::post('/update-cate-pro/{cate_pro_id}', 'CategoryProController@update_cate_pro');

//thuong hieu
Route::get('/add-brand-pro', 'BrandProController@add_brand_pro');
Route::get('/edit-brand-pro/{brand_pro_id}', 'BrandProController@edit_brand_pro');
Route::get('/delete-brand-pro/{brand_pro_id}', 'BrandProController@delete_brand_pro');
Route::get('/show-brand-pro', 'BrandProController@show_brand_pro');
Route::get('/unactive-brand-pro/{brand_pro_id}', 'BrandProController@unactive_brand_pro');
Route::get('/active-brand-pro/{brand_pro_id}', 'BrandProController@active_brand_pro');
Route::post('/save-brand-pro', 'BrandProController@save_brand_pro');
Route::post('/update-brand-pro/{brand_pro_id}', 'BrandProController@update_brand_pro');

//san pham
Route::get('/add-pro', 'ProductController@add_pro');
Route::get('/edit-pro/{product_id}', 'ProductController@edit_pro');
Route::get('/delete-pro/{product_id}', 'ProductController@delete_pro');
Route::get('/show-pro', 'ProductController@show_pro');
Route::get('/unactive-pro/{product_id}', 'ProductController@unactive_pro');
Route::get('/active-pro/{product_id}', 'ProductController@active_pro');


Route::post('/save-pro', 'ProductController@save_pro');
Route::post('/update-pro/{product_id}', 'ProductController@update_pro');


//cart
Route::post('/save-cart', 'CartController@save_cart');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart');

//checkout
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::post('/login-cus', 'CheckoutController@login_cus');
Route::get('/logout-checkout', 'CheckoutController@logout_checkout');
Route::post('/add-customer', 'CheckoutController@add_customer');
Route::get('/checkout', 'CheckoutController@checkout');
Route::post('/save-checkout-cus', 'CheckoutController@save_checkout_cus');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order', 'CheckoutController@order');

//manager order admin
Route::get('/manager-order', 'CheckoutController@manager_order');
Route::get('/view-order/{orderId}', 'CheckoutController@view_order');

//send mail 
Route::get('/send-mail', 'HomeController@send_mail');