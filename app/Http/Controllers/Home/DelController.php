<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DelController extends Controller
{
    public function shanchu(){

        $info=DB::table("users")->where("status",'=',1)->delete();
        return redirect("/del");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Home.Register.successs");
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
     //支付成功
    public function cartsuccess(Request $request)
    {
        // dd($request->all());
        if($request->input('adds') && $request->input('phone') && $request->input('truename')){
         $data= session('cart');
         // dd($data);
        foreach($data as $k=>$row){
            
            $data[$k]['adds'] = $request->input('adds');
            $data[$k]['phone'] = $request->input('phone');
            $data[$k]['truename'] = $request->input('truename');
            $data[$k]['price']= $request->input('price');
            $data[$k]['user_id']=session('id');
            $data[$k]['status']=0;
            $data[$k]['hao']=time();
        }

            session(['cart'=>$data]); 
            if(DB::table("order")->insert($data)){
                
                return view("Home.Cart.zhifu",['data'=>$data]);
        
    }else{
        echo '2';
    }
        }else{
            return view("Home.Cart.center");
    }
    }
    //支付页面
    public function zhifu(Request $request)
    {
        $data=session('cart');
        // dd($data);
        foreach($data as $key=>$val){
            $num[$key]=$val['num'];
            $nu=$val['num'];
            $num[$key]=$val['good_id'];
            $good_id= $num[$key]=$val['good_id'];
            $numm=DB::table("goods")->where("id",'=',$good_id)->select('num')->get();

            $res=$numm[0]->num-intval($val['num']);
            DB::table("goods")->where("id",'=',$good_id)->update(['num'=>$res]);
        }
             // dd($res);
            $hao=$request->all();
            // dd($hao);
            if(DB::table("order")->where("hao",'=',$hao)->update(['status' => 1])){
                
                $request->session()->pull('cart');
                
                return view("Home.Cart.success");
            }else{
                echo '支付失败';
                return view("/home");
            }
        
    }
}
