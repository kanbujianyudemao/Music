@extends('layout.home')
<script type="text/javascript">
var userinfo={"finish_percent":55,"servertime":"2018-10-12 17:20:02","last_login_time":"","risk":1,"city":"\u4f0a\u6625\u5e02","memo":"","security_email":"","birthday":"","vip_type":0,"question_id":255,"signature":"","vip_begin_time":"","tags":"","login_email":"","login_mobile":"","score":0,"province":"\u9ed1\u9f99\u6c5f","truename":"","vip_clearday":"","y_type":0,"sex":1,"vip_end_time":"","m_end_time":"","m_begin_time":"","m_clearday":"","pic":"http:\/\/imge.kugou.com\/kugouicon\/165\/20100101\/20100101192931478054.jpg","m_type":0,"exp":0,"nickname":"\u6789\u53f9\u4e4b","username":"kgopen1349805978","userid":1349805978,"reg_time":"2018-10-12 16:10:39","province":"\u9ed1\u9f99\u6c5f","city":"\u4f0a\u6625\u5e02","UM_LastUpdateTime":"","UM_UserID":1349805978,"UM_Photo":"http:\/\/imge.kugou.com\/kugouicon\/165\/20100101\/20100101192931478054.jpg","UM_UserName":"kgopen1349805978","UM_NewNickName":"\u6789\u53f9\u4e4b","UM_Sex":1,"UM_NewVIPTime":"","UM_Birthday":"","UM_Sign":"","UM_Memo":"","UM_NewVIPType":0,"UM_NewVIPTypeDes":"","UM_NewVipStartTime":"","UM_NewVipClearDay":"","UM_SecurityEmail":"","UM_LoginEmail":"","my_verify_email":"","UM_Question":255,"UM_Mobile":"","mobile":"","UM_UserMark":0,"IsVip":0};
cities = new Object();
cities['']=new Array('请选择');
cities['北京市']=new Array("北京市");
cities['天津市'] = new Array( "天津市");
cities['河北省'] = new Array( "石家庄市", "唐山市", "秦皇岛市", "邯郸市", "邢台市", "保定市", "张家口市", "承德市", "沧州市", "廊坊市", "衡水市");
cities['山西省'] = new Array( "太原市", "大同市", "阳泉市", "长治市", "晋城市", "朔州市", "晋中市", "运城市", "忻州市", "临汾市", "吕梁市");
cities['内蒙古'] = new Array( "呼和浩特市", "包头市", "乌海市", "赤峰市", "通辽市", "鄂尔多斯市", "呼伦贝尔市", "巴彦淖尔市", "乌兰察布市", "锡林郭勒盟", "阿拉善盟", "兴安盟");
cities['辽宁省'] = new Array( "沈阳市", "大连市", "鞍山市", "抚顺市", "本溪市", "丹东市", "锦州市", "营口市", "阜新市", "辽阳市", "盘锦市", "铁岭市", "朝阳市", "葫芦岛市");
cities['吉林省'] = new Array( "长春市", "吉林市", "四平市", "辽源市", "通化市", "白山市", "松原市", "白城市", "延边朝鲜族自治州");
cities['黑龙江'] = new Array( "哈尔滨市", "齐齐哈尔市", "鸡西市", "鹤岗市", "双鸭山市", "大庆市", "伊春市", "佳木斯市", "七台河市", "牡丹江市", "黑河市", "绥化市", "大兴安岭地区");
cities['上海市'] = new Array( "上海市");
cities['江苏省'] = new Array( "南京市", "无锡市", "徐州市", "常州市", "苏州市", "南通市", "连云港市", "淮安市", "盐城市", "扬州市", "镇江市", "泰州市", "宿迁市");
cities['浙江省'] = new Array( "杭州市", "宁波市", "温州市", "嘉兴市", "湖州市", "绍兴市", "金华市", "衢州市", "舟山市", "台州市", "丽水市");
cities['安徽省'] = new Array( "合肥市", "芜湖市", "蚌埠市", "淮南市", "马鞍山市", "淮北市", "铜陵市", "安庆市", "黄山市", "滁州市", "阜阳市", "宿州市", "巢湖市", "六安市", "亳州市", "池州市", "宣城市");
cities['福建省'] = new Array( "福州市", "厦门市", "莆田市", "三明市", "泉州市", "漳州市", "南平市", "龙岩市", "宁德市");
cities['江西省'] = new Array( "南昌市", "景德镇市", "萍乡市", "九江市", "新余市", "鹰潭市", "赣州市", "吉安市", "宜春市", "抚州市", "上饶市");
cities['山东省'] = new Array( "济南市", "青岛市", "淄博市", "枣庄市", "东营市", "烟台市", "潍坊市", "济宁市", "泰安市", "威海市", "日照市", "莱芜市", "临沂市", "德州市", "聊城市", "滨州市", "菏泽市");
cities['河南省'] = new Array( "郑州市", "开封市", "洛阳市", "平顶山市", "安阳市", "鹤壁市", "新乡市", "焦作市", "濮阳市", "许昌市", "漯河市", "三门峡市", "南阳市", "商丘市", "信阳市", "周口市", "驻马店市");
cities['湖北省'] = new Array( "武汉市", "黄石市", "十堰市", "宜昌市", "襄樊市", "鄂州市", "荆门市", "孝感市", "荆州市", "黄冈市", "咸宁市", "随州市", "恩施土家族苗族自治州","省直辖行政单位");
cities['湖南省'] = new Array( "长沙市", "株洲市", "湘潭市", "衡阳市", "邵阳市", "岳阳市", "常德市", "张家界市", "益阳市", "郴州市", "永州市", "怀化市", "娄底市", "湘西土家族苗族自治州");
cities['广东省'] = new Array( "广州市", "韶关市", "深圳市", "珠海市", "汕头市", "佛山市", "江门市", "湛江市", "茂名市", "肇庆市", "惠州市", "梅州市", "汕尾市", "河源市", "阳江市", "清远市", "东莞市", "中山市", "潮州市", "揭阳市", "云浮市");
cities['广西省'] = new Array( "南宁市", "柳州市", "桂林市", "梧州市", "北海市", "防城港市", "钦州市", "贵港市", "玉林市", "百色市", "贺州市", "河池市", "来宾市", "崇左市");
cities['海南省'] = new Array( "海口市", "三亚市", "三沙市");
cities['重庆市'] = new Array( "重庆市");
cities['四川省'] = new Array( "成都市", "自贡市", "攀枝花市", "泸州市", "德阳市", "绵阳市", "广元市", "遂宁市", "内江市", "乐山市", "南充市", "眉山市", "宜宾市", "广安市", "达州市", "雅安市", "巴中市", "资阳市", "阿坝藏族羌族自治州", "甘孜藏族自治州", "凉山彝族自治州");
cities['贵州省'] = new Array( "贵阳市", "六盘水市", "遵义市", "安顺市", "铜仁地区","毕节地区", "黔南布依苗族自治州","黔东南苗族侗族自治州");
cities['云南省'] = new Array( "昆明市", "曲靖市", "玉溪市", "保山市", "昭通市", "丽江市", "思茅市", "临沧市", "楚雄自治州", "红河哈尼族彝族自治州", "文山壮族苗族自治州", "西双版纳傣族自治州", "大理白族自治州", "德宏傣族景颇族自治州", "怒江傈僳族自治州", "迪庆藏族自治州");
cities['西藏'] = new Array( "拉萨市", "昌都地区", "山南地区", "日喀则地区", "那曲地区", "阿里地区", "林芝地区");
cities['陕西省'] = new Array( "西安市", "铜川市", "宝鸡市", "咸阳市", "渭南市", "延安市", "汉中市", "榆林市", "安康市", "商洛市");
cities['甘肃省'] = new Array( "兰州市", "嘉峪关市", "金昌市", "白银市", "天水市", "武威市", "张掖市", "平凉市", "酒泉市", "庆阳市", "定西市", "陇南地区", "临夏回族自治州", "甘南藏族自治州");
cities['青海省'] = new Array( "西宁市", "海东地区", "海北藏族自治州", "黄南藏族自治州", "海南藏族自治州", "果洛藏族自治州", "玉树藏族自治州", "海西蒙古族藏族自治州");
cities['宁夏'] = new Array( "银川市", "石嘴山市", "吴忠市", "固原市", "中卫市");
cities['新疆'] = new Array( "乌鲁木齐市", "克拉玛依市", "吐鲁番地区", "哈密地区", "昌吉回族治州", "博尔塔拉蒙古自治州","巴音郭楞蒙古自治州", "阿克苏地区", "喀什地区", "和田地区", "伊犁哈萨克自治州", "塔城地区", "阿勒泰地区","省直辖行政单位");
cities['香港'] = new Array( "香港");
cities['澳门'] = new Array( "澳门");
cities['台湾省'] = new Array( "台北", "台东","澎湖","花莲","屏东", "高雄", "基隆市", "嘉义", "台南", "云林", "南投", "彰化","台中","苗栗","桃园","宜兰","新竹");
var pv, cv;
var i, ii;
var city = document.getElementById('sel_City');
function set_son_name(father_name, son_name){  
  pv=father_name.value;
  cv=son_name.value;
  son_name.length=0;
  if(pv=='0') return;
  if(typeof(cities[pv])=='undefined') return;
  for(i=0; i<cities[pv].length; i++)
  {     ii = i;
     son_name.options[ii] = new Option();
     son_name.options[ii].text = cities[pv][i];
     son_name.options[ii].value = cities[pv][i];
    //  for (var i = 0; i < cities["{{$rs['0']->province}}"].length; i++){  
    //     if (city.options[ii].value == "{{$rs['0']->city}}"){  
    //         // city.options[ii].selected = true;  
    //         break;  
    //     }  
    // }
  }
}   
</script>
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
@endif 
@if(session('success'))
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
<!-- body -->
    <div class="kg_uc_bodyArea">
        <div class="wing_area_outset">
            <div class="wing_area">
                <div class="wing_main">
                    <div class="wing_main_content">
                    <!-- 主体 -->
                        <div class="kg_uc_module01">
                            <div class="kg_uc_module01_hd">
                                <h4 class="h_tl">我的酷狗</h4>
                                <div class="h_l"><span class="kg_uc_module01_notice">Personal information</span></div>
                            </div>
                            <div class="kg_uc_module01_bd">
                                <!-- tab 区域 -->
                                <div class="kg_uc_module02">
                                    <div class="kg_uc_module02_hd">
                                        <div class="kg_uc_module02_tag_list"></div>
                                        <ul class="kg_uc_module02_tag_list_ct">
                                            <li><a href="/home/person" title="修改头像"><span>修改头像</span></a></li>
                                            <li class="cur"><a href="#" title="编辑资料"><span>编辑资料</span></a></li>
                                            <li><a href="/home/person/pass" title="修改密码"><span>修改密码</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="kg_uc_module02_bd">
                                        <form id="infForm" action="/home/person/editperson" method="post">
                                        	{{csrf_field()}}
                                            <table class="kg_uc_gen_tb" width="100%">
                                                <tr>
                                                    <td width="120" align="right" valign="top"><label class="kg_uc_gen_tb_tl">帐号：</label></td>
                                                    <td>
                                                         {{$rs['0']->username}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top"><label for="nickname" class="kg_uc_gen_tb_tl">昵称：</label></td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_nickname">
                                                            <div class="kg_uc_textbox">
                                                            	<input id="nickname" name="uname" type="text"   class="kg_uc_textbox_ipt" value="{{$rs['0']->uname}}" maxlength="20"  />
                                                            </div>
                                                            <div class="kg_uc_tips">
                                                            	<i class="kg_uc_tips_icon"></i>
                                                            	<span class="kg_uc_tips_txt">
                                                            		
                                                            	</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top"><label for="nickname" class="kg_uc_gen_tb_tl">性别：</label></td>
                                                    <td>
                                                        <input type="radio" name="sex"  checked value="1"/> 男　
                                                        <input type="radio" name="sex"   value="0" /> 女
                                                    </td>
                                                </tr>       
                                                <tr>
                                                    <td align="right" valign="top"><label for="city" class="kg_uc_gen_tb_tl">地区：</label></td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_nickname">
                                                            <div class="kg_uc_textbox_fixed">
                                                         
                                                                <select name="province" id="sel_Province" onchange="set_son_name(this, document.getElementById('sel_City'));"> 
                                                                    <option @if($rs['0']->province=='') selected @endif value="" >请选择</option>
                                                                    <option @if($rs['0']->province=='北京市') selected @endif value="北京市">北京市</option>
                                                                    <option @if($rs['0']->province=='天津市') selected @endif value="天津市">天津市</option>
                                                                    <option @if($rs['0']->province=='河北省') selected @endif value="河北省">河北省</option>
                                                                    <option @if($rs['0']->province=='山西省') selected @endif value="山西省">山西省</option>
                                                                    <option @if($rs['0']->province=='内蒙古') selected @endif value="内蒙古">内蒙古</option>
                                                                    <option @if($rs['0']->province=='辽宁省') selected @endif value="辽宁省">辽宁省</option>
                                                                    <option @if($rs['0']->province=='吉林省') selected @endif value="吉林省">吉林省</option>
                                                                    <option @if($rs['0']->province=='黑龙江') selected @endif value="黑龙江">黑龙江</option>
                                                                    <option @if($rs['0']->province=='上海市') selected @endif value="上海市">上海市</option>
                                                                    <option @if($rs['0']->province=='江苏省') selected @endif value="江苏省">江苏省</option>
                                                                    <option @if($rs['0']->province=='浙江省') selected @endif value="浙江省">浙江省</option>
                                                                    <option @if($rs['0']->province=='安徽省') selected @endif value="安徽省">安徽省</option>
                                                                    <option @if($rs['0']->province=='福建省') selected @endif value="福建省">福建省</option>
                                                                    <option @if($rs['0']->province=='江西省') selected @endif value="江西省">江西省</option>
                                                                    <option @if($rs['0']->province=='山东省') selected @endif value="山东省">山东省</option>
                                                                    <option @if($rs['0']->province=='河南省') selected @endif value="河南省">河南省</option>
                                                                    <option @if($rs['0']->province=='湖北省') selected @endif value="湖北省">湖北省</option>
                                                                    <option @if($rs['0']->province=='湖南省') selected @endif value="湖南省">湖南省</option>
                                                                    <option @if($rs['0']->province=='广东省') selected @endif value="广东省">广东省</option>
                                                                    <option @if($rs['0']->province=='广西省') selected @endif value="广西省">广西省</option>
                                                                    <option @if($rs['0']->province=='海南省') selected @endif value="海南省">海南省</option>
                                                                    <option @if($rs['0']->province=='重庆市') selected @endif value="重庆市">重庆市</option>
                                                                    <option @if($rs['0']->province=='四川省') selected @endif value="四川省">四川省</option>
                                                                    <option @if($rs['0']->province=='贵州省') selected @endif value="贵州省">贵州省</option>
                                                                    <option @if($rs['0']->province=='云南省') selected @endif value="云南省">云南省</option>
                                                                    <option @if($rs['0']->province=='西  藏') selected @endif value="西  藏">西藏</option>
                                                                    <option @if($rs['0']->province=='陕西省') selected @endif value="陕西省">陕西省</option>
                                                                    <option @if($rs['0']->province=='甘肃省') selected @endif value="甘肃省">甘肃省</option>
                                                                    <option @if($rs['0']->province=='青海省') selected @endif value="青海省">青海省</option>
                                                                    <option @if($rs['0']->province=='宁  夏') selected @endif value="宁  夏">宁夏</option>
                                                                    <option @if($rs['0']->province=='新  疆') selected @endif value="新  疆">新疆</option>
                                                                    <option @if($rs['0']->province=='香  港') selected @endif value="香  港">香港</option>
                                                                    <option @if($rs['0']->province=='澳  门') selected @endif value="澳  门">澳门</option>
                                                                    <option @if($rs['0']->province=='台湾省') selected @endif value="台湾省">台湾省</option>
                                                                </select>
                                                                <select  name="city" id="sel_City" >
                                                                    <option value="" selected>请选择</option>
                                                                </select>
                                                                <script type="text/javascript">
                                                                    document.getElementById("sel_Province").value= "{{$rs['0']->province}}";
                                                                    set_son_name(document.getElementById("sel_Province"),document.getElementById("sel_City"));
                                                                    document.getElementById("sel_City").value = "{{$rs['0']->city}}";
                                        					   </script>
                                                            </div>
                                                            <div class="kg_uc_tips"><i class="kg_uc_tips_icon"></i><span class="kg_uc_tips_txt"></span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" valign="top"><label for="intro" class="kg_uc_gen_tb_tl">个性签名：</label></td>
                                                    <td>
                                                        <div class="kg_uc_textbox_area kg_uc_textbox_nickname">
                                                            <div>
                                                                <textarea name="sign" id="intro" cols="30" rows="10" class="kg_uc_textarea kg_uc_textarea_intro" maxlength="160">{{$rs['0']->sign}}</textarea>
                                                            </div>
                                                            <div class="kg_uc_tips"><i class="kg_uc_tips_icon"></i><span class="kg_uc_tips_txt"></span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><input type="submit" id="button" class="kg_uc_btn_style02 pc_temp_b_btn" value="保存修改" /></td>
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
                        <div class="kg_uc_avatar_cover"><img id="UserImage" width="165" height="165" src="{{$rs['0']->photo}}" alt="{{$rs['0']->uname}}">
                        </div>
                        <div class="kg_uc_avatar_txt">
                            <p align="center"><a href="http://www.kugou.com/newuc/user/uc/" id="myucname" class="kg_uc_avatar_name">{{$rs['0']->uname}}</a>
                                                    </p>
                            <p align="center">(帐号:{{$rs['0']->username}})</p>
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
    <script type="text/javascript">
          // alert($);
        setTimeout(function(){
            $('.mws-form-message').slideUp(2000);
        },3000)
    </script>

@stop