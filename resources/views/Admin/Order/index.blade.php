@extends('Admin.AdminPublic.public')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
   <div class="panel panel-default bk-bg-white"> 
    <div class="panel-heading bk-bg-white"> 
     <h6><i class="fa fa-table red"></i><span class="break"></span>订单列表</h6> 
     <div class="panel-actions"> 
      <a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a> 
      <a href="#" class="btn-close"><i class="fa fa-times"></i></a> 
     </div> 
    </div> 
    <div class="panel-body"> 
     <div class="row"> 
      <div class="col-sm-6"> 
       <div class="bk-margin-bottom-10"> 
        <button id="addToTable" class="btn btn-info">订单列表<i class="fa fa-plus"></i></button> 
       </div> 
      </div> 
     </div> 
     <div id="datatable-editable_wrapper" class="dataTables_wrapper no-footer">
      
      <div class="table-responsive">
       <table class="table table-bordered table-striped mb-none dataTable no-footer" id="datatable-editable" role="grid" aria-describedby="datatable-editable_info"> 
        <thead> 
         <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Template: activate to sort column ascending" style="width: 174px;">订单号</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 325px;">商品名</th>
          
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">价格</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">数量</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">收货人</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">地址</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">联系方式</th>
          <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 369px;">状态</th>
          <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 150px;">发货</th>
         </tr> 
        </thead> 
       
        <tbody> 
         @foreach($data as $row)
         <tr class="gradeA even" role="row"> 
          <td class="sorting_1">{{$row->oid}}</td> 
          <td>{{$row->name}}</td> 
          <td>{{$row->money}}</td> 
          <td>{{$row->nums}}</td>
          <td>{{$row->truename}}</td> 
          <td>{{$row->adds}}</td> 
          <td>{{$row->phone}}</td> 
          @if($row->statuss==0)
           <td>未付款</td> 
           @elseif($row->statuss==1)
           <td>未发货</td>
           @elseif($row->statuss==2)
           <td>已发货</td>
           @elseif($row->statuss==3)
           <td>已收货</td>
           @endif
          <td class="actions"> 
            <form action="/adv/{{$row->oid}}" method="post">
            {{csrf_field()}}
              {{method_field("DELETE")}}
              @if($row->statuss==1)
                <a class="bk-margin-5 btn btn-success btn-circle" href="/adminorder/{{$row->oid}}/edit">发货</a>
              @endif
            </form>
             
              
            </form> 
          </td> 
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
        {{$data->render()}}
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
@section('title','订单列表页')