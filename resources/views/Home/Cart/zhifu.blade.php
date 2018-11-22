@extends("Home.AdminPublic.public")
@section('home')
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>提交支付</title>
<link rel="stylesheet" type="text/css" href="/static/Home/assetss/css/shangpingoumai.css">
<script src="/static/Home/assetss/js/city.js/jquery-1.11.3.min.js"></script>
</head>

<body>
<!--支付订单-->
<div class="tijiaozhifu">
    <!--标题-->
   
    <!--导航列表-->
    <div class="titijj">
        <span style=" width:290px">订单号</span>
        <span style="width:290px">支付方式</span>
        <span style="width:290px">数量</span>
        <span style="width:290px">物流</span>
    </div>
    <!--各个订单列表-->
    <div class="titijj">
         @foreach($data as $row)
        <span style=" width:290px; color:#999">{{$row['hao']}}</span>
        <span style="width:290px; color:#999">在线支付</span>
        <span style="width:290px; color:#999">{{$row['num']}}</span>
        <span style="width:290px; color:#999">包邮</span>
        <input type="hidden" value="{{$row['num']}}" name="num">
         @endforeach
    </div>
    <!--选择支付方式-->
    <div class="xzbsni">
    <div class="zhifutt">
        <span>支付提交</span>
        <span>请您及时付款，以便订单尽快处理！ 在线支付金额：<s style=" color:#f00">￥ {{$row['price']}}</s></span>
       
    </div>
        </ul>
    </div>
</div>
    <form action="/zhifu" method="get">
<!--确认提交并支付-->
    <input type="hidden" value="{{$row['hao']}}" name="hao">
    <button type="submit" style="display:block; padding-left:20px; padding-right:20px; line-height:40px; font-size:14px" class="animaa">确认提交并支付</button>
    </form>
<script>
$(function(){
    $(".xzbsni ul li").click(function(){
        $(this).addClass("plok").siblings().removeClass("plok")
        })
    })
</script>
</body>
</html>
    

@endsection
@section("title",'支付页面')