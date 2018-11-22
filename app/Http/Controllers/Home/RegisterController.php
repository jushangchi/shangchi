<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
//引入第三方验证码类库
use Gregwar\Captcha\CaptchaBuilder;
use Hash;
use DB;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载注册模板
        return view("Home.Register.register");
    }
    //测试发送
    public function send()
    {
        // echo 'this is send';
        Mail::raw('this is nideiei',function($message){
            //接收方
            $message->to('1144185631@qq.com');
            //发送邮件主题
            $message->subject('o2o29 666666666');
        });
    }
    public function a(Request $request){
        // echo 'this is  a function';
        $id=$request->input('id');
        // echo $id;
    }
    //验证码引入
    public function code()
    {
        //清除
        ob_clean();
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        //生成验证码图片
        $builder->output();

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
    //发送邮件方法2
    public function sendmail1($email,$id,$token)
    {
        //在闭包函数内部引入闭包函数外部变量 use
        Mail::send('Home.Register.jihuo',['id'=>$id,'token'=>$token],function($message)use($email){
             //接收方
            $message->to($email);
            //发送邮件主题
            $message->subject('用户激活');
        });
        return true;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $email=$request->input('email');
            
            $users=DB::table("users")->where('email','=',$email)->get();

            if(!$users->all()){
                //获取密码
                $password=$request->input('password');
                $repassword=$request->input('repassword');
                // echo $password.":".$repassword;exit;
                if($password==$repassword){
                
                    //获取输入的校验码
                    $fcode=$request->input("fcode");
                    //获取系统验证码
                    $vcode=session('vcode');
                    // echo $fcode.":".$vcode;
                    if($fcode==$vcode){
                        // echo 'ok';
                        $data=$request->only(['email','password']);
                        $data['password']=Hash::make($data['password']);
                        // dd($data);
                        $rand=rand(1,100000);
                        $data['username']="用户".$rand;
                        $data['status']=1;//1=>未激活 2=>激活状态
                        $data['token']=rand(1,10000);
                        $data['phone']="请填写手机号";
                        //获取插入数据的id
                        $id=DB::table('users')->insertGetId($data);
                        DB::table('users_info')->insert(['users_id' => $id]);
                        if($id){
                            // echo 'ok';
                            // 发送邮件 激活用户 把status 1值由1=>2
                            //调用发送邮件方法
                            $res=$this->sendmail1($data['email'],$id,$data['token']);
                            if($res){
                                echo '激活用户的邮件已经发送,请登录邮箱激活用户';
                                
                                    }
                                }
                            
                            }else{
                                return back()->with('error','验证码输入错误');
                               }
                           }else{
                                echo '两次密码必须一致';
                           }
                                 }else{
                                     return view("Home.Register.error");
                           }
    }

    public function jihuo(Request $request)
    {
        // echo 'this is jihuo';
        $id=$request->input("id");
        //获取数据表的数据
        $info=DB::table("users")->where("id",'=',$id)->first();
        // echo $id;
        //获取token
        $token=$request->input("token");
        if($token==$info->token){
            //封装需要修改的数据
            $data['status']=2;
            //重新生成token
            $data['token']=rand(1,10000);

            if(DB::table("users")->where("id",'=',$id)->update($data)){
                //用户激活成功
                //加载模板
                return view("Home.Register.success");
            }
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
