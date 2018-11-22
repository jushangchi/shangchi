@extends("Home.AdminPublic.public")
@section('home')
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>填写核对购物信息</title>
<link rel="stylesheet" type="text/css" href="/static/home/assetss/css/shangpingoumai.css">
<script src="/static/home/assetss/js/jquery-1.8.3.min.js"></script>
<script src="/static/home/assetss/js/city.js/cityJson.js"></script>
<script src="/static/home/assetss/js/city.js/citySet.js"></script>
<script src="/static/home/assetss/js/city.js/Popt.js"></script>
<link href="/static/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<!--全部开始-->
<div class="tianxiehedui">
    <!--标题-->
    <div class="rzhdndgw">温馨提示：请认真核对您的购物信息</div>
    <!--收货人信息-->
    <form action="/#" method="post"> 
    <div class="shouhurxl clastyo">
        <div class="shouhurxl1">
            <em>收货人信息</em>
            <a href="#" class="chgeb">添加</a>
        </div>
        <div class="shouhurxl2">
           
        </div>
    </div>
        <div class="changepc">
        <!--以前的旧地址-->
        
        <div class="tongyongdizhi">
           
            <input type="radio" name="name" style="float:left; display:block; width:13px; height:13px; margin-top:9px">
            <input type="text" value="" name="truename"> 
            <input type="text" value="" name="adds"> 
            <input type="text" value="" name="phone"> 
   
        </div>
            
    </div>
    <script>
    $(function(){
        $(".chgeb").click(function(){
            $(".changepc").css({display:"block"});
            $(".clastyo").css({display:"none"})
            })
        $(".bcshrxopl").click(function(){
            $(".changepc").css({display:"none"});
            $(".clastyo").css({display:"block"});
            $(".opcaty1").css({display:"none"})
            })
        $(".adressa").click(function(){
            $(".opcaty1").css({display:"block"})
            })      
        })
    </script>
    </div>
    <div class="shouhurxl">
        <!--一条商品信息开始-->
        <div class="xxpop1" style="background:rgba(255,153,0,0.1); padding-bottom:6px">
            <div>请添加商品</div>
        </div> 
                     
            <!--订单总金额-->
        <div class="ddzjes">
                <em>订单总金额：</em>
                <em style=" padding-left:0"><s></s>元</em>
            </div>
    <input class="tijiaodingdang56" style="margin-left:80%;"  value="提交订单">   
    <a href="/home" class="tijiaodingdang56">继续购物</a>
    </form>
</div>
</body>
</html>
@endsection
@section("title",'购物车')