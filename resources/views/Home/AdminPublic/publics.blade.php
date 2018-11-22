   @extends("Home.AdminPublic.public")
   @section('home')
<link rel="stylesheet" type="text/css" href="/static/home/center/css/top.css">
<link rel="stylesheet" type="text/css" href="/static/home/center/css/lunbo.css">
<script src="/static/home/center/js/jquery-1.8.3.min.js"></script>
<script src="/static/home/center/js/public.js"></script>
<link rel="stylesheet" type="text/css" href="/static/home/center/css/vipcenter.css">
<link rel="stylesheet" type="text/css" href="/static/home/center/css/footer.css"/>
<link rel="stylesheet" type="text/css" href="/static/home/center/css/stylestyle.css">
<link rel="stylesheet" type="text/css" href="/static/home/center/plugins/colorpicker/colorpicker.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/custom-plugins/wizard/wizard.css" media="screen" /> 
  <!-- Required Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/bootstrap/css/bootstrap.min.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/fonts/ptsans/stylesheet.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/fonts/icomoon/style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/mws-style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/icons/icol16.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/icons/icol32.css" media="screen" /> 
  <!-- Demo Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/demo.css" media="screen" /> 

  <!-- Theme Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/mws-theme.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/themer.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/center/css/my.css" media="screen" /> 

<!--顶部菜单有改动与首页的不一样，请单独调用-->

 <script src="/static/home/center/js/daohang.js"></script>
<!--个人中心首页 -->
<div class="thetoubu">
	<!--头部-->

    <!--详细列表-->
    <div class="xiangxilbnm">
    	<!--left-->
        <div class="liefyu">
        	<h2>交易管理</h2>
                <div class="conb">
                <a href="/homecart">我的购物车</a>
                <a href="/order">我的订单</a>
                <a href="/collect">我的收藏</a>
                </div>
            <h2>资料管理</h2>
                <div class="conb">
                <a href="/center">账户信息</a>
                <a href="/site">收货地址</a>
                </div>
        </div>
        <script type="text/javascript">
		$(function(){//第一步都得写这个
			$(".liefyu h2").click(function(){//获取title，并且让他执行下面的函数
			$(this)/*点哪个就是哪个*/.next(".conb")/*哪个标题下面的con*/.slideToggle()/*打开/折叠*/.siblings/*锁定同级元素*/(".con").slideUp()/*同级元素折叠起来*/
			})
		})
		</script>
						        <!--right-->
						@section('homes')
                        @show
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
                
                            
                    	
                            
                            
                        
                        
                            
                        
                    
                    
                    
                    
                                
                
            


        
		
		

            
		    
                
                