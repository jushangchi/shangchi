@extends('Admin.AdminPublic.public')
@section('admin')
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="width:530px;">
              <div class="panel panel-default form-wizard" id="w1">
                <div class="panel-heading">
                  <h3>商品信息</h3>                   
                  <div class="panel-actions">
                    <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
                    <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body panel-body-nopadding">
                  <h4>商品名称：{{$data->title}}</h4>
                  <h4>起价：￥{{$data->price}}</h4>
                  <h4>添加时间：{{$data->created_at}}</h4>
                  <h4>修改时间：{{$data->updated_at}}</h4>
                </div>      
                
              <div class="panel panel-default bk-bg-white" style="width:500px;margin-top:10px;">
                <div class="panel-heading bk-bg-white">
                  <h6><i class="fa fa-table red"></i><span class="break"></span>{{$data->title}}商品型号共<i style="font-size:40px;color:blue;">{{$num}}</i>件</h6>              
                  <div class="panel-actions">
                    <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
                    <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body" >
                  @foreach($datas as $row)
                  <div class="table-responsive">
                    <table class="table">
                  
                        <tr>
                          <td>{{$row->name}}</td>
                          <td>内存：{{$row->memory}}G</td>
                          <td></td>
                          <td>
                            <form method="post" action="/goods/{{$row->id}}">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <button type="submit" class="label label-default">删除</button>
                            </form>
                          </td>                                        
                        </tr>
                        <tr>
                          <td>价格：{{$row->price}}</td>
                          <td>库存：{{$row->num}}</td>
                          <td>状态：{{$row->status==1?'开启':禁用}}</td>
                          <td>
                            <span class="label label-warning"><a href="/goods/{{$row->id}}/edit">修改</a></span>
                          </td>                                       
                        </tr>                                        
                    </table>
                  </div>
                  <hr/>
                  @endforeach
                </div>
            </div>          
              </div>

            </div >
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="
            margin-left:30px;margin-top: 20px;">
              <div class="panel panel-default bk-bg-white">
                <div class="panel-heading bk-bg-white">
                  <h6><i class="fa fa-indent red"></i>商品型号</h6>              
                  <div class="panel-actions">
                    <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
                    <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                <div class="panel-body">
                  <form action="/goods" method="post" enctype="multipart/form-data" class="form-horizontal ">
                   
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="text-input">名称</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="name" class="form-control" placeholder="Text">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="text-input">价格</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="price" class="form-control" placeholder="Text">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="email-input">库存</label>
                      <div class="col-md-9">
                        <input type="text" id="email-input" name="num" class="form-control" placeholder="Text">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="email-input">内存</label>
                      <div class="col-md-9">
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio1" name="memory" value="12"> 
                          <label for="inline-radio1"> 12G</label>
                        </div>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio2" name="memory" value="64"> 
                          <label for="inline-radio2"> 64G</label>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio1" name="memory" value="128"> 
                          <label for="inline-radio1"> 128G</label>
                        </div>
                        <div class="radio-custom radio-inline">
                          <input type="radio" id="inline-radio2" name="memory" value="256"> 
                          <label for="inline-radio2"> 256G</label>
                        </div>
                        </div>
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
                      <label class="col-md-3 control-label" for="file-input">图片</label>
                      <div class="col-md-9">
                        <input type="file" id="file-input" name="img">
                      </div>
                    </div>
                    <input type="hidden"  name="good_id" value="{{$data->id}}">
                     {{csrf_field()}}
                    <br>
                    <button type="submit" class="bk-margin-5 btn btn-primary">提交</button>
                  </form>
                </div>                
              </div>
            </div>
@endsection
@section('title','型号添加')