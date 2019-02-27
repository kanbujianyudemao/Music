@extends('layout.home')

@section('title',$title)
  <link rel="stylesheet" type="text/css" href="/home/css/special.css">
@section('content')

    <div class="navWrap">
        <div class="nav">
            <ul class="homeNav">
               <li><a class="normal" href="/">首页</a></li>
                <li><a class="normal"  href="/home/paihang">榜单</a></li>
                <li><a class="normal"  href="/home/list">歌手</a></li>
                <li><a class="normal"  href="/home/music">音乐</a></li>
                <li><a class="normal"  href="/home/specialshow">歌单</a></li>
                <li><a class="normal active"  href="/home/personal">我的音乐</a></li>
            </ul>
        </div>
    </div>

<div class="wrap alm2 clear_fix specialPage">
     
  <div class="mbx">我的位置 &gt; <a title="乐库" href="">我的音乐</a> &gt; <span>我的歌单</span>
  </div>
  <div id="segmentedControl" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-primary sheet-box">
    <a class="mui-control-item mui-active" href="/home/addspecial">创建歌单</a>
    <a class="mui-control-item" href="/home/special/myspecial">我的歌单</a>
  </div>
  <div class="l">
      <div class="pic">
          <img alt="{{$res->username}}" src="{{$res->photo}}" height="148" width="148" />
      </div>
      <p class="detail">
          <span>用户名:{{$res->uname}}</span><br />
          <span>账号：</span>{{$res->username}}<br />
          <span>个人签名：</span>{{$res->sign}}<br />
      </p>
  </div>  
  <div class="r">
      <div id="songs" class="list1">
          <strong>&lt;我的音乐&gt; - 歌曲列表</strong>
          <form action="/home/special/create" method='post'>
              <ul>
                  @foreach($rs as $k=>$v)               
                  <li>
                    <a  hidefocus="true" href="/home/play/{{$v->mid}}" >
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
          </form>
      </div>
      <div class="clear"></div>
  </div>
</div>
@stop

@section('js')

@stop