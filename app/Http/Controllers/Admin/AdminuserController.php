<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载模板 分配数据
        $user = DB::table("admin_users")->paginate(3);
        return view("Admin.Adminuser.index",['user'=>$user]);
        
    }
    //分配角色
    public function rolelist($id){
        // echo $id;
        //获取用户的信息
        $info=DB::table("admin_users")->where("id",'=',$id)->first();
        //获取所有角色
        $role=DB::table("role")->get();
        //获取当前用户的角色信息
        $data=DB::table("user_role")->where("uid",'=',$id)->get();
        //判断
        if(count($data)){
            //当前分配的用户有角色信息
            //遍历
            foreach($data as $v){
                //把角色rid存储在数组里
                $rids[]=$v->rid;
            }
            // echo "<pre>";
            // var_dump($rids);exit;
         return view("Admin.Adminuser.rolelist",['info'=>$info,'role'=>$role,'rids'=>$rids]);

        }else{
            //当前角色没有角色信息
            //加载模板
             return view("Admin.Adminuser.rolelist",['info'=>$info,'role'=>$role,'rids'=>array()]);  
        }
    }

    //保存角色
    public function saverole(Request $request){
        //user_role数据表插入数据 uid rid
        $uid=$request->input('uid');
        //获取rid
        $rid=$_POST['rid'];
        //删除当前用户已有的权限信息
        DB::table("user_role")->where("uid",'=',$uid)->delete();
        // echo '<pre>';
        // var_dump($rid);
        foreach($rid as $key=>$value){
            //封装需要插入的数据
            $data['uid']=$uid;
            $data['rid']=$value;
            //执行插入
            DB::table("user_role")->insert($data);
        }
        return redirect("/adminsuser")->with('success','权限角色成功');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Adminuser.add");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
             //文件初始化名字
       $name=time()+rand(1,10000);
       //获取上传文件后缀
       $ext=$request->file('img')->extension();
      // dd($name.".".$ext);
       //移动到自定的目录下
       $request->file("img")->move("./uploads",$name.".".$ext);
        //获取全部数据
        // $data=$request->all();
        


        //去除多余字段
        $data=$request->except('_token');
        //密码处理
        $data['password']=Hash::make($data['password']);
        $data['img']="/uploads/".$name.".".$ext;
       // dd($data);
        // dd($data);
        if(DB::table("admin_users")->insert($data)){
            return redirect("/adminsuser")->with('success','添加成功');
        }else{
            return redirect("/adminsuser/create")->with('error','添加失败');
        }
    }else{
        return redirect("/adminsuser/create")->with('error','请添加图片');
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
        //接收id值
        // echo $id;
        // 获取需要修改的数据
        $user=DB::table("admin_users")->where("id","=",$id)->first();
        // $user['password']=
        //加载模板  分配数据
        return view("Admin.Adminuser.edit",['user'=>$user]); 
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
        //$res=$request->all();
        $data=$request->except('_method','_token');
        // dd($res);
        if($request->hasFile('img')){
                 //删除原有的图片
            $img=DB::table("admin_users")->where('id','=',$id)->select('img')->get();
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
           
            if(DB::table("admin_users")->where('id','=',$id)->update($data)){
                return redirect("/adminsuser")->with('success','修改成功');
            }else{
               return redirect("/adminsuser/{id}/edit")->with('error','修改失败');
            }
        }else{
        // 去除多余字段
        $data=$request->except(['_token','_method']);
        $data['password']=Hash::make($data['password']);
        // dd($data);
        if(DB::table('admin_users')->where("id","=",$id)->update($data)){
            return redirect("/adminsuser")->with('success','修改成功');
        }else{
            return redirect("/adminsuser/{id}/edit")->with('error','修改失败');
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
        $id = $id;
        // echo $id;
        // 把接收的id 值插入数据表中 进行删除
        if(DB::table('admin_users')->where("id","=",$id)->delete()){
            //进行跳转
            return redirect("/adminsuser")->with('success','删除成功');
        }else{
            return redirect("/adminsuser")->with('error','删除失败');
        }
    }
}
