<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>跳转页面</title>
<style>
body{ background:#f7f7f7}
.bangdingcgl{ position:fixed; width:100%; height:290px; background:#fff; top:50%; margin-top:-145px; left:0}
.bangdingcgl span{ display:block; width:300px; height:100px; line-height:50px; overflow:hidden; font-size:20px; color:#666; margin:0 auto;}
#miao{width:50%;height:50%; margin-left:38%;color:#666;background:#fff;font-size:50px;}
.one{color:#666;background:#fff;font-size:20px;}
</style>
</head>

<body>
<div class="bangdingcgl">
	<span>邮箱已经被注册</span>
	<b id="miao">5</b><a class="one">秒后自动跳转到登录页面!</a>

    <span style="font-size:18px;"> </span><span style="font-size:24px;"><meta http-equiv="refresh" content="4.8;URL=/homelogin/create"> </span>

</div>
</body>
<script>
	var  miao = document.getElementById('miao');

	var  num = miao.innerHTML;

	var timmer = setInterval(function(){
		num--;		
		miao.innerHTML = num;
		if(num == 0){
			clearInterval(timmer);
		}
	},1000)
</script>
</html>    

