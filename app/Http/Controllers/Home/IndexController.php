<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //公共方法
    public function getcatesbypid($pid){
        $res=DB::table("cates")->where("pid",'=',$pid)->get();
        $data=[];
        //遍历把对应的子类信息 添加到suv下标里
        foreach($res as $key=>$value){
            $value->suv=$this->getcatesbypid($value->id);
            $data[]=$value;
        }
        return $data;
    }

    public function index(Request $request)
    {
         
            //获取轮播图
            $slid=DB::table('slid')->where('status','=',1)->select()->get();
            $cate=$this->getcatesbypid(0);
            $star=DB::table('star')->select()->get();
            //广告数据
            $adv=DB::table('adver')->where('status','=',1)->select()->paginate(5);
            //获取商品
            $good=DB::table('good')->where('status','=',2)->select()->get();
            //友情链接
            $filn=DB::table('flink')->where('status','=',1)->select()->get();
            // dd($cate);
            //$data=DB::table('cates')->get();
            // dd($data);
            return view('Home.index',['cate'=>$cate,'star'=>$star,'slid'=>$slid,'adv'=>$adv,'good'=>$good,'filn'=>$filn]);
            
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //echo $id;exit;
        $cate=$this->getcatesbypid(0);
        $data=DB::table('good')->where('cate_id','=',$id)->select()->get();
        //dd($data);
        
        //加载模板
        return view("Home.goodlist",['data'=>$data,'cate'=>$cate]);
    }
    //搜索
    public function shows(Request $request)
    {       
            $cate=$this->getcatesbypid(0);
            $name=$request->input('name');
            $data=db::table('good')->where('title', 'like','%'.$name.'%')->get();
            //dd($data);
            return view("Home.goodlist",['data'=>$data,'cate'=>$cate]); 
    }
    //价格排序
    public function price($id)
    { 
         $cate=$this->getcatesbypid(0);
        $data=DB::table('good')->where('cate_id','=',$id)->orderby("price",'asc')->get();
        //dd($data);
        //加载模板
        return view("Home.goodlist",['data'=>$data,'cate'=>$cate]);
    }
   //商品详情
    public function list($id)
    {      
            
             //获取评论数据
            $mess=DB::table('message')->join('users','message.user_id','=','users.id')->where('good_id','=',$id)->select('message.message as pname','users.username as uname')->get();
            //dd($mess);
             //获取产品明星数据
             $star=DB::table('star')->select()->get();
             //var_dump($star);
             //获取版本数据
             $good=DB::table('goods')->where('good_id','=',$id)->select()->get();
             //获取商品数据
             $goods=DB::table('good')->where('id','=',$id)->select()->first();
             //加载广告
             $adver=DB::table('adver')->select()->get();
             //加载模板
             return view("Home.good",['good'=>$good,'goods'=>$goods,'star'=>$star,'mess'=>$mess,'adver'=>$adver]);
    }
    //版本选择
    public function memory( Request $request, $id)
    {
        
        $memorys =$request->input('memorys');
        $good=DB::table('goods')->where('good_id','=',$id)->select()->get();
        
        $gooda =DB::table('goods')->where('good_id','=',$id)->where('memory','=',$memorys)->select()->first();
        $goods=DB::table('good')->where('id','=',$id)->select()->first();
            // //加载模板
             return view("Home.good",['good'=>$good,'goods'=>$goods,'gooda'=>$gooda]);
        
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
       
        
    }
}
