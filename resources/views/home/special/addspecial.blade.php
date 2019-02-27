@extends('layout.home')

<link rel="stylesheet"  data-embed href="/css/header-20160116.css">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/lib.js"></script>
<script src="http://login-user.kugou.com/v1/kguser_min.js?20180305"></script>
<script type="text/javascript" src="/js/common_header.min.js"> </script>
<link rel="stylesheet" href="/css/pc_temp_v2-201308081746.css" type="text/css">
<link rel="stylesheet" href="/css/main-201505211743.css" type="text/css" />
<link href="../../static/images/favicon.ico" rel="shortcut icon" />
<link rel="stylesheet" href="/css/base_v.1.css" />
<link rel="stylesheet" href="/css/header.css" />
<link rel="stylesheet" href="/css/user_center_v.1.css" />
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
@if(session('success'))   
  <div class="mws-form-message info">
      {{session('success')}}  
  </div>
@endif
<body>

<!--精选集内页-->
<div class="wrap alm2 clear_fix specialPage">
  <div class="r">
      <div id="songs" class="list1">
          <strong>&lt;我的音乐&gt; - 歌曲列表</strong>
          <form action="/home/special/create" method='post'> 
            <ul>
                @foreach($rs as $k=>$v)               
                <li>
                  <a  hidefocus="true" href="{{$v->mid}}" >
                    <input type="checkbox"  class="cb checkItem" checked="true" id="chk_C3967DE92CF781436E29B2E30ACFA0E7" name='special_music[]' value="{{$v->mid}}">
                    <span class="num1">@if($k+1>=10) {{$k+1}} @else 0{{$k+1}} @endif</span>
                    <span class="text">
                      <i style="display:block;">{{$v->sname}} - {{$v->mname}}
                      <span style="display: block;float: right;margin-left: 200px;"> {{'<'.$v->aname.'>'}}</span>
                      </i>
                    </span>
                  </a>
                </li>
          	    @endforeach  
            </ul>
               {{csrf_field()}}
            <input type="submit" id="button" class="kg_uc_btn_style02 pc_temp_b_btn" value="编辑歌单" />
          </form>
      </div>
      <div class="clear"></div>
  </div>
</div>
<!--脚步-->
@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>

@stop