<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table="users";

    public $timestamps=true;

   // protected $fillable['username','password','email','status','token','phone'];

   public function getStatusAttribute($value){
    	//处理
    	$status=[0=>'未激活',1=>'启用',2=>'禁用'];
    	return $status[$value];
    }

}
