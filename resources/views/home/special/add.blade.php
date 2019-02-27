@extends('layout.home')

<link rel="stylesheet" href="/css/base_v.1.css" />
<link rel="stylesheet" href="/css/header.css" />
<link rel="stylesheet" href="/css/user_center_v.1.css" />

@section('content')
    <div class="navWrap">
        <div class="nav">
            <ul class="homeNav">
                <li><a class="normal" href="/">首页</a></li>
                <li><a class="normal"  href="/home/paihang">榜单</a></li>
                <li><a class="normal"  href="/home/list">歌手</a></li>
                <li><a class="normal"  href="/home/music">音乐</a></li>
                <li><a class="normal active"  href="/home/specialshow">歌单</a></li>
                <li><a class="normal"  href="/home/personal">我的音乐</a></li>
            </ul>
        </div>
    </div>
	
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
             
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/lib.js"></script>
    <script type="text/javascript" src="/js/common_header.min.js"> </script>
    <!-- body -->
    <div class="kg_uc_bodyArea">
        <div class="wing_area_outset">
            <div class="wing_area">
                <div class="wing_main">
                    <div class="wing_main_content">
                    <!-- 主体 -->
                        <div class="kg_uc_module01">
                            <div class="kg_uc_module01_hd">
                                <h4 class="h_tl">我的歌单</h4>
                            </div>
                            <div class="kg_uc_module01_bd">
                                <!-- tab 区域 -->
                                <div class="kg_uc_module02">
                                    <div class="kg_uc_module02_hd">
                                        <div class="kg_uc_module02_tag_list"></div>
                                        <ul class="kg_uc_module02_tag_list_ct">
                                            <li class="cur"><a href="#" title="编辑歌单"><span>编辑歌单</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="kg_uc_module02_bd">
                                        <form id="infForm" action="/home/special/store" method="post" enctype="multipart/form-data">
                                            <table class="kg_uc_gen_tb" width="100%">
                                                <tr>
                                                    <td align="right" valign="top"><label for="nickname" class="kg_uc_gen_tb_tl">歌单名称：</label></td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_nickname">
                                                            <div class="kg_uc_textbox"><input id="nickname" name="gdname" type="text"   class="kg_uc_textbox_ipt" maxlength="20"  /></div>
                                                            <div class="kg_uc_tips"><i class="kg_uc_tips_icon"></i><span class="kg_uc_tips_txt"></span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top"><label for="nickname" class="kg_uc_gen_tb_tl">标题：</label></td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_nickname">
                                                            <div class="kg_uc_textbox"><input id="nickname" name="title" type="text"   class="kg_uc_textbox_ipt"   /></div>
                                                            <div class="kg_uc_tips"><i class="kg_uc_tips_icon"></i><span class="kg_uc_tips_txt"></span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top"><label for="nickname" class="kg_uc_gen_tb_tl">风格：</label></td>
                                                    <td>
                                                        <input type="radio" name="styles"  checked value="0"/>电子　
                                                        <input type="radio" name="styles"   value="1" />流行
                                                        <input type="radio" name="styles"   value="2" />古典
                                                        <input type="radio" name="styles"   value="3" />华语
                                                        <input type="radio" name="styles"   value="4" />轻音乐
                                                        <input type="radio" name="styles"   value="5" />影视
                                                        <input type="radio" name="styles"   value="6" />摇滚
                                                        <input type="radio" name="styles"   value="7" />治愈
                                                        
                                                    </td>
                                                </tr>                             
                                                <tr>
                                                    <td align="right" valign="top"><label for="intro" class="kg_uc_gen_tb_tl">简介：</label></td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_nickname">
                                                            <div>
                                                                <textarea name="jianjie" id="intro" cols="30" rows="10" class="kg_uc_textarea kg_uc_textarea_intro" maxlength="300"></textarea>
                                                            </div>
                                                            <div class="kg_uc_tips"><i class="kg_uc_tips_icon"></i><span class="kg_uc_tips_txt"></span></div>
                                                        </div>
                                                    </td>
                                                </tr>                 
                                                <tr>
                                                    <td align="right" valign="top"><label for="nickname" class="kg_uc_gen_tb_tl">图片：</label></td>
                                                    <td>
                                                        <div class="">
                                                            <div class=""><input type="file" name="photo"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                {{csrf_field()}}
                                                <input type="hidden" name="hidden" value="{{$str}}">
                                                <tr>
                                                    <td></td>
                                                    <td><input type="submit"  class="kg_uc_btn_style02 pc_temp_b_btn" value="保存上传" /></td>
                                                </tr>
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
                <!-- 左侧栏 -->
                    <!-- 头像区域 -->
                    <div class="kg_uc_avatar_area">
                        <div class="kg_uc_avatar_cover"><img id="UserImage" width="165" height="165" src="{{$res->photo}}" alt="枉叹之"></div>
                        <div class="kg_uc_avatar_txt">
                            <p align="center"><a href="/home/person" id="myucname" class="kg_uc_avatar_name">{{$res->uname}}</a>
                            </p>
                            <p align="center">(账号: {{$res->username}})</p>
                        </div>
                        <div class="kg_uc_avatar_vipinfo" id="user_vipinfo">
                            
                        </div>
                    </div>
                    <!--/头像区域 -->
                <!--/左侧栏 -->
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!--/body -->
@stop

@section('js')
    <script>
    	$('.mws-form-message').delay(3000).fadeOut(2000);
    </script>
@stop
