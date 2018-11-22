   @extends("Home.AdminPublic.publics")
   @section('homes')

						        <!--right-->
						        <div class="zuirifip">
						        
								<div class="grzxbj">
								<div class="selfinfo center">
								
								<div class="rtcont">
									<div class="mws-panel-body no-padding"> 
						    			<form class="mws-form" action="/center/{{$id}}" method="post" > 
									
									      
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">真实姓名
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="truename" value="{{$info->truename}}" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">联系方式
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="phone" value="{{$info->phone}}" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">家庭住址
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="address" value="{{$info->address}}" /> 
									       </div> 
									      </div> 
									      <div class="mws-form-inline"> 
									      <div class="mws-form-row"> 
									       <label class="mws-form-label">个人签名
									       </label> 
									       <div class="mws-form-item"> 
									        <input type="text" class="large" name="sign" value="{{$info->sign}}"  /> 
									       </div> 
									      </div> 
									       

									     
									      
									      
									      
									      	
									     <div class="mws-button-row"> 
									      {{csrf_field()}}
									      {{method_field("PATCH")}}
									      <input type="submit" value="确认修改" class="btn btn-success">
									       
									      
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
@section("title",'完善资料')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                