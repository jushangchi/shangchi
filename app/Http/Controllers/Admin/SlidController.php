<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SlidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
        $data=DB::table('slid')->select()->get();
        return view('Admin.Slid.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Slid.add');
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

            //判断是否有图片
           if($request->hasFile('img')){
           //文件初始化名字
           $name=time()+rand(1,10000);
           //获取上传文件后缀
           $ext=$request->file('img')->extension();
          // dd($name.".".$ext);
           //移动到自定的目录下
           $request->file("img")->move("./uploads",$name.".".$ext);
           $data['img']="/uploads/".$name.".".$ext;
           if(DB::table('slid')->insert($data)){
            return redirect("/slid")->with('success','添加成功');
           }else{
            return redirect("/slid/create")->with('error','添加失败');
            }
        }else{
            return redirect("/slid/create")->with('error','请添加图片');
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('slid')->where('id','=',$id)->select()->first();
        return view('Admin.Slid.edit',['data'=>$data]);
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
             //$data=$request->except('_token');

     //判断是否有文件上传
      if($request->hasFile('img')){

           //删除原有的图片
            $img=DB::table("slid")->where('id','=',$id)->select('img')->get();
           //进行删除
            unlink('.'.$img[0]->img);
              //文件初始化名字
            $name=time()+rand(1,10000);
           //获取上传文件后缀
             $ext=$request->file('img')->extension();
            // dd($name.".".$ext);
           //将新移动到自定的目录下
             $request->file("img")->move("./uploads",$name.".".$ext);
            //拼接路径
             $data['img']="/uploads/".$name.".".$ext;
             //判断是否修改成功
           
            if(DB::table("slid")->where('id','=',$id)->update($data)){
                return redirect("/slid")->with('success','修改成功');
            }else{
               return redirect("/aslid/edit")->with('error','修改失败');
            }

      }else{    
           
            if(DB::table("slid")->where('id','=',$id)->update($data)){
                return redirect("/slid")->with('success','修改成功');
            }else{
                return redirect("/slid/edit")->with('error','修改失败');
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
        $img=DB::table("slid")->where('id','=',$id)->select('img')->get();
        //dd($img[0]->img);
        unlink('.'.$img[0]->img);
        //如果当前分类下没有子类可以删除
        if(DB::table("slid")->where('id','=',$id)->delete()){
            return redirect("/slid")->with('success','删除成功');
        }else{
            return redirect("/slid")->with('error','删除失败');
        }
    }
    
}
