@extends('layout.home')

@section('content')
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
<!-- body -->
<div class="kg_uc_bodyArea">
    <div class="wing_area_outset">
        <div class="wing_area">
            <div class="wing_main">
                <div class="wing_main_content">
                    <!-- 主体 -->
                    <div class="kg_uc_module01">
                        <div class="kg_uc_module01_hd">
                            <h4 class="h_tl">
                                我的酷狗
                            </h4>
                            <div class="h_l">
                                <span class="kg_uc_module01_notice">
                                    Personal information
                                </span>
                            </div>
                        </div>
                        <div class="kg_uc_module01_bd">
                            <!-- tab 区域 -->
                            <div class="kg_uc_module02">
                                <div class="kg_uc_module02_hd">
                                    <div class="kg_uc_module02_tag_list">
                                    </div>
                                    <ul class="kg_uc_module02_tag_list_ct">
                                        <li>
                                            <a href="/home/person" title="修改头像">
                                                <span>
                                                    修改头像
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/home/person/edit" title="编辑资料">
                                                <span>
                                                    编辑资料
                                                </span>
                                            </a>
                                        </li>
                                        <li class="cur">
                                            <a href="#" title="修改密码">
                                                <span>
                                                    修改密码
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                @if (count($errors) > 0)
						        <div class="mws-form-message error" 
						        style="background-color: #ffcbca;
									    background-image: url(/admins/images/core/message-error.png);
									    border-color: #eb979b;
									    color: #9b4449;
									    font-size: 12px;
									    cursor: pointer;
									    border: 1px solid #d2d2d2;
									    padding: 15px 8px 15px 45px;
									    position: relative;
									    vertical-align: middle;
									    background-position: 12px 12px;
									    background-repeat: no-repeat;
									    margin-bottom: 12px;
									    -webkit-border-radius: 3px;
									    -moz-border-radius: 3px;
									    border-radius: 3px;">
						            错误信息
						            <ul>
						                @foreach ($errors->all() as $error)
						                <li>
						                    {{ $error }}
						                </li>
						                @endforeach
						            </ul>
						        </div>
						        @endif @if(session('success'))
						        <div class="mws-form-message info" style="background-color: #bce5f7;
									    background-image: url(/admins/images/core/message-info.png);
									    border-color: #a6d3e8;
									    color: #11689E;
									    font-size: 12px;
									    cursor: pointer;
									    border: 1px solid #d2d2d2;
									    padding: 15px 8px 15px 45px;
									    position: relative;
									    vertical-align: middle;
									    background-position: 12px 12px;
									    background-repeat: no-repeat;
									    margin-bottom: 12px;
									    -webkit-border-radius: 3px;
									    -moz-border-radius: 3px;
									    border-radius: 3px;">
						            {{session('success')}}
						        </div>
						        @endif
                                <div class="kg_uc_module02_bd">
                                    <form action="/home/person/editpass" method="post">
                                    	{{csrf_field()}}
                                        <table class="kg_uc_gen_tb" width="100%">
                                            <tbody>
                                                <tr>
                                                	<td style="height: 50px"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">
                                                        <label for="newPassword" class="kg_uc_gen_tb_tl">
                                                            <span class="red">
                                                                *
                                                            </span>
                                                            新密码：
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_password">
                                                            <div class="kg_uc_textbox">
                                                                <input id="newPassword" name="password" type="text" maxlength="16"
                                                                class="kg_uc_textbox_ipt kg_uc_same_ipt kg_uc_samebox_ipt">
                                                                
                                                            </div>
                                                            
                                                            <span href="javascript:;" class="icon_password_openeye icon_password_eye"
                                                            id="choosePswBtn" >
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">
                                                        <label for="repassword" class="kg_uc_gen_tb_tl">
                                                            <span class="red">
                                                                *
                                                            </span>
                                                            确认密码：
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_repassword">
                                                            <div class="kg_uc_textbox">
                                                                <input id="repassword" name="repassword" type="password" maxlength="16" class="kg_uc_textbox_ipt kg_uc_same_ipt kg_uc_samebox_ipt">
                                                                
                                                            </div>
                                                            <div class="kg_uc_tips">
                                                                <i class="kg_uc_tips_icon">
                                                                </i>
                                                                <span class="kg_uc_tips_txt">
                                                                    再次输入密码
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top">
                                                        <label for="code" class="kg_uc_gen_tb_tl">
                                                            <span class="red">
                                                                *
                                                            </span>
                                                            验证码：
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_code">
                                                            <div class="kg_uc_textbox">
                                                                <input id="uccode" name="code" type="text" class="kg_uc_textbox_ipt">
                                                            </div>
                                                            <div class="kg_uc_tips">
                                                                <i class="kg_uc_tips_icon">
                                                                </i>
                                                                <span class="kg_uc_tips_txt">
                                                                </span>
                                                            </div>
                                                            <div class="kg_uc_code_area">
                                                                <img id="uccheckimg" title="看不清，换一张" style="cursor: hand;padding-top:3px;"
                                                                onclick="this.src='{{captcha_src()}}?d='+Math.random();" src="{{captcha_src()}}">
                                                            </div>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <input type="submit" id="button" class="kg_uc_btn_style02" value="保存修改">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <!--/tab 区域 -->
                        </div>
                    </div>
                    <!--/主体 -->
                </div>
            </div>
            <div class="wing_side">
            	<script type="text/javascript">
            		var eye = document.getElementById('choosePswBtn');
            		
            		eye.onclick = function(){
            			if(this.className == 'icon_password_closeeye icon_password_eye'){
                			this.className = 'icon_password_openeye icon_password_eye';
                			$("#newPassword").get(0).setAttribute("type","text");
                			// this.parents
                		}else{
                			this.className = 'icon_password_closeeye icon_password_eye';
                			$("#newPassword").get(0).setAttribute("type","password");
                		}
            		};
            	</script>
                <!-- 左侧栏 -->
                <!-- 头像区域 -->
                <div class="kg_uc_avatar_area">
                    <div class="kg_uc_avatar_cover">
                        <img id="UserImage" width="165" height="165" src="{{$rs['0']->photo}}"
                        alt="{{$rs['0']->uname}}">
                    </div>
                    <div class="kg_uc_avatar_txt">
                        <p align="center">
                            <a href="http://www.kugou.com/newuc/user/uc/" id="myucname" class="kg_uc_avatar_name">
                                {{$rs['0']->uname}}
                            </a>
                        </p>
                        <p align="center">
                            (帐号:{{$rs['0']->username}})
                        </p>
                    </div>
                </div>
                <!--/头像区域 -->
                <!--/左侧栏 -->
            </div>
            <script>
                var myPic = "http://imge.kugou.com/kugouicon/165/20100101/20100101192931478054.jpg";
                try {
                    var kugouC = read("KuGoo");
                    var pic_src = kugouC.Pic;
                    if (!pic_src || pic_src == "default.jpg") {
                        pic_src = "http://imge.kugou.com/kugouicon/165/20120724/20120724145917274529.jpg";
                    } else if (pic_src.indexOf("http://") != -1) {
                        pic_src = pic_src;
                    } else {
                        pic_src = "http://imge.kugou.com/kugouicon/165/" + pic_src.substr(0, 8) + "/" + pic_src;
                    }
                    var nickname = kugouC.NickName.replace(/%/g, "\\");;
                    nickname = eval("'" + nickname + "'");
                    document.getElementById("myucname").innerHTML = nickname;
                    document.getElementById("UserImage").src = myPic || pic_src;
                } catch(ex) {
                
                }
            </script>
            <div class="clear">
            </div>
        </div>
    </div>
</div>
<!--/body -->
<script type="text/javascript">
          // alert($);
        setTimeout(function(){
            $('.mws-form-message').slideUp(2000);
        },3000)
</script>
@stop