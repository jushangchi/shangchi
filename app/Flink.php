<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flink extends Model
{
    protected $table="flink";
    //开启自动维护时间戳 创建消息时间字段 created_at  修改消息时间字段 updated_at
    public $timestamps=false;
    //可以被批量赋值的属性字段
    protected $fillable=['id','name','link','status'];

    //修改器方法 可以自动处理获取到的数据 Status 数据表字段 getAttribute()获取字段属性值
    public function getStatusAttribute($value){
    	//自动处理
    	$status=[0=>'未激活',1=>'启用',2=>'禁用'];
    	//返回数据
    	return $status[$value];
    }
}
