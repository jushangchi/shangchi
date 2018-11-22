<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = session('id');

        $add=DB::table("address")->join("users_info",'users_info.users_id','=','address.user_id')->where('users_id','=',$id)->select('truename','phone','adds')->get();

        $data=session('cart');
        //dd($data);
        $a="";
        $data1=array();
          if(!empty($data)){
        //遍历
        foreach($data as $key=>$value){
            //获取商品数据
            // dd($value['id']);
            // dd($request->session()->all());
            $info=DB::table("goods")->where("id",'=',$value['good_id'])->first();
          
            // dd($info);
            $row['img']=$info->img;
            $row['name']=$info->name;
            //$row['num']=1;
            $row['num']=$value['num'];
            $row['price']=$info->price;
            $row['good_id']=$value['good_id'];
            // dd($row);
            $data1[]=$row;
            $a+=$row['num']*$row['price'];
        }

        // 加载模板 分配数据
        return view("Home.Cart.index",['data1'=>$data1,'a'=>$a,'add'=>$add,]);
            }else{
        // 加载模板 分配数据
        return view("Home.Cart.indexx"); 
    } 
    }
    //加
    public function updates($id){
        // echo $id;exit;
        //获取session数据
        $goods=session('cart');
        // dd($goods);
        //遍历
        foreach($goods as $key=>$value){
            //对比
            if($value['good_id']==$id){
                //数量加1
                $s=$value['num']+1;
                $goods[$key]['num']=$s;
                //获取商品数据
                $info=DB::table("goods")->where("id",'=',$id)->first();
                //对比
                if($goods[$key]['num']>$info->num){
                    $goods[$key]['num']=$info->num;
                }
            }

        }

        
        session(['cart'=>$goods]);
        //跳转到购物车页面
       return redirect("/homecart");
    }
    //减
    public function updatee($id){
        //获取session 数据
        $goods=session("cart");
        //遍历
        foreach($goods as $key=>$value){
           if($value['id']==$id){
            $s=$value['num']-1;
            $goods[$key]['num']=$s;
            if($goods[$key]['num']<1){
                $goods[$key]['num']=1;
            }
           } 
        }
        session(['cart'=>$goods]);
        return redirect("/homecart");
    }
     //删除
    public function cartdel($id){
        $goods=session('cart');
        //遍历
        foreach($goods as $key=>$value){
            if($value['good_id']==$id){
                //删除
                unset($goods[$key]);
            }
        }

        session(['cart'=>$goods]);
        return redirect("/homecart");
    }
    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //购物车去重 $id 商品id
    public function checkExists($id){
        //获取session数据
        $goods=session('cart');
        if(empty($goods)) return false;
        //遍历数据
        foreach($goods as $key=>$value){
            if($value['good_id']==$id){
                return true;
            }
        }
    }
    public function store(Request $request)
    {
        $data=$request->input('good_id'); 
         if($data==0){
            return view("Home.dump");
         }
        // 获取session 传过来的id
        if($request->session()->has('id')){
         $id = session('id');
        
        // dd($id);
        //去除多余字段 
        $data=$request->except(['_token']);
        //dd($data);
        // 存储在session里
        if(!$this->checkExists($data['good_id'])){
            //存储在session里
            $request->session()->push('cart',$data);
        }
        
        //跳转购物车模板页面
        return redirect("/homecart");
    	}else{
    		return redirect("/homelogin");
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
