<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adv;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $k=$request->input('keywords');

        $data=Adv::where("name",'like','%'.$k.'%')->paginate(3);
        //dd($data);
        return view("Admin.Adv.index",['data'=>$data]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Adv.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


     {
        //dd($request->all());
        if($request->hasFile('pic')){
        //初始化名字
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        // $ext=$request->file('pic')->extension();
        $ext=$request->file("pic")->getClientOriginalExtension();
        // dd($ext);
        //移动到指定的目录下（提前在public下新建uploads目录）
        $request->file("pic")->move("/uploads",$name.".".$ext);
        }else{
            return redirect("/adv/create")->with('error','请添加图片');


        }
        $data=$request->except(['repassword','_token','pic']);

        $img="/uploads/".$name.".".$ext;
        $data['img']=$img;
        if(Adv::create($data)){
            return redirect("/adv")->with('success','添加成功');
        }else{
            return redirect("/adv/create")->with('error','添加失败');
        }
        //dd($data);
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
        $adv=Adv::where("id",'=',$id)->first();
        //加载模板 分配数据
        return view("Admin.Adv.edit",['adv'=>$adv]);
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

       // dd($request->all());
        if($request->hasFile('pic')){
        //初始化名字
        unlink('.'.$request->input('oldimg'));
        $name=time()+rand(1,10000);
        //获取上传文件后缀
        // $ext=$request->file('pic')->extension();
        $ext=$request->file("pic")->getClientOriginalExtension();
        // dd($ext);
        //移动到指定的目录下（提前在public下新建uploads目录）
        $request->file("pic")->move("./uploads",$name.".".$ext);
       
        
        $data=$request->except(['_token','_method','pic','oldimg']);
        //dd($data);
        //执行修改
        $img="./uploads/".$name.".".$ext;
        $data['img']=$img;
        //dd($data); 
         }else{

            $data=$request->except(['_token','_method']);
            $img=$data['oldimg'];
            $data['img']=$img;
            if(Adv::where("id",'=',$id)->update($data)){

            return redirect("/adv")->with('success','修改成功');
        }else{
            return redirect("/adv/{id}/edit")->with('error','修改失败');

        }



         }
        //dd($img);
         //$oldimg=$data['oldimg'];
       // //dd("$oldimg");
       //  unlink($oldimg);
       //  $data=$request->except(['oldimg']);
        
        //dd($data);
        if(Adv::where("id",'=',$id)->update($data)){

            return redirect("/adv")->with('success','修改成功');
        }else{
            return redirect("/adv/{id}/edit")->with('error','修改失败');

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
        
        //dd($id);
        if(Adv::where("id",'=',$id)->delete()){
            return redirect("/adv")->with('success','删除成功');
        }else{
            return redirect("/adv")->with('error','删除失败');
        }

        
        //dd($a);
    }
}
