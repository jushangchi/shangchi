   @extends("Home.AdminPublic.publics")
   @section('homes')

            @foreach($data as $row)
                <div class="gzdlbdzzl" style="float: right;" >
                    <!--左-->
                    <div class="spzhaopin">
                        <a href="#"><img src={{$row->img}}/></a>
                    </div>
                    <!--中-->
                    <div class="youstdongi">
                        <a href="#"><h5 style=" float:left">{{$row->name}}</h5></a>
                        <span>&nbsp;</span>
                       
                        @if($row->statuss==0)
                        <span style=" color:#f00">
                        订单状态：未付款
                        </span>
                        @elseif($row->statuss==1)
                        <span style="color:yellowgreen">
                        订单状态：未发货
                        </span>
                        @elseif($row->statuss==2)
                        <span style=" color:#12c">
                        订单状态：已发货
                        </span>
                        @elseif($row->statuss==3)
                        <span style=" color:#09f">
                        订单状态：已收货
                        </span>
                        @endif
                        
                        <span>订单金额：<s style="color:#f00; font-weight:bold; font-size:14px">￥{{$row->money*$row->nums}}</s>
                        <s style="color:#666; margin-left:10px">({{$row->nums}})件</s>
                        <s style="color:#666; margin-left:10px">免运费</s>
                        <s style="color:#666; margin-left:10px">支付宝</s>
                        <a  style="margin-left:10px">小明的店铺</a>
                        <a  style=" margin-left:10px">交易投诉</a>
                        <a href="/orderdel/{{$row->oid}}" style="color:#F00; cursor:pointer; float:right">删除</a></span>
                        
                        <a href="#" style="color:#F00; cursor:pointer; float:right"></a></span>
                    </div>
                    <!--右-->
                    @if($row->statuss==0)
                    <div class="quzhifubasb">
                        <a href="/orderbuy/{{$row->oid}}">我要付款</a>
                    </div>
                    @elseif($row->statuss==2)
                    <div class="quzhifubasb">
                        <a href="/order/{{$row->oid}}/edit">确认收货</a>
                    </div>
                    @elseif($row->statuss==3)
                    <div class="quzhifubasb">
                        
                        <a href="/order/message/{{$row->oid}}">评论商品</a>
                    </div>
                    @endif
                   
                    <!--右下-->
                    <div class="chakanxiangqingfg">
                        <a href="order/{{$row->oid}}">订单详情</a>
                    </div>
                    <!--右下-->
                    
                </div>
            @endforeach





                
<!--个人中心结束-->
<!--页脚-->
<!--footer-->
@endsection
@section("title",'个人中心')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                