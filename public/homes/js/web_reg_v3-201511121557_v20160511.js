/*
 * Copyright 2016, kugou.com
 * Creator: max yu
 * $Author: max yu $
 * $Date: 2016-05-19 12:57:36  $
 */



/* 基类补充 */
Kg.trigger = function(target, type) {
	var dc = document;
	if (dc.createEvent) {
		var evt = dc.createEvent("HTMLEvents");
		evt.initEvent(type, false, true);
		target.dispatchEvent(evt);
	} else if (dc.createEventObject) {
		target.fireEvent("on" + type);
	}

};
Kg.getPosition = function(target, cw) {
	cw = cw || window;

	var dc = document,
		fparent = target,
		_x = 0,
		_y = 0;
	do {
		_x += fparent.offsetLeft;
		_y += fparent.offsetTop;
	} while (fparent = fparent.offsetParent);

	return {
		left: _x,
		top: _y
	};
};

Kg.preventDefault = function(e) {
	e = e || window.event;
	if ("preventDefault" in e) {
		e.preventDefault();
	} else if ("returnValue" in e) {
		e.returnValue = false;
	}
};

/* 通用弹出层 
 * @param type: {string:normal|mini} 弹出层类型
 * @param op:{object} 属性设置
 * - title:{string} 弹出层标题，用于 normal弹出层
 * - innerHTML:{string} 弹出层内容
 * - callback:{function} 关闭之后回调函数
 * - onload:{function} 加载完成时回调函数
 */
function alertTips(type, op) {

	var option = {
		/* 标题 */
		title: "",
		/* 内容 */
		innerHTML: "",
		/* 状态 error|success */
		status: "",

		/* mini弹层多少秒后自动消失 */
		autoHide: 2000,

		/* 弹出层深度 */
		zIndex: 10000,

		required: false,

		//回调函数
		callback: function() {},
		//加载完成时回调函数
		onload: function() {}
	};

	/* 赋值 */
	op = op || {};
	typeof op.title != "undefined" ? option.title = op.title : "";
	typeof op.innerHTML != "undefined" ? option.innerHTML = op.innerHTML : "";
	typeof op.autoHide != "undefined" ? option.autoHide = op.autoHide : "";
	typeof op.status != "undefined" ? option.status = op.status : "";
	typeof op.zIndex != "undefined" ? option.zIndex = op.zIndex : "";
	typeof op.required != "undefined" ? option.required = op.required : "";
	typeof op.callback == "function" ? option.callback = op.callback : "";
	typeof op.onload == "function" ? option.onload = op.onload : "";

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
		autoHideKey;

	switch (type) {
		case "normal":
			normalPopupRebuild();
			break;

		case "mini":
			minPopupRebuild();
			break;
	}

	/*--
	var b = new LightBox(popup,{pos:"center",effect:"normal"});
	b.open();
	--*/


	popupFix(popup);
	if (type == "normal") {
		bgRebuild();
	}

	closeBtn.onclick = function() {
		closeHandle();
	};

	option.onload();

	if (type == "mini" && option.autoHide > 0) {
		autoHideKey = setTimeout(closeHandle, option.autoHide);
	}


	/* 普通弹出层重构 */
	function normalPopupRebuild() {
		popup = dc.createElement("div");
		popup.className = "kg_lgn_popup";
		popup.innerHTML = [
			'<div class="kg_lgn_popup_ct">',
			'<a href="javascript:;" class="kg_lgn_popup_close" ' + (option.required ? 'style="display:none;"' : '') + '><i></i></a>',
			'<div class="kg_lgn_popup_hd" ' + (!option.title ? 'style="display:none;"' : '') + '>',
			'<div class="kg_lgn_popup_hd_tl">' + option.title + '</div>',
			'</div>',
			'<div class="kg_lgn_popup_bd">' + option.innerHTML + '</div>',
			'</div>'
		].join("");

		dc.body.appendChild(popup);

		closeBtn = popup.children[0].children[0];

	}

	/* 迷你弹出层重构 */
	function minPopupRebuild() {
		var minpopupId = "minPopup2012";
		popup = document.getElementById(minpopupId);

		if (!popup) {
			popup = dc.createElement("div");
			popup.id = minpopupId;
			dc.body.appendChild(popup);
		}

		if (option.status == "success") {
			popup.className = "kg_lgn_mini_popup kg_lgn_mini_popup_success";
		} else if (option.status == "error") {
			popup.className = "kg_lgn_mini_popup kg_lgn_mini_popup_error";
		} else {
			popup.className = "kg_lgn_mini_popup";
		}

		popup.innerHTML = [
			'<div class="kg_lgn_mini_popup_content">',
			'<a href="javascript:;" class="kg_lgn_mini_popup_close"><i></i></a>',
			'<i class="kg_lgn_mini_popup_icon"></i>',
			'<span class="kg_lgn_mini_popup_txt">' + option.innerHTML + '</span>',
			'</div>',
			'<iframe frameborder="0" src="about:blank" style="filter:alpha(opacity=1);position:absolute; left:0; top:0; width:100%; height:100%; _height:1000px; z-index:-1;"></iframe>'
		].join("");

		closeBtn = popup.children[0].children[0];
		clearTimeout(autoHideKey);
	}

	/* 背景重构 */
	function bgRebuild() {
		popupBg = dc.createElement("div");
		popupBg.style.cssText = [
			"position:absolute",
			"display:block",
			"left:0",
			"top:0",
			"width:" + dc.body.scrollWidth + "px",
			"background:#000",
			"filter:Alpha(opacity=" + 60 + ")",
			"opacity:" + 0.6,
			"z-index:" + option.zIndex
		].join(";");
		dc.body.appendChild(popupBg);
		popupBg.style.height = (dc.body.offsetHeight > dc.documentElement.clientHeight ? dc.body.offsetHeight : dc.documentElement.clientHeight) + "px";

		var fixHandle = function() {
			popupBg.style.width = "100%";
			popupBg.style.height = (dc.body.offsetHeight > dc.documentElement.clientHeight ? dc.body.offsetHeight : dc.documentElement.clientHeight) + "px";
		};

		window.onresize = window.onscroll = function() {
			fixHandle();
		};
	}

	/* 关闭按钮事件 */
	function closeHandle() {

		clearInterval(autoHideKey);
		try {
			if (popup) {
				dc.body.removeChild(popup);
			}
			if (popupBg) {
				dc.body.removeChild(popupBg);
			}
		} catch (e) {}
		option.callback();
	}

	/* 弹窗居中 */
	function popupFix(elm) {

		setTimeout(function() {
			elm.style.cssText = [
				"position:" + (Kg.UA.Ie6 ? "absolute" : "fixed"),
				"top:50%",
				"left:50%",
				"margin-left:" + -elm.offsetWidth / 2 + "px",
				"margin-top:" + -elm.offsetHeight / 2 + "px",
				"z-index:" + (option.zIndex + 1)
			].join(";");
			if (Kg.UA.Ie6) {
				elm.style.marginTop = 0;
				ie6Fix();
				Kg.$(window).addEvent("scroll", ie6Fix);
				Kg.$(window).addEvent("scroll", ie6Fix);
			}

			function ie6Fix() {
					var dc = document,
						scrollTop = dc.documentElement.scrollTop || dc.body.scrollTop,
						boxHeight = elm.offsetHeight,
						screenHeight = dc.documentElement.clientHeight;

					elm.style.top = scrollTop + (screenHeight - boxHeight) / 2 + "px";
				}
				//popupBg.style.visibility = "visible";
				//popupBg.style.height = (dc.body.offsetHeight > dc.documentElement.clientHeight?dc.body.offsetHeight:dc.documentElement.clientHeight) + "px";
		}, 1);

	}
	popup.hide = closeHandle;
	return popup;
}


/* 输入框事件绑定 */
function textboxInit(iptElm, type, param, param2) {
	if (!iptElm) {
		return;
	}

	var op = {
			"class": {
				"tips": {
					error: "kg_lgn_tips_error",
					success: "kg_lgn_tips_success",
					notice: "kg_lgn_tips_notice",
					loading: "kg_lgn_tips_loading"
				},
				"ipt": {
					hover: "kg_lgn_textbox_hover",
					focus: "kg_lgn_textbox_focus"
				}
			}
		},
		box = iptElm.parentNode,
		nts = Kg.$(box).parent().find(".kg_lgn_tips")[0],


		statusReset = function() {
			clearTimeout(iptElm.statusTimeout);
			Kg.$(nts).removeClass(op["class"].tips.error).removeClass(op["class"].tips.success).removeClass(op["class"].tips.notice).removeClass(op["class"].tips.loading);
		},

		timeoutText = "你的网络暂时不稳定，请稍后再试";

	iptElm.successCallback = function() {},
		iptElm.errorCallback = function() {},
		iptElm.timeout = function() {
			statusReset();
			this.error(timeoutText);
			this.isTimeout = true;
		};

	iptElm.error = function(txt) {
		statusReset();
		this.statusTimeout = setTimeout(function() {
			statusReset();
			this.errorMsg = txt;
			Kg.$(nts).show().addClass(op["class"].tips.error);
			nts.children[1].innerHTML = txt || "";
			iptElm.isOk = false;
			if (txt != timeoutText) {
				iptElm.errorValue = iptElm.value;
				iptElm.errorMsg = txt;
			}
			iptElm.errorCallback();
		}, 200);
	};

	iptElm.success = function(txt) {
		statusReset();
		Kg.$(nts).show().addClass(op["class"].tips.success);
		nts.children[1].innerHTML = txt || "";
		this.errorMsg = null;
		iptElm.isOk = true;
		iptElm.successValue = iptElm.value;
		iptElm.successCallback();
	};

	iptElm.notice = function(param) {
		statusReset();
		Kg.$(nts).show().addClass(op["class"].tips.notice);

		if (typeof param == "boolean") {
			nts.children[1].innerHTML = "";
			iptElm.isOk = param;

		} else {
			nts.children[1].innerHTML = param || "";
			iptElm.isOk = false;
		}

	};

	iptElm.loading = function(txt) {
		statusReset();
		Kg.$(nts).addClass(op["class"].tips.loading);
		nts.children[1].innerHTML = txt || "";
		iptElm.isOk = false;
	};

	iptElm.check = function(callback) {

		callback = callback || function() {};
		var myValue = this.value.trim();
		if (this.value === "") {
			this.notice();
			return false;
		}
		if (myValue === "" && myValue != this.value) {
			this.error(this.defaultText);
			return false;
		}
		if (this.isOk && this.successValue === this.value) {
			this.success();
			callback();
			return true;
		}

		if (!this.isOk && this.errorValue === this.value && this.errorMsg) {
			this.error(this.errorMsg);
			return false;
		}

		return this.myCheck(callback);
	};

	iptElm.clear = function() {
		this.value = "";
	};

	switch (type) {
		case "email":
			iptElm.defaultText = "请输入您的常用邮箱地址";

			/* 邮箱自动填充 start */
			iptElm.autocomplete = "off";
			var emailDrawbox = document.createElement("div");

			emailDrawbox.className = "kg_lgn_drawbox";
			emailDrawbox.style.display = "none";
			emailDrawbox.innerHTML = [
				'<span>请选择或继续输入…</span>',
				'<div></div>'
			].join("");

			//下拉框距离target的垂直距离
			emailDrawbox.distance = 1;

			emailDrawbox.show = function(target) {
				if (!target) {
					return;
				}
				var o = Kg.getPosition(target);

				this.style.display = "";
				this.style.left = o.left + "px";
				this.style.top = target.offsetHeight + o.top + this.distance + "px";
			};

			emailDrawbox.hide = function() {
				this.style.display = "none";
			};

			emailDrawbox.init = function(target) {
				var myValue = target.value.trim(),
					mailList = [

						"qq.com",
						"163.com",
						"126.com",
						"sina.com",
						"gmail.com",
						"sohu.com",
						"hotmail.com",
						"139.com",
						"189.cn",
						"wo.com.cn"
					];
				target.emailIndex = -1;

				if (myValue === "") {
					this.hide();
					return;
				}
				this.show(target);

				var htmlstr = "",
					myA = myValue.indexOf("@"),
					aftStr = myA == -1 ? null : myValue.substr(myA + 1);

				if (myA === 0) {
					this.hide();
				}

				for (var i = 0, len = mailList.length; i < len; i++) {
					if (!aftStr || aftStr == mailList[i].substr(0, aftStr.length)) {
						htmlstr += '<a href="javascript:;">' + (aftStr === null ? myValue + "@" : myValue.substr(0, myA + 1)) + mailList[i] + '</a>';
					}
				}


				this.children[1].innerHTML = htmlstr;
				if (this.children[1].innerHTML === "") {
					this.hide();
				}
			};

			Kg.$(iptElm).addEvent("keyup", function(e) {
				e = e || window.event;
				if (this.isChinese) {
					emailDrawbox.init(this);

				} else {
					//up down enter
					if (e.keyCode == 38 || e.keyCode == 40 || e.keyCode == 13) {
						return;
					} else {
						emailDrawbox.init(this);
					}
				}
			});

			Kg.$(iptElm).addEvent("keydown", function(e) {
				e = e || window.event;
				var as = emailDrawbox.getElementsByTagName("a"),
					i, len;
				if (this.emailIndex === undefined) {
					this.emailIndex = -1;
				}

				//是否在用中午输入法
				if (e.keyCode == 229) {
					this.isChinese = true;
				} else {
					this.isChinese = false;
				}

				switch (e.keyCode) {
					//up
					case 38:
						for (i = 0, len = as.length; i < len; i++) {
							as[i].className = "";
						}
						this.emailIndex - 1 >= 0 ? this.emailIndex -= 1 : this.emailIndex = as.length - 1;
						as[this.emailIndex].className = "cur";
						break;
						//down
					case 40:
						for (i = 0, len = as.length; i < len; i++) {
							as[i].className = "";
						}

						this.emailIndex + 1 <= as.length - 1 ? this.emailIndex += 1 : this.emailIndex = 0;
						as[this.emailIndex].className = "cur";
						break;

						//enter
					case 13:

						if (as[this.emailIndex]) {
							this.value = as[this.emailIndex].innerHTML;
							emailDrawbox.style.display = "none";
							if ("preventDefault" in e) {
								e.preventDefault();
							} else {
								e.returnValue = false;
							}
						} else {
							emailDrawbox.init(this);

						}
						break;

						//tab
					case 9:
						emailDrawbox.style.display = "none";
						break;


					default:
						emailDrawbox.init(this);
						break;
				}
			});

			Kg.$(iptElm).addEvent("blur", function() {

				clearTimeout(this.blurTimeoutKey);
				this.blurTimeoutKey = setTimeout(function() {
					emailDrawbox.hide();
				}, 1000);
			});

			Kg.$(emailDrawbox).addEvent("mouseover", function(e) {
				e = e || window.event;
				var srcElement = e.target || e.srcElement;
				if (srcElement.tagName == "A") {
					var as = this.getElementsByTagName("a");
					for (var i = 0, len = as.length; i < len; i++) {
						if (as[i] == srcElement) {
							iptElm.emailIndex = i;
							as[i].className = "cur";
						} else {
							as[i].className = "";
						}

					}
				}
			});
			Kg.$(emailDrawbox).addEvent("click", function(e) {
				iptElm.notice();
				e = e || window.event;
				var srcElement = e.target || e.srcElement;
				if (srcElement.tagName == "A") {
					iptElm.focus();
					iptElm.value = srcElement.innerHTML;
					iptElm.blur();
					emailDrawbox.hide();
					if ("preventDefault" in e) {
						e.preventDefault();
					} else {
						e.returnValue = false;
					}

				}
			});
 

			document.body.appendChild(emailDrawbox);
			/* 邮箱自动填充 end */

			iptElm.myCheck = function(callback) {
				clearTimeout(this.checkTimeoutKey);
				var filter = /^[\w-]+[\.]*[\w-]+[@][\w\-]{1,}([.]([\w\-]{1,})){1,3}$/g,
					that = this;
				that.isTimeout = false;

				if (filter.test(that.value)) {
					that.checkTimeoutKey = setTimeout(function() {
						iptElm.timeout();
					}, 5000);


					var chechEmailObj= new Object();
					chechEmailObj.appid= 1014;
					chechEmailObj.username= that.value;
					chechEmailObj.type = 3;
					KgUser.CheckReg(chechEmailObj,'CheckRegByEmailCallbackFn');
					window.CheckRegByEmailCallbackFn = function(json) {
						if (that.isTimeout) {
							return;
						}
						clearTimeout(that.checkTimeoutKey);
						if(json.data == 1){
							that.error('该邮箱已被注册');
							return false;
						}else{
							that.success();
							callback();
							return true;
						}
					}
				} else {
					that.error("请输入可用的邮箱地址");
					return false;
				}

			};

			break;

		case "password":
			iptElm.defaultText = "密码需由 6-16个字母、数字和符号组成";
			iptElm.myCheck = function(callback) {
				var v = this.value,
					_this = this;
				if (v.length < 6 || v.length > 16 || /[\u4E00-\u9FA5]+/g.test(v)) {
					this.error("请输入6-16位的数字或字符");
					return false;
				} else if(/[ ]+/g.test(v)){
					this.error("密码不能包含空格");
					return false;	
				} else {
					/*
					    #接口检查密码难易程度
					    #2015年5月11日11:08:35添加
					*/
					//默认为接口检查返回不通过
					iptElm.portCheckRes = false;
					_this.checkPwTem = setTimeout(function() {
						//默认超过1秒后接口返回通过
						iptElm.portCheckRes = true;
					}, 1000);

					var checkPasswordObj= new Object();
					checkPasswordObj.appid= 1014;
					checkPasswordObj.password= v;

					KgUser.CheckPwd(checkPasswordObj,'checkPwWithPort');

					window.checkPwWithPort = function(json) {
						clearTimeout(_this.checkPwTem);
						if (!iptElm.portCheckRes && json.status && json.data) {
							_this.error("密码过于简单，请重新设置！");
							return;
						}
					}
					this.success();
					if (param && param.value !== "") {
						param.check();
					}
					return true;
				}
			};

			if (param2) {
				Kg.$(iptElm).addEvent("keyup", function() {
					passwordStrong(param2, iptElm.value);
				});
			}
			break;

		case "password2":
			iptElm.defaultText = "请再次输入密码";

			iptElm.check = function(callback) {

				callback = callback || function() {};
				var myValue = this.value.trim();

				if (param.value === "" && this.value === "") {
					this.notice();
					callback();
					return false;

				} else if (param.value !== "" && this.value === "") {
					this.error("请重复密码进行确认");
					return false;
				} else {
					return this.myCheck();
				}
			};

			iptElm.myCheck = function(callback) {
				var v = this.value;
				if (v.length < 6 || v.length > 16 || /[\u4E00-\u9FA5]+/g.test(v) || /[ ]+/g.test(v)) {
					this.error("请输入6-16位的数字或字符");
					return false;

				} else if (v != param.value) {
					this.error("密码不一致，请确认后重新输入");
					return false;

				} else {
					this.success();
					return true;
				}
			};
			break;

		case "code":
			iptElm.defaultText = "";
			iptElm.myCheck = function(callback) {
				if (isNaN(param)) {
					return true;
				}

				if (this.value.length >= param) {
					this.notice(true);
					callback();
					return true;

				} else {
					this.error("验证码不正确");
					return false;
				}
			};
			Kg.$(iptElm).addEvent("focus", function() {
				setTimeout(function() {
					iptElm.select();
				}, 1);
			});
			break;

		case "mobile":
			iptElm.successCallback = param || function() {};
			iptElm.errorCallback = param2 || function() {};
			iptElm.defaultText = "请输入手机号码";
			iptElm.myCheck = function(callback) {
				clearTimeout(this.checkTimeoutKey);

				var filter = /^\d{11}$/g,
					that = this;

				callback = callback || function() {};

				this.isTimeout = false;

				if (filter.test(this.value)) {
					this.checkTimeoutKey = setTimeout(function() {
						iptElm.timeout();
					}, 5000);

					
					var chechTelNumObj= new Object();
					chechTelNumObj.appid= 1014;
					chechTelNumObj.username= this.value;
					chechTelNumObj.type = 2;
					KgUser.CheckReg(chechTelNumObj,'CheckRegByTelNumCallbackFn');
					window.CheckRegByTelNumCallbackFn = function(json) {
						if (that.isTimeout) {
							return;
						}
						clearTimeout(that.checkTimeoutKey);
						if(json.data == 1){
							that.error('该手机号码已被注册');
							return false;
						}else{
							that.success();
							callback();
							return true;
						}
					}
				} else {
					this.error("请输入可用的手机号码");
					return false;
				}

			};
			break;

		case "username":
			iptElm.defaultText = "请输入 4-20位字母、数字或中文";
			iptElm.myCheck = function(callback) {
				clearTimeout(this.checkTimeoutKey);

				var that = this,
					v = this.value,

					//字母、数字或中文
					charReg = new RegExp("^[0-9a-zA-Z\u4E00-\u9FA5]+$", "g"),
					//特殊字符正则
					spReg = new RegExp("[_%`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]|[+]|[-]", "g"),
					//空格检测正则
					blankReg = new RegExp("\\s+", "g");

				this.isTimeout = false;
				if (!charReg.test(v)) {
					this.error("不可输入符号");

					/*
					if(spReg.test(v)){
					    this.error("不能含有特殊字符");
					    return false;
					    
					} else if(!isNaN(v.charAt(0))) {
					    this.error("首位不能为数字");
					    return false;

					} else if(blankReg.test(v)){
					    this.error("不能含有空格");
					    return false;

					} else if(v.getBytes() > 20 || v.getBytes() < 4){
					    this.error("请输入 4-20位字母、数字或中文");
					    return false;
					*/
				} else {
					this.checkTimeoutKey = setTimeout(function() {
						iptElm.timeout();
					}, 5000);

					var chechUserNameObj= new Object();
					chechUserNameObj.appid= 1014;
					chechUserNameObj.username= this.value;
					chechUserNameObj.type = 1;
					KgUser.CheckReg(chechUserNameObj,'CheckRegByUserNameCallbackFn');

					window.CheckRegByUserNameCallbackFn = function(json) {
						if (that.isTimeout) {
							return;
						}
						clearTimeout(that.checkTimeoutKey);
						if(json.data == 1){
							that.error('此用户名已经被注册');
							return false;
						}else{
							that.success();
							callback();
							return true;
						}
					}
				}
			};
			break;
	}


	Kg.$(iptElm).addEvent("focus", function() {
		Kg.$(box).removeClass(op["class"].ipt.focus).addClass(op["class"].ipt.focus);
		this.notice(this.defaultText);
	});
	Kg.$(iptElm).addEvent("blur", function() {
		Kg.$(box).removeClass(op["class"].ipt.focus);
		clearTimeout(this.myblurTimeoutkey);
		this.myblurTimeoutkey = setTimeout(function() {
			iptElm.loading();
			iptElm.check();
		}, 100);
	});



}



//把非元素节点的 移除
function findTags(arr) {
	var r = [];
	for (var i = 0, len = arr.length; i < len; i++) {
		if (arr[i].nodeType == 1) {
			r.push(arr[i]);
		}
	}

	return r;
}

//获取图片验证码
function getVerifyCode(source) {
	if (typeof source == "object") {
		source.src = globalParam.reg_domain + 'verifycode/t=' + new Date().getTime();
	} else {
		document.getElementById(source).src = globalParam.reg_domain + 'verifycode/t=' + new Date().getTime();
	}

}

/* 密码健壮度
 * @param target: {Object} 组件对象
 * @param type:{Number 0|1|2|3} 0:无 1:弱 2:中 3:强
 */
function passwordStrong(target, value) {
	if (!target) {
		return;
	}

	var lv = 0;

	var idValue = '';
	if(target.id.indexOf('t01') > -1){
		idValue = document.getElementById("t01Email").value;
	} else if(target.id.indexOf('t02') > -1){
		idValue = document.getElementById("t02Mobile").value;
	} else if(target.id.indexOf('t03') > -1){
		idValue = document.getElementById("t03User").value;
	}

	var lv = 0;
	if(value){
		if(value.split("").length<8 || idValue.indexOf(value) > -1){
			lv++;
		} else {
			value.match(/[a-z]/ig) && lv++;
			value.match(/[0-9]/ig) && lv++;
			value.match(/(.[^a-z0-9])/ig) && lv++;
		}
	}

	switch (lv) {
		case 0:
			target.className = "kg_lgn_psw_strong";
			break;
		case 1:
			target.className = "kg_lgn_psw_strong kg_lgn_psw_strong_s1";
			break;
		case 2:
			target.className = "kg_lgn_psw_strong kg_lgn_psw_strong_s2";
			break;
		case 3:
			target.className = "kg_lgn_psw_strong kg_lgn_psw_strong_s3";
			break;
	}
}

/* init
-------------------------------*/
function regInit() {
	/* 选项卡切换 */
	var _this = arguments.callee,
		regBox = Kg.$("#regBox")[0],
		regTags = findTags(Kg.$("#regTagList")[0].children),
		regCnts = findTags(Kg.$("#regCntList")[0].children),



		t01Email = Kg.$("#t01Email")[0],
		t01Psw = Kg.$("#t01Psw")[0],
		t01PswStrong = Kg.$("#t01PswStrong")[0],
		t01Psw2 = Kg.$("#t01Psw2")[0],
		t01Code = Kg.$("#t01Code")[0],
		t01CodeImg = Kg.$("#t01CodeImg")[0],
		t01CodeChange = Kg.$("#t01CodeChange")[0],
		t01Agree = Kg.$("#t01Agree")[0],
		t01Submit = Kg.$("#t01Submit")[0],
		t01Msg = Kg.$("#t01Msg")[0],
		t01Sex = Kg.$("#t01Sex")[0],
		t01SexBtns = t01Sex.getElementsByTagName("input"),

		t02Mobile = Kg.$("#t02Mobile")[0],
		t02Code = Kg.$("#t02Code")[0],
		t02GetCode = Kg.$("#t02GetCode")[0],
		t02Psw = Kg.$("#t02Psw")[0],
		t02Pswpwd = Kg.$("#t02Pswpwd")[0],
		t02PswStrong = Kg.$("#t02PswStrong")[0],
		t02Psw2 = Kg.$("#t02Psw2")[0],
		t02Psw2pwd = Kg.$("#t02Psw2pwd")[0],
		choosePswBtn = document.getElementById('choosePswBtn'),
		t02Agree = Kg.$("#t02Agree")[0],
		t02Submit = Kg.$("#t02Submit")[0],
		t02Msg = Kg.$("#t02Msg")[0],
		t02Sex = Kg.$("#t02Sex")[0],
		t02CheckCodeMsg =  Kg.$("#t02CheckCodeMsg")[0],
		t02SexBtns = t02Sex.getElementsByTagName("input"),

		t03User = Kg.$("#t03User")[0],
		t03Psw = Kg.$("#t03Psw")[0],
		t03PswStrong = Kg.$("#t03PswStrong")[0],
		t03Psw2 = Kg.$("#t03Psw2")[0],
		t03Code = Kg.$("#t03Code")[0],
		t03CodeChange = Kg.$("#t03CodeChange")[0],
		t03CodeImg = Kg.$("#t03CodeImg")[0],
		t03Agree = Kg.$("#t03Agree")[0],
		t03Submit = Kg.$("#t03Submit")[0],
		t03Msg = Kg.$("#t03Msg")[0],
		t03Sex = Kg.$("#t03Sex")[0],
		t03SexBtns = t03Sex.getElementsByTagName("input"),

		regMessage = Kg.$("#regMessage")[0],
		regMessageTl = Kg.$("#regMessageTl")[0],
		regMessageCnt = Kg.$("#regMessageCnt")[0],

		agreeArr = [t01Agree, t02Agree, t03Agree],

		formItemsCheck = function(iptElms, callback) {

			for (var i = 0, len = iptElms.length; i < len; i++) {
				var iptElm = iptElms[i];

				if (iptElm.value === "") {
					iptElm.error(iptElm.defaultText);
					return false;
				}

				if (!iptElm.isOk) {
					iptElm.check(callback);
				} else {
					callback();
				}
			}

		},

		enterCheck = function(iptElms, callback) {
			Kg.$(iptElms).addEvent("keyup", function(e) {
				e = e || window.event;
				if (e.keyCode == 13) {
					callback();
				}
			});
		},



		btnPostHandle = function(btnElm, status) {
			if (!btnElm) {
				return;
			}
			switch (status) {
				case "start":
					isPosting = true;
					btnElm.className.indexOf("disable") == -1 ? Kg.$(btnElm).addClass("reg_btn_s01_disable") : "";
					break;

				case "end":
					isPosting = false;
					Kg.$(btnElm).removeClass("reg_btn_s01_disable");
					break;
			}

		},

		//同意条款事件处理
		agreeHandle = function(target, submitBtn) {
			if (!target) {
				return;
			}
			clearTimeout(target.timeoutKey);
			target.timeoutKey = setTimeout(function() {
				var isCheck = target.checked;
				if (!isPosting) {
					isCheck ? Kg.$(submitBtn).removeClass("reg_btn_s01_disable") : (submitBtn.className.indexOf("disable") == -1 ? Kg.$(submitBtn).addClass("reg_btn_s01_disable") : "");
				}

				for (var i = 0, len = agreeArr.length; i < len; i++) {
					agreeArr[i].checked = isCheck;
				}
			}, 1);
		},

		form01Init = function() {

			/*初始化验证码*/
			KgUser.VerifyCode({
				appid:1014,
				codeid:"p_email_code",
				type:"RegCheckCode",
				inputid:"emailt01Code",
				codetype:0
			}); 
			/*更换验证码*/
			Kg.$("#emailt01CodeChange")[0].onclick = function() {
				KgUser.VerifyCode({
					appid:1014,
					codeid:"p_email_code",
					type:"RegCheckCode",
					inputid:"emailt01Code",
					codetype:0
				}); 
			};

			var that = arguments.callee;
			if (!that.hasInit) {
				textboxInit(t01Email, "email");
				textboxInit(t01Psw, "password", t01Psw2, t01PswStrong);
				textboxInit(t01Psw2, "password2", t01Psw);
				textboxInit(t01Code, "code", 4);

				enterCheck([t01Psw, t01Psw2, t01Code], form01Check);

				t01CodeChange.onclick = t01CodeImg.onclick = function() {
					getVerifyCode(t01CodeImg);
				};

				t01Agree.onclick = function() {
					agreeHandle(this, t01Submit);
				};

				t01Submit.onclick = function() {
					form01Check();
					phpLogClick(1929);
				};

				that.hasInit = true;
			}

			getVerifyCode(t01CodeImg);
			btnPostHandle(t01Submit, "end");
			_this.miniMsg(t01Msg, "hide");
			agreeHandle(t01Agree, t01Submit);
		},

		form02Init = function() {
			var that = arguments.callee,
				btnDisableClass = 'reg_btn_s02_disable';
			if (!that.hasInit) {
				textboxInit(t02Mobile, "mobile", function() {
					if (t02Mobile.prevValue != t02Mobile.value) {
						t02GetCode.time = 0;
						t02GetCode.myTimes = -1;
					}
					if (!t02GetCode.time || t02GetCode.time <= 0) {
						t02GetCode.className = t02GetCode.className.replace(btnDisableClass, "");
					}
					t02Mobile.prevValue = t02Mobile.value;
				}, function() {
					t02GetCode.className.indexOf("disable") == -1 ? t02GetCode.className += " " + btnDisableClass : "";
				});
				textboxInit(t02Psw, "password", t02Psw2, t02PswStrong);
				textboxInit(t02Pswpwd, "password", t02Psw2, t02PswStrong);
				textboxInit(t02Psw2, "password2", t02Psw);
				textboxInit(t02Psw2pwd, "password2", t02Psw);
				// textboxInit(t02Code, "code", 6);
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
			    		case 't02Psw' : 
			    			t02Pswpwd.value = t02Psw.value;
			    			break;
			    		case 't02Pswpwd' : 
			    			t02Psw.value = t02Pswpwd.value;
			    			break;
			    		case 't02Psw2' : 
			    			t02Psw2pwd.value = t02Psw2.value;
			    			break;
			    		case 't02Psw2pwd' : 
			    			t02Psw2.value = t02Psw2pwd.value;
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
				choosePswBtn.onclick = function(){
			    	if (this.className.match(/icon_password_openeye/)){
			    		this.className = 'icon_password_closeeye icon_password_eye';
			    		changeBtnType('close')
			    	} else {
			    		this.className = 'icon_password_openeye icon_password_eye';
			    		changeBtnType('open')
			    	}
			    }

				// enterCheck([t02Mobile, t02Psw, t02Psw2, t02Code], form02Check);
				enterCheck([t02Mobile, t02Psw, t02Psw2], form02Check);

				t02GetCode.onclick = function() {

					if (!t02Mobile.isOk) {
						return;
					}
					if (t02GetCode.className.indexOf("disable") != -1) {
						return;
					}

					if (t02Mobile.value.trim() === "") {
						t02Mobile.error("发送失败，请检查手机号码是否有误");
						return;
					}

					/*弹出验证码窗口*/
					if(!telCodeIsCanSend){
						return;
					}
					verifyCodePopup();

				};

				t02Agree.onclick = function() {
					agreeHandle(this, t02Submit);
				};

				t02Submit.onclick = function() {
					form02Check();
					//手机号码注册按钮点击量
					phpLogClick(1933);
				};

				that.hasInit = true;
			}
			btnPostHandle(t02Submit, "end");
			_this.miniMsg(t02Msg, "hide");
			agreeHandle(t02Agree, t02Submit);
		},

		form03Init = function() {
			// KgUser.VerifyCode({
			// 	appid:1014,
			// 	codeid:"p_user_code",
			// 	type:"RegCheckCode",
			// 	inputid:"t03Code"
			// }); 

			/*初始化验证码*/
			KgUser.VerifyCode({
				appid:1014,
				codeid:"p_user_code",
				type:"RegCheckCode",
				inputid:"usernamet03Code",
				codetype:0
			}); 
			/*更换验证码*/
			Kg.$("#usernamet03CodeChange")[0].onclick = function() {
				KgUser.VerifyCode({
					appid:1014,
					codeid:"p_user_code",
					type:"RegCheckCode",
					inputid:"usernamet03Code",
					codetype:0
				}); 
			};

			var that = arguments.callee;
			if (!that.hasInit) {
				textboxInit(t03User, "username");
				textboxInit(t03Psw, "password", t03Psw2, t03PswStrong);
				textboxInit(t03Psw2, "password2", t03Psw);
				textboxInit(t03Code, "code", 4);

				enterCheck([t03User, t03Psw, t03Psw2, t03Code], form03Check);

				t03CodeChange.onclick = t03CodeImg.onclick = function() {
					getVerifyCode(t03CodeImg);
				};

				t03Agree.onclick = function() {
					agreeHandle(this, t03Submit);
				};

				t03Submit.onclick = function() {
					form03Check();
					phpLogClick(1935);
				};

				that.hasInit = true;
			}

			getVerifyCode(t03CodeImg);
			btnPostHandle(t03Submit, "end");
			_this.miniMsg(t03Msg, "hide");
			agreeHandle(t03Agree, t03Submit);
		},

		form01Check = function() {
			if (t01Submit.className.indexOf("disable") != -1 || isPosting) {
				return;
			}
			// var checkItems = [t01Email, t01Psw, t01Psw2, t01Code],
			var checkItems = [t01Email, t01Psw, t01Psw2],
				sexValue = (function() {
					for (var i = 0, len = t01SexBtns.length; i < len; i++) {
						var fs = t01SexBtns[i];
						if (fs.checked) {
							return fs.value;
						}
					}
				})(),
				postHandle = function() {
					if (isPosting) {
						return;
					}
					for (var i = 0, len = checkItems.length; i < len; i++) {
						if (!checkItems[i].isOk) {
							return;
						}
					}
					if (typeof sexValue == "undefined") {
						_this.miniMsg(t01Msg, "error", "请选择性别");
						return;
					}

					btnPostHandle(t01Submit, "start");
					_this.miniMsg(t01Msg, "loading", "数据传输中");


					var isTimeout = false,
						timeoutKey = setTimeout(function() {
							isTimeout = true;
							btnPostHandle(t01Submit, "end");
							_this.miniMsg(t01Msg, "error", "请求超时,请重新点击", 2000);
						}, 5000);


					var RegByEmailObj= new Object();
					RegByEmailObj.appid= 1014;
					RegByEmailObj.email= t01Email.value;
					RegByEmailObj.password= t01Psw2.value;
					RegByEmailObj.code= KgUser.$('emailt01Code').value;
					RegByEmailObj.sex= sexValue;
					KgUser.RegByEmail(RegByEmailObj,'RegByEmailCallbackFn');

					window.RegByEmailCallbackFn = function(json) {
						if (isTimeout) {
							return;
						}
						clearTimeout(timeoutKey);
						btnPostHandle(t01Submit, "end");

						if(json.username){
							//软件登录
							_this.fullMsg("postEmail", t01Email.value);

							phpLogClick(1930);
							regOkHandle();
						}else{
							_this.miniMsg(t01Msg, "error", json.errorMsg);
						}
					}

				};

			formItemsCheck(checkItems, postHandle);


		},

		form02Check = function() {
			if (t02Submit.className.indexOf("disable") != -1 || isPosting) {
				return;
			}

			// var checkItems = [t02Mobile, t02Code, t02Psw, t02Psw2],
			var checkItems = [t02Mobile, t02Psw, t02Psw2],
				sexValue = (function() {
					for (var i = 0, len = t02SexBtns.length; i < len; i++) {
						var fs = t02SexBtns[i];
						if (fs.checked) {
							return fs.value;
						}
					}
				})(),
				postHandle = function() {
					if (isPosting) {
						return;
					}
					for (var i = 0, len = checkItems.length; i < len; i++) {
						if (!checkItems[i].isOk) {
							return;
						}
					}

					if (typeof sexValue == "undefined") {
						_this.miniMsg(t02Msg, "error", "请选择性别");
						return;
					}

					btnPostHandle(t02Submit, "start");
					_this.miniMsg(t02Msg, "loading", "数据传输中");


					var isTimeout = false,
						timeoutKey = setTimeout(function() {
							isTimeout = true;
							btnPostHandle(t02Submit, "end");
							_this.miniMsg(t02Msg, "error", "请求超时,请重新点击", 2000);
						}, 5000);

		
					var RegByTelObj= new Object();
					RegByTelObj.appid= 1014;
					RegByTelObj.mobile= t02Mobile.value;
					RegByTelObj.password= t02Psw2.value;
					RegByTelObj.code= t02Code.value;
					KgUser.RegByMobile(RegByTelObj,'RegByTelCallbackFn');

					window.RegByTelCallbackFn = function(json) {
						if (isTimeout) {
							return;
						}
						clearTimeout(timeoutKey);
						btnPostHandle(t02Submit, "end");

						if(json.username){
							//软件登录
							_this.fullMsg("regSuccess");

							phpLogClick(1934);
							regOkHandle();
						}else{
							_this.miniMsg(t02Msg, "error", json.errorMsg);
						}
					}

				};

			formItemsCheck(checkItems, postHandle);


		},

		form03Check = function() {
			if (t03Submit.className.indexOf("disable") != -1 || isPosting) {
				return;
			}
		
			// var checkItems = [t03User, t03Psw, t03Psw2, t03Code],
			var checkItems = [t03User, t03Psw, t03Psw2],
				sexValue = (function() {
					for (var i = 0, len = t03SexBtns.length; i < len; i++) {
						var fs = t03SexBtns[i];
						if (fs.checked) {
							return fs.value;
						}
					}
				})(),
				postHandle = function() {
					if (isPosting) {
						return;
					}
					for (var i = 0, len = checkItems.length; i < len; i++) {
						if (!checkItems[i].isOk) {
							return;
						}
					}

					if (typeof sexValue == "undefined") {
						_this.miniMsg(t03Msg, "error", "请选择性别");
						return;
					}

					
					/*如果没有验证通过 则返回*/
					// if(!userNameCodeIsCheck){
					// 	_this.miniMsg(t03Msg, "error", "请输入正确的验证码");
					// 	return;
					// }


					btnPostHandle(t03Submit, "start");
					_this.miniMsg(t03Msg, "loading", "数据传输中");

					var isTimeout = false,
						timeoutKey = setTimeout(function() {
							isTimeout = true;
							btnPostHandle(t03Submit, "end");
							_this.miniMsg(t03Msg, "error", "请求超时,请重新点击", 2000);
						}, 5000);

			
					var RegByUserNameObj= new Object();
					RegByUserNameObj.appid= 1014;
					RegByUserNameObj.username= t03User.value;
					RegByUserNameObj.password= t03Psw2.value;
					// RegByUserNameObj.code= KgUser.$('t03Code').value;
					RegByUserNameObj.code= KgUser.$('usernamet03Code').value;
					RegByUserNameObj.sex= sexValue;
					KgUser.RegByUserName(RegByUserNameObj,'RegByUserNameCallbackFn');

					window.RegByUserNameCallbackFn = function(json) {
						if (isTimeout) {
							return;
						}
						clearTimeout(timeoutKey);
						btnPostHandle(t03Submit, "end");

						if(json.username){
							//软件登录
							_this.fullMsg("bindEmail");

							phpLogClick(1936);
							regOkHandle();
						}else{
							console.log('333')
							_this.miniMsg(t03Msg, "error", json.errorMsg);
						}
					}

				};

			formItemsCheck(checkItems, postHandle);
		},

		regOkHandle = function() {
			//来自 mac 的统计
			globalParam.ref == "mac" && phpLogClick(465);
			globalParam.ref.indexOf("http") != -1 && alertTips("mini", {
				status: "success",
				innerHTML: "恭喜您，账号注册成功！网页将在 <span id='daoshuNum'>5</span> 秒后进行跳转",
				autoHide: 3000,
				onload: function() {
					var daoshuNum = Kg.$("#daoshuNum")[0];
					clearTimeout(daoshuNum.timeoutHandle);
					! function() {
						var nowNum = Number(daoshuNum.innerHTML);
						if (nowNum >= 0) {
							daoshuNum.innerHTML = nowNum - 1;
							daoshuNum.timeoutHandle = setTimeout(arguments.callee, 1000);
						} else {
							window.location = globalParam.ref;
						}
					}();

				},

				callback: function() {
					window.location = globalParam.ref;
				}
			});
		},

		isPosting = false;

		//当前tab
		// nowTab = Kg.request.hash("tab");

	_this.fullMsg = function(status, param01, param02) {
			regBox.style.display = "none";
			regMessage.style.display = "";

			var ucUrl = "http://www.kugou.com/newuc/user/uc/?t=" + new Date().getTime();

			Kg.$(regMessage).removeClass("pcr_msg_area_success");

			switch (status) {
				case "regSuccess":
					Kg.$(regMessage).addClass("pcr_msg_area_success");
					regMessageTl.innerHTML = "注册成功！";
					regMessageCnt.innerHTML = '&gt;&gt; 前往 <a href="' + ucUrl + '" target="_blank">酷狗用户中心</a> 完善个人资料';

					//缺链接
					break;

				case "bindEmail":
					Kg.$(regMessage).addClass("pcr_msg_area_success");
					regMessageTl.innerHTML = "注册成功！";
					regMessageCnt.innerHTML = '为保证您的帐号安全，请尽快前往 <a href="' + ucUrl + '" target="_blank">酷狗用户中心</a> 进行邮箱或手机号码绑定。';

					//缺链接
					break;

				case "postEmail":
					Kg.$(regMessage).addClass("pcr_msg_area_success");
					var mailLoginUrl = "http://mail." + param01.split("@").pop();

					mailLoginUrl = mailLoginUrl.replace("gmail", "google");

					regMessageTl.innerHTML = '注册成功！';
					regMessageCnt.innerHTML = [
						'<p>为保证您的帐号安全 ，请登录 ' + param01 + '  验证账号。<a href="javascript:;" id="postEmailResend">重新发送<span id="postEmailNum" class="blue"></span></a></p>',
						'<p style="margin-top:18px" align="center"><a class="reg_btn_s01" href="' + mailLoginUrl + '" target="_blank" onclick="phpLogClick(1931)"><span>立即登录邮箱验证</span></a></p>'


					].join("");

					var postEmailResend = Kg.$("#postEmailResend")[0],
						postEmailNum = Kg.$("#postEmailNum")[0],
						sendMail = function(mail) {
							Kg.post(globalParam.reg_domain + "sendverifyemail", {
								"email": encodeURIComponent(mail),
								"t": new Date().getTime()
							}, function() {});
						};



					postEmailResend.onclick = function() {
						if (this.className.indexOf("disable") != -1) {
							return;
						}
						sendMail(param01);
						var time = 60,
							that = this;

						Kg.$(this).addClass("disable");
						! function() {
							if (time > 0) {
								postEmailNum.innerHTML = "(" + time + "s)";
								time--;
								setTimeout(arguments.callee, 1000);

							} else {
								postEmailNum.innerHTML = "";
								Kg.$(that).removeClass("disable");
							}
						}();


					};

					Kg.trigger(postEmailResend, "click");
					break;

				case "success":
					Kg.$(regMessage).addClass("pcr_msg_area_success");
					regMessageTl.innerHTML = param01;
					regMessageCnt.innerHTML = param02;
					break;

				case "notice":
					regMessageTl.innerHTML = param01;
					regMessageCnt.innerHTML = param02;
					break;
				default:
					regMessageTl.innerHTML = param01;
					regMessageCnt.innerHTML = param02;
					break;
			}

		},

		_this.miniMsg = function(target, status, innerHTML, timeout) {
			var that = arguments.callee;
			clearTimeout(that.timeoutKey);
			if (!target) {
				return;
			}
			Kg.$(target).removeClass("reg_inset_msg_notice").removeClass("reg_inset_msg_error").removeClass("reg_inset_msg_loading");
			switch (status) {
				case "loading":
					target.style.display = "";
					Kg.$(target).addClass("reg_inset_msg_loading");
					target.innerHTML = '<i class="reg_loading_icon"></i>' + innerHTML;
					break;

				case "error":
					target.style.display = "";
					Kg.$(target).addClass("reg_inset_msg_error");
					target.innerHTML = innerHTML;
					break;

				case "hide":
					target.style.display = "none";
					target.innerHTML = "";
					break;

				case "noticce":
					target.style.display = "";
					Kg.$(target).addClass("reg_inset_msg_notice");
					target.innerHTML = innerHTML;
					break;

				default:
					target.style.display = "";
					Kg.$(target).addClass("reg_inset_msg_notice");
					target.innerHTML = innerHTML;
					break;
			}

			if (!isNaN(timeout)) {
				that.timeoutKey = setTimeout(function() {
					that(target, "hide");
				}, timeout);
			}
		},
		// 解决防刷新 默认1
		nowTab = 1;

		// nowTab = !isNaN(nowTab) ? (nowTab > regTags.length - 1 ? regTags.length - 1 : nowTab) : 1;

	//tab
	for (var i = 0, len = regTags.length; i < len; i++) {
		! function(i) {
			regTags[i].onclick = function(e) {

				if (isPosting) {
					return;
				}

				switch (i) {
					case 0:
						form01Init();
						break;
					case 1:
						form02Init();
						break;
					case 2:
						form03Init();
						break;
					default:
						break;

				}

				for (var j = 0, jlen = regCnts.length; j < jlen; j++) {
					j == i ? (
						regCnts[j].style.display = "",
						Kg.$(regTags[j]).addClass("cur")
					) : (
						regCnts[j].style.display = "none",
						Kg.$(regTags[j]).removeClass("cur")
					);

				}
				return false;
			};

		}(i);
	}

	//初始化
	Kg.trigger(regTags[nowTab], "click");

	//访问量
	phpLogClick(1929);
}

function verifyCodePopup(callback, cancelCallback) {
	window.myPop = alertTips("normal", {
		width: 600,
		required: false,
		innerHTML: [
			'<h4 style="font-size:14px; margin-bottom:10px;">请输入验证码后再发送</h4>',
			'<table class="kg_lgn_reg_tb" width="100%">',
			'<tbody>',
			'<tr>',
			'<td>',
			'<span class="pcr_iptbox pcr_codebox">',
            '<label class="txt" for="telt02Code"></label>',
            '<input id="telt02Code" type="text" class="ipt kg_lgn_textbox_ipt" style="width:120px;" onblur="checkSmSCode()"/>',
            '<span class="sts"></span>',
            '<span class="nts"></span>',
            '<span class="pcr_codeimg" id="p_sms_code"></span>',
            '<a id="telt02CodeChange"  class="kg_lgn_changeone">换一张</a>',
            '</span>',
			'</td>',
			'</tr>',

			'<tr>',
			'<td>',
			'<span class="reg_btn_s01" id="t02CheckCodeSubmit"><input type="button" name="" value="提交"></span>',
			'<span id="t02CheckCodeMsg" class="reg_inset_msg" style="display: none;"></span>',
			'</td>',
			'</tr>',
			'</tbody>',
			'</table>'
		].join(""),
		onload: function() {
			var t02Mobile = Kg.$("#t02Mobile")[0],
				t02CheckCode = Kg.$("#t02CheckCode")[0],
				telt02Code  = Kg.$("#telt02Code")[0],
				t02CheckCodeImg = Kg.$("#t02CheckCodeImg")[0],
				t02CheckCodeChange = Kg.$("#t02CheckCodeChange")[0],
				t02CheckCodeSubmit = Kg.$("#t02CheckCodeSubmit")[0],
				isPosting = false;


			/*初始化验证码*/
			KgUser.VerifyCode({
				appid:1014,
				codeid:"p_sms_code",
				type:"RegCheckCode",
				inputid:"telt02Code",
				codetype:0
			}); 
			/*更换验证码*/
			Kg.$("#telt02CodeChange")[0].onclick = function() {
				KgUser.VerifyCode({
					appid:1014,
					codeid:"p_sms_code",
					type:"RegCheckCode",
					inputid:"telt02Code",
					codetype:0
				}); 
			};



			t02CheckCodeSubmit.onclick = function() {


				if (telt02Code.value.trim() == "") {
					regInit.miniMsg(t02CheckCodeMsg, "error","验证码不能为空");
					return;
				}

				if(!telCodeIsCheck){
					return;
				}

				var isTimeout = false,
					timeoutKey = setTimeout(function() {
						isTimeout = true;
						getVerifyCode(t02CheckCodeImg);
						regInit.miniMsg(t02CheckCodeMsg, "error", "请求超时,请重新点击", 2000);
					}, 5000);

				var GetSmsCodeObj= new Object();
				GetSmsCodeObj.appid= 1014;
				GetSmsCodeObj.mobile= t02Mobile.value;
				GetSmsCodeObj.verifycode = KgUser.$('telt02Code').value;
				KgUser.GetSmsCode(GetSmsCodeObj,'GetSmsCodeCallbackFn');

				window.GetSmsCodeCallbackFn = function(json) {
					if (isTimeout) {
						return;
					}
					clearTimeout(timeoutKey);

					if(!json.errorMsg){
						myPop.hide();
					}else{
						regInit.miniMsg(t02CheckCodeMsg, "error", json.errorMsg);
					}
				}

			};
		},
		callback: cancelCallback
	});
}































/*全局变量*/
var userNameCodeIsCheck = false,
	telCodeIsCheck = false,
	telCodeIsCanSend = true;


function checkSmSCode(){
	var checkSmSCodeObj= new Object();
	checkSmSCodeObj.appid= 1014;
	checkSmSCodeObj.code= KgUser.$('telt02Code').value;
	checkSmSCodeObj.type= 'RegCheckCode';
	KgUser.CheckCode(checkSmSCodeObj,'checkSmSCodeObjCallbackFn');
}
window.checkSmSCodeObjCallbackFn = function(json) {
	if(json.msg == 'success'){
		telCodeIsCheck = true;
	} else {
		regInit.miniMsg(t02CheckCodeMsg, "error",json.errorMsg);
		return;
	}
}



/*jssdk 回调函数集中池*/
window.KgUser.CheckSudoCode = function(json){
	if(json.msg == 'success'){
		/*验证码 验证成功*/
		userNameCodeIsCheck = true;
		$('#kg_sudoku_msg').addClass('success');
		regInit.miniMsg(t03Msg, "hide");
	} else {
		$('#kg_sudoku_msg').addClass('fail');
		regInit.miniMsg(t03Msg, "error", json.errorMsg);
		return;
	}
}






















