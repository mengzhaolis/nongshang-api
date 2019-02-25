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

// 小程序调用接口

//token获取
Route::get('/onLogin','Index\TokenController@getToken');




Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome','Admin\IndexController@index');
// 商品管理
Route::group(['prefix' => '/trade'],function(){
    Route::any('/trade-add','Admin\TradeController@trade_add');
    // 商品封面图上传(与商品信息异步)
    Route::post('/trade-image','Admin\TradeController@trade_image');
    // 商品列表
    Route::get('/trade-list','Admin\TradeController@goods_list');
    // 商品下架
    Route::post('/trade-old','Admin\TradeController@goods_old');
});
// 商品分类管理
Route::group(['prefix' => '/trade_type'],function(){
    Route::any('/trade-type-add','Admin\tradeTypeController@tradetype_add');
    Route::get('/type_list','Admin\tradeTypeController@type_list');
});
// 订单管理
Route::group(['prefix' => '/order'],function(){
    // 订单列表
    Route::get('/order_list','Admin\OrderController@order_list');
    // 商品订单详细信息
    Route::get('/order_details','Admin\OrderController@order_details');
});
// 用户管理
Route::group(['prefix' => '/member'],function(){
    // 用户列表
    Route::get('/member_list','Admin\MemberController@member_list');
    // 销售-用户关系表
    Route::post('/user_member','Admin\MemberController@user_member');
});
// swoole 测试
Route::get('/swoole','Admin\MemberController@swoole');
 