<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('star')->select()->get();
        return view("Admin.Star.star",['data'=>$data]);
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
    public function store(Request $request)
    {
        $id=$request->input('id');
        $id=intval($id);
        if(count($data=DB::table('good')->where('id','=',$id)->select()->get())){
                $list=array(
                'good_id'=>$data[0]->id,
                'name'=>$data[0]->title,
                'price'=>$data[0]->price,
                'img'=>$data[0]->img
                );
            if(DB::table('star')->insert($list)){
                    return redirect("/star")->with('success','添加成功');
            }else{
                return redirect("/star")->with('error','添加失败');
            }
        }else{
                return redirect("/star")->with('error','没有这个商品');
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
        if(DB::table('star')->where('id','=',$id)->delete()){
            return redirect("/star")->with('success','删除成功');
        }else{
            return redirect("/star")->with('error','删除失败');
        }
    }
}
