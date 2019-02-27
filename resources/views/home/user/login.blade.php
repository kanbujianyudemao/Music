<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="title" content="用户注册-酷狗音乐" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <title>用户登录页面</title>
        <link rel="stylesheet" href="/homes/css/web_reg-t=201808091712.css" />
        <link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

        <!-- Demo Stylesheet -->
        <link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

        <!-- jQuery-UI Stylesheet -->
        <link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

        <!-- Theme Stylesheet -->
        <link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">
    </head>
<body>
    <div class="wrap">
        <link rel="stylesheet" href="/homes/css/shopmain-20150729.css" type="text/css">
        <div class="topBanner">
        	<a href="/" target="_blank"></a>
        </div>
        <div class="public-header-wrapper">
            <div id="public-header">
                <!-- <a href="#" class="gb_logo"></a> -->
                <div class="login public_nav_bd" id="lng">
                	<ul class="nav_m_l_r clear_fix">
                		<li class="nav_r noborder"><a class="regLink" href="/home/reg" title="新用户注册" hidefocus="true" >注册</a></li>
            			<li class="nav_r nav_handle not_login">
            				<div class="liubai"></div>
            				<a href="javascript:;" hidefocus="true" class="t_ico loginbtn">登录</a>
            			</li>
            		</ul>
                </div>
            </div>
        </div>
        <div class="public-nav-wrapper">
        	<div id="public-nav" class="clear_fix">
        	  <h1 class="logo"><a href="/"><img src="/images/music2.png" width="170" height="0" alt="因乐" style="margin-top:0px;height: 50px;" /></a></h1>
        	</div>
        </div>
        <div class="scroll" id="scroll"><img src="/homes/images/scrolltop.png" alt="返回顶部"/></div>
        <!-- <script type="text/javascript" src="/homes/js/base-min.js"></script> -->
        <script src="/homes/js/jquery-1.11.2.min-2015121154354.js"></script>
        <script type="text/javascript" src="/homes/js/header-2015121154354.js" charset="utf-8"></script>
        <style type="text/css">.topBanner{display: none;}
        </style>
        <!-- body -->
        <div class="kg_reg_body_area">
            <!-- 注册主体 -->
            <div class="kg_lgn_reg_box" id="regBox">
                <div class="kg_lgn_reg_hd">
                    <ul class="kg_lgn_reg_tag_list" id="regTagList">
                        <li class="last_child" style="display:none"><a href="javascript:;" class="s3"><span>用户名</span></a></li>
                    </ul>
                </div>
                <div class="kg_lgn_reg_ct" id="regCntList">
                    @if (count($errors) > 0)
                        <div class="mws-form-message error">
                            错误信息
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                         <div class="mws-form-message info">
                              {{session('success')}}
                         </div>
                    @endif
                    @if(session('error'))
                         <div class="mws-form-message danger">
                              {{session('error')}}
                         </div>
                    @endif
                    <!-- 用户名注册 -->
                    <div class="kg_lgn_reg_ct_item" style="min-height:0px" >
                        <form id="t01Form" action="/home/dologin" method="post">
                           <table class="kg_lgn_reg_tb" width="100%">
                                <tr>
                                    <td align="right" valign="top"><label for="t01Usm2" class="kg_lgn_reg_tb_tl"><span class="red">*</span> 用户名：</label></td>
                                    <td>
                                        <div class="kg_lgn_textbox_area kg_lgn_textbox_repassword">
                                            <div class="kg_lgn_textbox"><input maxlength="16" id="t01Usm2" name="username" type="text" class="kg_lgn_textbox_ipt" value="" /></div>
                                            <div class="kg_lgn_tips"><i class="kg_lgn_tips_icon"></i><span class="kg_lgn_tips_txt"></span></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top"><label for="t01Psw" class="kg_lgn_reg_tb_tl"><span class="red">*</span> 密码：</label></td>
                                    <td>
                                        <div class="kg_lgn_textbox_area kg_lgn_textbox_password">
                                            <div class="kg_lgn_textbox"><input maxlength="16" id="t01Psw" name="password" type="password" class="kg_lgn_textbox_ipt" /></div>
                                            <div class="kg_lgn_tips"><i class="kg_lgn_tips_icon"></i><span class="kg_lgn_tips_txt"></span></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" valign="top">
                                        <label for="t01Code" class="kg_lgn_reg_tb_tl">
                                            <span class="red">*</span> 验证码：
                                        </label>
                                    </td>
                                    <td>
                                        <div class="kg_lgn_textbox_area kg_lgn_textbox_code">
                                            <div class="kg_lgn_textbox" style="display:none;">
                                                <input id="code"  maxlength="6"  name="code" type="text" class="kg_lgn_textbox_ipt" />
                                            </div>
                                        </div>
                                        <span class="pcr_iptbox pcr_codebox">
                                            <label class="txt" for="emailt01Code"></label>
                                            <input  name="code" type="text" class="ipt kg_lgn_textbox_ipt" style="width:120px;" onblur="checkCode()"/>
                                            <span class="sts"></span>
                                            <span class="nts"></span>
                                            <span class="pcr_codeimg" id="p_email_code"><img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}?d='+Math.random();"></span>
                                            
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><label class="gray"><input type="checkbox" name="readed" id="t01Agree" class="kg_lgn_checkbox" checked />我已经认真阅读并同意 <a href="../../newuc/reg/protocol.html" target="_blank" class="a_link">《因乐服务条款》</a></label></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <span class="reg_btn_s01" id="t01Submit"><input type="submit" name="" value="登录"  /></span>
                                        {{csrf_field()}}
                                        <span id="t01Msg" class="reg_inset_msg" style="display: none;"></span>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <!--/邮箱注册 -->
                </div>
            </div>
            <!--/注册主体 -->
        </div>
        <!--/body -->
        <link rel="stylesheet"  data-embed href="/homes/css/footer.css">
        <div class="footerWrapper">
            <div class="footer">
                <div class="links">
                    <a hidefocus="true" href="../../about/aboutus.html" target="_blank">关于因乐</a> | <a hidefocus="true" href="javascript:void(0);" id="report">监督举报</a> | <a hidefocus="true" href="../../about/adservice.html" target="_blank">广告服务</a> | <a hidefocus="true" target="_blank" href="../../about/copyRightGuide.html">版权指引</a> |<a target="_blank" href="../../about/privacy.html">隐私政策</a>| <a hidefocus="true" target="_blank" href="../../about/protocol.html">用户服务协议</a> | <a hidefocus="true" target="_blank" href="../../company/partners.html">推广合作</a> |<a hidefocus="true" href="../../hr/html/index.html" target="_blank">招聘信息</a> | <a hidefocus="true" href="../../shop/help/serviceCenter.html" target="_blank">客服中心</a> | <a hidefocus="true" href="http://survey.kugou.com/default/index/i=40CD7B8437008E65E67D82D9044C15C99C2E699859F51338" target="_blank">用户体验提升计划</a>
                </div>
                <div class="copyright">
                    <p class="can_select">我们致力于推动网络正版音乐发展，相关版权合作请联系copyrights@kugou.com</p>
                    <p>信息网络传播视听节目许可证 1910564 增值电信业务经营许可证粤B2-20060339 &nbsp;&nbsp;&nbsp;<a hidefocus="true" target="_blank" href="http://www.miitbeian.gov.cn/">粤ICP备09017694号-2</a><span class="footerIcon"><a target="_blank" href="http://sq.ccm.gov.cn:80/ccnt/sczr/service/business/emark/toDetail/E64D2439A71544C7B995FC0A53D8F965">&nbsp;&nbsp;&nbsp;&nbsp;</a></span></p>
                    <p>广播电视节目制作经营许可证（粤）字第01270号&nbsp;&nbsp;&nbsp;&nbsp;营业性演出许可证穗天演440106026</p>
                    <p>穗公网监备案证第44010650010167&nbsp;&nbsp;&nbsp;&nbsp;互联网药品信息服务资格证编号（粤）-非经营性-2012-0018<a style="" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44010602000141">&nbsp;&nbsp;&nbsp;<span>粤公网安备 44010602000141号</span><img style="vertical-align: text-bottom;" }="" src="/homes/images/icon_yuewangga1.png" width="16" height="16"></a></p>
                    <p class="can_select">不良信息举报邮箱：jubao_music@kugou.net&nbsp;&nbsp;&nbsp;&nbsp;客服邮箱：kefu@kugou.com</p>
                    <p>Copyright&nbsp;&nbsp;&copy;&nbsp;&nbsp;2004-2018 KuGou-Inc.All Rights Reserved
                        <a hidefocus="true" class="office-verification" href="http://netadreg.gzaic.gov.cn/ntmm/WebSear/WebLogoPub.aspx?logo=440106106022006022000209"
                            target="_blank"></a>
                    </p>

                </div>
            </div>
        </div>
        <!--百度统计-->
        <script type="text/javascript">
                  // alert($);
                setTimeout(function(){
                    $('.mws-form-message').slideUp(2000);
                },3000)
        </script>
    </div>	
</body>
</html>
<!-- <script type="text/javascript" src="/homes/js/base-min.2015.js" charset="utf-8"></script> -->
<script type="text/javascript" src="/homes/js/kguser_min.js" charset="utf-8"> </script>
<script type="text/javascript" src="/homes/js/web_reg_v3-201511121557_v20160511.js" charset="utf-8"></script>
<script>
var globalParam = {
    reg_domain : "http://www.kugou.com/reg/web/",
    ref : ""
};
regInit();

</script>
