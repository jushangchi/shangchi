
   @extends("Home.AdminPublic.public")
   @section('home')
     <div id="big_banner_wrap">
         <ul id="banner_menu_wrap">
            @foreach($cate as $row)
             <li class="active"img>
                 <a>{{$row->name}}</a>
                 <a class="banner_menu_i">&gt;</a>
                 <div class="banner_menu_content" style="width: 300px; top: -20px;">
                        @foreach($row->suv as $rows)
                     <ul class="banner_menu_content_ul">
                         <li>
                             <a href="/home/{{$rows->pid}}"><img src="{{$rows->img}}" style="width:50px;height:70px;"></a><a>{{$rows->name}}</a><span><a href="/home/{{$rows->pid}}">选购</a></span></li>
                     </ul>
                     @endforeach
                 </div>
             </li>
             @endforeach
         </ul>
         <div id="big_banner_pic_wrap">
             <ul id="big_banner_pic">
                @foreach($slid as $lid)
                 <li><img src="{{$lid->img}}" style="width:100%;height:100%"></li>
              @endforeach
             </ul>
         </div>
         <div id="big_banner_change_wrap">
             <div id="big_banner_change_prev"> &lt;</div>
             <div id="big_banner_change_next">&gt;</div>
         </div>
     </div>
     <div id="head_other_wrap">
         <div id="head_other">
             <ul>
                 <li>
                     <div id="div1">
                         <p>START</p>
                         <p>开房购买</p>
                     </div>
                 </li>
                 <li>
                     <div id="div2">
                         <p>GROUND</p>
                         <p>企业团购</p>
                     </div>
                 </li>
                 <li>
                     <div id="div3">
                         <p>RETROFIT</p>
                         <p>官方产品</p>
                     </div>
                 </li>
                 <li>
                     <div id="div4">
                         <p>CHANNEL</p>
                         <p>F码通道</p>
                     </div>
                 </li>
                 <li>
                     <div id="div5">
                         <p>RECHARGE</p>
                         <p>话费充值</p>
                     </div>
                 </li>
                 <li>
                     <div id="div6">
                         <p>SECURITY</p>
                         <p>防伪检查</p>
                     </div>
                 </li>
             </ul>
         </div>
         @foreach($adv as $ad)
         <div class="head_other_ad" style="width:1000px;width:170px;"><img src="{{$ad->img}}" style="width:100%;margin-left:10px;"></div>
       @endforeach
    </div>
     <div id="head_hot_goods_wrap">
         <div id="head_hot_goods_title">
             <span class="title_span">大米明星单品</span>
             <div id="head_hot_goods_change">
                 <span id="head_hot_goods_prave"><</span>
                 <span id="head_hot_goods_next">></span>
             </div>
         </div>
         <div id="head_hot_goods_content">
             <ul>
                @foreach($star as $stars)
                 <li>
                     <a><img src="{{$stars->img}}" style="width: 237px;height: 163px;"></a>
                     <a>{{$stars->name}}</a>
                     <a>￥{{$stars->price}}</a>
                 </li>
                @endforeach
             </ul>
         </div>
     </div>
     <div id="main_show_box">
         <div id="floor_1">
              <div id="floor_head">
                  <span class="title_span">商品</span>
              </div>
         </div>
         <div class="floor_goods_wrap">
             <ul>
                 <li class="floor_goods_wrap_li">
                     <a><img src="/static/Home/index/img/T1IhLjBC_T1RXrhCrK.jpg"></a>
                 </li>
                 @foreach($good as $go)
                 <li class="floor_goods_wrap_li">
                     <a href="/goodlist/{{$go->id}}" class="floor_goods_img"><img src="{{$go->img}}" style="width:100%;"></a>
                     <a class="floor_goods_tit">{{$go->title}}</a>
                     <a class="floor_goods_price">{{$go->price}}元</a>
                 </li>
                @endforeach
                 <div style="clear:both;"></div>
             </ul>
         </div>
     </div>
@endsection
@section("title",'前台首页')