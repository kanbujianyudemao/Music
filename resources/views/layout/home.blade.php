<!DOCTYPE html>
<html lang="en">
<head>
     <script type="text/javascript">window.startTime = new Date().getTime();var sendFristFlag = false;</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand" /> 
    <title>因乐 - 因你而乐</title>
    <meta itemprop="images" content="/home/images/logo.png" />
    <meta name="keywords" content="" />
    
    <link href="/images/20130807185439172736.png" rel="shortcut icon">
    <link rel="stylesheet" href="/home/css/index.css">
    <link rel="stylesheet" href="/homes/css/base_v.1.css" />
    <link rel="stylesheet" href="/homes/css/user_center_v.1.css" />
    <!-- <link rel="alternate" media="only screen and (max-width: 640px)"  href="http://m.kugou.com"> -->

    
    <link rel="stylesheet" type="text/css" href="/home/hdp/css/bxslider.css">

    <!-- 歌单css js-->
    <link rel="stylesheet" type="text/css" href="/home/css/header-20160116.css">
    <script type="text/javascript" src="/home/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="/home/common/js/lib.js"></script> -->
    <!-- 搜索 -->
    <link rel="stylesheet" type="text/css" href="/home/css/search.css">

    <script type="text/javascript" src='/admins/js/libs/jquery-1.8.3.min.js'></script>
    <script type="text/javascript" src='/home/hdp/js/jquery.bxslider.min.js'></script>
    
</head>

<body>
    
    <div class="mainPage">
        <div class="header">
            <h1 class="logo"><a  href="/"><img src="/images/music.png" alt=""></a></h1>
            <div class="search_wrapper top_search">
                <div class="search_input">
                    <form method="post" action="/home/sou">
                        <input name="sou" type="text" placeholder="搜索音乐"> 
                        <div class="searh_btn">
                            <button type="submit" style="background: #fff">
                                {{csrf_field()}}
                                <i class="search_icon"></i>
                             </button><span>搜索</span>
                        </div>
                    </form>
                 </div>
                <div class="search_recommend top_search_recommend">
                    
                </div>
                <div class="search_histroy top_search_histroy">
                   
                </div>
            </div>
            <div class="topNav fr">
                <ul>
                    <li><a target="_blank" href="#">客服中心</a></li>
                    
                    <li><a target="_blank" href="#">会员中心 </a></li>
                </ul>
                <div class="login_area">
                    @if(!session('uid'))
                    <div id="login_in" class="">
                        <a class="login_btn" href="/home/login"  id="login_btn">登录</a>
                        <a target="_blank" href="/home/reg" class="regin_btn" id="regin_btn">注册</a>
                    </div>
                    <div id="" class="">
                        <img class="user_img" src="">
                        <span class="user_name"></span>
                    </div>
                    @else
                    <div id="" class="">
                        <div class="topArrow1"  style="float: left;margin-left:15px;">Hello,{{session('username')}}</div>
                        <div class="topArrow2"></div>
                        <ul>
                            <li><a target="_blank" href="/home/person"><span class="user_icon1"></span>个人中心</a></li>
                            <li><a href="/home/logout"><span class="user_icon2"></span>退出登录</a></li>
                        </ul>
                    </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
        
 @section('content')
 
@show 
        <div class="footerWrapper">
            <div class="footer">
                <div class="links">
                    <a hidefocus="true" href="about/aboutus.html" target="_blank">关于酷狗</a>| <a hidefocus="true" href="javascript:void(0);" id="report">监督举报</a> | <a hidefocus="true" href="about/adservice.html" target="_blank">广告服务</a> | <a hidefocus="true" target="_blank" href="about/copyRightGuide.html">版权指引</a>|<a target="_blank" href="about/privacy.html">隐私政策</a>| <a hidefocus="true" target="_blank" href="about/protocol.html">用户服务协议</a> | <a hidefocus="true" target="_blank" href="company/partners.html">推广合作</a> | <a hidefocus="true" target="_blank" href="imusic/index.html">酷狗音乐人</a> |<a hidefocus="true" target="_blank" href="http://tui.kugou.com/">酷狗音乐推</a> |<a hidefocus="true" href="hr/html/index.html" target="_blank">招聘信息</a> | <a hidefocus="true" href="shop/help/serviceCenter.html" target="_blank">客服中心</a> | <a hidefocus="true" href="http://survey.kugou.com/default/index/i=40CD7B8437008E65E67D82D9044C15C99C2E699859F51338" target="_blank">用户体验提升计划</a>
                </div>
                <div class="copyright">
                    <p style="-moz-user-select: text;-webkit-user-select: text;-ms-user-select: text; user-select:text">我们致力于推动网络正版音乐发展，相关版权合作请联系copyrights@kugou.com</p>
                    <p>信息网络传播视听节目许可证 1910564 增值电信业务经营许可证粤B2-20060339 &nbsp;&nbsp;&nbsp;<a hidefocus="true" target="_blank" href="http://www.miitbeian.gov.cn/">粤ICP备09017694号-2</a><span class="footerIcon"><a target="_blank" href="http://sq.ccm.gov.cn:80/ccnt/sczr/service/business/emark/toDetail/E64D2439A71544C7B995FC0A53D8F965">&nbsp;&nbsp;&nbsp;&nbsp;</a></span></p>
                    <p>广播电视节目制作经营许可证（粤）字第01270号&nbsp;&nbsp;&nbsp;&nbsp;营业性演出许可证穗天演440106026</p>
                    <p>穗公网监备案证第44010650010167&nbsp;&nbsp;&nbsp;&nbsp;互联网药品信息服务资格证编号（粤）-非经营性-2012-0018<a style="" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602000141">&nbsp;&nbsp;&nbsp;<span>粤公网安备 44010602000141号</span><img style="vertical-align: text-bottom;" }="" src="/home/images/icon_yuewangga1.png" width="16" height="16"></a></p>
                    <p style="-moz-user-select: text;-webkit-user-select: text;-ms-user-select: text; user-select:text">不良信息举报邮箱：jubao_music@kugou.net&nbsp;&nbsp;&nbsp;&nbsp;客服邮箱：kefu@kugou.com</p>
                    <p>Copyright&nbsp;&nbsp;&copy;&nbsp;&nbsp;2004-2018 KuGou-Inc.All Rights Reserved
                        <a hidefocus="true" class="office-verification" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440106106022006022000209" target="_blank"></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="scrollTop icon-scrollTop"><a href="index.html#"></a></div>
    </div>
    <div class="macDownload" id="macDownload">
        <div class="macDownload-left">
            <div class="macDownload-logo"></div>
            <p class="macDownload-title">Mac版酷狗音乐已更新</p>
            <p class="macDownload-txt">就是歌多</p>
        </div>
        <div class="macDownload-right">
            <a class="macClick-up" target="_blank"  href="#">详情</a>
            <a class="macClick-down" target="_blank"  href="#">下载</a>
        </div>
    </div>
    

    @section('js')


   @show
</body>
</html>
