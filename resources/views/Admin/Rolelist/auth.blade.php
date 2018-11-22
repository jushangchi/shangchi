@extends('Admin.AdminPublic.public')
@section('admin')
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="width:100% ">
              <form id="chk-radios-form" action="/saveauth" method="post">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h6><i class="fa  fa-check-circle-o bk-fg-warning"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限信息</font></font></h6>                 
                    <div class="panel-actions">
                      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
                      <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 align="center">当前角色:{{$role->name}}的权限信息</h4>
                  </div>
                  <div class="panel-body">
                  <div style="margin-left:45%">
                   <div class="col-sm-8">
                            @foreach($node as $row)
                            <div class="checkbox-custom checkbox-success">
                              <input type="checkbox" name="nid[]" value="{{$row->id}}"@if(in_array($row->id,$nid)) checked @endif >
                                <label>
                                  <font style="vertical-align: inherit;">{{$row->name}}</font>
                                </label>
                            </div>
                            @endforeach
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="error" for="for[]"></label>
                      </div>
                    </div>
                    <div class="row" style="margin-left:25%">
                      <div class="col-sm-9 col-sm-offset-3">
                        {{csrf_field()}}
                        <input type="hidden" name="rid" value="{{$role->id}}">
                        <button class="bk-margin-5 btn btn-primary">
                        <font style="vertical-align: inherit;">分配权限</font>
                        </button>
                      </div>
                    </div>
                  </div>                  
                </div>
              </form>
              <div style="margin-left:45%">
              <button class="btn btn-info" onclick="select(true)">全选</button>
              <button class="btn btn-success" onclick="fanxuan()">反选</button>
              </div>
              <script>
              var  inputs = document.getElementsByTagName('input');
                //全选全不选函数
                function select(bool){
                  // alert(bool);
                  for(var i=0;i<inputs.length;i++){
                    inputs[i].checked=bool;
                  }
                }
                //反选函数
                function fanxuan(){
                  for(var i=0;i<inputs.length;i++){
                    inputs[i].checked = !inputs[i].checked;
                  }
                }
              </script>
@endsection
@section('title','分配权限')