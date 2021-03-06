@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>

 <body>
  
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-left:400px"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-indent red"></i>添加广告</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
     
     </div> 
    </div> 
    <div class="panel-body"> 
     <form action="/adv" method="post" enctype="multipart/form-data" class="form-horizontal "> 
      
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">广告名</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="name" class="form-control" placeholder="Text" /> 
        <span class="help-block"></span> 
       </div> 
      </div> 
    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">分类图片</label>
                      <div class="col-md-9">
                        <input type="file" id="file-input" name="pic">
                        <input type="hidden" name="img">
                      </div>
                    </div>
     
     <div class="form-group">
                      <label class="col-md-3 control-label">状态</label>
                      <div class="col-md-9">
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio1" name="status" value="1" checked> 
                          <label for="inline-radio1">启用</label>
                        </div>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio2" name="status" value="2"> 
                          <label for="inline-radio2">禁用</label>
                        </div>
      
                      </div>
                    </div>
                    <input type="hidden" name="">
                  
                    {{csrf_field()}}
      
      <input type="submit" class="bk-margin-5 btn btn-primary" value="提交">
  
      <br /> 
     </form> 
    </div> 
   </div> 
   <div class="panel panel-default bk-bg-white"> 
   
    
   </div> 
  </div>

 </body>

</html>
@endsection
@section('title','广告添加')