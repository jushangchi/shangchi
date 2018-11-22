   @extends("Home.AdminPublic.publics")
   @section('homes')
            <div class="sydlbdzz">
                <span style=" display:block; width:100%; height:auto; overflow:hidden; background:#FFF">
                    <em style=" display:block; padding-left:20px; line-height:40px; font-size:14px; color:#666; font-weight:bold">操作提示</em>
                </span>
            </div>
            <div class="sydlbdzz" style=" background:#FFF; border:1px solid #bbb">
                <p style=" display:block; width:90%; height:auto; overflow:hidden; margin:0 auto; font-size:12px; color:#666; line-height:20px; background:#FBEED5; padding:10px;margin-top:6px; margin-bottom:6px; color:#C09853">评价信息最多填写250字，请您根据本次交易，给予真实、客观地评价；您的评价将是其他会员的参考。

您可以根据本次交易情况给予商家评分， 一旦提交后不能修改。</p>
            </div>
            <form action="/order" method="post">
            @foreach($data as $row)
            <input type="hidden" name="user_id" value="{{$row->user_id}}">
            @endforeach
            
            <input type="hidden" name="good_id" value="{{$goods->good_id}}">
            
            <div class="dfdaspjtk">
                <textarea style=" min-height:140px; display:block; min-width:960px; max-height:141px; max-width:961px; border:1px solid #cacace; margin:0 auto; font-size:12px; line-height:20px; color:#111; text-indent:10px; box-shadow:none" name="message" placeholder="评价信息最多填写250字，请您根据本次交易，给予真实、客观地评价；您的评价将是其他会员的参考。

您可以根据本次交易情况给予商家评分， 一旦提交后不能修改。"></textarea>
             </div>
             {{csrf_field()}}
             <input id="btn_submit" type="submit" class="submit" value="提交" style=" width:100px; height:30px; font-size:14px; background:#09f; color:#fff; margin-left:440px; margin-top:20px">
             </form>
<!--页脚-->
<!--footer-->
@endsection
@section("title",'我要评价')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                