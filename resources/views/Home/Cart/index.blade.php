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
    <form action="/cartsuccess" method="post"> 
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
             @foreach($add as $row)
            <input type="radio" name="name" style="float:left; display:block; width:13px; height:13px; margin-top:9px">
            <input type="text" value="{{$row->truename}}" name="truename"> 
            <input type="text" value="{{$row->adds}}" name="adds"> 
            <input type="text" value="{{$row->phone}}" name="phone"> 
             @endforeach  
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
        @foreach($data1 as $row)  
        <div class="xxpop1" style="background:rgba(255,153,0,0.1); padding-bottom:6px">
            <div class="xxpop2">
                            
            </div>
            <div class="xxpop2" style=" width:450px;margin-left:70px;">
                                <span style="margin-left:35%">商品</span>
                                <p style=" line-height:20px;"><img src="{{$row['img']}}"/><b style="margin-left:25%">{{$row['name']}}</b></p>
            </div>
            <div class="xxpop2">
                                <span>单价(元)</span>
                                <p>{{$row['price']}}</p>
            </div>
            <div class="xxpop2">
                                <span style="margin-left:20px;">数量</span>
                                <a class="btn btn-info" href="/updatee/{{$row['good_id']}}">-</a>&nbsp;&nbsp;&nbsp; <b>{{$row['num']}}</b> &nbsp;&nbsp;&nbsp;<a class="btn btn-info"  href="/updates/{{$row['good_id']}}">+</a>
            </div>
            <div class="xxpop2">
                                <span>小计(元)</span>
                                <p>{{$row['price']*$row['num']}}</p>              
            </div>
             <div class="xxpop2" style="margin-left:35px">
                                <span>操作</span>
                                <a href="/cartdel/{{$row['good_id']}}">删除</a>
                                <input type="hidden" name="price" value="{{$a}}">
                            
            </div>
        </div>
        @endforeach    
                     
            <!--订单总金额-->
        <div class="ddzjes">
                <em>订单总金额：</em>
                <em style=" padding-left:0"><s>{{$a}}</s>元</em>
            </div>
    {{csrf_field()}}
    <input class="tijiaodingdang56" style="margin-left:80%;" type="submit" value="提交订单">   
    <a href="/home" class="tijiaodingdang56">继续购物</a>
    </form>
</div>
</body>
</html>
@endsection
@section("title",'购物车')