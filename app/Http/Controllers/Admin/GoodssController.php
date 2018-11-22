<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
       
        
       // var_dump($data);exit;
        //判断是否有文件上传
        if($request->hasFile('img')){
            //文件初始化名字
             $name=time()+rand(1,10000);
           //获取上传文件后缀
            $ext=$request->file('img')->extension();
          // dd($name.".".$ext);
           //移动到自定的目录下
          $request->file("img")->move("./uploads",$name.".".$ext);
          $data['img']="/uploads/".$name.".".$ext;
          if(DB::table('goods')->insert($data)){
                 return redirect("/good")->with('success','添加成功');
          }else{
                 return redirect("/good")->with('error','添加失败');
          }
        }else{
             return redirect("/good")->with('error','请添加图片');
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

        $data=DB::table("good")->where('id','=',$id)->select()->first();

        $datas=DB::table("goods")->where('good_id','=',$id)->select()->get();
        //dd($datas);
        //dd($datas);
        $num=count($datas);

        return view("Admin.Goods.show",['data'=>$data,'num'=>$num,'datas'=>$datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table("goods")->where('id','=',$id)->select()->first();
        return view("Admin.Goods.showedit",['data'=>$data]);
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

        $data=$request->except('_method','_token');
        if($request->hasFile('img')){
            $img=DB::table("goods")->where('id','=',$id)->select('img')->get();
             unlink('.'.$img[0]->img);
             $name=time()+rand(1,10000);
             $ext=$request->file('img')->extension();
            // dd($name.".".$ext);
           //将新移动到自定的目录下
             $request->file("img")->move("./uploads",$name.".".$ext);
            //拼接路径
             $data['img']="/uploads/".$name.".".$ext;
             if(DB::table("goods")->where('id','=',$id)->update($data)){
                return redirect("/good")->with('success','修改成功');
            }else{
               return redirect("/good")->with('error','修改失败');
            }
        }else{
            if(DB::table("goods")->where('id','=',$id)->update($data)){
                return redirect("/good")->with('success','修改成功');
            }else{
                return redirect("/good")->with('error','修改失败');
            }   
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
        $img=DB::table("goods")->where('id','=',$id)->select('img')->get();
        unlink('.'.$img[0]->img);
        if(DB::table("goods")->where('id','=',$id)->delete()){
                return redirect("/good")->with('success','删除成功');
        }else{
                return redirect("/good")->with('error','删除失败'); 
        }
    }
}
