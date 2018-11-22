<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class collectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取当前用户id
        $id = session('id');
        
        //获取此用户收藏的商品
        $data=DB::table('good')->join('collect','good.id','=','collect.goodid')->where('uid','=',$id)->select()->get();
        //dd($data);

        return view('Home.Center.collect',['data'=>$data]);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
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

        $uid = session('id');
        //删除要删除的商品
        if(DB::table('collect')->where('id','=',$id)->where('uid','=',$uid)->delete()){
                return redirect('collect');
        }else{
                return redirect('collect');
        }
    }
    //收藏商品
    public function coll()
    {

         $data['goodid']=json_encode($_GET['a'],JSON_NUMERIC_CHECK);
         $data['uid']=session('id');
         $data['static']=0;
         if(DB::table('collect')->insert($data)){
                echo '收藏成功';
         }else{
                echo '收藏失败';
         }

            
         
    }
}
