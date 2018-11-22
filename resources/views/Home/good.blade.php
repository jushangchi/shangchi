
   @extends("Home.AdminPublic.public")
   @section('home')
   <link rel="stylesheet" type="text/css" href="/static/Home/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/static/Home/css/lunbo.css">
<link rel="stylesheet" type="text/css" href="/static/Home/css/zhanshi.css">
<link rel="stylesheet" type="text/css" href="/static/Home/css/footer.css">
<script src="/static/Home/js/jquery-1.8.3.min.js"></script>
<script src="/static/Home/js/public.js"></script>
    
 <script src="/static/Home/js/daohang.js"></script>
<!--你当前位置 -->
<div class="nowweizhi">
    <span>你当前的位置</span>
    <b>></b>
    <a href="#">这里</a>
    <b>></b>
    <a href="#">这里</a>
</div>
<!--商品展示区域-->
<div class="theshopshow">
    <!--left-->
        <!-- 帝云商品展示 -->
        <script src="/static/Home/js/163css.js"></script>
        <script src="/static/Home/js/lib.js"></script>
            <div id="preview">
                <div class=jqzoom id="spec-n1" onClick="window.open('/')"><IMG height="350" src="{{$goods->img}}" jqimg="/static/Home/img/img04.jpg" width="350">
                    </div>
                    <div id="spec-n5">
                        <div class=control id="spec-left">
                            <img src="/static/Home/img/left.gif" />
                        </div>
                        <div id="spec-list">
                            <ul class="list-h">
                                @foreach($good as $row)
                                <li>
                                    <img src="{{$row->img}}"> 
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class=control id="spec-right">
                            <img src="/static/Home/img/right.gif" />
                        </div>
                    </div>
                </div>
                <SCRIPT type=text/javascript>
                    $(function(){           
                           $(".jqzoom").jqueryzoom({
                                xzoom:400,
                                yzoom:400,
                                offset:10,
                                position:"right",
                                preload:1,
                                lens:1
                            });
                            $("#spec-list").jdMarquee({
                                deriction:"left",
                                width:350,
                                height:56,
                                step:2,
                                speed:4,
                                delay:10,
                                control:true,
                                _front:"#spec-right",
                                _back:"#spec-left"
                            });
                            $("#spec-list img").bind("mouseover",function(){
                                var src=$(this).attr("src");
                                $("#spec-n1 img").eq(0).attr({
                                    src:src.replace("\/n5\/","\/n1\/"),
                                    jqimg:src.replace("\/n5\/","\/n0\/")
                                });
                                $(this).css({
                                    "border":"2px solid #ff6600",
                                    "padding":"1px"
                                });
                            }).bind("mouseout",function(){
                                $(this).css({
                                    "border":"1px solid #ccc",
                                    "padding":"2px"
                                });
                            });             
                        })
                </SCRIPT>
            <!-- 帝云商品展示 End -->                                    
    <!--right-->
    <div class="shoppnum">
        <!--n1-->
        <div class="shanpmai">
            <h1 class="spdname">{{empty($gooda->name)?$goods->title:$gooda->name}}</h1>
            <div class="hotspeak">
                全场免邮
            </div>
            <div class="shoujiap">
                <span>商城价格</span>
                <i>{{empty($gooda->price)?$goods->price:$gooda->price}}</i>￥
            </div>
           <div class="shoujiap">
                <span>限量</span>
                <i id="num">{{empty($gooda->num)?"0":$gooda->num}}</i>台
            </div>
        
            <div class="xuanzcolor">
                
                <div class="morecolor">
                    
                    <script>
                        $(function(){
                            $(".morecolor ul li").click(function(){
                                $(this).css({border:"1px solid #f00"}).siblings().css({border:"none"})
                                })
                            $(".morecm ul li").click(function(){
                                $(this).css({border:"1px solid #f00"}).siblings().css({border:"1px solid #cacace"})
                                })  
                            })
                    </script>
                </div>
                <div class="choosecm">
                    <span>型号</span>
                    <div class="morecm">
                  
                        @foreach($good as $row)
                        @endforeach
                        @if(!empty($row))
                        <ul class="memorys">
                           <li><a href="/home/memory/{{$row->good_id}}?memorys={{12}}" name="12">12G</a></li>
                           <li><a href="/home/memory/{{$row->good_id}}?memorys={{64}}" name="64">64G</a></li>
                           <li><a href="/home/memory/{{$row->good_id}}?memorys={{128}}" name="128">128G</a></li>
                           <li><a href="/home/memory/{{$row->good_id}}?memorys={{256}}" name="256">256G</a></li>
                        </ul>
                        @else
                        <ul class="memorys">
                           <li><a href="" name="12">无货</a></li>

                        </ul>
                        @endif
                    </div>
                </div>
               <input type="hidden" name="id" value="">
                <!--购买数量-->
                <form action="/homecart" method="post">
                <div class="goumaijiajian">
                    <span>购买数量</span>
                    <input id="min" name="" type="button" value="减" / style=" width:30px; height:30px; font-size:12px; line-height:30px; color:#333; float:left; cursor:pointer">  
                    <input id="text_box" name="num" type="text" value="1" style="width:60px;height:30px; font-size:12px; text-align:center; float:left"/>  
                    <input id="add" name="" type="button" value="加" / style=" width:30px; height:30px; font-size:12px; line-height:30px; color:#333; float:left; cursor:pointer">
                </div>
                <input type="hidden" name="good_id" value="{{empty($gooda->id)?0:$gooda->id}}">
                <script>
                    $(document).ready(function(){
                    //获得文本框对象
                       var t = $("#text_box");
                        
                   
                    //初始化数量为1,并失效减
                    $('#min').attr('disabled',true);
                        //数量增加操作
                        $("#add").click(function(){    
                            a=$("#num").html();
                       
                            t.val(parseInt(t.val())+1)
                            if (parseInt(t.val())!==1){
                                $('#min').attr('disabled',false);
                            }
                               
                                   //console.log(a);
                           if (parseInt(t.val())>=a){
                                $('#add').attr('disabled',true);
                            }

                
                          
                        }) 
                        //数量减少操作
                        $("#min").click(function(){
                            t.val(parseInt(t.val())-1);
                            if (parseInt(t.val())==1){
                                $('#min').attr('disabled',true);
                            }
                          
                        })

                       
                    });
                    
                    </script>

                    {{csrf_field()}}
                 <!--加入购物车与收藏商品-->
                 <div class="joinspadsp">
                   <button type="submit" style=" margin-left:6px;width:130px;height:30px;background-color:#df3033;color:#FFF; ">加入购物车</button>
                 </div>
             </form>
                 <!--商品编号-->
                 <div class="shopbh">
                    <span>商品编号</span>
                    <em>123456789</em>
                 </div>    
            </div>
        </div>
        <!--n2-->
        <div class="daitianc">
            <span class="lkadlk">广告</span>
            <div class="lklksp">
                @if(!empty($adver))
                <ul>
                    @foreach($adver as $adv)
                    <li>
                        <a href="#">
                            <b>
                                <img src="{{$adv->img}}"/>
                            </b>
                            <h5>{{$adv->name}}</h5>
                        </a>
                        <a href="#" style=" width:163px; height:20px;font-size:11px; color:#666; line-height:20px; text-align:center" class="theqjd">官方旗舰店</a>
                    </li>
                    @endforeach
                </ul>
                @endif
                
            </div>
            <!--上去下来的按钮-->
            <div class="ananniu shangfan" style=" background: url(/static/Home/img/__sprite.png) no-repeat 0 0; margin-left:70px"></div>
            <div class="ananniu xiafan" style=" background:url(/static/Home/img/__sprite.png) no-repeat -28px 0; margin-left:50px"></div>
        </div>
        <script>
        $(function(){
            var i=0
            var size=$(".lklksp ul li").size()
            $(".shangfan").click(function(){
                i++
                if(i==size-1){
                    i=0;
                    }
                $(".lklksp ul").animate({top:-i*218})
                })
            $(".xiafan").click(function(){
                i--
                if(i==-1){
                    i=size-2
                    }
                $(".lklksp ul").animate({top:-i*218})
                })
            })
        </script>
    </div>
</div>
<!--店长推荐-->
<div class="bosstuijian">
    <div class="bosstj">
        <span>产品明星</span>
    </div>
    <div class="bosstjsp">
        @if(!empty($star))
        <ul>
           @foreach($star as $stars)
            <li>
                <a href="#">
                    <b><img src="{{$stars->img}}"/></b>
                    <h5>{{$stars->name}}</h5>
                    <p>穿上它，让您冰凉一夏</p>
                    <span>{{$stars->price}}</span>
                </a>
                
            </li>
          @endforeach
        </ul>
        @else
       
        @endif
    </div>
</div>
<!--商品介绍东西有点多-->
<div class="spjsmore">
    <!--左-->
   
    <!--右-->
    <div class="therightnrs">
        <div class="threespa">
            <ul>
                <li class="oncolors" mt-floors="1" mt-cts="1" id="spencals1">商品介绍</li>
                <li mt-floors="2" mt-cts="1" id="spencals2">商品评价<s>(1297)</s></li>
                <li mt-floors="3" mt-cts="1" id="spencals3">售后保障</li>
                
            </ul>
        </div>
        <script>
        $(function(){
            /*控制商品详情、商品评价、售后保障的出现或消失*/
            $(".threespa ul li").mouseenter(function(){
                $(this).addClass("oncolors").siblings().removeClass("oncolors")
                })
            /*控制商品评价里面导航块的添加颜色或减去颜色*/   
            $(".quanbupinglun a").click(function(){
                        $(this).addClass("nocolors").siblings().removeClass("nocolors")
                        })  
            })
        </script>
        <!--大容器里面放若干内容-->
        <div class="drqlmfrgnr">
        <!--商品自诩-->
            <div class="bigcakes c-1-1">
                <img src="{{$goods->img}}"/>
             
            </div>
        <!--售后保障-->
            <div class="bigcakes c-3-1">
                <div class="maijiacnqs">
                    <span>价格说明</span>
                    <p><strong>京东价：</strong>京东价为商品的销售价，是您最终决定是否购买商品的依据。<br>

<strong>划线价：</strong>商品展示的划横线价格为参考价，该价格可能是品牌专柜标价、商品吊牌价或由品牌供应商提供的正品零售价（如厂商指导价、建议零售价等）或该商品在京东平台上曾经展示过的销售价；由于地区、时间的差异性和市场行情波动，品牌专柜标价、商品吊牌价等可能会与您购物时展示的不一致，该价格仅供您参考。
折扣：如无特殊说明，折扣指销售商在原价、或划线价（如品牌专柜标价、商品吊牌价、厂商指导价、厂商建议零售价）等某一价格基础上计算出的优惠比例或优惠金额；如有疑问，您可在购买前联系销售商进行咨询。<br>

<strong>异常问题：</strong>商品促销信息以商品详情页“促销”栏中的信息为准；商品的具体售价以订单结算页价格为准；如您发现活动商品售价或促销信息有异常，建议购买前先联系销售商咨询。</p>
                </div>
            </div>
        <!--商品评价-->
            <div class="bigcakes c-2-1">
                <!--对该商品的综合评分-->
                <div class="duigaispdzhpfs">
                    <!--left-->
                    <div class="goodhpd">
                        <span><i>99</i>%</span>
                        <p>好评度</p>
                    </div>
                    <!--right-->
                    <div class="haopingjdts">
                        <!--好评-->
                        <div class="gdpjbf">
                            <em>好评<i>99%</i></em>
                            <span>
                                <p style=" width:50%"></p>
                            </span>
                        </div>
                        <!--中评-->
                        <div class="gdpjbf">
                            <em>好评<i>99%</i></em>
                            <span>
                                <p style=" width:50%"></p>
                            </span>
                        </div>
                        <!--差评-->
                        <div class="gdpjbf">
                            <em>好评<i>99%</i></em>
                            <span>
                                <p style=" width:50%"></p>
                            </span>
                        </div>
                        <!--差评结束-->
                    </div>
                    <!--right结束-->  
                </div>
                <!--评分结束-->
                <div class="quanbupinglun">
                    <a href="#" class="nocolors" mt-floord="1" mt-ctd="1">全部评论<em>()</em></a>
                </div>
                <!--这个容器里面放了全部评论、好评、中评、差评、-->
                <div class="qbpltyf123">
                <!--全部评论-->
                  
                <!--好评-->
                  
              
                 
                    <!--一条评论开始-->
                      @if(!empty($mess))
                    <!--一条评论开始-->
                    @foreach($mess as $messr)
                        <div class="thepcpls">
                        <!--左-->
                            <div class="zuileftop">
                                <!--改变星级只需要改" no-repeat X 0"里面的X即可，一次是17像素-->
                                <div class="thstar" style=" background:url(/static/Home/img/commentsListIcons1.png) no-repeat 0 0"></div>
                            </div>
                        <!--中-->
                            <div class="zuicenterop">
                               {{$messr->pname}}
                            </div>
                        <!--右-->
                            <div class="zuirightop">
                                <div class="touxadmz">
                                    <b>
                                        <img src="/static/Home/img/touxiang.png"/>
                                    </b>
                                    <em>{{$messr->uname}}</em>
                                </div>
                                <div class="zgrsndra"></div>
                            </div>
                            <!--购买的商品信息-->
                            <div class="gmdspxinxisz">
                                
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div>暂无评论</div>
                        @endif
                    <!-- 一条评论结束-->
                </div>
            </div>    
        </div>
       
        <script>
        /*控制商品详情、商品评价、售后保障的出现或消失*/
            $(function(){
                    $(".threespa ul li").mouseenter(function(){
                    var frs=$(this).attr("mt-floors");
                    var cats=$(this).attr("mt-cts");
                    $(".c-"+frs+"-"+cats+"").show().siblings().hide();
                    })
                    /*这个有点特殊*/
                    $("#spencals1").mouseenter(function(){
                        $(".c-1-1").show();
                        $(".c-2-1").show();
                        $(".c-3-1").show();
                        })
                    /*$("#spencals2").mouseenter(function(){
                        $(".c-2-1").show();
                        $(".c-3-1").show();
                        })*/
                    $("#spencals3").mouseenter(function(){
                        $(".c-3-1").show();
                        $(".c-2-1").show();
                        })      
                        
        /*控制全部评论、好评、中评、差评的块的出现或消失*/
                    $(".quanbupinglun a").click(function(){
                    var frd=$(this).attr("mt-floord");
                    var catd=$(this).attr("mt-ctd");
                    $(".d-"+frd+"-"+catd+"").show().siblings().hide();
                    })
                })
        </script>
        
        <!--这里一切测试正常，现在我去掉容器里面各个div的颜色-->
    </div>
    
</div>

@endsection
@section("title",'商品详情')