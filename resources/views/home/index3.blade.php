@extends('layout.home')



@section('content')
    <div class="navWrap">
            <div class="nav">
                <ul class="homeNav">
                    <li><a class="normal active" href="/">首页</a></li>
                    <li><a class="normal"  href="yy/html/rank.html">榜单</a></li>
                    <li><a class="normal"  href="yy/html/rank.html">歌手</a></li>
                    <li><a class="normal"  href="/home/music">歌曲</a></li>
                    <li><a class="normal"  href="/home/specialshow">歌单</a></li>
                    <li><a class="normal"  href="yy/html/rank.html">专辑</a></li>
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
                                 <a href="yy/rank/home/1-6666-from=homepage.html">
                                    <div class="Cover">
                                        <div class="playBtn icon icon-play_s" data-id="6666">播放</div>
                                    </div>
                                    <span class="arrow icon-big_arrow_right"></span>
                                    <img  _src="http://imge.kugou.com/v2/rank_cover/T1M4h4BKKj1RCvBVdK.jpg_240x240.jpg" src="yy/static/images/blank.gif" width="98" height="98" _def="http://static.kgimg.com/public/root/images/rankdefalut.jpg">
                                    <div class="list">
                                        <dl>
                                            <dt>酷狗飙升榜</dt>
                                            
                                                
                                                    <dd>1 . 马良、孙茜茹 - 往后余生</dd>
                                                
                                            
                                                
                                                    <dd>2 . 鹿晗 - 时间停了</dd>
                                                
                                            
                                        </dl>
                                    </div>
                                </a>
                            </div>
                        
                            <div class="listItem">
                                 <a href="yy/rank/home/1-8888-from=homepage.html">
                                    <div class="Cover">
                                        <div class="playBtn icon icon-play_s" data-id="8888">播放</div>
                                    </div>
                                    <span class="arrow icon-big_arrow_right"></span>
                                    <img  _src="http://imge.kugou.com/v2/rank_cover/T1fHd4BXd_1RCvBVdK.jpg_240x240.jpg" src="yy/static/images/blank.gif" width="98" height="98" _def="http://static.kgimg.com/public/root/images/rankdefalut.jpg">
                                    <div class="list">
                                        <dl>
                                            <dt>酷狗TOP500</dt>
                                            
                                                
                                                    <dd>1 . 张紫豪 - 可不可以</dd>
                                                
                                            
                                                
                                                    <dd>2 . 黑龙 - 38度6</dd>
                                                
                                            
                                        </dl>
                                    </div>
                                </a>
                            </div>
                        
                            <div class="listItem">
                                 <a href="yy/rank/home/1-23784-from=homepage.html">
                                    <div class="Cover">
                                        <div class="playBtn icon icon-play_s" data-id="23784">播放</div>
                                    </div>
                                    <span class="arrow icon-big_arrow_right"></span>
                                    <img  _src="http://imge.kugou.com/v2/rank_cover/T1Fpd4BKbg1RCvBVdK.jpg_240x240.jpg" src="yy/static/images/blank.gif" width="98" height="98" _def="http://static.kgimg.com/public/root/images/rankdefalut.jpg">
                                    <div class="list">
                                        <dl>
                                            <dt>网络红歌榜</dt>
                                            
                                                
                                                    <dd>1 . 金南玲 - 逆流成河【我在锡林郭勒等你电视剧插曲】</dd>
                                                
                                            
                                                
                                                    <dd>2 . 胡66 - 读者</dd>
                                                
                                            
                                        </dl>
                                    </div>
                                </a>
                            </div>
                        
                    
                    </div>
                <!-- 热门歌单 -->
                </div>
            </div>
            <!-- <div class="hardWare"> <iframe scrolling="no" frameborder="0" width="1000" height="80" src="about:blank" _isrc="http://ads.service.kugou.com/v1/random?id=290&userid=32738873" width="100%" height="100%"></iframe></div> -->
            <div class="subContentM">
                <!-- 新歌首发 -->
                <div class="itemM newSongList">
                    <div class="itemTitle hasBorder">
                        <h3><b>新歌</b>首发</h3>
                        <div class="tabT" id="SongtabMenu">
                            <span class="MenuItem active" data="0">华语</span>
                            <span class="MenuItem " data="1">欧美</span>
                            <span class="MenuItem " data="2">韩国</span>
                            <span class="MenuItem " data="3">日本</span>
                        </div>
                        <button class="playAll"><span class="icon icon-play"></span><em>全部播放</em></button>
                    </div>
                
                    <div class="itemContent">
                        <div class="tabC" id="SongtabContent">
                            <ul>
                            
                               
                                    <li  data='{"first":1,"Hash":"025CF1E4EB9187D5C5EF656FD0880298","time":"03:47","timeLen":227059,"FileName":"鹿晗 - 时间停了","Filename":"鹿晗 - 时间停了","albumId":10773504,"privilege":8,"size":3642015,"songLink":"q75bz3b"}'>
                                        <a href="song/q75bz3b.html">
                                        <span class="songName">鹿晗 - 时间停了</span>
                                        
                                            <span class="songTips"></span>
                                        
                                        <span class="songTime">03:47</span>
                                            <span class="icon playBtn icon-play"></span>
                                            <span class="icon downloadBtn icon-download" onclick="_hmt.push(['_trackEvent', 'hidedown', 'hidecilick', 'hidepc']);"></span>
                                            <span class="icon shareBtn icon-share"></span>
                                        </a>
                                    </li>
                                 
                            
                            </ul>
                            <ul style="display: none">
                            
                          
                            </ul>
                            <ul style="display: none">
                            
                            
                            </ul>
                            <ul style="display: none">
                           
                            </ul>
                        </div>
                    </div>
                    <div class="pages p">
                      
                    </div>   
                </div>
                <!-- 新歌首发 -->
                <!-- 推荐Mv -->
                <div class="itemM albumList">
                    <img src="/home/images/albumlist.jpg">
                    <div class="itemTitle">
                        </div>
                    <div class="itemContent">
                        
                        
                            
                                <div class="cpt cptBigL">
                            
                                    <a target="_blank" href="/home/mvplay">
                                        
                                              <img   width="320" height="175" src="/images/18.jpg" >
                                        
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
                                        
                                               <img  src="/home/images/20180913063318694832.jpg" width="154" height="84" >
                                        
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
                                        
                                               <img  src="/home/images/20180926184203696067.jpg" width="154" height="84" >
                                        
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
                    console.log(data);
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
                        <a class="singerLink" href="/">
                            <img class="singerImg" src="${data.photo}" >
                            <div class="Cover">
                                <div class="playBtn icon">播放</div> 
                            </div>
                            <p class="cptBg"></p>
                            <div class="cptB">
                                <p class="songListSinger"></p>
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
                        <a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner01.jpg" alt=""></a><a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="EMI" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner02.jpg" alt=""></a><a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="SONY" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner03.jpg" alt=""></a><a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="海蝶" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner04.jpg" alt=""></a><a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="丰华唱片" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner05.jpg" alt=""></a><a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="喜欢音乐" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner06.jpg" alt=""></a><a href="javascript:;" hidefocus="true" title="" rel="nofollow"><img title="种子音乐" width="130" height="58"  src="yy/static/images/blank.gif" _src="http://static.kgimg.com/public/root//images/logo/partner07.jpg" alt=""></a>
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