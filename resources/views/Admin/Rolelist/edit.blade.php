@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>

 <body>
  
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-left:400;width:100%"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-indent red"></i>修改角色</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
     </div> 
    </div>

    <div class="panel-body"> 
     <form action="/role/{{$role->id}}" method="post" enctype="multipart/form-data" class="form-horizontal "> 
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">角色名</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="name" class="form-control"  value="{{$role->name}}"> 
        <span class="help-block"></span> 
       </div> 
      </div>                  
      {{csrf_field()}}
      {{method_field("PUT")}}
      <input type="submit" class="bk-margin-5 btn btn-primary" value="提交">
     </form> 
    </div> 
   </div> 
   <div class="panel panel-default bk-bg-white"> 
   
    
   </div> 
  </div>

 </body>

</html>
@endsection
@section('title','角色修改')