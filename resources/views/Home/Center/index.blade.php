   @extends("Home.AdminPublic.publics")
   @section('homes')

						        <!--right-->
						        <div class="zuirifip">
						        
								<div class="grzxbj">
								<div class="selfinfo center">
								
								<div class="rtcont">
									@foreach($data as $row)
									<div class="mws-panel-body no-padding"> 
						    			<form class="mws-form" action="/center/{{$row->id}}/edit" method="post" > 
									     <div class="mws-form-inline"> 
										
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">昵称
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="username"  value="{{$row->username}}" disabled="none" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">注册邮箱
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="email"  value="{{$row->email}}"disabled="none" /> 
									       </div> 
									      </div>
									      @endforeach
									      @foreach($data1 as $row1)
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">真实姓名
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="truename"  value="{{$row1->truename}}"disabled="none" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">联系方式
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="phone"  value="{{$row1->phone}}"disabled="none" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">家庭住址
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="address"  value="{{$row1->address}}"disabled="none" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">个人签名
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="sign"  value="{{$row1->sign}}"disabled="none" /> 
									       </div> 
									      </div> 
									      

									     
									      
									      
									      
									      	
									     <div class="mws-button-row"> 
									      {{csrf_field()}}
									      {{method_field('PUT')}}
									      <a href="/center/{{$row1->users_id}}/edit" class="bk-margin-5 btn btn-warning btn-circle"><i class="fa fa-pencil-square-o"></i>完善信息 </a>
									      
									      @endforeach
									     </div> 
									    </form> 
									   </div> 
									
									</div>
									<div class="clear"></div>
									</div>
							</div>

						        </div>
        <!--right结束-->
    </div>
    <!--详细列表结束-->
</div>
<br/>
<!--个人中心结束-->
<!--页脚-->
<!--footer-->
@endsection
@section("title",'个人中心')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                