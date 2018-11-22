<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //关联数据表
    protected $table = 'good';
    //开启自动维护时间戳
    public $timestamps = true;
    //可以被批量赋值的属性
    protected $fillable = ['title','price','cate_id','img','status','content'];

    public function getStatusAttribute($value){
		$status=[1=>"禁用",2=>"开启"];
		return $status[$value];
	}
}
