<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//引入DB
use DB;
use Illuminate\Support\Facades\Storage;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载数据
       // $cate=DB::table('cates')->get();
         // $cate=DB::select('SELECT *,concat(path,",",id) as paths FROM cates order by paths');
         $cate=DB::table("cates")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->paginate(5);
        //遍历数据
        foreach($cate as $key=>$value){
            //转换为数组
            $arr=explode(",",$value->path);
            //获取逗号个数
            $len=count($arr)-1;
            //重复字符串函数
            $cate[$key]->name=str_repeat("|-",$len).$value->name;
        }
        //加载商品列表
        return view('Admin.Cates.index',['cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取所有的类别数据
        $cate=DB::table('cates')->get();
        //dd($cate);
        //加载后台商品分类添加方法
         return view('Admin.Cates.add',['cate'=>$cate]);
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
       $data=$request->except('_token');
       $pid=$request->input("pid");
       $data['img']="/uploads/".$name.".".$ext;
       //判断
       if($pid==0){
            //添加顶级分类
         //   
            $data['path']='0';
           // dd($data);
       }else{
            //添加子类
            //获取父类信息
            $info=DB::table('cates')->where('id','=',$pid)->first();
            $data['path']=$info->path.",".$info->id;
            //dd($data);
       }
       if(DB::table('cates')->insert($data)){
            return redirect("/admincates")->with('success','添加成功');
       }else{
            return redirect("/admincates/create")->with('error','添加失败');
       }
    }else{
             return redirect("/admincates/create")->with('error','请添加图片');
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
          //接收要修改的id
          //echo $id;
          //获取数据
          $data=DB::table("cates")->where('id','=',$id)->select()->get();
          //分配数据给模板
          return view('Admin.Cates.edit',['data'=>$data]);

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
            //$data=$request->all();
             $data=$request->except('_method','_token');
             //$data=$request->except('_token');

     //判断是否有文件上传
      if($request->hasFile('img')){

           //删除原有的图片
            $img=DB::table("cates")->where('id','=',$id)->select('img')->get();
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
           
            if(DB::table("cates")->where('id','=',$id)->update($data)){
                return redirect("/admincates")->with('success','修改成功');
            }else{
               return redirect("/admincates")->with('error','修改失败');
            }

      }else{    
           
            if(DB::table("cates")->where('id','=',$id)->update($data)){
                return redirect("/admincates")->with('success','修改成功');
            }else{
                return redirect("/admincates")->with('error','修改失败');
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
        //接收要删除的id
            //echo $id;
        $img=DB::table("cates")->where('id','=',$id)->select('img')->get();
        //dd($img[0]->img);
        unlink('.'.$img[0]->img);
        //如果当前分类下没有子类可以删除
        $res=DB::table("cates")->where('pid','=',$id)->count();
        if($res>0){
            return redirect()->with('error','请先删除子类');
        }
        if(DB::table("cates")->where('id','=',$id)->delete()){
            return redirect("/admincates")->with('success','删除成功');
        }else{
            return redirect("/admincates")->with('error','删除失败');
        }
    }
}
