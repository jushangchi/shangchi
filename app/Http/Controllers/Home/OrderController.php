<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=DB::table("order")->join("goods","order.good_id","=","goods.id")->select("order.id as oid","order.num as nums","order.price as money","order.status as statuss","truename","phone","adds","name","img")->get();
         //dd($data);

       // $a = $data['money'];
        //dd();
        return view("Home.Order.index",['data'=>$data]);
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
        $data=$request->except(['_token']);
        //dd($data);
        if(DB::table("message")->insert($data)){
            return redirect("/order");
        }else{
            return redirect("/order");
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
        $id=$id;
        //dd($id);
        
        $data1=DB::table("order")->join("goods","order.good_id","=","goods.id")->select("order.id as oid","order.num as nums","order.price as money","order.status as statuss","truename","phone","adds","name","img")->where('order.id',"=",$id)->get();
        //dd($data1);
        return view("Home.Order.order",['data'=>$data1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $id=$id;
         if(DB::table('order') ->where('id','=', $id) ->update(['status' => 3])){
            return redirect("/order")->with('success','发货成功');
        }else{
            return redirect("/order")->with('error','发货失败');
         }
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


    public function buy($id)
    {
          $id=$id;
         if(DB::table('order') ->where('id','=', $id) ->update(['status' => 1])){
            return redirect("/order")->with('success','购买成功');
        }else{
            return redirect("/order")->with('error','购买失败');
         }

    }

    public function del($id)
    {

        if(DB::table("order")->where("id",'=',$id)->delete()){
            return redirect("/order");
        }else{
            return redirect("/order");
        }
    }

    public function message($id)
    {
        
        $data=DB::table("order")->where("id","=","$id")->get();
        foreach ($data as  $value) {
           $gid=$value->good_id;
        }
        
        //dd($gid);
        $goods = DB::table("goods")->where("id","=","$gid")->first();
        //dd($goods);
        
        return view("Home.Order.message",['data'=>$data,'goods'=>$goods]);

    }
}
