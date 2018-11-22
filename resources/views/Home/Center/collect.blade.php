   @extends("Home.AdminPublic.publics")
   @section('homes')
	<link rel="stylesheet" type="text/css" href="/static/Home/css/vipcenter.css">
	<script src="/static/Home/js/jquery-1.8.3.min.js"></script>
	<script src="/static/Home/js/public.js"></script>
   <div class="zuirifip">
        	<!--商品收藏和店铺收藏-->
            <div class="locfre">
            	<a href="#" class="zuliyesi">商品收藏</a>
               
           
            </div>
            <script>
			$(function(){
				$(".locfre a").click(function(){
					$(this).addClass("zuliyesi").siblings().removeClass("zuliyesi")
					})
				})
            </script>
            <!--收藏的商品列表-->
            <div class="feizhoum">
            
            	<ul>
            		@foreach($data as $row)
                	<li>
                    	<img src="{{$row->img}}">
                        <span>
                        	<a href="#">{{$row->title}}</a>
                            <em>{{$row->price}}元</em>
                            <form action="/collect/{{$row->id}}" method="post">
                            	<button style="display:block; width:40px; height:20px; text-align:center; line-height:20px; font-size:12px; color:#fff; background:#09f; margin-top:12px" type="submit">删除</button>
                            	{{method_field('DELETE')}}
                            	{{csrf_field()}}
                            </form>
                            
                        </span>
                    </li>
                   @endforeach
                </ul>
           
            </div>
            <!--收藏商品列表结束-->
        </div>
						  
@endsection
@section("title",'个人中心')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                