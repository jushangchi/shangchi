@extends('Admin.AdminPublic.public')
@section('admin')
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="width:100% ">
              <form id="chk-radios-form" action="/saverole" method="post">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h6><i class="fa  fa-check-circle-o bk-fg-warning"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色管理</font></font></h6>                 
                    <div class="panel-actions">
                      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
                      <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 align="center">当前用户:{{$info->name}}的角色信息</h4>
                  </div>
                  <div class="panel-body">
                  <div style="margin-left:45%">
                   <div class="col-sm-8">
                             @foreach($role as $row)
                            <div class="checkbox-custom checkbox-success">
                              <input type="checkbox" name="rid[]" value="{{$row->id}}" @if(in_array($row->id,$rids)) checked @endif>
                                <label>
                                  {{$row->name}}
                                  <font style="vertical-align: inherit;"></font>
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
                        <input type="hidden" name="uid" value="{{$info->id}}">
                        <button class="bk-margin-5 btn btn-primary">
                        <font style="vertical-align: inherit;">分配角色</font>
                        </button>
                      </div>
                    </div>
                  </div>                  
                </div>
              </form>
              
@endsection
@section('title','角色列表页')