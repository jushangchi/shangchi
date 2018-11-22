@extends('Admin.AdminPublic.public')
@section('admin')

         
              <div class="panel panel-default bk-bg-white">
                <div class="panel-heading bk-bg-white">
                  <h6><i class="fa fa-indent red"></i>商品型号</h6>              
                  <div class="panel-actions">
                    <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
                    <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <form action="/goods/{{$data->id}}" method="post" enctype="multipart/form-data" class="form-horizontal ">
                   
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="text-input">名称</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="name" class="form-control" placeholder="Text" value="{{$data->name}}">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="text-input">价格</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="price" class="form-control" placeholder="Text" value="{{$data->price}}">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="email-input">库存</label>
                      <div class="col-md-9">
                        <input type="text" id="email-input" name="num" class="form-control" placeholder="Text" value="{{$data->num}}">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label">状态</label>
                      <div class="col-md-9">
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio1" name="status" value="1"> 
                          <label for="inline-radio1"> 启用</label>
                        </div>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio2" name="status" value="2"> 
                          <label for="inline-radio2"> 禁用</label>
                        </div>
                       
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">原始图片</label>
                      <div class="col-md-9">
                      <img src="{{$data->img}}" style="width: 60px;height: 60px">
                      </div>
                    </div>
                 
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="file-input">图片</label>
                      <div class="col-md-9">
                        <input type="file" id="file-input" name="img">
                      </div>
                    </div>
                   
                     {{csrf_field()}}
                     {{method_field("PATCH")}}
                    <br>
                    <button type="submit" class="bk-margin-5 btn btn-primary">提交</button>
                  </form>
                </div>                
              </div>
    
@endsection
@section('title','型号修改')