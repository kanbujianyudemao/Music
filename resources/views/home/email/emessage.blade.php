<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>尊敬的{{$res['username']}}:</p>
	<p>
       您好，感谢您注册（music.com）。这是一封注册确认邮件。
      <br> 
	请点击以下链接完成确认： <a href="http://music.com/home/jihuo?id={{$id}}&token={{$token}}">http://music.com/home/jihuo?id={{$id}}&token={{$token}}</a>
	<br> 
	如果链接不能点击，请复制地址到浏览器，然后直接打开。</p> 
	<p>							
													因乐网
												</p>
	<br>
</body>
</html>
