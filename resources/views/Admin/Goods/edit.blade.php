@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/static/Admin/ueditor/lang/zh-cn/zh-cn.js"></script>
 <body>
  
  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="width: 1440px;"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-indent red"></i>修改商品</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
     
     </div> 
    </div> 
    <div class="panel-body"> 
      @foreach($data as $row)
     <form action="/good/{{$row->id}}" method="post" enctype="multipart/form-data" class="form-horizontal "> 
      
      <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input" >商品名称</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="title" class="form-control" placeholder="Text" value="{{$row->title}}" /> 
        <span class="help-block"></span> 
       </div> 
      </div> 
    <div class="form-group"> 
       <label class="col-md-3 control-label" for="text-input">商品价格</label> 
       <div class="col-md-9"> 
        <input type="text" id="text-input" name="price" class="form-control" placeholder="Text" value="{{$row->price}}" /> 
        <span class="help-block"></span> 
       </div> 
      </div> 
     
    
     <div class="form-group">
                      <label class="col-md-3 control-label">状态</label>
                      <div class="col-md-9">
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio1" name="status" value="1"> 
                          <label for="inline-radio1">启用</label>
                        </div>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio2" name="status" value="2"> 
                          <label for="inline-radio2">禁用</label>
                        </div>
                         </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">原始图片</label>
                      <div class="col-md-9">
                        <img src="{{$row->img}}" style="width: 100px;height: 100px">
                      </div>
                    </div>
                      
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">商品图片</label>
                      <div class="col-md-9">
                        <input type="file" id="file-input" name="img" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">商品介绍</label>
                      <div class="col-md-9">
                       <script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"></script>
                      </div>
                    </div>
                 
                    {{csrf_field()}}
                     {{method_field("PATCH")}}
      <input type="submit" class="bk-margin-5 btn btn-primary" value="提交">
  
      <br /> 
     </form> 
     @endforeach
    </div> 
   </div> 
   <div class="panel panel-default bk-bg-white"> 
   
    
   </div> 
  </div>
  </div>
 </body>
 <script type="text/javascript">
    var ue = UE.getEditor('editor');
 </script>
</html>
@endsection
@section('title','修改商品')