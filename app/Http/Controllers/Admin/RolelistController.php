<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RolelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有权限信息
        $role=DB::table("role")->get();
        //加载模板
        return view("Admin.Rolelist.index",["role"=>$role]);
        
    }
    //分配权限
    public function auth($id)
    {
        //获取当前操作的角色信息
        $role=DB::table("role")->where("id",'=',$id)->first();
        //获取所有权限信息
        $node=DB::table("node")->get();
        //获取当前角色已有的权限信息
        $data=DB::table("role_node")->where("rid",'=',$id)->get();
        //判断
        if(count($data)){
            //当前角色有权限信息
            //遍历
            foreach($data as $v){
                $nid[]=$v->nid;    
            }
            // echo '<pre>';
            // var_dump($nid);
            //加载模板
       return view("Admin.Rolelist.auth",["role"=>$role,'nid'=>$nid,'node'=>$node,]);
        }else{
            //当前没有权限信息
             //加载模板
            return view("Admin.Rolelist.auth",["role"=>$role,'node'=>$node,'nid'=>array()]);
    }
        }
      //保存角色
      public function saveauth(Request $request){
        //向role_node 插入数据
        //获取角色id
        $rid=$request->input('rid');
        //获取分配的权限id
        $nid=$_POST['nid'];
        // echo $rid;
        // echo '<pre>';
        // var_dump($nid);
        //删除当前角色已有的权限信息
        DB::table("role_node")->where("rid",'=',$rid)->delete();
        //遍历
        foreach($nid as $key=>$value){
            //封装需要插入的数据
            $data['rid']=$rid;
            $data['nid']=$value;
            DB::table("role_node")->insert($data);
        }
        return redirect("/role")->with('success','权限分配成功');
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Rolelist.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=$request->all();
        //去除多余字段
        $data=$request->except('_token');
        // dd($data);
        if(DB::table("role")->insert($data)){
            return redirect("/role")->with('success','添加成功');
        }else{
             return redirect("/role/create")->with('error','添加失败');
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
         // echo $id;
        $role=DB::table("role")->where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.rolelist.edit",['role'=>$role]);
        
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
         // echo 'this is update';
          //接收数据
        $res=$request->all();
        $data=$request->except('_method','_token');
        // dd($data);
        if(DB::table('role')->where("id","=",$id)->update($data)){
            return redirect("/role")->with('success','修改成功');
        }else{
            return redirect("/role/{id}/edit")->with('error','修改失败');
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
        // echo 'this is delete';
         $id = $id;
        // echo $id;
        // 把接收的id 值插入数据表中 进行删除
        if(DB::table('role')->where("id","=",$id)->delete()){
            //进行跳转
            return redirect("/role")->with('success','删除成功');
        }else{
            return redirect("/role")->with('error','删除失败');
        }
    }
}
