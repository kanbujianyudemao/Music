@extends('layout.home')
    <link rel="stylesheet" type="text/css" href="/home/css/special.css">
@section('content')
<div class="navWrap">
    <div class="nav">
        <ul class="homeNav">
            <li><a class="normal" href="/">首页</a></li>
            <li><a class="normal"  href="/home/paihang">榜单</a></li>
            <li><a class="normal"  href="/home/list">歌手</a></li>
            <li><a class="normal"  href="/home/music">音乐</a></li>
            <li><a class="normal special"  href="/home/specialshow">歌单</a></li>
            <li><a class="normal"  href="/home/personal">我的音乐</a></li>
        </ul>
    </div>
</div>
<div class="wrap alm2 clear_fix specialPage">
  <div class="mbx">我的位置 &gt; <a title="乐库" href="/">首页</a> &gt; <a title="精选专辑" href="/home/specialshow">热门专辑</a> &gt; <span>{{$res->aname}}</span></div>
  <div class="l">
      <div class="pic">
          <img alt="可爱的小动物" src="{{$res->photo}}"  height="148" width="148" />
      </div>
      <p class="detail">
          <span>名称：</span>{{$res->aname}}<br />
          <span>歌手：</span>{{$res->sname}}<br />
          <span>发布时间：</span>{{$res->times}}<br />
      </p>
      <div class="intro"><p><span>出版公司：</span>{{$res->company}}</p></div>
            <p class="more" onclick="show(this,event)">更多 &gt;&gt;</p>
            <p class="more_intro">萌萌的小动物最惹人喜爱。<span></span></p>
  </div>
  <div class="r">
    <div id="songs" class="list1">
        <strong>&lt;{{$res->aname}}&gt; - 歌曲列表</strong>
        <h4 class="dq">
        <a href="javascript:void(0)"    title="播放" hidefocus="true"><span><i class="t2"></i></span></a>
        </h4>
        <ul>              
            @foreach($rs as $k=>$v)              
            <li><a title="{{$v->sname}} - {{$v->mname}}" hidefocus="true" href="/home/play/{{$v->mid}}" data="C3967DE92CF781436E29B2E30ACFA0E7|140200"><span  class="share" title="分享" ></span><span class="listen" title="播放"></span><span class="num1">@if($k+1>=10) {{$k+1}} @else 0{{$k+1}} @endif</span><span class="text"><i>{{$v->sname}} - {{$v->mname}}</i><span style="margin-left: 200px;"> {{'<'.$v->aname.'>'}}</span></span></a></li>
            @endforeach
        </ul>
    </div>
  </div>
</div>

@stop

@section('js')


@stop