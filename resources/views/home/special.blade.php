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
            <li><a class="normal active"  href="/home/specialshow">歌单</a></li>
            <li><a class="normal"  href="/home/personal">我的音乐</a></li>
        </ul>
    </div>
</div>
<div class="wrap album spe clear_fix" id="spe">
   <div class="r">
        <ul id="ulAlbums">
            @foreach($rs as $k=>$v)   
            <li class="s_538560">
            <div class="pic">
                <a hidefocus="ture" title="{{$v->gdname}}" href="/home/special/list/{{$v->gdid}}" onclick='sdnClick(12133)'><img  src="{{$v->photo}}"
                  width='100' height='100' /></a>
            </div>
            <div class="detail">
                <div class="top"><em>制作人：{{$v->zhizuo}}</em><strong><a title="{{$v->title}}" href="/home/special/list/{{$v->gdid}}">{{$v->title}}</a>
                <!--<span>()</span>-->
                </strong></div>
                <div class="text">{{$v->jianjie}}</div>
                <div class="btn">
                    <span><i class="t2">类型:@if($v->styles ==0) 电子
                                            @elseif ($v->styles == 1) 流行
                                            @elseif ($v->styles == 2) 古典
                                            @elseif ($v->styles == 3) 华语
                                            @elseif ($v->styles == 4) 轻音乐
                                            @elseif ($v->styles == 5) 影视
                                            @elseif ($v->styles == 6) 摇滚
                                            @elseif ($v->styles == 7) 治愈
                                            @endif</i>
                    </span>
                </div>
            </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@stop

@section('js')


@stop