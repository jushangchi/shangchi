   @extends("Home.AdminPublic.publics")
   @section('homes')
<link rel="stylesheet" type="text/css" href="/static/Home/css/vipcenter.css">
<script src="/static/Home/js/jquery-1.8.3.min.js"></script>
<script src="/static/Home/js/city.js/cityJson.js"></script>
<script src="/static/Home/js/city.js/citySet.js"></script>
<script src="/static/Home/js/city.js/Popt.js"></script>
<link href="/static/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<div class="zuirifip">
        	<!--基本信息-->
            <div class="basedexinxi">
            	<a href="#">我的收货地址</a>
            </div>
            <!--基本信息结束-->
            <!--修改基本信息开始-->
            <div class="baseopxg">
            	@foreach($data as $row)
            	 <div class="thetwobf">
                	<em>已有收货地址：</em><i>收货人：</i><i>{{$row->truename}}</i>
                	<i>收货人电话：</i><i>{{$row->phone}}</i><br/>
					<i>地址：</i><i>{{$row->adds}}</i>
					<div style="margin-left:800px;">
					<form action="/site/{{$row->id}}" method="post">
						<button type="submit" class="btn btn-danger">删除</button>
						{{method_field('DELETE')}}

						{{csrf_field()}}
					</form>
				</div>
                </div>
                @endforeach
          		<form action="/site" method="post">
                <div class="thetwobf">

                	<em>居住地址：</em><input type="text" id="city" value="点击选择地区" style=" height:28px; font-size:12px; border:1px solid #bbb; float:left"><input type="hidden" name="harea" data-id="210882" id="harea" value="大石桥市"><input type="hidden" name="hproper" data-id="210800" id="hproper" value="营口市"><input type="hidden" name="hcity" data-id="340000" id="hcity" value="安徽省">
                    <script type="text/javascript">
						$("#city").click(function (e) {
						SelCity(this,e);
						});
					</script>
                    <em style=" width:60px">街道：</em>
                    <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:420px" type="text" class="shuru" placeholder="沈阳市沈北新区道义街道兄弟连培训基地" name="cc">
                </div>
               
                <div class="thetwobf">
                	<button type="submit" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:#FFF; margin-left:213px;background-color:#4F83D9;">保存</button>
                </div>
              {{csrf_field()}}
                </form>
            </div>	
            <!--修改基本信息结束-->
        </div>
@endsection
@section("title",'个人中心')
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                