<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AuthlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth=DB::table("node")->get();
        //加载模板
        return view("Admin.Authlist.index",['auth'=>$auth]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Authlist.add");
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        // $data=$request->all();
        //去除多余字段
        $data=$request->except('_token');
        // dd($data);
        if(DB::table("node")->insert($data)){

           return redirect("/authlist")->with('success','添加成功'); 
        }else{
            return redirect("/authlist/create")->with('error','添加失败');
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
        // echo 'this is edit';
        $role=DB::table("node")->where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Authlist.edit",['role'=>$role]);
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
        //接收数据
        $res=$request->all();
        $data=$request->except('_method','_token');
        // dd($data);
        if(DB::table('node')->where("id","=",$id)->update($data)){
            return redirect("/authlist")->with('success','修改成功');
        }else{
            return redirect("/authlist/{id}/edit")->with('error','修改失败');
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
        //
    }
}
