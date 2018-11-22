<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flink;

class FlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $k=$request->input('keywords');

        $data=Flink::where("name",'like','%'.$k.'%')->paginate(3);
        //dd($data);
        return view("Admin.Flink.index",['data'=>$data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Flink.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except(['repassword','_token']);
        if(Flink::create($data)){
            return redirect("/flink")->with('success','添加成功');
        }else{
            return redirect("/flink/create")->with('error','添加失败');
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
         $flink=Flink::where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Flink.edit",['flink'=>$flink]);
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
        
        $data=$request->except(['_token','_method']);
        //执行修改
        if(Flink::where("id",'=',$id)->update($data)){
            return redirect("/flink")->with('success','修改成功');
        }else{
            return redirect("/flink/{id}/edit")->with('error','修改失败');

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
        if(Flink::where("id",'=',$id)->delete()){
          return redirect("/flink")->with('success','删除成功');
        
        }else{
            return redirect("/flink")->with('error','删除失败');
        }
    }
}
