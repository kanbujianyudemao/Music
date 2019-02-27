/*
* Copyright 2012, kugou.com
* Creator: jackNEss Lau
* $Author$
* $Date$
*/

var kg_domain = kg_domain || "http://www.kugou.com/newuc/";
var ie6=!-[1,]&&!window.XMLHttpRequest;
String.prototype.getBytes = function() {
    var bytes = 0;
    for (var i = 0; i < this.length; i++) {
        if (this.charCodeAt(i) > 256) { bytes += 2; }
        else { bytes += 1; }
    }
    return bytes;
};
function getCodeImg(id) {
    document.getElementById(id).src = kg_domain + '/user/verifycode/t=' + new Date().getTime();
}


function initUcverifyemail(){

    textboxInit();
    btn = Kg.$("#button")[0], 
    oPassword = Kg.$("#oPassword")[0],
    oCode = Kg.$("#eCode")[0],
    oEmail= Kg.$("#email")[0],
    

    /* 旧密码 */
    jns.bind(oPassword,"blur",function(){
        checkOldPwd.call(this);
    });

      /* 邮箱 */
    jns.bind(oEmail,"blur",function(){
        if(oEmail.value != loginEmail || oEmail.value == "" ){
            Kg.$(".initHide").attr("style","display:table-row; visibility:visible")
            checkEmail.call(this);
        }else{
             
            Kg.$(".initHide").attr("style","display:none; visibility:hidden;")
             checkEmail.call(this); 
        }       

    });


    
    /* 验证码 */
    jns.bind(oCode,"blur",function(){
        checkVerifyCode.call(this);
    });
     
    
    function checkOldPwd(){
        var pwd = this.value;
        if(pwd.trim()==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
        else{
            this.isOk = true;
            this.KgInputTips.notice("");
        }
    }
    
 
    function checkEmail(){
        var _this = this;
        if(_this.value==''){
            _this.isOk = false;
            _this.KgInputTips.error("不能为空"); 
        }
        else if(checkMailJs(_this.value)){
              _this.isOk=true;
              _this.KgInputTips.success("");
        }
        else{
           _this.isOk=false;
           _this.KgInputTips.error("邮箱格式有误");
        }
    }
    

    function checkVerifyCode(){
        if(this.value=='' || this.value == "请输入邮件中6位数字验证码"){
            this.isOk=false;
            this.value = "请输入邮件中6位数字验证码";
            this.KgInputTips.error("不能为空"); 
        }
        else{
             this.isOk=true;
             this.KgInputTips.notice("");
        }
    }
    /*
    *Modified:2015年10月23日11:48:22 wxc
    */
    btn.onclick = function(){
        
        var OkValue= null,
            ajaxlink="",
            emalFlag=false;
            
         if(oEmail.value == loginEmail && loginEmail !=""){
             // 默认有邮箱情况
                OkValue = true;
                ajaxlink = "../do/type=19";
                emalFlag = true;
         }else{
                // 新增邮箱情况

                checkOldPwd.call(oPassword);
                checkEmail.call(oEmail);
                checkVerifyCode.call(oCode);
                OkValue = oPassword.isOk && oCode.isOk && oEmail.isOk
                ajaxlink = "../do/type=20";
                emalFlag =false
         }


            if(OkValue){
            alertTips("normal",{title:"温馨提示",innerHTML:[
                '<div>您确认使用' + oEmail.value + '为您的安全邮箱？</div>',
                '<div class="top20" style="text-align:center">',
                    '<a href="javascript:;" class="kg_uc_btn_style01" onclick="this.parentNode.parentNode.parentNode.parentNode.popupHide();postHandle()">确定</a>　',
                    '<a href="javascript:;" class="kg_uc_btn_style01" onclick="this.parentNode.parentNode.parentNode.parentNode.popupHide()">取消</a>',
                '</div>'
                ].join("")})
            }
        
            window.postHandle = function() {
                Kg.get(
                    ajaxlink,
                     {
                        "verificationCode": oCode.value.trim(),
                        "pwd": encodeURIComponent(oPassword.value),
                        "email": oEmail.value.trim()
                    },
                    function(res) {
                        if (res == "success") {
                            if(!emalFlag){
                                
                                window.location.href =kg_domain+"/user/uc/account.html";
                                
                            }else{
                                 alertTips("normal",{
                                    title:"温馨提示",
                                    innerHTML:"请前往"+oEmail.value.trim()+"查收邮件"
                                })
                            }

                        } else {
                            alertTips("mini",{
                                status:"error",
                                innerHTML:res
                            })
                        }
                    });
            } 
        
    };
/*
    *AddTime:2015年3月18日15:40:50
    *Modified:2015年3月23日11:48:22
*/
        /* 验证码 */
   oCode.onfocus = function(){
        var thisValue = this.value.trim();
        if(thisValue == "请输入邮件中6位数字验证码"){
            this.value = "";
        }
    };
    /*60秒验证码发送间隔*/
function timing(dom, startTime, emailAdd) {
    if (!dom) return;
    var $dom = typeof(dom) == "object" ? Kg.$(dom) : Kg.$("#" + dom),
    noticeSendedDom = Kg.$("#noticeSended"),
    getUrl = "http://www.kugou.com/newuc/user/do/type=19",
    emaiAddPart = emailAdd.substr(0, 4) + "***@" + emailAdd.split("@")[1]; //截取邮箱地址
    startTime = startTime || 60;
    noticeSendedDom.html("已发送验证码到您的安全邮箱<span class='blue_color'>"+ emaiAddPart +"</span>")
    noticeSendedDom.show().css("visibility","visible")
    /*如果已经设置安全邮箱但没验证（针对之前一批老用户）*/
    if(!defEmail){
        getUrl = getUrl+ "?email="+ emailAdd;
    }
    Kg.get(
        getUrl,
        {
            t:new Date().getTime()
        },
        function (res) {
            if(/success/g.test(res)){

                noticeSendedDom.css({
                    "visibility": "visible"
                });

                $dom.addClass("disabled");

                var t = setInterval(function() {
                    startTime -= 1;
                    $dom.html("重新发送(" + startTime + "s)");
                    if (startTime <= 0) {
                        $dom.removeClass("disabled");
                        $dom.html("发送验证码");
                        clearInterval(t);
                    }
                }, 1000);

            }else{
                 if(res == "您已经绑定过安全邮箱"){
                    window.location.href = "http://www.kugou.com/newuc/user/uc/type=account";
                }else{
                    alertTips("mini",{
                        status:"error",
                        innerHTML:res
                    })
                }
                
                return;
            }
           
        }
    )
}
Kg.$("#sendVerfCode").addEvent("click",function(){
        if(/disabled/g.test(this.className))return;
        var _this  = this,
        emailAddress = defEmail || Kg.$("#email").val();
        if(!emailAddress || emailAddress == "")return;
        timing.call(_this,_this,60,emailAddress);
})
 }
 /**
 *  这里的接口全部走内嵌页版本  具体原因 问后端
 * */
function initUcverifyMobile(){
    textboxInit();
    btn = Kg.$("#button")[0], 
    oPassword = Kg.$("#oPassword")[0],
    oCode = Kg.$("#eCode")[0],
    oMobile= Kg.$("#mobile")[0],
    

    /* 旧密码 */
    jns.bind(oPassword,"blur",function(){
        checkOldPwd.call(this);
    });

      /* 邮箱 */
    jns.bind(oMobile,"blur",function(){
        checkMobile.call(this);
    });


    
    /* 验证码 */
    jns.bind(oCode,"blur",function(){
        checkVerifyCode.call(this);
    });
     
    
    function checkOldPwd(){
        var pwd = this.value;
        if(pwd.trim()==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
        else{
            this.isOk = true;
            this.KgInputTips.notice("");
        }
    }
    
 
    function checkMobile(){
        var _this = this;
        if(_this.value==''){
            _this.isOk = false;
            _this.KgInputTips.error("不能为空"); 
        }else if (checkMobileJs(_this.value)) {
            _this.isOk = true;
            _this.KgInputTips.success("");
        }else{
           _this.isOk=false;
           _this.KgInputTips.error("手机号码格式有误");
        }
    }
    

    function checkVerifyCode(num){
        num = num || 6;
        if(this.value==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        } else if(isNaN(this.value.trim())){
            this.isOk=false;
            this.KgInputTips.error("验证码错误"); 
        } else{
             this.isOk=true;
             this.KgInputTips.notice("");
        }
    }
    btn.onclick = function(){
        checkOldPwd.call(oPassword);
        checkMobile.call(oMobile);
       
        checkVerifyCode.call(oCode);
        if(oPassword.isOk&&oCode.isOk&&oMobile.isOk){
            alertTips("normal",{title:"温馨提示",innerHTML:[
                '<div>您确认使用' + oMobile.value + '为您的安全手机？</div>',
                '<div class="top20" style="text-align:center">',
                    '<a href="javascript:;" class="kg_uc_btn_style01" onclick="this.parentNode.parentNode.parentNode.parentNode.popupHide();postHandle()">确定</a>　',
                    '<a href="javascript:;" class="kg_uc_btn_style01" onclick="this.parentNode.parentNode.parentNode.parentNode.popupHide()">取消</a>',
                '</div>'
            ].join("")})
        }
        
        window.postHandle = function(){
            
            Kg.postJSON("http://www.kugou.com/mzone/user_center/ajax/checkmsg",{"doit":0,"pwd":encodeURIComponent(oPassword.value),"tel":oMobile.value,"msg":oCode.value,"info":infoID},function(res){
                
                if(res.status == 1){
                    if(res.isbind == 1){
                        alertTips("normal",{
                            themeClass:"bindPhone",
                            title:"温馨提示",
                            overflow:false,
                            innerHTML:
                                '<div class="bind_sucess">'+
                                '<div class="tips"><p>您的手机<span class="phone">'+ oMobile.value+'</span>已经与如下帐号绑定</p><p>确定绑定后原有的绑定关系将被解除</p></div>'+
                                '<div class="sucess_infor"><p>酷狗ID：<span>'+res["banduserid"]+'</span></p><p>帐&nbsp;&nbsp;&nbsp;&nbsp;号：<span>'+res["bandusername"]+'</span></p></div>'+
                                '<div class="confirm_bind"><a href="javascript:;" hidefocus="true" class="pc_temp_b_btn03" id="lgn_btn" tabindex="5"><span>确定</span></a></div>'+
                                '</div>',
                            callback:function(){

                            },
                            onload:function(){
                                
                            var lgn_btn = document.getElementById("lgn_btn");
                            
                            lgn_btn.onclick=function(){
                                var me = this;
                                    me.isTimeout = false;
                                    me.checkTimeoutKey = setTimeout(function(){
                                        if(!ie6){
                                            alertTips("mini", {
                                                status: "errors",
                                                innerHTML: "服务器繁忙，稍后重试"
                                            })
                                        }else{
                                            alert("服务器繁忙，稍后重试")
                                        }
                                        me.isTimeout = true;
                                    },5000);
                                    // 确认提交 add isconfirm == 1
                                    Kg.postJSON("http://www.kugou.com/mzone/user_center/ajax/checkmsg", {"doit": 0,isconfirm:1,"pwd": encodeURIComponent(oPassword.value), "tel": oMobile.value, "msg": oCode.value,"info":infoID}, function (res) {
                                            if (me.isTimeout) {
                                                return
                                            }
                                            clearTimeout(me.checkTimeoutKey);
                                          if (res.status == 1) {
                                             if(!ie6){
                                                alertTips("mini", {
                                                    status: "success",
                                                    innerHTML: res.msg
                                                })
                                             } 
                                            setTimeout(function() {
                                                location.replace("../uc/type=account&t=" + new Date().getTime());
                                            }, 1000);
                                          }else if(res.status == 0){
                                               if(!ie6){
                                                    alertTips("mini", {
                                                        status: "errors",
                                                        innerHTML: res.msg
                                                    })
                                                }else{
                                                    alert(res.msg)
                                                }
                                          }
                                    })
                                    return false;
                            }
                            }
                        })
                    }else{
                        location.replace("../uc/type=account&t=" + new Date().getTime());
                    }
                }else{
                    switch(res.status){
                        /* 验证码错误 */
                        case "0":
                            oCode.KgInputTips.error("验证码错误");
      
                            break;

                        /* 验证码过期 */
                        case "-1":
                            oCode.value = "";
                            oCode.KgInputTips.error("验证码过期,请重新输入");
      
                            break;

                        /* 请输入验证码 */
                        case "-2":
                            oCode.KgInputTips.error("请输入验证码");
                     
                            break;

                        default:
                            alertTips("mini",{status:"error",innerHTML:res.msg});
                   
                            break;
                    }
                }
            });
        }
    };
 }



function initUcpwd(){
    textboxInit();
    var btn = Kg.$("#button")[0], 
    oPassword = Kg.$("#oPassword")[0],
    nPasswordStrong = Kg.$("#ePasswordStrong")[0],
    newPassword =  Kg.$("#newPassword")[0],
    choosePswBtn = document.getElementById('choosePswBtn'),	
    newPasswordPwd = document.getElementById('newPasswordPwd'),
    repasswordPwd = document.getElementById('repasswordPwd'),
    oPasswordPwd = document.getElementById('oPasswordPwd'),
    rePassword = Kg.$("#repassword")[0],
    ucCode = Kg.$("#uccode")[0],
    nickname = Kg.$("#nickname")[0];
    
    /* 昵称 */
    jns.bind(nickname,"blur",function(){
        checkNickname.call(this);
    });
    
    /* 旧密码 */
    jns.bind(oPassword,"blur",function(){
        checkOldPwd.call(this);
    });
    
    /* 旧密码密码类型 */
   jns.bind(oPasswordPwd,"blur",function(){
        checkOldPwd.call(this);
    });

     /* 新密码 */
    jns.bind(newPassword,"blur",function(){
        checkPwd.call(this);
    });
     /* 新密码密码类型 */
    jns.bind(newPasswordPwd,"blur",function(){
        checkPwd.call(this);
    });
    /* 确认密码 */
    jns.bind(rePassword,"blur",function(){
        checkRePwd.call(this);
    });
     /* 确认密码密码类型 */
    jns.bind(repasswordPwd,"blur",function(){
        checkRePwd.call(this);
    })
    /* 验证码 */
    jns.bind(ucCode,"blur",function(){
        checkVerifyCode.call(this);
    });
    
    
    function checkOldPwd(){
        var pwd = this.value;
        if(pwd.trim()==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
        else{
            this.isOk=true;
            this.KgInputTips.notice("");
        }
    }

    function checkPwd(){
        var pwd=this.value,
        _this = this;
        if(pwd.trim()==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
        else if(pwd.length<6||pwd.length>16){
            this.isOk=false;
            this.KgInputTips.error("请输入6-16位的数字、字母或符号。");
        }
        /*--
        else if(pwd.indexOf('&')!=-1||pwd.indexOf('&')!=-1){
            this.isOk=false;
            this.KgInputTips.error("密码请用数字和字母组合");
        }
        --*/
        else{
            this.isOk=true;
            this.KgInputTips.success("");
        }
        
        if(this.id=="newPassword" || this.id=="newPasswordPwd" ){
            var lv = 0;
            if (pwd.match(/[a-z]/ig)) { lv++; }
            if (pwd.match(/[0-9]/ig)) { lv++; }
            if (pwd.match(/(.[^a-z0-9])/ig)) { lv++; }
            passwordStrong(nPasswordStrong,lv);
    /*
        #接口检查密码难易程度
        #2015年5月11日11:08:35添加
    */
            _this.isOk = false;
            _this.checkPwTem = setTimeout(function () {
                    _this.isOk = true;
            }, 1000);
            Kg.loadScript(
                "http://userinfo.user.kugou.com/check_str",
                {
                    str:pwd,
                    appid:1014,
                    callback:"checkPwWithPort",
                    t : Math.random()
                }
            );
            window.checkPwWithPort = function(json){
		        if (!_this.isOk && json.status && json.data) {
		            clearTimeout(_this.checkPwTem);
		            _this.KgInputTips.error("密码过于简单，请重新设置！");
		        }else{
		            _this.isOk=true;
		        }
             }
            if(rePassword.isOk){
                checkPwd.call(rePassword);
            }
        }
    }
     
    function checkRePwd(){
        var repwdefaultWord=newPassword.value
        var pwd=this.value;
        if(pwd==''){
             this.isOk=false;
             this.KgInputTips.error("不能为空"); 
        }
        else if(pwd.length<6||pwd.length>16){
            this.isOk=false;
            this.KgInputTips.error("请输入6-16位的数字、字母或符号。");
        }
        else if(pwd!=repwdefaultWord){
            this.isOk=false;
            this.KgInputTips.error("两次密码不一致");
        }
        else{
             this.isOk=true;
             this.KgInputTips.success("");
        }
    
    
    }

    function checkVerifyCode(){
        if(this.value==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
        else{
             this.isOk=true;
             this.KgInputTips.notice("");
        }
    }
    
    var iptArr = Kg.$('.kg_uc_same_ipt'),
    	iptSameArr = Kg.$('.kg_uc_samebox_ipt'),
    	iptSame2Arr = Kg.$('.kg_uc_samebox_ipt2');
    
    function equalVal(obj){
    	var _obj = obj || {},id = null;
    	if (!obj.dom){
    		return;
    	}
    	id = obj.dom;
    	switch (id) {
    		case 'newPassword' : 
    			newPasswordPwd.value = newPassword.value;
    			break;
    		case 'newPasswordPwd' : 
    			newPassword.value = newPasswordPwd.value;
    			break;
    		case 'repassword' : 
    			repasswordPwd.value = rePassword.value;
    			break;
    		case 'repasswordPwd' : 
    			rePassword.value = repasswordPwd.value;
    			break;
    		case 'oPassword' : 
    			oPasswordPwd.value = oPassword.value;
    			break;
    		case 'oPasswordPwd' : 
    			oPassword.value = oPasswordPwd.value;
    			break;
    	}
    }
	
	iptArr.addEvent('input',function(){
		equalVal({
			dom : this.id
		})
	})
	//小于IE9
	if (!!("ActiveXObject" in window) && /msie 6.0|msie 7.0|msie 8.0/gi.test(window.navigator.appVersion)){
		iptArr.addEvent('keyup',function(){
			equalVal({
				dom : this.id
			})
		})
	}
	
	
    
    function changeBtnType(type){
    	if (type == 'close'){
			iptSameArr.hide();
			iptSame2Arr.show();
    	} else {
    		iptSameArr.show();
			iptSame2Arr.hide();
    	}
    	
    }
    
    
    if (choosePswBtn){
    	choosePswBtn.onclick = function(){
	    	if (this.className.match(/icon_password_openeye/)){
	    		this.className = 'icon_password_closeeye icon_password_eye';
	    		changeBtnType('close')
	    	} else {
	    		this.className = 'icon_password_openeye icon_password_eye';
	    		changeBtnType('open')
	    	}
	    }
    }
    
    

    var obj=document.getElementById("tr_intro");
    btn.onclick = function(){

        if(oPassword){
            checkOldPwd.call(oPassword);
            if(!oPassword.isOk){
                return false;
            }
        }
        checkPwd.call(newPassword);
        checkRePwd.call(rePassword) ;
        checkVerifyCode.call(ucCode);
        // 之前延时1秒用于接口检测合法性，为保证其有意义请求也延时1秒发送
        setTimeout(function(){
            if(newPassword.isOk&&rePassword.isOk&&ucCode.isOk){           
                if(oPassword){
            Kg.post("../do/type=3",{"old":encodeURIComponent(oPassword.value),"new":encodeURIComponent(newPassword.value),"confirm":encodeURIComponent(rePassword.value),"vCode":ucCode.value},postSuccessHandle)
                }
                else{
            Kg.post("../do/type=9",{"new":encodeURIComponent(newPassword.value),"confirm":encodeURIComponent(rePassword.value),"vCode":ucCode.value},postSuccessHandle)
                } 
            }
        }, 1001);
    };

    function postSuccessHandle(res){
        switch(res){
            /* 成功 */
            case "success":
                alertTips("mini",{status:"success",innerHTML:"密码修改成功"});
                if(oPassword){
                    oPassword.value="";
                    oPassword.KgInputTips.notice("");
                }
                newPassword.value="";
                newPassword.KgInputTips.notice("");
                
                rePassword.value="";
                rePassword.KgInputTips.notice("");

                ucCode.value="";
                ucCode.KgInputTips.notice("");
                window.location.href = 'http://www.kugou.com/';
                break;

            /* 验证码错误 */
            case "0":
                ucCode.KgInputTips.error("验证码错误");
                getCodeImg('uccheckimg');//在头部的js里
                break;

            /* 验证码过期 */
            case "-1":
                ucCode.value = "";
                ucCode.KgInputTips.error("验证码过期,请重新输入");
                getCodeImg('uccheckimg');//在头部的js里
                break;

            /* 请输入验证码 */
            case "-2":
                ucCode.KgInputTips.error("请输入验证码");
                getCodeImg('uccheckimg');//在头部的js里
                break;

            default:
                alertTips("mini",{status:"error",innerHTML:res});
                getCodeImg('uccheckimg');//在头部的js里
                break;

        }
    }
}


function checkMailJs(mail) {
    
    var filter  = /^[\w-]+[\.]*[\w-]+[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/g;
    if (filter.test(mail)) 
        return true;
    else {
        return false;
    }
}


function checkMobileJs(mobile){
    var filter  = /^\d{11}$/g;
    if (filter.test(mobile)) 
        return true;
    else {
        return false;
    }
}


function initUcquestion(){
    
    btn = Kg.$("#button")[0], 
    oPassword = Kg.$("#oPassword")[0],
    oCode = Kg.$("#code")[0],
    oQuestion= Kg.$("#question")[0],
    oAnswer= Kg.$("#answer")[0];
    textboxInit([oPassword,oAnswer,oQuestion,oCode]);
    

    /* 密码 */
    jns.bind(oPassword,"blur",function(){
        checkOldPwd.call(this);
    });


    jns.bind(oQuestion,"blur",function(){

        checkQuestion.call(this);
    });
    
    jns.bind(oAnswer,"blur",function(){
        checkAnswer.call(this);
    });


    
    /* 验证码 */
    jns.bind(oCode,"blur",function(){
        checkVerifyCode.call(this);
    });
     
    
    function checkOldPwd(){
        var pwd = this.value;
        if(pwd.trim()==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
         else{
            this.isOk = true;
            this.KgInputTips.notice("");
        }
    }
    
    function checkQuestion(){   
        var myValue = this.value;
        if(myValue == -1){
            this.isOk = false;
            this.KgInputTips.error("请选择密保问题"); 
        }
        else{
            this.isOk = true;
            this.KgInputTips.notice(""); 
        }
    }

    function checkAnswer()
    {
         var answer = this.value;
         if(answer == ''){
            this.isOk = false;
            this.KgInputTips.error("请填写密保答案"); 
         }
         else{
            this.isOk = true;
            this.KgInputTips.notice(""); 
         }
    }
     
    

    function checkVerifyCode(){
        if(this.value==''){
            this.isOk=false;
            this.KgInputTips.error("不能为空"); 
        }
        else{
             this.isOk=true;
             this.KgInputTips.notice("");
        }
    }
    btn.onclick = function(){
       
        checkOldPwd.call(oPassword);
        checkAnswer.call(oAnswer);
        checkQuestion.call(oQuestion);
        checkVerifyCode.call(oCode);

        if(oPassword.isOk && oQuestion.isOk && oAnswer.isOk && oCode.isOk){
        Kg.post("../do/type=5",{"vcode":oCode.value,"pwd":encodeURIComponent(oPassword.value),"answer":encodeURIComponent(oAnswer.value),"qid":oQuestion.value},
        function(res){
            if(res=="success"){
                alertTips("mini",{status:"success",innerHTML:"修改成功"})

                window.location.href="http://www.kugou.com/newuc/user/uc/type=account";
            }
            else{
                if(res == "您已设置过安全问题"){          
                    window.location.href="http://www.kugou.com/newuc/user/uc/type=account";
                }else{
                    switch(res){
                       /* 验证码错误 */
                        case "0":
                            oCode.KgInputTips.error("验证码错误");
                            getCodeImg('checkimg')
                            break;

                        /* 验证码过期 */
                        case "-1":
                            oCode.value = "";
                            oCode.KgInputTips.error("验证码过期,请重新输入");
                            getCodeImg('checkimg')
                            break;

                        /* 请输入验证码 */
                        case "-2":
                            oCode.KgInputTips.error("请输入验证码");
                            getCodeImg('checkimg')
                            break;

                        default:
                            alertTips("mini",{status:"error",innerHTML:res});
                            getCodeImg('checkimg')
                            break;
                    }
                }

                
            }
        });
      }
    };
 
}

/* 昵称检测 */
function checkNickname(){

    var spReg = /^[-A-Za-z0-9_\u4E00-\u9FA5]+$/;
    var myValue = this.value.replace(/^\s+|\s+$/ig, "");
    if(myValue == ''){
        this.isOk = false;
        this.KgInputTips.error("不能为空"); 
    }
    else if(myValue.getBytes() > 20){
        this.isOk = false;
        this.KgInputTips.error("请输入1到20位字符");
    }
    else if(!spReg.test(myValue)){
            this.isOk=false;
            this.KgInputTips.error("昵称只支持中文、英文、数字、以及-_两个符号");
    }
    else{
        this.isOk = true;
        this.value = myValue;
        this.KgInputTips.success("");
    }
}

/* 验证码检测 */
function checkCode(){
    var myValue = this.value;
    if(myValue == ''){
        this.isOk = false;
        this.KgInputTips.error("不能为空"); 
    }
    else{
        this.KgInputTips.notice(""); 
        this.isOk = true;
    }
}

function getCodeImg(id) {
    document.getElementById(id).src = kg_domain + 'user/verifycode/t=' + new Date().getTime();
}

/* 简介检测 */
function checkIntro(){
    var myValue = this.value;
    if(myValue.getBytes() > 60){
        this.isOk = false;
        this.KgInputTips.error("个性签名字数不要超过60个字符");
    } else{
        if(myValue.length > 0){
            this.KgInputTips.success("");
        } else{
            this.KgInputTips.notice("");
        }
        this.isOk = true;
    }
}



/* 修改绑定邮箱初始化 */
function editMailInit(){
    var sendBtn = Kg.$("#sendBtn")[0];
    var target = sendBtn,
        url = kg_domain + 'user/do/type=10',
        time = 60;

    target.defaultWord = target.value + "";
    target.daoshu = function(){
        clearTimeout(this.daoshuKey);
        this.time = time;
        this.disabled = true;
        var _this = this;

       !function(){

            _this.time--;
            _this.value =  _this.defaultWord + '( '+ _this.time +' 秒 )';
            if(_this.time <= 0){
                _this.value = _this.defaultWord;
                _this.disabled = false;
            } else {
                _this.daoshuKey = setTimeout(arguments.callee,1000);
            }
        }();
    };

    jns.bind(target,"click",function(){
        Kg.getJSON(url + '&t=' + new Date().getTime(),"",function(json){
            if(json.status == 1){
                alertTips("mini",{status:"success",innerHTML:"邮件已发送成功，请注意查收"});
                target.daoshu();
            } else {
                alertTips("mini",{status:"error",innerHTML:json.msg});
            }
        });
        
    });

}

/* 修改绑定手机初始化 */
function editMobileInit(){
    var sendBtn = Kg.$("#sendBtn")[0],
        eCode = Kg.$("#eCode")[0],
        button = Kg.$("#button")[0],
        sendBtnInit = function(target,time,url){
            target.defaultWord = target.value + "";
            target.daoshu = function(){
                clearTimeout(this.daoshuKey);
                this.time = time;
                this.disabled = true;
                var _this = this;

               !function(){

                    _this.time--;
                    _this.value =  _this.defaultWord + '( '+ _this.time +' 秒 )';
                    if(_this.time <= 0){
                        _this.value = _this.defaultWord;
                        _this.disabled = false;
                    } else {
                        _this.daoshuKey = setTimeout(arguments.callee,1000);
                    }
                }();
            };

            jns.bind(target,"click",function(){
                new Image().src = url + '&t=' + new Date().getTime();
                target.daoshu();
            });
                
        };


    textboxInit([eCode]);

    //事件绑定
    jns.bind(eCode,"blur",function(){
        checkCode.call(this);
    });

    //发送验证码按钮事件绑定
    sendBtnInit(sendBtn,60,kg_domain + 'user/do/type=12');

    button.onclick = function(){
        checkCode.call(eCode);

        if(eCode.isOk){
            Kg.post(kg_domain + "user/do/type=13&verify=" + eCode.value + "&t=" + new Date().getTime(),"",function(jsonstr){
                var json = Kg.JSON.parse(jsonstr);
                if(json.status == 1){
                    window.location.href = kg_domain + "user/uc/type=sendMsgToNewMobile";
                } else {
                    eCode.KgInputTips.error(json.msg);
                }
            });
        }
    }
}

/* 重新绑定手机页面 初始化 */
function sendMsgToNewMobileInit(){
    var sendBtn = Kg.$("#sendBtn")[0],
        mobile = Kg.$("#mobile")[0],
        eCode = Kg.$("#eCode")[0],
        button = Kg.$("#button")[0],
        checkMobile = function(){
            var _this = this;
            if(_this.value==''){
                _this.isOk = false;
                _this.KgInputTips.error("不能为空"); 
                sendBtn.disabled = true;
            }
            else if(checkMobileJs(_this.value)){
                Kg.getJSON(kg_domain + "user/do/type=16&mobile=" + _this.value + "&t=" + new Date().getTime(),"",function(json){
                    if(json.status == 1){
                        _this.isOk=true;
                        _this.KgInputTips.success("");
                        if(!sendBtn.isDaoshu){
                            sendBtn.disabled = false;
                        }
                    } else {
                        _this.isOk=false;
                        _this.KgInputTips.error(json.msg);
                        sendBtn.disabled = true;
                    }
                })
                
            }
            else{
               _this.isOk=false;
               _this.KgInputTips.error("手机号码格式有误");
               sendBtn.disabled = true;
            }
        }


    textboxInit([eCode,mobile]);

    //事件绑定
    jns.bind(mobile,"blur",function(){
        checkMobile.call(this);
    });

    jns.bind(eCode,"blur",function(){
        checkCode.call(this);
    });

    //发送验证码按钮事件绑定
    var time = 60;
    sendBtn.defaultWord = sendBtn.value + "";
    sendBtn.disabled = true;
    sendBtn.daoshu = function(){
        if(!mobile.isOk){
            checkMobile.call(mobile);
            return;
        }
        clearTimeout(this.daoshuKey);
        this.time = time;
        this.disabled = true;
        var _this = this;
        sendBtn.isDaoshu = true;
       !function(){

            _this.time--;
            _this.value =  _this.defaultWord + '( '+ _this.time +' 秒 )';
            if(_this.time <= 0){
                _this.value = _this.defaultWord;
                sendBtn.isDaoshu = false;
                if(mobile.isOk){
                    _this.disabled = false;
                }
                

            } else {
                _this.daoshuKey = setTimeout(arguments.callee,1000);
            }
        }();
    };

    jns.bind(sendBtn,"click",function(){
        new Image().src = kg_domain + 'user/do/type=14&mobile=' + mobile.value + '&t=' + new Date().getTime();
        sendBtn.daoshu();
    });

    button.onclick = function(){
        checkCode.call(eCode);
        if(!mobile.isOk){
            checkMobile.call(mobile);
        }
        if(eCode.isOk && mobile.isOk){
            Kg.post(kg_domain + 'user/do/type=18&mobile='+ mobile.value +'&code=' + eCode.value + "&t=" + new Date().getTime(),"",function(jsonstr){
                var json = Kg.JSON.parse(jsonstr);
                if(json.status == 1){
                    eCode.value="";
                    eCode.KgInputTips.notice("");

                    alertTips("mini",{
                        status:"success",
                        innerHTML:"安全手机修改成功",
                        callback:function(){
                            window.location.href = kg_domain + 'user/uc/type=account';
                        }
                    });

                } else {
                    eCode.KgInputTips.error(json.msg);
                }
            });
        }
    }
}

/* 重新绑定邮箱页面 - doupdateEmail.html */
function updateEmailInit(){
    var sendBtn = Kg.$("#sendBtn")[0],
        mail = Kg.$("#mail")[0],
        myMd5 = Kg.$("#myMd5")[0],
        myInfo = Kg.$("#myInfo")[0],
        checkMail = function(){
            var _this = this;
            if(_this.value==''){
                _this.isOk = false;
                _this.KgInputTips.error("不能为空"); 
                sendBtn.disabled = true;
            }
            else if(checkMailJs(_this.value)){
                Kg.getJSON(kg_domain + "user/do/type=17&md5="+ myMd5.value +"&info="+ myInfo.value +"&email=" + _this.value + "&t=" + new Date().getTime(),"",function(json){
                    if(json.status == 1){
                        _this.isOk=true;
                        _this.KgInputTips.success("");
                        if(!sendBtn.isDaoshu){
                            sendBtn.disabled = false;
                        }
                    } else {
                        _this.isOk=false;
                        _this.KgInputTips.error(json.msg);
                        sendBtn.disabled = true;
                    }
                })
                
            }
            else{
               _this.isOk=false;
               _this.KgInputTips.error("邮箱格式有误");
               sendBtn.disabled = true;
            }
        }


    textboxInit([mail]);

    //事件绑定
    jns.bind(mail,"blur",function(){
        checkMail.call(this);
    });


    //发送验证码按钮事件绑定
    var time = 60;
    sendBtn.defaultWord = sendBtn.value + "";
    sendBtn.disabled = true;
    sendBtn.daoshu = function(){
        if(!mail.isOk){
            checkMail.call(mail);
            return;
        }
        clearTimeout(this.daoshuKey);
        this.time = time;
        this.disabled = true;
        var _this = this;
        sendBtn.isDaoshu = true;
       !function(){

            _this.time--;
            _this.value =  _this.defaultWord + '( '+ _this.time +' 秒 )';
            if(_this.time <= 0){
                _this.value = _this.defaultWord;
                sendBtn.isDaoshu = false;
                if(mail.isOk){
                    _this.disabled = false;
                }
                

            } else {
                _this.daoshuKey = setTimeout(arguments.callee,1000);
            }
        }();
    };

    jns.bind(sendBtn,"click",function(){
         Kg.getJSON(kg_domain + 'user/do/type=11&info='+ myInfo.value +'&email='+ mail.value + '&md5=' + myMd5.value + '&t=' + new Date().getTime(),"",function(json){
            if(json.status == 1){
                alertTips("mini",{status:"success",innerHTML:"邮件已发送成功，请注意查收"});
                sendBtn.daoshu();
            } else {
                alertTips("mini",{status:"error",innerHTML:json.msg});
            }
        });
    });

    
}