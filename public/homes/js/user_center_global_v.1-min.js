/*
* Copyright 2012, kugou.com
* Creator: jackNEss Lau
* $Author$
* $Date$
*/

/* jns labrary start
-----------------------------------------*/
window.jns = window.jns || {};

/*
* add event
* exp: jns.bind(elm,"click",clickHandle)
* date: 2012-5-25
* ver 1.0
*/
jns.bind = function(target, type, func) {
    if (typeof func != "function" || !target || typeof type != "string") { return; }
    if (target.addEventListener) {
        target.addEventListener(type, _addEvent, false);

    }
    else if (target.attachEvent) {
        target.attachEvent("on" + type, _addEvent);
    }

    if (!func.jnsBindKey) { func.jnsBindKey = []; }
    func.jnsBindKey.push({ target: target, bindKey: _addEvent });

    function _addEvent(e) {
        func.call(target, e);
    }
};

/*
* remove event
* exp: jns.unbind(elm,"click",clickHandle)
* date: 2012-7-16
* ver 1.1
*/
jns.unbind = function(target, type, func) {
    if (typeof func != "function" || !target || typeof type != "string") { return; }
    var unbindKey;
    if (func.jnsBindKey) {
        for (var i = 0, len = func.jnsBindKey.length; i < len; i++) {
            var fragSource = func.jnsBindKey[i];
            if (fragSource.target == target) {
                unbindKey = fragSource.bindKey;
                func.jnsBindKey.splice(i, 1);
                break;
            }
        }
    }
    else {
        unbindKey = func;
    }
    if (target.removeEventListener && unbindKey) {

        target.removeEventListener(type, unbindKey, false);


    }
    else if (target.detachEvent) {
        target.detachEvent("on" + type, unbindKey);
    }
};
/* jns labrary end
-----------------------------------------*/	

/* 全局 文本输入框 交互效果初始化 */
function textboxInit(queryStr){
    
    queryStr = queryStr || ".kg_uc_textbox_ipt";
    
    Kg.$(queryStr).each(function(){
        var _this = arguments[1];
        if(Kg.UA.Ie6){
            Kg.addEvent(_this,"mouseover",function(){
            	try{
	                Kg.$(_this).parent().addClass("kg_uc_textbox_hover")
	            }
                catch(e){}
            });
            Kg.addEvent(_this,"mouseout",function(){
            	try{
                	Kg.$(_this).parent().removeClass("kg_uc_textbox_hover")
                }
                catch(e){}
            });
        };
        Kg.addEvent(_this,"focus",function(){
        	try{
            	Kg.$(_this).parent().addClass("kg_uc_textbox_focus");
            }
            catch(e){
            _this.KgInputTips.notice(_this.KgInputTips.defaultWord);
            }
        });
        Kg.addEvent(_this,"blur",function(){
        	try{
            	Kg.$(_this).parent().removeClass("kg_uc_textbox_focus");
            }
            catch(e){}

        });

        _this.KgInputTips = {
        	 defaultWord:(function(){
        	 	try{
	                var tipbox = _this.parentNode.parentNode.children[1];
	                return tipbox.children[1].innerHTML;
                }
                catch(e){
                	return "";
                }
            })(),
            success:function(msg){
                var tipbox = _this.parentNode.parentNode.children[1];
                tipbox.style.display = "none";
                //mtp9810 检查如果是 昵称 不提示 成功打勾
                if(_this.name!="nickname"){
                    tipbox.style.display = "block";
                }
                tipbox.className = "kg_uc_tips kg_uc_tips_success";
                tipbox.children[1].innerHTML = msg;
            },
            error:function(msg){
                var tipbox = _this.parentNode.parentNode.children[1];
                tipbox.style.display = "block";
                tipbox.className = "kg_uc_tips kg_uc_tips_error";
                tipbox.children[1].innerHTML = msg;
            },
            notice:function(msg){
                var tipbox = _this.parentNode.parentNode.children[1];
                tipbox.style.display = "block";
                tipbox.className = "kg_uc_tips";
                tipbox.children[1].innerHTML = msg;
            }
        };
        
    });
};

/* 密码健壮度
 * @param target: {Object} 组件对象
 * @param type:{Number 0|1|2|3} 0:无 1:弱 2:中 3:强
 */
function passwordStrong(target,type){
    if(!target){return}

    switch(type){
        case 0: 
            target.className = "kg_uc_psw_strong";
            break;
        case 1:
            target.className = "kg_uc_psw_strong kg_uc_psw_strong_s1";
            break;
        case 2:
            target.className = "kg_uc_psw_strong kg_uc_psw_strong_s2";
            break;
        case 3:
            target.className = "kg_uc_psw_strong kg_uc_psw_strong_s3";
            break;
    }
}
/* 检测 email格式是否正确 */
function checkMail(mail) {
    var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(mail)) 
        return true;
    else {
        return false;
    }
}

/* 通用弹出层 
 * @param type: {string:normal|mini} 弹出层类型 
 * @param op:{object} 属性设置
 * - title:{string} 弹出层标题，用于 normal弹出层
 * - innerHTML:{string} 弹出层内容
 * - callback:{function} 关闭之后回调函数
 * - onload:{function} 加载完成时回调函数
 */
function alertTips(type,op){
	var option = {
        /* 标题 */
        title:"",
        /*主题 class */
        themeClass:"",
        /* 内容 */
        innerHTML:"",
        /* 状态 error|success */
        status:"",

        /* mini弹层多少秒后自动消失 */
        autoHide:2000,

        /* 弹出层深度 */
        zIndex:10000,

        //回调函数
        callback:function(){},

        //取消时的回调函数(用于 confirm)
        cancelCallback:function(){},
        //加载完成时回调函数
        onload:function(){}
    };

    /* 赋值 */
    op = op ||{};
    typeof op.title != "undefined"? option.title = op.title:"";
    typeof op.themeClass != "undefined"? option.themeClass = op.themeClass:"";
    typeof op.innerHTML != "undefined"? option.innerHTML = op.innerHTML:"";
    typeof op.autoHide != "undefined"? option.autoHide = op.autoHide:"";
    typeof op.status != "undefined"? option.status = op.status:"";
    typeof op.zIndex != "undefined"? option.zIndex = op.zIndex:"";
    typeof op.callback == "function"? option.callback = op.callback:"";
    typeof op.cancelCallback == "function"? option.cancelCallback = op.cancelCallback:"";
    typeof op.onload == "function"? option.onload = op.onload:"";

    var dc = document,
        /* 弹层对象 */
        popup,
        /* 背景对象 */
        popupBg,
        /* 关闭按钮 */
        closeBtn,
        /* 内容 */
        content,
        /* 背景 */
        bg,
        /* 自动隐藏用对象 */
        autoHideKey,
        /* 普通弹出层重构 */
        normalPopupRebuild = function(){
            popup = dc.createElement("div");
            popup.className = "kg_uc_popup";
            popup.innerHTML = [
                '<div class="kg_uc_popup_ct '+ option.themeClass +'">',
                    '<a href="javascript:;" class="kg_uc_popup_close"><i></i></a>',
                    '<div class="kg_uc_popup_hd">',
                        '<div class="kg_uc_popup_hd_tl">'+ option.title +'</div>',
                    '</div>',
                    '<div class="kg_uc_popup_bd">'+ option.innerHTML +'</div>',
                    option.status == "confirm"?'<div class="kg_uc_popup_ft"></div>':'',
                '</div>'
            ].join("");

            if(option.status == "confirm"){
                var ft = dc.createElement("div");
                ft.className = "kg_uc_popup_ft";
                ft.innerHTML = '<a href="javascript:;" class="kg_uc_popup_btn_style01"><span>确定</span></a>　<a href="javascript:;" class="kg_uc_popup_btn_style01"><span>取消</span></a>';

                popup.children[0].appendChild(ft);
                ft.children[0].onclick = function(){option.callback(); closeHandle();};
                ft.children[1].onclick = function(){option.cancelCallback(); closeHandle();}
            }

            dc.body.appendChild(popup);

            closeBtn = popup.children[0].children[0];
            
        },
        /* 迷你弹出层重构 */
        minPopupRebuild = function(){
            var minpopupId = "minPopup2012";
            popup = document.getElementById(minpopupId);
            
            if(!popup){
                popup = dc.createElement("div");
                popup.id = minpopupId;
                dc.body.appendChild(popup);
            };

            if(option.status == "success"){
                popup.className = "kg_uc_mini_popup kg_uc_mini_popup_success";

            } else if(option.status == "error"){
                popup.className = "kg_uc_mini_popup kg_uc_mini_popup_error";

            } else if(option.status == "notice"){
                popup.className = "kg_uc_mini_popup kg_uc_mini_popup_notice";
                
            } else{
                popup.className = "kg_uc_mini_popup";
            }

            popup.innerHTML = [
                '<div class="kg_uc_mini_popup_content">',
                    '<a href="javascript:;" class="kg_uc_mini_popup_close"><i></i></a>',
                    '<i class="kg_uc_mini_popup_icon"></i>',
                    '<span class="kg_uc_mini_popup_txt">'+ option.innerHTML +'</span>',
                '</div>',
                '<iframe frameborder="0" src="about:blank" style="filter:alpha(opacity=1);position:absolute; left:0; top:0; width:100%; height:100%; _height:1000px; z-index:-1;"></iframe>'
            ].join("");

            closeBtn = popup.children[0].children[0];
            clearTimeout(autoHideKey);
        },
        /* 背景重构 */
        bgRebuild = function(){
            popupBg = dc.createElement("div");
            popupBg.style.cssText = [
                "position:absolute",
                "display:block",
                "left:0",
                "top:0",
                "width:" + dc.body.scrollWidth + "px",
                "background:#000",
                "filter:Alpha(opacity="+ 60 +")",
                "opacity:" + 0.6,
                "z-index:" + option.zIndex  
            ].join(";");
            dc.body.appendChild(popupBg);
            popupBg.style.height = (dc.body.offsetHeight > dc.documentElement.clientHeight?dc.body.offsetHeight:dc.documentElement.clientHeight) + "px";
        },
        /* 关闭按钮事件 */
        closeHandle = function(){

            clearInterval(autoHideKey);
            try{
                if(popup){
                    dc.body.removeChild(popup);
                }
                if(popupBg){
                    dc.body.removeChild(popupBg);
                }
            }
            catch(e){}
        },
        /* 弹窗居中 */
        popupFix = function(elm){
            try{
                var ie6Fix = function(){
                    var dc = document,
                        scrollTop = dc.documentElement.scrollTop||dc.body.scrollTop,
                        boxHeight = elm.offsetHeight,
                        screenHeight = dc.documentElement.clientHeight;

                    
                        elm.style.top = scrollTop + (screenHeight - boxHeight)/2 + "px";
                    
                }
                elm.style.cssText = [
                    "position:" + (Kg.UA.Ie6?"absolute":"fixed"),
                    "top:50%",
                    "left:50%",
                    "margin-left:" + -elm.offsetWidth/2 + "px",
                    "margin-top:" + -elm.offsetHeight/2 + "px",
                    "z-index:" + (option.zIndex + 1)
                ].join(";");
                if(Kg.UA.Ie6){
                    elm.style.marginTop = 0;
                    ie6Fix();
                    Kg.$(window).addEvent("scroll",ie6Fix);
                    Kg.$(window).addEvent("resize",ie6Fix);
                }
            
            } catch(er){}
        };

    switch(type){
        case "normal":
            normalPopupRebuild();
            break;

        case "mini":
            minPopupRebuild();
            break;
    };

    popupFix(popup);
    if(type == "normal"){
        bgRebuild();
    }

    closeBtn.onclick = function(){
        closeHandle();
        option.cancelCallback();
    };

    popup.popupHide = closeHandle;

    option.onload();

    if(type == "mini" && option.autoHide > 0){
        autoHideKey = setTimeout(function(){
            closeHandle();
            option.callback();

        },option.autoHide)
    }
}

// Kg.trigger = function(target,type){
// 	var dc = document;
// 	if(dc.createEvent){
// 		var evt = dc.createEvent("HTMLEvents");
// 		evt.initEvent(type,false,true);
// 		target.dispatchEvent(evt);
// 	}
// 	else if(dc.createEventObject){
// 		target.fireEvent("on" + type);
// 	}
	
// };