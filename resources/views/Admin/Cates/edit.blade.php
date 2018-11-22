@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>

 <body>
  
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-left:400px"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-indent red"></i>修改分类</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
     
     </div> 
    </div> 
    <div class="panel-body">
    @foreach($data as $row) 
     <form action="/admincates/{{$row->id}}" method="post" enctype="multipart/form-data" class="form-horizontal "> 
      
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">分类名称</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="name" class="form-control" placeholder="Text" value="{{$row->name}}" /> 
        <span class="help-block">This is a help text</span> 
       </div> 
      </div> 
    
      
     <div class="form-group">
                      <label class="col-md-3 control-label">状态</label>
                      <div class="col-md-9">
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio1" name="static" value="1"> 
                          <label for="inline-radio1">启用</label>
                        </div>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio2" name="static" value="2"> 
                          <label for="inline-radio2">禁用</label>
                        </div>
      
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">分类图片</label>
                      <div class="col-md-9">
                        <input type="file" id="file-input" name="img">
                      </div>
                    </div>
                  
                    {{csrf_field()}}
                    {{method_field("PATCH")}}
      <input type="submit" class="bk-margin-5 btn btn-primary" value="修改">
  
      <br /> 
     </form> 
     @endforeach
    </div> 
   </div> 
   <div class="panel panel-default bk-bg-white"> 
   
    
   </div> 
  </div>

 </body>

</html>
@endsection
@section('title','修改分类')