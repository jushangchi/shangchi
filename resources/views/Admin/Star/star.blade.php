@extends('Admin.AdminPublic.public')
@section('admin')

							<div class="panel panel-default bk-bg-white" style="width:1400px;">
								<div class="panel-heading bk-bg-white">
									<h6><i class="fa fa-indent red"></i>产品明星</h6>							
									<div class="panel-actions">
										<a href="#" class="btn-minimize"><i class="fa fa-caret-up"></i></a>
										<a href="#" class="btn-close"><i class="fa fa-times"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<form action="/star" method="post">
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="text-input">产品ID</label>
											<div class="col-md-9">
												<input type="text" id="text-input" name="id" class="form-control" placeholder="Text">
												<span class="help-block">请输入产品ID</span>
											</div>
										</div>
										 {{csrf_field()}}
										<button type="submit" class="bk-margin-5 btn btn-primary">提交</button>
									</form>
									<table class="table">
										@foreach($data as $row)
											  <thead>
												  <tr>
													  <th>商品图片</th>
													  <th>名称</th>
													  <th>价格</th>
												       <th>操作</th>                      
												  </tr>
											  </thead>   
											  <tbody>
												<tr>
													<td><img src="{{$row->img}}" style="width:100px;height:150px;"></td>
													<td>{{$row->name}}</td>
													<td>￥{{$row->price}}</td>
													<td><form action="/star/{{$row->id}}" method="post">
										            {{csrf_field()}}
										              {{method_field("DELETE")}}
										               <button type="submit" class="bk-margin-5 btn btn-danger btn-xs">删除</button>
										            </form></td>                            
												</tr>		                            
											  </tbody>
											  @endforeach
										</table>
								</div>
							</div>

			
@endsection
@section('title','产品明星')