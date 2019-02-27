@extends('layout.home')
    <link rel="stylesheet" type="text/css" href="/home/css/special.css">
    <link rel="stylesheet" href="/home/css/rankPage.min-201505211743.css" type="text/css">@section('content')
<div class="navWrap">
    <div class="nav">
        <ul class="homeNav">
            <li><a class="normal" href="/">首页</a></li>
            <li><a class="normal active"  href="/home/paihang">榜单</a></li>
            <li><a class="normal"  href="/home/list">歌手</a></li>
            <li><a class="normal"  href="/home/music">音乐</a></li>
            <li><a class="normal"  href="/home/specialshow">歌单</a></li>
            <li><a class="normal"  href="/home/personal">我的音乐</a></li>
        </ul>
    </div>
</div>
<div class="pc_temp_wrap pc_temp_2col_critical">
	<div class="pc_temp_main">
		<!-- 侧栏 -->
		<div class="pc_temp_side">
			<!-- 热门榜单 -->
			<div class="pc_rank_sidebar pc_rank_sidebar_first pc_rank_sidebar_collapse">
				<h3 data-index="0">
					<a href="/" hidefocus="" title="因乐榜单">
						因乐榜单 <i class="pc_temp_arrow"></i>
					</a>
				</h3>
				<ul style="">
					<li>
						<a title="新歌飙升榜"  hidefocus="true" href="/home/paihang/xg/1" onclick="">
							<span style="background-image:url('/images/20130807185439172736.png');_background-image:none; _filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://imge.kugou.com/temppic/20130807/20130807185439172736.png', sizingMethod='crop');"></span>
							新歌飙升榜
						</a>
					</li>			    							
				</ul>
				<ul style="">
					<li>
						<a title="流行排行榜"  hidefocus="true" href="/home/paihang/lx/2" onclick="">
							<span style="background-image:url('/images/20130807185439172736.png');_background-image:none; _filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://imge.kugou.com/temppic/20130807/20130807185439172736.png', sizingMethod='crop');"></span>
							流行排行榜
						</a>
					</li>			    							
				</ul>
				<ul style="">
					<li>
						<a title="经典排行榜"  hidefocus="true" href="/home/paihang/jd/3" onclick="">
							<span style="background-image:url('/images/20130807185439172736.png');_background-image:none; _filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://imge.kugou.com/temppic/20130807/20130807185439172736.png', sizingMethod='crop');"></span>
							经典排行榜
						</a>
					</li>			    							
				</ul>
				<ul style="">
					<li>
						<a title="轻音乐排行榜"  hidefocus="true" href="/home/paihang/qyy/4" onclick="">
							<span style="background-image:url('/images/20130807185439172736.png');_background-image:none; _filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://imge.kugou.com/temppic/20130807/20130807185439172736.png', sizingMethod='crop');"></span>
							轻音乐排行榜
						</a>
					</li>			    							
				</ul>
			</div>
		</div>
		<div class="pc_temp_content">
			<div class="pc_temp_container">
				<div class="pc_rank_title clear_fix">
					<div id="pc_temp_title" class="pc_temp_title">
						<h3>因乐排行榜
						</h3>
						<span class="rank_update">2018-10-24 更新</span>
					</div>
				</div>
				<div id="rankWrap">
					<div class="pc_temp_songlist ">
						<ul>
							@foreach($res as $k=>$v)
							<li class=" " title="{{$v->mname}}" data-index="0">
								<span class="pc_temp_coverlayer"></span>
								<span class="pc_temp_num"><strong>@if($k+1<10){{$k+1}}@else {{$k+1}} @endif </strong></span>
									<a href="/home/play/{{$v->mid}}" data-active="playDwn" data-index="0" class="pc_temp_songname" title="{{$v->mname}}" hidefocus="true">{{$v->sname}} - {{$v->mname}}</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>

@stop