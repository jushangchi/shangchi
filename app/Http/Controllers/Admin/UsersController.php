<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//导入adminUserinsert 校验类
use App\Http\Requests\AdminUserinsert;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的关键词
        $k=$request->input('keywords');
        $ks=$request->input('keywordss');
        //会员列表
        $data=DB::table("users")->where('username','like',"%".$k."%")->where('email','like','%'.$ks.'%')->paginate(3);
        //加载
        // echo "这是后台会员列表";
        return view("Admin.Users.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载用户添加模板
        // echo "add";
        return view("Admin.Users.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
        //获取所有数据
        $data=$request->except(['repassword','_token']);
        //密码加密
        $data['password']=Hash::make($data['password']);
        $data['status']=1;
        $data['token']=str_random(50);
        // dd($data);
       if(DB::table("users")->insert($data)){
            //设置提示信息 存储在session里 with 可以设置session信息
            return redirect('/adminusers')->with('success','添加成功');
        }else{
            return redirect('/adminusers/create')->with('error','添加失败');
 
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
        // echo $id;
        // 获取需要修改的数据
        $user=DB::table("users")->where("id",'=',$id)->first();
       //加载模板 分配数据
       return view("Admin.Users.edit",['user'=>$user]);
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
        //echo $id;
        //获取参数
        // $a=$request->all();
        // dd($a);
        $data=$request->except(['_token','_method']);
        // dd($data);
        if(DB::table('users')->where("id",'=',$id)->update($data)){
            return redirect("/adminusers")->with('success','修改成功');
        }else{
            return redirect("/adminusers/{id}/edit")->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id=$id;
        // echo $id;
        if(DB::table('users')->where('id','=',$id)->delete()){
            return redirect("/adminusers")->with('success','删除成功');
        }else{
            return redirect("/adminusers")->with('error','删除失败');
        }
    }
    public function del(Request $request){
        //获取参数id
        $id=$request->input('id');
        //echo $id;
        if(DB::table("users")->where("id","=",$id)->delete()){
            //json格式
            return response()->json(['msg'=>1]);
        }else{
            return response()->json(['msg'=>0]);
        }
    }
}
