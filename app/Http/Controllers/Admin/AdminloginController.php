<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出
        //销毁session
        $request->session()->pull('name');
        $request->session()->pull('nodelist');
        return redirect("/adminlogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载后台模板
        return view("Admin.Adminlogin.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取登录用户名和密码
        $name=$request->input("name");
        $password=$request->input("password");
        //要数据表的数据做对比
        //检测用户表
        $info=DB::table("admin_users")->where("name",'=',$name)->first();
        //判断
        if($info){
            //检测密码
            // echo "ok";
            //哈希数据值检测
            if(Hash::check($password,$info->password)){
                $img=$info->img;
               // dd($img);
                session(['img'=>$img]);
                //把登录的用户名存储在session里
                session(['name'=>$name]);
                //获取登录后台用户的所有权限信息
                $sql="select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n  where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}";
                //执行sql
                $list=DB::select($sql);
                // dd($list);
                // echo '<pre>';
                // var_dump($list);exit;
                // 让所有管理员都具有访问首页权限
                $nodelist['AdminController'][]="index";
                //遍历
                foreach($list as $key=>$value){
                    //把登录用户的所有权限写入$nodelist 数组里
                    $nodelist[$value->mname][]=$value->aname;
                    //如果权限列表有create  添加store
                    if($value->aname=="create"){
                        $nodelist[$value->mname][]="store";
                    }
                    //如果权限列表有edit  添加update
                    if($value->aname=="edit"){
                        $nodelist[$value->mname][]="update";
                    }

                }
                echo "<pre>";
                // var_dump($nodelist);
                //把所有权限信息 存储在session里
                session(['nodelist'=>$nodelist]);
                return redirect("/admin")->with('success','登录成功');
            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','用户名有误');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}