@extends('layout.home')

	<link rel="stylesheet" type="text/css" href="/home/css/special.css">
	<!-- <link rel="stylesheet" type="text/css" href="/home/css/main.css"> -->
	<style type="text/css">
		.classlist{
			background:#f5f8fb;
			width: 670px;
		}
		#song{
			border:0px solid black;
			background:#88aad6;
			width: 70px;
			text-align: center;
			border-radius: 15px;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>

@section('content')

	<div class="navWrap">
        <div class="nav">
            <ul class="homeNav">
                <li><a class="normal" href="/">首页</a></li>
                <li><a class="normal"  href="/home/paihang">榜单</a></li>
                <li><a class="normal active"  href="/home/list">歌手</a></li>
                <li><a class="normal"  href="/home/music">音乐</a></li>
                <li><a class="normal"  href="/home/specialshow">歌单</a></li>
                <li><a class="normal"  href="/home/personal">我的音乐</a></li>
            </ul>
        </div>
    </div>
	<!--歌手内页-->
<div class="wrap clear_fix" style="margin-left:270px">
	<div class="sng_ins_1">
		<div class="mbx">我的位置 &gt; <a title="歌手" href="/home/list">歌手</a> &gt; <span>{{$res->sname}}</span>
		</div>
		<div class="top" style="border-radius:10px;">
			<img alt="Take(2)" src="{{$res->photo}}" height="142" width="142"/>
			<div class="intro">
				<div class="clear_fix">
					<strong title="Take(2)">{{$res->sname}}</strong>
				</div>
				<p>{{$res->cv}}</p>
			</div>
		</div>
    	<div class="clear"></div>
	    <div id="text" class="singer_intro">
			<div class="bordr_top"></div>
			<div class="bordr_cen">
				<div class="singer_content" id="singer_content">
					<p></p>
				</div>
			</div>
		</div>
		<div class="bordr_btm"></div>
    </div>
    <ul class="tab clear_fix">
		<li id="song" >精选单曲</li>
    </ul>
    <div id="content">
		<!--单曲-->
		<div class="">
            <ul id="">
               @foreach($music as $k=>$v)                           
            	<li class="musics" >
                    <a href="/home/play/{{$v->mid}}">
                    <span style="padding-right: 10px;"> @if($k+1<10) {{$k+1}} @else  {{$k}} @endif </span>
                    <span class="" >{{$v->mname}} - {{$v->sname}}</span>
                    <span style="position: absolute;left:850px;">0{{$v->times}}</span>
                    <span class="icon playBtn icon-play" style="width:15px;background:url('/home/images/3.jpg');display:block;"></span>
                    </a>
                </li>  
                @endforeach                         
            </ul>
        </div>
		<!--专辑-->
    </div>
</div>
<script type="text/javascript">
			// alert($)
			$('.musics').mouseover(function(){
				$(this).addClass('classlist');
				// alert(123);
			})
			$('.musics').mouseout(function(){
				$(this).removeClass('classlist');
			})
</script>
<!--底部-->

@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
	</script>

@stop