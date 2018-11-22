@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-table red"></i><span class="break"></span>用户收藏列表</h6>
    </div>
    <div class="panel-body"> 
     <div class="row" style="margin-left:75%">
        <form class="form-inline" action="/collect" method="get">
          <input type="text" name="username" class="form-control" placeholder="请输入用户名进行搜索" value="{{$request['username'] or ''}}">&nbsp;<a href="" class="btn btn-info">搜索</a>
        </form>
      <div class="col-sm-6"> 
      </div> 
     </div><br> 
     <div id="datatable-editable_wrapper" class="dataTables_wrapper no-footer">
      
      <div class="table-responsive">
       <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info"> 
        <thead>
         <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 174px;">ID</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 325px;">用户名</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">商品图片</th>
         </tr> 
        </thead> 
        <tbody>
       @foreach($userc as $row)
         <tr class="gradeA even" role="row"> 
          <td class="sorting_1">{{$row->uid}}</td> 
          <td>{{$row->username}}</td> 
          <td><img src="{{$row->img}}" style="width:60px;height:60px;"></td>
         </tr>
        </tbody> 
        @endforeach
       </table>
      </div>
      <div class="row datatables-footer">
       <div class="col-sm-12 col-md-6">
        <div class="dataTables_info" id="datatable-editable_info" role="status" aria-live="polite">
         Showing 1 to 10 of 57 entries
        </div>
       </div>
       <div class="col-sm-12 col-md-6">
        <div class="dataTables_paginate paging_bs_normal" id="datatable-editable_paginate">
        {{$userc->appends($request)->render()}}
        </div>
       </div>
      </div>
     </div> 
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','用户收藏列表页')