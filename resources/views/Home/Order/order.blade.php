   @extends("Home.AdminPublic.publics")
   @section('homes')
            @foreach($data as $row)
            <div class="dfdaspjtk">
                <span style=" display:block; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666; border-bottom:1px dashed #cacace">订单信息</span>   
                <!--一条开始-->
                <div class="qieken">
                    <em>商品名称:</em>
                   
                    <span>{{$row->name}} X {{$row->nums}}</span>
                </div>
                <div class="qieken">
                    <em>收货地址:</em>
                   
                    <span>{{$row->adds}}</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>收货人:</em>
                    <span>{{$row->truename}}</span>
                    <span></span>
                    <span></span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>联系方式:</em>
                    <span>{{$row->phone}}</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>订单编号:</em>
                    <span>{{$row->oid}}</span>
                </div>
                
                <!--一条结束-->
                 <!--一条开始-->
                <div class="qieken">
                    <em>支付方式:</em>
                    <span>在线支付</span>
                </div>

                <div class="qieken">
                    <em>付款金额:</em>
                    <span>￥{{$row->money*$row->nums}}</span>
                </div>
                <!--一条结束-->
            </div>
            @endforeach
<!--个人中心结束-->
<!--页脚-->
<!--footer-->
@endsection
@section("title",'个人中心')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                