@extends('layout.home')

@section('title')

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

<div class="kg_uc_bodyArea">
    <div class="wing_area_outset">
        <div class="wing_area">
            <div class="wing_main">
                <div class="wing_main_content">
                    <!-- 主体 -->
                    <div class="kg_uc_module01">
                        <div class="kg_uc_module01_hd">
                            <h4 class="h_tl">我的酷狗</h4>
                            <div class="h_l">
                                <span class="kg_uc_module01_notice">Personal information</span></div>
                        </div>
                        <div class="kg_uc_module01_bd">
                            <!-- tab 区域 -->
                            <div class="kg_uc_module02 kg_uc_module02_v1">
                                <div class="kg_uc_module02_hd">
                                    <div class="kg_uc_module02_tag_list"></div>
                                    <ul class="kg_uc_module02_tag_list_ct">
                                        <li class="cur">
                                            <a href="#" title="修改头像">
                                                <span>修改头像</span></a>
                                        </li>
                                        <li>
                                            <a href="/home/person/edit" title="编辑资料">
                                                <span>编辑资料</span></a>
                                        </li>
                                        <li>
                                            <a href="/home/person/pass" title="修改密码">
                                                <span>修改密码</span></a>
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
                                	<form action="/home/person/updatepro" method="post" id="art_form" enctype="multipart/form-data">
                                    <div class="bottom10 clearfix">
                                        <span class="kg_uc_tri_tabList_txt_fix f14 gray">设置一个您喜爱的头像：</span>
                                        <!--<ul class="kg_uc_tri_tabList" id="avataruploadTabList">
                                        <li class="cur"><a href="#">本地上传</a></li>
                                        <li><a href="http://www.kugou.com/newuc/user/uc/type=recommend">酷狗推荐</a></li></ul>-->
                                    </div>
                                    <div class="bottom20"><p class="gray9">(请选择图片文件，最佳尺寸165 x 165，支持JPG，JPEG，GIF，PNG)</p></div>
                                    <img id="img1" src="{{$rs['0']->photo}}" style="width: 100px;height: 100px;">
                                   	{{csrf_field()}}
                                    <div id="avatarupload_cnt" style="height: 120px;">
                                        <!-- 本地上传 -->
                                        <div id="uploader"  style="height: 120px;">
                                        	<input id="file_upload" type="file" name="photo">
                                        	<!-- <input type="text" name="aa"> -->
                                        </div>

                                        <!--/本地上传 -->
                                    </div>
                                    <div>
                                    	<input  type="submit" name="save" value="保存修改" />
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!--/tab 区域 --></div>
                    </div>
                    <!--/主体 -->
                </div>
            </div>
            <div class="wing_side">
                <!-- 左侧栏 -->
                <!-- 头像区域 -->
                <div class="kg_uc_avatar_area">
                    <div class="kg_uc_avatar_cover">
                        <img id="UserImage" width="165" height="165" src="{{$rs['0']->photo}}" alt=""></div>
                    <div class="kg_uc_avatar_txt">
                        <p align="center">
                            <a href="/home/person" id="myucname" class="kg_uc_avatar_name">{{$rs['0']->uname}}</a></p>
                        <p align="center">(帐号:{{session('username')}})</p>
                    </div>
                </div>
                <!--/头像区域 -->
                <!--/左侧栏 -->
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
@section('js')
<script>var myPic = "{{$rs['0']->photo}}";
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

<script type="text/javascript">
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    $(function () {
        $("#file_upload").change(function () {
            uploadImage();
        })
    })

    function uploadImage() {
//  判断是否有选择上传文件
        var imgPath = $("#file_upload").val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("请选择图片文件");
            return;
        }

        var formData = new FormData(document.getElementById('art_form'));
        $.ajax({
            type: "POST",
            url: "/home/person/upload",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
               
               console.log(data);
                $('#img1').attr('src',data);
                $('#art_thumb').val(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

</script>
<script type="text/javascript">
    setTimeout(function(){
        $('.mws-form-message').slideUp(2000);
    },3000)
</script>
@show

@stop