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
//中间件
Route::group(['middleware'=>'adminlogin'],function(){
	
	//后台主页
	Route::resource("/admin","Admin\AdminController");
	//后台用户
	Route::resource('/user','Admin\UsersController');
	//后台商品分类
	Route::resource('/admincates','Admin\CateController');
	//管理员模块
	Route::resource("/adminsuser","Admin\AdminuserController");
	//广告模块
	Route::resource("/adv","Admin\AdvController");
	//商品模块
	Route::resource("/good","Admin\GoodsController");
	//商品详情模块
	Route::resource("/goods","Admin\GoodssController");
	//产品明星
	Route::resource("/star",'Admin\StarController');
	//友情链接模块
	Route::resource("/flink","Admin\FlinkController");
	//后台留言模块
	Route::resource("/message","Admin\MessageController");
	//管理员模块
	Route::resource("/adminsuser","Admin\AdminuserController");
	//分配角色模块
	Route::get("/rolelist/{id}","Admin\AdminuserController@rolelist");
	//保存角色
	Route::post("/saverole","Admin\AdminuserController@saverole");
	//角色管理
	Route::resource("/role","Admin\RolelistController");
	//权限分配
	Route::get("/authrole/{id}","Admin\RolelistController@auth");
	//保存权限
	Route::post("/saveauth","Admin\RolelistController@saveauth");
	//权限管理
	Route::resource("/authlist","Admin\AuthlistController");
	//用户收藏模块
	Route::resource("/collect","Admin\CollectController");
	//轮播图管理
	Route::resource('/slid','Admin\SlidController');
	//后台订单
	Route::resource("/adminorder","Admin\AdminorderController");

});

//后台登录
	Route::resource("/adminlogin","Admin\AdminloginController");



//前台主页
Route::resource('/home','Home\IndexController');
//商品详情页
Route::get('/goodlist/{id}','Home\IndexController@list');
//价格排序
Route::get('/home/price/{id}','Home\IndexController@price');
//型号选择
Route::get('/home/memory/{id}','Home\IndexController@memory');
//注册
Route::resource("/register","Home\RegisterController");
//引入验证码
Route::get("/code","Home\RegisterController@code");
//激活用户路由
Route::get("/jihuo","Home\RegisterController@jihuo");
//测试邮件 发送原始字符串
Route::get("/send","Home\RegisterController@send");
//发送文本模板
Route::get("/sendmail","Home\RegisterController@sendmail");
Route::get("/a","Home\RegisterController@a");
//登录
Route::resource("/homelogin","Home\LoginController");
//忘记密码
Route::get("/forget","Home\LoginController@forget");
Route::post("/doforget","Home\LoginController@doforget");
//密码重置
Route::get("/reset","Home\LoginController@reset");
Route::post("/doreset","Home\LoginController@doreset");
//个人中心
Route::resource("/center","Home\CenterController");
//用户收藏
Route::resource('/collect','Home\collectController');
//收藏商品
Route::get('/coll','Home\collectController@coll');
//收货地址管理
Route::resource("/site",'Home\SiteController');
//搜索
Route::post("/shows",'Home\IndexController@shows');
//删除状态为1的用户
Route::get("/shanchu","Home\DelController@shanchu");
Route::resource("/del","Home\DelController");
//购物车
Route::resource("/homecart","Home\CartController");
//购物车加
Route::get("/updates/{id}","Home\CartController@updates");
//购物车减
Route::get("/updatee/{id}","Home\CartController@updatee");
//删除
Route::get("/cartdel/{id}","Home\CartController@cartdel");
//支付成功
Route::post("/cartsuccess","Home\DelController@cartsuccess");
Route::get("/zhifu","Home\DelController@zhifu");
//个人中心
Route::resource("/center","Home\CenterController");
//订单页
Route::resource("/order","Home\OrderController");
//订单删除
Route::get("/orderdel/{id}","Home\OrderController@del");
//商品评论
Route::get("/order/message/{id}","Home\OrderController@message");
//订单付款
Route::get("/orderbuy/{id}","Home\OrderController@buy");
