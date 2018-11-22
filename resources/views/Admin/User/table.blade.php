@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-table red"></i><span class="break"></span>用户列表</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
 
     </div> 
    </div> 
    <div class="panel-body"> 
     <div class="row"> 
      <div class="col-sm-6"> 
       <div class="bk-margin-bottom-10"> 
        <button id="addToTable" class="btn btn-info">Add <i class="fa fa-plus"></i></button> 
       </div> 
      </div> 
     </div> 
     <div id="datatable-editable_wrapper" class="dataTables_wrapper no-footer">
      
      <div class="table-responsive">
       <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info"> 
        <thead> 
         <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 249px;">用户名</th>
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 249px;">邮箱</th>
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 249px;">状态</th>
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 249px;">添加时间</th>
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 249px;">修改时间</th>

          <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 216px;">Actions</th>
         </tr> 
        </thead> 
        <tbody> 
        @foreach($data as $row)
         <tr class="gradeA even" role="row"> 
          <td class="sorting_1">{{$row->username}}</td> 
          <td>{{$row->email}}</td> 
          <td>{{$row->status}}</td> 
          <td>{{$row->addtime}}</td>
          <td>{{$row->deltime}}</td>
          <td class="actions"> <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a> <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a> <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a> <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a> <a href="#" class="on-default remove-row"><i class="fa fa-search"></i></a></td> 
         </tr>
         @endforeach
        </tbody> 
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
         <ul class="pagination">
          <li class="prev disabled"><a href="#"><span class="fa fa-chevron-left"></span></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li class="next"><a href="#"><span class="fa fa-chevron-right"></span></a></li>
         </ul>
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
@section('title','列表')