<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取当前用户的id
        $id = session('id');
        //查询收货地址
        $data=DB::table('address')->join('users_info','address.user_id','=','users_info.users_id')->where('user_id','=',$id)->select('truename','phone','adds','address.id')->get();
        
        return view('Home.Center.site',['data'=>$data]);
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
        //获取用户的id
        
        //拼接收货地址
        $harea=$request->input('harea');
        $hproper=$request->input('hproper');
        $hcity=$request->input('hcity');
        $cc=$request->input('cc');
        $data['adds']=$hcity.$hproper.$harea.$cc;
        $data['user_id']=session('id');
        if(DB::table('address')->insert($data)){
            return redirect('/site');
        }else{
            return redirect('/site');
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
        if(DB::table('address')->where('id','=',$id)->delete()){
            return redirect('/site');
        }else{
            return redirect('/site');
        }
    }
}
