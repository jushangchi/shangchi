<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入模型类
use App\Good;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板
        $data=Good::select()->paginate();
        //dd($data);
        return view("Admin.Goods.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $data=DB::table('cates')->select()->where('pid','>',0)->get();
        //dd($data);
        return view("Admin.Goods.add",['data'=>$data]);
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
        if($request->hasFile('img')){
            $name=time()+rand(1,10000);
            $ext=$request->file('img')->extension();
            $request->file("img")->move("./uploads",$name.".".$ext);
            $data['img']="/uploads/".$name.".".$ext;
            if(Good::create($data)){
                return redirect('good')->with('success','添加成功');
            }else{
                return redirect("/good/create")->with('error','添加失败');
            }
        }else{
            return redirect("/good/create")->with('error','请添加图片');
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
        $data=Good::select()->where('id','=',$id)->paginate();
       // dd($data);
        //加载模板
          return view("Admin.Goods.edit",['data'=>$data]);
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
            $info=DB::table("good")->where("id",'=',$id)->first();
            //判断是否修改文件
            if($request->hasFile('img') && isset($data['content'])){
      
                preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
                 foreach ($arr[1] as  $value) {
                     unlink('.'.$value);
                }
                unlink('.'.$info->img);
                $name=time()+rand(1,10000);
                $ext=$request->file('img')->extension();
                $request->file("img")->move("./uploads",$name.".".$ext);
                $data['img']="/uploads/".$name.".".$ext;
                if(Good::where("id","=",$id)->update($data)){
                    return redirect("/good")->with('success','修改成功');
                }else{
                    return redirect("/good")->with('error','删除成功');
                }
            }elseif($request->hasFile('img')){
                unlink('.'.$info->img);
                $name=time()+rand(1,10000);
                $ext=$request->file('img')->extension();
                $request->file("img")->move("./uploads",$name.".".$ext);
                $data['img']="/uploads/".$name.".".$ext;
                if(Good::where("id","=",$id)->update($data)){
                    return redirect("/good")->with('success','修改成功');
                }else{
                    return redirect("/good")->with('error','删除成功');
                }
            }elseif(isset($data['content'])){
                    preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
                 foreach ($arr[1] as  $value) {
                     unlink('.'.$value);
                }
                if(Good::where("id","=",$id)->update($data)){
                    return redirect("/good")->with('success','修改成功');
                }else{
                    return redirect("/good")->with('error','删除成功');
                }
            }else{
                 if(Good::where("id","=",$id)->update($data)){
                    return redirect("/good")->with('success','修改成功');
                }else{
                    return redirect("/good")->with('error','删除成功');
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

        //获取要删除的图片
        $info=DB::table("good")->where("id",'=',$id)->first();
        //获取要删除的路径
        preg_match_all('/<img.*?src="(.*?)".*?>/is',$info->content,$arr);
       // dd($info->img);
        foreach ($arr[1] as  $value) {
                unlink('.'.$value);
        }
        
        unlink('.'.$info->img);
        if(DB::table('good')->where('id','=',$id)->delete()){

            return redirect("/good")->with('success','删除成功');
        }else{
            return redirect("/good")->with('error','删除失败');
        }
    }
}