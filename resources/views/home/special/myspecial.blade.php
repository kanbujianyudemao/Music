@extends('layout.home')
    <link rel="stylesheet" type="text/css" href="/home/css/special.css">
    <link rel="stylesheet" type="text/css" href="/css/main-201505211743.css">
    <link rel="stylesheet" type="text/css" href="/css/main-201505211743_.css">
    <link rel="stylesheet" type="text/css" href="/css/gallery.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/style2.0.css"> -->
    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">
    <!-- Demo Stylesheet -->
    <style type="text/css">
    	.texts {
			    color: #999;
			    margin: 15px 13px 5px 0;
			    height: 45px;
			    line-height: 22px;
			    display: -webkit-box;
			    -webkit-box-orient: vertical;
			    -moz-box-orient: vertical;
			    -webkit-line-clamp: 2;
			    -moz-line-clamp: 2;
			    line-clamp: 2;
			    overflow: hidden;
			}
			.detail .top a:hover{
				color: #85d2f2;
			}
    </style>
@section('content')
<div class="navWrap">
    <div class="nav">
        <ul class="homeNav">
            <li><a class="normal" href="/">首页</a></li>
            <li><a class="normal"  href="/home/paihang">榜单</a></li>
            <li><a class="normal"  href="/home/list">歌手</a></li>
            <li><a class="normal"  href="/home/music">音乐</a></li>
            <li><a class="normal active"  href="/home/specialshow">歌单</a></li>
            <li><a class="normal"  href="/home/personal">我的音乐</a></li>
        </ul>
    </div>
</div>
<div class="wrap alm2 clear_fix specialPage">
  <div class="mbx">我的位置 &gt; <a title="乐库" href="/">首页</a> &gt; <a title="" href="">我的歌单</a></div>
  <div class="l">
      <div class="pic">
          <img alt="可爱的小动物" src="{{$res->photo}}" height="148" width="148" />
      </div>
      <p class="detail">
          <span>昵称：</span>{{$res->uname}}<br />
          <span>账号：</span>{{$res->username}}<br />
          <span>心情：</span>开心<br />
      </p>
      <div class="intro"><p><span>简介：</span>萌萌的小动物最惹人喜爱。</p></div>
            <p class="more" onclick="show(this,event)">更多 &gt;&gt;</p>
            <p class="more_intro">萌萌的小动物最惹人喜爱。<span></span></p>
  </div>
  <div class="r">
      <ul id="ulAlbums">
             @foreach($rs as $k=>$v)
            <li class="s_538560" style="border-bottom: 1px solid #dcdcdc;    width: 100%;float: none;height:110px;">
            <div class="pic" style="float: left;margin-right:30px;">
                <a hidefocus="ture" title="{{$v->title}}" href="/home/special/listspecial/{{$v->gdid}}" onclick='sdnClick(12133)'><img alt="{{$v->title}}" src="{{$v->photo}}"
                  width='100' height='100' /></a>
            </div>
            <div class="detail">
                <div class="top">
                  <div style="margin-left:50px;" >
                    <strong>
                      <a title="{{$v->title}}" href="/home/special/listspecial/{{$v->gdid}}" >{{$v->title}}</a>
                      <div style="float:right;" >制作人：{{$v->zhizuo}}</div>
                    </strong>
                  </div>
                </div>
                <!--<span>()</span>-->
                <div class="texts">{{$v->jianjie}}</div>
                <div class="btn">
                    <span>
                      <i class="t2">类型:@if($v->styles ==0) 电子
				                            @elseif ($v->styles == 1) 流行
				                            @elseif ($v->styles == 2) 古典
				                            @elseif ($v->styles == 3) 华语
				                            @elseif ($v->styles == 4) 轻音乐
				                            @elseif ($v->styles == 5) 影视
				                            @elseif ($v->styles == 6) 摇滚
				                            @elseif ($v->styles == 7) 治愈
				                            @endif</i>
                    </span>
					          <span style="margin-left: 450px;">
                      <a href="/home/special/edit/{{$v->gdid}}" class="mws-gallery-btn">
                        <i class="icon-pencil">修改</i>
                      </a>
                      <a href="/home/special/destroy/{{$v->gdid}}" class="mws-gallery-btn  shan" >
                        <i class="icon-trash">删除</i>
                      </a>
                    </span>
                </div>                                                                  
            </div>
            </li>
        @endforeach
      </ul>
  </div>
  </div>
</div>

@stop

@section('js')
<script type="text/javascript">
	$('.shan').click(function(){
		if(!confirm('确认删除么')){
			return false;
		}
		
	})
</script>
	

@stop