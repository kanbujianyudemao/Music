@extends('layout.home')

@section('content')
    <div class="navWrap">
        <div class="nav">
            <ul class="homeNav">
                <li><a class="normal active" href="/">首页</a></li>
                <li><a class="normal"  href="home/paihang">榜单</a></li>
                <li><a class="normal"  href="/home/list">歌手</a></li>
                <li><a class="normal"  href="/home/music">歌曲</a></li>
                <li><a class="normal"  href="/home/specialshow">歌单</a></li>
                <li><a class="normal"  href="/home/personal">我的音乐</a></li>
            </ul>
        </div>
    </div>
    <div class="banner" >
        <ul id='bxslider'>
            <li><img src="/home/images/20180604115326765470.jpg"></li>
            <li><img src="/home/images/20170929134028425664.jpg"></li>
            <li><img src="/home/images/20180817192011491298.jpg"></li>
            <li><img src="/home/images/20180927233454582652.jpg"></li>
            <li><img src="/home/images/20180928104529276586.jpg"></li>
        </ul>
    </div>
        <style type="text/css">
            .banner,.banner li, .banner img {
                 height:300px;
            }
        </style>
        <script type="text/javascript">
            $(function(){
                $('#bxslider').bxSlider({
                    auto: true,
                    controls: true,
                    pager: true
                });
            });
        </script>      
        <div class="content" id="content">
            <div class="subContentM" id="secoundContent">
                <!-- 精选歌单 -->
                <div class="itemM selectSongList">
                    <div class="itemTitle">
                    <img src="/home/images/selectlist.jpg"></div>
                    <div class="itemContent">
                            @foreach($rs as $k=>$v)
                                @if($v->status == 0)
                                <div class="cpt cptBig">
                                @else
                                <div class="cpt cptMid">   
                                @endif
                                    <p class="cptT"><span class="icon icon-select_icon"></span><span class="num"><?php echo rand(111,999);?>万</span></p>
                                        @if($v->status == 0)
                                        <img src="{{$v->photo}}" width="325" height="325" >
                                        @else
                                         <img  src="{{$v->photo}}" width="160" height="160">
                                        @endif 
                                    <div class="Cover" >
                                        <a  href="/home/special/list/{{$v->gdid}}">
                                        </a>
                                    </div>
                                    <p class="cptBg"></p>
                                    <div class="cptB">
                                        <p class="songListName">{{$v->title}}</p>
                                        <p class="songListSinger">{{$v->zhizuo}}</p>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
                <!-- 精选歌单 -->
                <!-- 热门歌单 -->
                <div class="itemM HotSongList">
                    <div class="itemTitle">
                    <img src="/home/images/hotlist.jpg"></div>
                    <div class="itemContent">
                        <div class="listItem">
                            <a href="home/paihang/xg/1">
                                <div class="Cover">
                                    <div class="playBtn icon icon-play_s" data-id="6666">播放</div>
                                </div>
                                <span class="arrow icon-big_arrow_right"></span>
                                <img src="/images/T1M4h4BKKj1RCvBVdK.jpg" width="98" height="98" >
                                <div class="list">
                                    <dl>
                                        <dt>新歌飙升榜</dt>
                                                @foreach($rspx as $k=>$v)
                                                <dd>{{$k+1}} . {{$v->sname}} - {{$v->mname}}</dd>
                                            @endforeach
                                    </dl>
                                </div>
                            </a>
                        </div>
                        <div class="listItem">
                            <a href="home/paihang">
                                <div class="Cover">
                                    <div class="playBtn icon icon-play_s" data-id="8888">播放</div>
                                </div>
                                <span class="arrow icon-big_arrow_right"></span>
                                <img   src="/images/T1fHd4BXd_1RCvBVdK.jpg" width="98" height="98" >
                                <div class="list">
                                    <dl>
                                        <dt>因乐TOP500</dt>
                                        @foreach($rspz as $k=>$v)
                                            <dd>{{$k+1}} . {{$v->sname}} - {{$v->mname}}</dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </a>
                        </div>
                        <div class="listItem">
                            <a href="home/paihang/lx/2">
                                <div class="Cover">
                                    <div class="playBtn icon icon-play_s" data-id="23784">播放</div>
                                </div>
                                <span class="arrow icon-big_arrow_right"></span>
                                <img  src="/images/T1Fpd4BKbg1RCvBVdK.jpg" width="98" height="98">
                                <div class="list">
                                    <dl>
                                        <dt>流行音乐榜</dt>
                                            @foreach($rspl as $k=>$v)
                                                <dd>{{$k+1}} . {{$v->sname}} - {{$v->mname}}</dd>
                                            @endforeach
                                    </dl>
                                </div>
                            </a>
                        </div>
                    </div>
                <!-- 热门歌单 -->
                </div>
            </div>
            <div class="subContentM">
                <!-- 新歌首发 -->
                <div class="itemM newSongList">
                    <div class="itemTitle hasBorder">
                        <h3><b>新歌</b>首发</h3>
                        <div class="tabT" id="SongtabMenu">
                            <span class="MenuItem active" data="0">大陆</span>
                            <span class="MenuItem " data="1">港台</span>
                            <span class="MenuItem " data="2">日韩</span>
                            <span class="MenuItem " data="3">欧美</span>
                        </div>
                        
                    </div>
                    <div class="itemContent">
                        <div class="tabC" id="SongtabContent">
                            <ul id="music">
                                @foreach($arr as $k => $v)
                                <li>
                                    <a href="/home/play/{{$v->mid}}">
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
                    <script type="text/javascript">
                        $('.MenuItem').mouseover(function(){
                            $('.MenuItem').removeClass('active')
                            $(this).addClass('active');
                            var a = $(this).attr('data');
                            $.get("/home/music/show",{szone : a},function(data){
                                $("#SongtabContent").find('ul').html('');
                                    bb = data[data.length-1];

                                    // 1. 循环遍历ajax放回的数组
                                    for (var i = 0; i < data.length-1; i++) {

                                        if($.isPlainObject(data[i])) {
                                            setSingerHtml(data[i],bb);
                                        }
                                    }
                                     
                                    // 2. 创建节点

                                    // 3. 将组合好的节点和数据插入到html中
                                });
                                
                        });
                        // 设置html
                            function setSingerHtml(data,bb) {
                                var patt1 = new RegExp(data.sname + ' - ' + data.mname);
                                var str = patt1.test(bb) ? "2": '1';
                                var music = `<li>
                                                <a href="#">
                                                    <span class="songName" >${data.sname} - ${data.mname}</span>
                                                    <span class="songTips"></span>
                                                    <span class="songTime">${data.times}</span>
                                                    <span id="a" class="icon playBtn icon-collect" style="width:15px;background:url('/home/images/${str}.jpg');display:block;">
                                                    </span>
                                                </a>
                                            </li>`;
                                $(music).appendTo($("#SongtabContent").find('ul'));
                            }
                    </script>
                    <script type="text/javascript">
                        // $(function(){

                            $("ul").delegate(".icon-collect", "click", function(){
                                // alert(123);
                                var se = $(this).siblings().eq(0).text().split(' ');
                                var mname = se['2'];
                                var sname = se['0'];
                                // console.log(sname)
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
                    <div class="pages p">
                      
                    </div>   
                </div>
                <!-- 新歌首发 -->
                <!-- 推荐Mv -->
                <div class="itemM albumList">
                    <div class="itemTitle">
                        <img src="/home/images/albumlist.jpg">
                        </div>
                    <div class="itemContent">
                        <div class="cpt cptBigL">
                            <a target="_blank" href="/home/mvplay">
                                      <img   width="320" height="175" src="/images/20180927173146386001.jpg" >
                                <div class="Cover">
                                    <div class="playBtn icon icon-play_b">播放</div>
                                </div>
                                <p class="cptBg"></p>
                                <div class="cptB">
                                    <p class="songListName">不及雨</p>
                                    <p class="songListSinger">张碧晨</p>
                                </div>
                            </a>
                        </div>
                        <div class="cpt cptMidL">
                            <a target="_blank" href="/home/mvplay">
                                <img  src="/images/20180925215554929011.jpg" width="154" height="84" >
                                <div class="Cover">
                                    <div class="playBtn icon icon-play_b">播放</div>
                                </div>
                                <p class="cptBg"></p>
                                <div class="cptB">
                                    <p class="songListName">高贵与卑微</p>
                                    <p class="songListSinger">胡彦斌</p>
                                </div>
                            </a>
                        </div>
                        <div class="cpt cptMidL">
                            <a target="_blank" href="/home/mvplay">
                                <img  src="/images/20180927165901814451.jpg" width="154" height="84" >
                                <div class="Cover">
                                    <div class="playBtn icon icon-play_b">播放</div>
                                </div>
                                <p class="cptBg"></p>
                                <div class="cptB">
                                    <p class="songListName">Stay Open</p>
                                    <p class="songListSinger">黄子韬、Diplo、MØ</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- 推荐Mv -->
            </div>
            <div class="subContentM limitHeight">
                <!-- 新歌首发 -->
                <div class="itemM HotRadio">
                    <div class="itemTitle">
                    <img src="/home/images/hotredio.jpg"></div>
                    <div class="itemContent">
                        <ul>
                            @foreach($rsz as $k=>$v)
                            <li>
                                <a  href="/home/albumlist/{{$v->aid}}">
                                    <div class="Cover">
                                        <div class="playBtn icon icon-radio_play"></div>
                                    </div>
                                    <div class="radioLogo">
                                        <img width="100" height="100" src="{{$v->photo}}"  class=" ">
                                    </div>
                                    <div class="radioKind">{{$v->aname}}</div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- 新歌首发 -->
                <!--热门歌手 -->
                <div class="itemM HotSinger">
                    <div class="itemTitle">
                        <h3><b>热门</b>歌手</h3>
                        <div class="tabT" id="tabMenu">
                            <span data="0" class="geshou">大陆</span>
                            <span data="1" class="geshou">港台</span>
                            <span data="2" class="geshou">日韩</span>
                            <span data="3" class="geshou">欧美</span>
                        </div>
                    </div>
                    <div class="itemContent">
                        <div>
                            <ul class="firstUl clearFix" id="SingertabContent">
                                <li class="item">
                                    <ul class="chinaSinger secondUl clearFix" id="chinaSingerContent">
                                        <li id = "singer">     
                                            @foreach($rss as $k=>$v)                                                     @if($k<2) 
                                            <div class="cpt cptMid">
                                             @else   
                                            <div class="cpt cptSmall">
                                             @endif   
                                                <a class="singerLink" href="/home/list/listsinger/{{$v->sid}}">
                                                    <img class="singerImg" src="{{$v->photo}}" >
                                                    <div class="Cover">
                                                        <div class="playBtn icon">播放</div> 
                                                    </div>
                                                    <p class="cptBg"></p>
                                                    <div class="cptB">
                                                        <p class="songListSinger">
                                                            {{$v->sname}}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>  
                                            @endforeach      
                                                                        </li>
                                           <script type="text/javascript">

                                                $(function() {

                                                // alert($);
                                                $('.geshou').mouseover(function(){
                                                    $('.geshou').removeClass('active');
                                                    $(this).addClass('active');
                                                    var text = $(this).attr('data');


                                                    $.get('/home/geshou',{val:text},function(data) {
                                                        $("#singer").html('');
                                                        // console.log(data);
                                                        // 1. 循环遍历ajax放回的数组
                                                        for (var i = 0; i < data.length; i++) {
                                                            if(i<=1) {
                                                                setSingerHtml(data[i], true);
                                                            } else {
                                                                setSingerHtml(data[i], false);                            
                                                            }
                                                        }

                                                        // 2. 创建节点

                                                        // 3. 将组合好的节点和数据插入到html中
                                                    });
                                                });


                                                // 设置html
                                                function setSingerHtml(data, addClass) {
                                                    var str = addClass ? "cptMid": 'cptSmall';

                                                    var songer = `<div class="cpt ${str}">
                                                            <a class="singerLink" href="/home/list/listsinger/${data.sid}">
                                                                <img class="singerImg" src="${data.photo}" >
                                                                <div class="Cover">
                                                                    <div class="playBtn icon">播放</div> 
                                                                </div>
                                                                <p class="cptBg"></p>
                                                                <div class="cptB">
                                                                    <p class="songListSinger">${data.sname}</p>
                                                                </div>
                                                            </a>
                                                        </div>`;
                                                    $(songer).appendTo($("#singer"));
                                                }
                                            });

                                            </script>                               
                                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 推荐Mv -->
            </div>
            <div class="partner itemM ">
                <div class="itemTitle">
                    <img src="/home/images/partner.jpg"></div>
                <div class="itemContent">
                    <div class="hz_logo clear_fix">
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="" width="130" height="58"  src="/images/partner01.jpg" alt=""></a>
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="EMI" width="130" height="58"  src="/images/partner02.jpg"  alt=""></a>
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="SONY" width="130" height="58"  src="/images/partner03.jpg"  alt=""></a>
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="海蝶" width="130" height="58"  src="/images/partner06.jpg"  alt=""></a>
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="丰华唱片" width="130" height="58"  src="/images/partner08.jpg"  alt="">
                        </a>
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="喜欢音乐" width="130" height="58"  src="/images/partner10.jpg"  alt=""></a>
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="种子音乐" width="130" height="58"  src="/images/partner15.jpg"  alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="friendLink itemM ">
                <div class="itemTitle">
                    <img src="/home/images/friendLink.jpg"></div>
                <div class="itemContent">
                        <a target="_blank" href="/" title="爱美网">爱美网</a>
                    
                        <a target="_blank" href="/" title="央视网综艺频道">央视网综艺频道</a>
                    
                        <a target="_blank" href="/" title="汽车论坛">汽车论坛</a>
                    
                        <a target="_blank" href="/" title="IT之家">IT之家</a>
                    
                        <a target="_blank" href="/" title="iPhone游戏">iPhone游戏</a>
                    
                        <a target="_blank" href="/" title="旅游攻略">旅游攻略</a>
                    
                        <a target="_blank" href="/" title="悦声无限">悦声无限</a>
                    
                        <a target="_blank" href="/" title="华为商城">华为商城</a>
                </div>
            </div>
        </div>
@stop

@section('js')


@stop