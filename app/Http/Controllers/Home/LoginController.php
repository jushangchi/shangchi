<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //执行退出
        $request->session()->pull('email');
        //加载模板
        return redirect("homelogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Home.Login.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取邮箱和密码
        $email=$request->input("email");
        $password=$request->input("password");
        //检测邮箱
        $info=DB::table("users")->where("email",'=',$email)->first();
        $id=$info->id;
        // dd($id);
        if($info){
            //检测密码
            if(Hash::check($password,$info->password)){
                //激活状态登录
                if($info->status==2){
                    //把登录的邮箱存储在session里
                    session(['email'=>$email]);
                    session(['id'=>$id]);
                    return redirect("/home");
                }else{
                    return back()->with('error','邮箱没有激活');
                }
            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','用户名有误');
        }
    }
    //忘记密码
    public function forget(){
        //加载模板
        return view("Home.Login.forget");
    }
     //发送邮件方法2
    public function sendmail1($email,$id,$token)
    {
        //在闭包函数内部引入闭包函数外部变量 use
        Mail::send('Home.Login.reset',['id'=>$id,'token'=>$token],function($message)use($email){
             //接收方
            $message->to($email);
            //发送邮件主题
            $message->subject('密码重置');
        });
        return true;
    }
    public function doforget(Request $request){
        //获取邮箱
        $email=$request->input("email");
        //获取数据库的数据
        $info=DB::table("users")->where("email",'=',$email)->first();
        //发送邮件找回密码
        $res=$this->sendmail1($email,$info->id,$info->token);
        if($res){
            echo '重置密码邮件已经发送,请登录邮箱重置密码';
        }
    }
    public function reset(Request $request){
        $id=$request->input('id');
        $info=DB::table("users")->where("id",'=',$id)->first();
        $token=$request->input('token');
        // echo $id.":".$token;
        //加载密码重置模板
        //对比
        if($token==$info->token){
            //加载重置模板
            return view("Home.Login.reset1",['id'=>$id]);
        }
    }
    public function doreset(Request $request){
        // echo '执行密码重置操作';
        $id=$request->input('id');
        $password=$request->input("password");
        $repassword=$request->input("repassword");
        // echo $password.":".$repassword;exit;
        if($password==$repassword){
        //直接做密码修改
        $data['password']=Hash::make($request->password);
        $data['token']=rand(1,10000);
        if(DB::table('users')->where("id",'=',$id)->update($data)){
            
            return redirect("/homelogin/create");
        }
        }else{
            echo '两次密码必须一致!';
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
        //
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
        //
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
