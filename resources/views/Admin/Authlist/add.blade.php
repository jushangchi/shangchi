@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>

 <body>
  
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="width:100%"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-indent red"></i>权限添加</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
     
     </div> 
    </div> 
    <div class="panel-body"> 
     <form action="/authlist" method="post" enctype="multipart/form-data" class="form-horizontal "> 
      
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">权限名</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="name" class="form-control" placeholder="Text" /> 
        <span class="help-block"></span> 
       </div> 
      </div> 
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">控制器</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="mname" class="form-control" placeholder="Text" /> 
        <span class="help-block"></span> 
       </div> 
      </div>
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">方法</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="aname" class="form-control" placeholder="Text" /> 
        <span class="help-block"></span> 
       </div> 
      </div>              
      {{csrf_field()}}
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="bk-margin-5 btn btn-primary" value="提交">
     </form> 
    </div> 
   </div> 
   <div class="panel panel-default bk-bg-white"> 
   
    
   </div> 
  </div>

 </body>

</html>
@endsection
@section('title','权限添加')