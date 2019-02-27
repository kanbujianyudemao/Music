@extends('layout.home')

@section('title',$title)

@section('content')
<div class="navWrap">
    <div class="nav">
        <ul class="homeNav">
            <li><a class="normal active" href="/">首页</a></li>
            <li><a class="normal"  href="home/paihang">榜单</a></li>
            <li><a class="normal"  href="/home/personal">歌手</a></li>
            <li><a class="normal"  href="/home/music">歌曲</a></li>
            <li><a class="normal"  href="/home/specialshow">歌单</a></li>
            <li><a class="normal"  href="/home/personal">我的音乐</a></li>
        </ul>
    </div>
</div>
<div class="search_content">
	<ul class="search_tab clearfix">
		<li class="active" data-type="song"><a id="song" href="javascript:;">单曲</a></li>
	</ul>
	<div class="search_song" id="search_song" style="display: block;">
		<div class="song_list_header">
              <div class="similar_singer" style="display: none;">
                  <a href="http://www.kugou.com/singer/3520.html" class="singer_img" target="_blank"><img src="./search_files/20180515002522714.jpg" alt=""></a>
                  <p class="singer_info"><span class="search_song_num"><a target="_blank" href="http://www.kugou.com/singer/3520.html"><i>554</i>单曲</a> </span></p>
              </div>    
              <div class="action_area">
                  <p class="search_key_word">搜索到<i>“{{$sou}}”</i></p><p class="search_tips">相关的歌曲</p>
                  <a class="play_all" href="javascript:;"><span><i class="search_icon"></i>播放</span></a>
              </div>
        </div>
		<div class="song_list">
            <ul class="list_header clearfix">
                <li class="width_f_li song_name_li">
                   <span class="search_icon checkall"></span>歌曲名
                </li>
                <li class="width_s_li">
                    专辑
                </li>
                <li class="width_t_li">
                    时长
                </li>
            </ul>       
        </div>
	</div>
	<ul class="list_content clearfix" id="list_content1540016294711">
        @foreach($res as $k=>$v)
        <li class="clearfix">
            <div class="width_f_li clearfix">
                <span class="search_icon checkbox">
                </span><a class="song_name" title="{{$v->sname}} - {{$v->mname}}" href="/home/play/{{$v->mid}}">{{$v->sname}} - <em>{{$v->mname}}</em></a>
            </div>
            <div class="width_s_li">
                <a class="album_name" title="{{$v->aname}}" href="/home/albumsou/{{$v->aname}}">{{$v->aname}}</a>&nbsp;
            </div>
            <div class="width_t_li">03:35</div>
            <div class="play-item">
                <span class="common_icon icon_play">
                </span>
                <span class="common_icon icon_download" onclick="_hmt.push([&#39;_trackEvent&#39;, &#39;hidedown&#39;, &#39;hidecilick&#39;, &#39;hidepc&#39;]);">
                </span>
                <span class="common_icon icon_share">
                </span>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="loading" id="before_page" style="display: none;">加载中...</div>
    <div class="downlaod" id="downlaod" style="display: block;">查看更多内容，请下载客户端 <span><a target="_blank" onclick="_hmt.push([&#39;_trackEvent&#39;, &#39;searchsoftware&#39;, &#39;searchdownload&#39;, &#39;searchkugou&#39;]);" href="http://download.kugou.com/download/kugou_pc">立即下载</a></span></div>
</div>
@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>
@stop