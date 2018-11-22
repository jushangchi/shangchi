
   @extends("Home.AdminPublic.public")
   @section('home')
<link rel="stylesheet" type="text/css" href="/static/Home/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/static/Home/css/lunbo.css">
<link rel="stylesheet" type="text/css" href="/static/Home/css/liebiao.css"/>
<link rel="stylesheet" type="text/css" href="/static/Home/css/footer.css"/>
<script src="/static/Home/js/jquery-1.8.3.min.js"></script>
<script src="/static/Home/js/public.js"></script>
    <div class="shaixuan">
    <!--品牌分类开始-->
    <div class="sxfenlei">
        <div class="sxname">分类</div>
        <div class="sxleibie">
            <ul class="liebiaoyi_w">
              @foreach($cate as $row)
                @foreach($row->suv as $rows)
                <li class="ll" name="{{$rows->pid}}"><a href="/home/{{$rows->pid}}"><img src="/static/Home/img/adidas.jpg"/ width="88" height="35"><em>{{$rows->name}}</em></a></li>
                  @endforeach
                @endforeach
            </ul>
            <ul class="liebiaoer_w">
                <li><a href="#"><img src="/static/Home/img/adidas.jpg"/ width="88" height="35"><em>Adidas</em></a></li>               
            </ul>
        </div>
    </div>
    <!--品牌分类结束-->
   
    
    <script>
        $(function(){//第一步都得写这个
    $(".zdguanbi").click(function(){//获取title，并且让他执行下面的函数
        $(this)/*点哪个就是哪个*/.next(".liebiaoer_w")/*哪个标题下面的con*/.slideToggle()
        
        })
    $(".zdguanbi").click(function(){//获取title，并且让他执行下面的函数
        $(this)/*点哪个就是哪个*/.next(".liebiaoer")/*哪个标题下面的con*/.slideToggle()
        
        })  
        
    
    })
    </script>
</div>
<div class="zhxlxp">
    <span style=" background:#000; color:#fff; margin-left:0;">排序方式</span>
 @foreach($data as $rowa)
  @endforeach
  @if(!empty($rowa->cate_id))
    <a href="/home/price/{{$rowa->cate_id}}" title="销售价格降序排列">价格</a>
  @else
      <dir>暂无商品</dir>  
@endif
</div>
<div class="shopliebiao">
    <ul>
        @foreach($data as $rowa)
        <li>
           <a href="#" class="wocici">
               <b>
               <img src="{{$rowa->img}}" >
               </b>
               <h2>{{$rowa->title}}</h2>
               
               <span>{{$rowa->price}}元</span>
           </a>
           <em class="wocaca">
            <a href="/goodlist/{{$rowa->id}}">立即购买</a>
            <button name="{{$rowa->id}}" style=" border-right:hidden;background-color:#df3033;" class="coll"><a>点击收藏</a></button>
           </em>
        </li>
        @endforeach
    </ul>
   
</div>
<script type="text/javascript">
  $('.coll').click(function(){
   a=$(this).attr('name');
   
  
  $.get('/coll',{'a':a},function($data){
      alert($data);
  });
  
  });
 
</script>
@endsection
@section("title",'前台首页')