@extends('layout.home')

@section('content')

<div class="navWrap">
    <div class="nav">
        <<ul class="homeNav">
            <li><a class="normal" href="/">首页</a></li>
            <li><a class="normal"  href="/home/paihang">榜单</a></li>
            <li><a class="normal"  href="/home/list">歌手</a></li>
            <li><a class="normal special"  href="/home/music">音乐</a></li>
            <li><a class="normal"  href="/home/specialshow">歌单</a></li>
            <li><a class="normal"  href="/home/personal">我的音乐</a></li>
        </ul>
    </div>
</div>

<style>
    #content .newSongList {
        height: auto!important;
        overflow: auto;
    }
    #content .newSongList .itemContent {
        height: auto!important;
        overflow: auto;
    }
</style>


<div class="content" id="content">
    <div class="itemM newSongList">
        <div class="subContentM" id="secoundContent" style="margin-bottom: 20px;">
            <div class="itemTitle hasBorder">
                <h3><b>歌手</b>地区</h3>
                <div class="tabT" id="SongtabMenu">
                    <span class="MenuItem active" data="0">大陆</span>
                    <span class="MenuItem" data="1">港台</span>
                    <span class="MenuItem" data="2">日韩</span>
                    <span class="MenuItem" data="3">欧美</span>
                </div>
                <button class=""><span class="icon "></span><em></em></button>
            </div>
            <div class="itemContent">
                <div class="tabC" id="SongtabContent" style="margin-top: 0px;">
                    <ul id="music-item-list" style="display: block;">
                        @foreach($rs as $k=>$v)
                            <li id="music">
                                <a href="/home/play/{{$v->mid}}">
                                    <span class="songName">@if ($k<9) 0{{$k+1}} @else {{$k+1}} @endif &nbsp; </span>
                                    <span class="songName" >{{$v->sname}} - {{$v->mname}}</span>
                                    <span class="songTips"></span>
                                    <span class="songTime"></span>
                                    @if(session('uid'))
                                    <span class="icon playBtn icon-collect" style="width:15px;background:url('/home/images/<?php 
                                        if(strstr($str,($v->sname.' - '.$v->mname))){echo 2;}
                                        else{echo 1;}
                                        ?>.jpg');display:block;">
                                    </span>
                                    @else
                                    <span class="icon playBtn i-collect" style="width:15px;background:url('/home/images/1.jpg');display:block;" onclick="alert('请登录后进行收藏');return false;">
                                    </span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript" src=""></script>
	<script type="text/javascript">
		$('.MenuItem').mouseover(function(){
			$('.MenuItem').removeClass('active')
			$(this).addClass('active');
			var a = $(this).attr('data');
			$.get("/home/music/show2",{szone : a},function(data){
			  	$("#music-item-list").html('');
                    bb = data[data.length-1];

                    // 1. 循环遍历ajax放回的数组
                    for (var i = 0; i < data.length-1; i++) {
                        if($.isPlainObject(data[i])) {
                            if(i<9){
                                b = "0"+(i+1);
                            }else{
                                b = i+1;
                            }
                            setSingerHtml(data[i],bb,b);
                        }
                    }
                    // 2. 创建节点

                    // 3. 将组合好的节点和数据插入到html中
                });
		});
		// 设置html
            function setSingerHtml(data,bb,b) {
                var patt1 = new RegExp(data.sname + ' - ' + data.mname);
                var str = patt1.test(bb) ? "2": '1';
                var music = `<li>
                                <a href="/home/play/${data.mid}">
                                    <span class="songName">${b}  &nbsp; </span>
                                    <span class="songName" >${data.sname} - ${data.mname}</span>
                                    <span class="songTips"></span>
                                    <span class="songTime"></span>
                                    <span id="a" class="icon playBtn icon-collect" style="width:15px;background:url('/home/images/${str}.jpg');display:block;">
                                    </span>
                                </a>
                            </li>`;
                $(music).appendTo($("#music-item-list"));
            }
	</script>
    <script type="text/javascript">
        // $(function(){
            $("ul").delegate(".icon-collect", "click", function(){
                // alert(123);
                var se = $(this).siblings().eq(1).text().split(' ');
                var mname = se['2'];
                var sname = se['0'];
                console.log(se)
                var str = $(this).attr('style')
                $(this).removeAttr('style');
                if(str == "width:15px;background:url('/home/images/1.jpg');display:block;"){
                    $(this).attr("style","width:15px;background:url('/home/images/2.jpg');display:block;");
                        $.get('/home/music/collect',{mname:mname,sname:sname},function(data){
                            
                        })
                        return false;
                }else{
                    $(this).attr("style","width:15px;background:url('/home/images/1.jpg');display:block;");
                        $.get('/home/music/xcollect',{mname:mname,sname:sname},function(data){
                            
                        })
                        return false;
                }
            });
    </script>
@stop