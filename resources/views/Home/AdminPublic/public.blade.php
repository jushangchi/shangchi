<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/static/Home/index/css/xiaomi.css"/>
    <script type="text/javascript" src="/static/Home/index/js/jquery-2.1.4.min.js"></script>
    <script src="/static/Home/index/js/jquery.animate-colors-min.js"></script>
</head>
<body>
     <div class="head_box">
         <div id="head_wrap">
            
             <div id="head_right">
                 <div id="head_landing">
                    @if(session('email'))
                     <i class="head_nav_a"></i>欢迎{{session("email")}}
                     <a href="/homelogin"><i class="fa fa-angle-right"></i>退出</a>
                       <a href="/center">账户信息</a>
                     @else
                     <a href="/homelogin/create"class="head_nav_a">登陆</a>
                     <span>|</span>
                     <a href="/register"class="head_nav_a">注册</a>
                     @endif
                 <div id="head_car">
                     <a href="/homecart" class="head_car_text">购物车</a>
                 </div>
             </div>
         </div>

     </div>
     <div id="main_head_box">
         <div id="menu_wrap">
             <div id="menu_logo">
                 <a href="/home"><img src="/static/Home/index/img/xiaomi_logo.png"></a>
             </div>
            
             <div id="find_wrap">
                <form action="/shows" method="post">
                 <div id="find_bar">
                     <input type="text" name="name" id="find_input">
                 </div>
                {{csrf_field()}}
                 <button id="find_but" type="submit">搜索</button>
                 </form>
             </div>
         </div>
     </div>
                        @section('home')
                        @show
        <div id="foot_box">
         <div id="foot_wrap">
             <div class="foot_top">
                 <ul>
                     <li>1小时快修服务</li>
                     <li class="font_top_i">|</li>
                     <li>7天无理由退货</li>
                     <li class="font_top_i">|</li>
                     <li>15天免费换货</li>
                     <li class="font_top_i">|</li>
                     <li>满150元包邮</li>
                     <li class="font_top_i">|</li>
                     <li>520余家售后网点</li>
                 </ul>
             </div>
             <div class="foot_bottom">
                 <div class="foot_bottom_l">
                     <dl>
                         <dt>帮助中心</dt>
                         <dd>购物指南</dd>
                         <dd>支付方式</dd>
                         <dd>配送方式</dd>
                     </dl>
                     <dl>
                         <dt>服务支持</dt>
                         <dd>售后政策</dd>
                         <dd>自助服务</dd>
                         <dd>相关下载</dd>
                     </dl>
                     <dl>
                         <dt>大米之家</dt>
                         <dd>大米之家</dd>
                         <dd>服务网点</dd>
                         <dd>预约亲临到店服务</dd>
                     </dl>
                     <dl>
                         <dt>关注我们</dt>
                         <dd>新浪微博</dd>
                         <dd>大米部落</dd>
                         <dd>官方微信</dd>
                     </dl>
                 </div>
                 <div class="foot_bottom_r">
                     <a>400-100-5678</a>
                     <a>周一至周日 8:00-18:00</a>
                     <a>（仅收市话费）</a>
                     <span> 24小时在线客服</span>
                 </div>
             </div>
         </div>
         <div class="foot_note_box">
             <div class="foot_note_wrap">
                 <div class="foot_note_con">
                     <span class="foot_logo"><img src="/static/Home/index/img/mi-logo.png" width="38px" height="38px"></span>
                        <span class="foot_note_txt">
                            @if(!empty($filn))
                            @foreach($filn as $fil)
                            <a href="{{$fil->link}}">{{$fil->name}}</a><h>|</h>
                            @endforeach
                            @endif
                        </span>
                 </div>

             </div>
         </div>
     </div>

<script type="text/javascript" src="/static/Home/index/js/xiaomi.js"></script>

</body>
</html>