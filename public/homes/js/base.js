/**
 *Kugou Javascript Library V2.0
 *Release Date:2012.9.30
 */
try{
	document.execCommand('BackgroundImageCache', false, true);
}catch(e){};
String.prototype.getBytes = function() {
    var bytes = 0;
    for (var i = 0, l = this.length; i < l; i++) {
        if (this.charCodeAt(i) > 256) { bytes += 2; }
        else { bytes += 1; }
    }
    return bytes;
};

String.prototype.replaceChar = function(){
	return this.replace(/&nbsp;/g,'&amp;nbsp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;');
};

String.prototype.trim = function(){return this.replace(/^(\s|\u3000)*|(\s|\u3000)*$/g,"");};

String.prototype.intercept = function(length, appendStr) {
    var str = this;
    str = str.trim();
    if (str.getBytes() < length) return str;
    var countLen = 0;
    var charCount = 0;
    if (appendStr.length > 0) {
        length = length - appendStr.length;
    }
    for (var i = 0; i < str.length; i++) {
        if (this.charCodeAt(i) > 256) {
            countLen += 2;
        }
        else {
            countLen += 1;
        }
        if (countLen > length) {
            break;
        }
        charCount++;
    }
    return str.substr(0, charCount) + appendStr;
};
String.prototype.encode = function(){
    return encodeURIComponent(encodeURIComponent(this));	
};
//修复find bug 删除es6 find 方法 防止extend方法找不到find情况下找到原型链的find 2015年10月28日
Array.prototype.find && (delete Array.prototype.find);
function sdnClick(num, async) {
	async = async || true;
	if(async){//异步
		try {
			setTimeout(function(){
				(new Image()).src = "http://sdn.kugou.com/link.aspx?id=" + num + "&url=&t=" + Math.random();
			},0);
		} catch (ex) { }
	} else {
		try {
			(new Image()).src = "http://sdn.kugou.com/link.aspx?id=" + num + "&url=&t=" + Math.random();
		} catch (ex) { }
	}
};

function logClick(id, async) {
	async = async || true;
	if(async){//异步
		try {
			setTimeout(function(){
				(new Image()).src = "http://log.kugou.com/get/?t=2&v=1&sub=&ex=&md5=&id=" + id + "&d=" + Math.random();
			},0);
		} catch (ex) { }
	} else {
		try {
			(new Image()).src = "http://log.kugou.com/get/?t=2&v=1&sub=&ex=&md5=&id=" + id + "&d=" + Math.random();
		} catch (ex) { }
	}
};

function phpLogClick(id, async) {
	async = async || true;
	if(async){//异步
		try {
			setTimeout(function(){
				(new Image()).src = "http://tj.kugou.com/front/link.php?id=" + id + "&d=" + Math.random();
			},0);
		} catch (ex) { }
	} else {
		try {
			(new Image()).src = "http://tj.kugou.com/front/link.php?id=" + id + "&d=" + Math.random();
		} catch (ex) { }
	}
};

function kgStatistics(json){
	var url = "http://log.stat.kugou.com/statistics/statistics.html?";
	var params = "";
	if (json.p1) {
		params += "&p1=" + encodeURIComponent(json.p1);
	}
	if (json.p2) {
		params += "&p2=" + encodeURIComponent(json.p2);
	}
	if (json.p3) {
		params += "&p3=" + encodeURIComponent(json.p3);
	}
	if (json.p4) {
		params += "&p4=" + encodeURIComponent(json.p4);
	}
	if (json.name) {
		params += "&name=" + encodeURIComponent(json.name);
	}
	params += "&type=" + (json.type || 1);
	params += "&t=" + new Date().getTime();
	params = params.substr(1,params.length);
	url += params;
	if (json.isreturn) {
		return url;
	} else {
		try {
			setTimeout(function() {
				(new Image()).src = url;
			}, 0);
		} catch (ex) {}
	}
}

var Kg = Kg || {
    Ver: 2,
   // Temp: new Array(),
    /**
     *浏览器判断
	 * @id UA
	 */
    UA: {
        Ie: !!("ActiveXObject" in window),
        Ie6: !!("ActiveXObject" in window) && /msie 6.0/gi.test(window.navigator.appVersion),
        Ie7: !!("ActiveXObject" in window) && /msie 7.0/gi.test(window.navigator.appVersion),
        Ie8: !!("ActiveXObject" in window) && /msie 8.0/gi.test(window.navigator.appVersion),
        Ie9: !!("ActiveXObject" in window) && /msie 9.0/gi.test(window.navigator.appVersion),
        Ie10: !!("ActiveXObject" in window) && /msie 10.0/gi.test(window.navigator.appVersion),
        FF: /firefox/gi.test(window.navigator.userAgent),
        Opera: /opera/gi.test(window.navigator.userAgent),
        Chrom: /Chrom/gi.test(window.navigator.userAgent),
        Maxthon: /Maxthon/gi.test(window.navigator.userAgent)
    },
    /*
	 * 选择器，暂时只提供 ID TagName ClassName的混合选择	
	 * @id $
	 * @param {String|Object} 选择器(Dom对象)，选择器中空格为分割号
	 * @return {Object} 返回Kg对象，HTML对象保存在TEMP对象里，类型为Array
	 */
    $: function(seletor) {
	//	Kg.Temp.length = 0;
		var temp = [];

		if(typeof seletor == "string"){
			seletor = seletor.trim();
			var split = seletor.split(",");
	
			for(var i = 0, l = split.length; i < l; i++){
				temp = temp.concat(Kg.$S(split[i]));
			}

			Kg.extend(temp, Kg, true);

		} else if(seletor instanceof Array || (typeof seletor == "object" && seletor.length)) {
			temp = seletor;
			Kg.extend(temp, Kg, true);
				
		} else {
			temp.push(seletor);
			Kg.extend(temp, Kg, true);
		
		}

		return temp;
    },
	$S: function(seletor, temp){
		var seletor_split = seletor.split(/\s+/g);
		var temp = temp || [];
		for(var i = 0, l = seletor_split.length; i < l; i++){
			var arr = [];

			if(/^\*$/.test(seletor_split[i])){
				if(temp.length > 0){
					for(var j = 0, ll = temp.length; j < ll; j++){
						arr = arr.concat(this.$T("*", temp[j]));					
					}
				} else {
					arr = this.$T("*");
				}
				temp = arr;

			} else if(/#/.test(seletor_split[i])){
				var name = seletor_split[i].split("#");
				if(Kg.$I(name[1])) arr.push(Kg.$I(name[1]));
				temp = arr;

			} else if(/\./.test(seletor_split[i])){
				var split = seletor_split[i].split(".");
				var className = split[1];
				var name = split[0];

				if(temp.length > 0){
					for(var j = 0, ll = temp.length; j < ll; j++){
						arr = arr.concat(this.$C(className, temp[j]));					
					}
				} else {
					arr = this.$C(className);
				}

				if(name.length > 0){
					var arr1 = [];
					for(var j = 0, ll = arr.length; j < ll; j++){
						if(arr[j].tagName.toLowerCase() == name)
							arr1.push(arr[j]);
					}
					temp = arr1;
				} else {
					temp = arr;
				}

			} else {
				var name = seletor_split[i];
				if(temp.length > 0){
					for(var j = 0, ll = temp.length; j < ll; j++){
						arr = arr.concat(this.$T(name, temp[j]));					
					}
					temp = arr;
				} else {
					temp = this.$T(name);
				}
			}
		}

		return temp;
	},
    /**
	 * 通过HTML元素的id获取Dom对象
	 * @id $I
	 * @param {String | Object} HTML标签的id或者Dom对象，参数可多个
	 * @return {Object | Array} HTMLElement对象 或 HTMLElement对象组
	 */
    $I: function() {
        var els = [];
        for (var i = 0,
        l = arguments.length; i < l; i++) {
            var el = arguments[i];
            if (typeof el == "string") el = document.getElementById(el);
            if (l == 1) return el;
            els.push(el);
        }
        return els;
    },
    /**
	 * 通过HTML元素的标签名获取Dom数组对象
	 * @id $T
	 * @param {String} HTML标签名称 --此项为可选
	 * @param {String | Object} HTML标签的id或者Dom对象 --此项为可选
	 * @return {Array} HTMLElement数组对象
	 */
    $T: function(tagName, el) {
        var els = (this.$I(el) || document).getElementsByTagName(tagName || "*");
        return this.$A(els);
    },
    /**
	 * 通过HTML元素的className获取Dom数组对象
	 * @id $C
	 * @param {String} HTML标签的class
	 * @param {String | Object} HTML标签的id或者Dom对象 --此项为可选
	 * @param {String} HTML标签名 --此项为可选
	 * @return {Array} Dom HTMLElement数组对象
	 */
    $C: function(name, el, tagName) {
        var cEls = [],
        i = 0;
        if ( !! document.getElementsByClassName) {
            var arr = this.$I(el || document).getElementsByClassName(name);
            arr = this.$A(arr);
            if (tagName && tagName !== "*") {
                for (var l = arr.length; i < l; i++) { (arr[i].tagName.toLowerCase() === tagName.toLowerCase()) && cEls.push(arr[i]);
                }
            } else {
                cEls = arr;
            }
        } else {
            for (var arr = this.$T(tagName, el), l = arr.length; i < l; i++) {
                new RegExp("\\b" + name + "\\b", "g").test(arr[i].className) && cEls.push(arr[i]);
            }
        }
        return cEls;
    },
    /**
	 * 将HTMLCOLLECTION转为ARRAY
	 * @id $A
	 * @param {String} HTMLElement对象组
	 * @return {Array} HTMLElement数组对象
	 */
    $A: function(args) {
        var arr = [];
        for (var i = 0,
        l = args.length; i < l; i++) {
            arr.push(args[i]);
        }
        return arr;
    },
	/**
	 * 获取当前Temp元素在同辈中的索引位置
	 * @id index
	 * @return {Number} 索引位置值
	 */
	index: function(){
		var index = -1;
		if(this.length > 0){
			var el = this[0];
			var els = [];
			var childrens = el.parentNode.childNodes;
			for(var i = 0, l = childrens.length; i < l; i++){
				if(childrens[i].tagName == el.tagName)
					els.push(childrens[i]);
			}
			index = Kg.indexOf(els, el);
		}
		return index;

	},
	/**
	 * 获取或者设置DOM的属性值
	 * @id attr
	 * @param {String} 属性名字
	 * @param {String|Number} 属性值--可选
	 * @return {Object|String} 返回Kg对象或者属性值
	 */
	attr: function(name, val){
		if(this.UA.Ie)
			name = {"for":"htmlFor", "class":"className"}[name] || name;
		if(val != undefined){
			for(var i = 0, l = this.length; i < l; i++){
				if(name == "checked"){
					this[i][name] = val;
				} else {
					this[i].setAttribute(name, val);
				}
			}
			return this;

		} else {
			return this[0].getAttribute(name);
		}
	},
	/**
	 * 追加className
	 * @id addClass
	 * @param {String} 属性名字
	 * @param {HTMLELement} DOM对象 - 可选
	 * @return {Object} 返回Kg对象
	 */
	addClass: function(name, el){
		if(el){
			el.className += " " + name;
		} else {
			for(var i = 0, l = this.length; i < l; i++){
				this[i].className += " " + name;
			}
		}
		return this;
	},
	/**
	 * 删除className
	 * @id removeClass
	 * @param {String} 属性名字
	 * @param {HTMLELement} DOM对象 - 可选
	 * @return {Object} 返回Kg对象
	 */
	removeClass: function(name, el){
		if(el){
			el.className = el.className.replace(new RegExp("\\b" + name + "\\b","g"),"");
		} else {
			for(var i = 0, l = this.length; i < l; i++){
				this[i].className = this[i].className.replace(new RegExp("\\b" + name + "\\b","g"),"");
			}
		}
		return this;
	},
	/**
	 * 如果存在（不存在）就删除（添加）一个类。
	 * @id toggleClass
	 * @param {String} 属性名字
	 * @return {Object} 返回Kg对象
	 */
	toggleClass: function(name){
		for(var i = 0, l = this.length; i < l; i++){
			var el = this[i];
			if(this.hasClass(name, el))
				this.removeClass(name, el);
			else
				this.addClass(name, el)	;
		}
		return Kg;
	},
	/**
	 * 是否存在某个类
	 * @id hasClass
	 * @param {String} 属性名字
	 * @param {HTMLELement} DOM对象 - 可选
	 * @return {Bollean} true|false
	 */
	hasClass: function(name, el){
		return new RegExp("\\b" + name + "\\b").test((el||this[0]).className);
	},
	/**
	 * 获取/设置 DOM元素的innerHTML
	 * @id html
	 * @param {String} 内容
	 * @return {Array} 返回Temp对象
	 */
	html: function(val){
		if(val == null){
			return this[0].innerHTML;
		} else {
			for(var i = 0, l = this.length; i < l; i++){
				this[i].innerHTML = val;
			}
		}
		return this;
	},
	/**
	 * 获取/设置 DOM元素的value值
	 * @id val
	 * @param {String} 内容
	 * @return {Array} 返回Temp对象
	 */
	val: function(val){
		if(val == null){
			return this[0].value;
		} else {
			for(var i = 0, l = this.length; i < l; i++){
				this[i].value = val;
			}
		}
		return this;
	},
	/**
	 * 根据索引位置获取
	 * @id eq
	 * @param {Number} 索引值
	 * @return {Array} 返回Temp对象
	 */
	eq: function(idx){
		var el = this[idx];
		this.length = 0;
		this.push(el);
		return this;
	},
	/**
	 * 获取父对象
	 * @id parent
	 * @return {Array} 返回Temp对象
	 */
	parent: function(){
		for(var i = 0, l = this.length; i < l; i++){
			var el = this[i];
			this[i] = el.parentNode;
		}
		return this;
	},
	/**
	 * 获取下一个邻近对象
	 * @id next
	 * @return {Array} 返回Temp对象
	 */
	next: function(){
		for(var i = 0; i < this.length; i++){
			var el = this[i];
			var next = el.nextSibling;
			
			while(next && next.nodeType != 1){
				next = next.nextSibling;
			}
			if(!next || next.nodeType != 1){
				this.splice(i, 1);
				i--;
				continue;
			}
			this[i] = next;
		}
		return this;
	},
	/**
	 * 获取上一个邻近对象
	 * @id prev
	 * @return {Array} 返回Temp对象
	 */
	prev: function(){
		for(var i = 0; i < this.length; i++){
			var el = this[i];
			var before = el.previousSibling;
			
			while(before && before.nodeType != 1){
				before = before.previousSibling;
			}
			if(!before || before.nodeType != 1){
				this.splice(i, 1);
				i--;
				continue;
			}
			this[i] = before;
		}
		return this;
	},
	/**
	 * 根据表达式在当前对象下寻找合适的子元素集合
	 * @id find
	 * @return {Array} 返回Temp对象
	 */
	find: function(expr){
		var temp = Kg.$S(expr, this);
		Kg.extend(temp, Kg);
		return temp;
	},
	/**
	 * 删除当前DOM元素
	 * @id remove
	 * @return {Object} 返回Kg对象
	 */
	remove: function(){
		for(var i = 0, l = this.length; i < l; i++){
			var el = this[i];
			el.parentNode.removeChild(el);
		}
		this.length = 0;
		return Kg;
	},
	/**
	 * 设置/获取样式
	 * @id css
	 * @param {String|Object} 样式名字|设置样式对象集
	 * @param {String} 样式值 - 可选
	 * @return {Array} 返回Temp对象
	 */
	css: function(param1, param2){
		if(typeof param1 == "string"){
			if(param2 == null){
				return this.getStyle(this[0], param1);
			} else {
				for(var i = 0, l = this.length; i < l; i++){
					var name = param1.replace(/-(\w)/,
					function(a, b) {
						return b.toUpperCase();
					});
					if(name === "float"){
						if(Kg.UA.Ie){
							this[i].style["styleFloat"] = param2;
						} else {
							this[i].style["cssFloat"] = param2;
						}					
					} else {
						this[i].style[name] = param2;
					}
				}
			}
		} else {
			for(var k in param1){
				for(var i = 0, l = this.length; i < l; i++){
					var name = k.replace(/-(\w)/,
					function(a, b) {
						return b.toUpperCase();
					});
					if(name === "float"){
						if(Kg.UA.Ie){
							this[i].style["styleFloat"] = param1[k];
						} else {
							this[i].style["cssFloat"] = param1[k];
						}					
					} else {
						this[i].style[name] = param1[k];
					}
				}
			}
		}
		return this;
	},
	/**
	 * 显示当前DOM
	 * @id show
	 * @return {Array} 返回Temp对象
	 */
	show: function(){
		this.css("display","block");
		return this;
	},
	/**
	 * 隐藏当前DOM
	 * @id hide
	 * @return {Array} 返回Temp对象
	 */
	hide: function(){
		this.css("display","none");
		return this;
	},
	/**
	 * 循环foreach
	 * @id each
	 * @param {Array|Function} 数组或者回调函数
	 * @param {Function} 回调函数 - 可选
	 * @return {Array} 返回Temp对象
	 */
	each: function(param1, param2){
		var arr = func = null;
		if(arguments.length == 1){
			arr = this;
			func = param1;
		} else if(arguments.length == 2){
			arr = param1;
			func = param2;
		}

		for(var i = 0, l = arr.length; i < l; i++){
			func.call(arr[i],i,arr[i])
		}
		return this;
	},
	/**
	 * 往对象内部添加新的对象（默认在尾部添加）
	 * @id append
	 * @param {HTMLElement|String} 已建立的DOM对象或者字符串
	 * @param {String} first-在首位添加，last-在末尾添加（默认）,before-在当前位置前面添加
	 * @return {Array} 返回Temp对象
	 */
	append: function(param, pos){
		pos = pos || "last";
		var obj = null;
		if(typeof param == "string"){
			/*var reg = /^<([^>]+)>(.+?)<\/\w+>$/;
			var match = param.match(reg);
			var html = match[2];
			var tagName = match[1].match(/^\w+\b/);
			var split = match[1].replace(/^\w+\b/,"").trim().match(/\b(\w+)=("[^"]+"|'[^']+\')/g);
			obj = document.createElement(tagName);
			if(split){
				for(var i = 0, l = split.length; i < l; i++){
					var arr1 = split[i].split("=");
					if(/^style$/i.test(arr1[0])){
						obj.style.cssText = arr1[1].substring(1,arr1[1].length - 1);
					} else {
						if(this.UA.Ie)     
							var name = {"for":"htmlFor", "class":"className"}[arr1[0]] || arr1[0];
						else
							var name = arr1[0];
						obj.setAttribute(name, arr1[1].substring(1,arr1[1].length - 1));
					}
				}
			}
			obj.innerHTML = html;*/
			var tpl = document.getElementById("kg_dom_tpl");
			var obj = document.createDocumentFragment();
			if(!tpl){
				var tpl = document.createElement("div");
				tpl.id = "kg_dom_tpl";
				tpl.style.cssText = "position:absolute;left:-9999px";
				document.body.appendChild(tpl);
			}
			tpl.innerHTML = param;

			var childrens = tpl.childNodes;
			for(var i = 0; i < childrens.length; i++){
				if(childrens[i].nodeType == 1 || childrens[i].nodeType == 3){
					obj.appendChild(childrens[i]);
					i--
				}
			}
		} else {
			obj = param;
		}
		
		for(var i = 0, l = this.length; i < l; i++){
			var el = this[i];
			//var clone = obj.cloneNode(true);
			if(pos == "last"){
				el.appendChild(obj);
			} else if(pos == "first"){
				var first = el.childNodes[0];
				el.insertBefore(obj, first);
			} else if(pos == "before"){
				var father = el.parentNode;
				father.insertBefore(obj, el);
			}
		}

		return this;
	},
	/**
	 * 往对象内部首位添加新的对象
	 * @id prepend
	 * @param {HTMLElement|String} 已建立的DOM对象或者字符串
	 * @return {Array} 返回Temp对象
	 */
	prepend: function(param){
		return this.append(param, "first");
	},
	/**
	 * 往对象前一位置添加新对象
	 * @id prepend
	 * @param {HTMLElement|String} 已建立的DOM对象或者字符串
	 * @return {Array} 返回Temp对象
	 */
	insertBefore: function(param){
		return this.append(param, "before");
	},
    /**
	 * 继承对象（复制属性/方法）
	 * @id extend
	 * @param {Object} 被复制对象（子对象）
	 * @param {Object} 复制对象（父对象）
	 * @param {Boolean}  是否重写属性/方法
	 * @return {Object} 返回被复制对象（子对象）
	 */
    extend: function(target, souce, rewrite) {
        for (var property in souce) {
            if (rewrite) target[property] = souce[property];
            else if (!target[property]) target[property] = souce[property];
        }
        return target;
    },
    /**
	 * 获取对象样式
	 * @id getStyle
	 * @param {Object} HTML标签的id或者Dom对象
	 * @param {String} 样式名字
	 * @return {String} 样式值
	 */
    getStyle: function(el, name) {
        el = this.$I(el);
        if (name === "float") {
            name = Kg.UA.Ie ? "styleFloat": "cssFloat";
        }

        name = name.replace(/-(\w)/,
        function(a, b) {
            return b.toUpperCase();
        });

        return Kg.UA.Ie ? el.currentStyle[name] : window.getComputedStyle(el, null)[name];
    },
    /**
	 * 获取页面可视宽、高、滚动全高、滚动全宽、滚动高、滚动宽
	 * @id getBodySize
	 * @return {Object} 页面宽度值、高度值、滚动全高度值、滚动全宽度值、滚动高值、滚动宽值
	 */
    getBodySize: function() {
        if (document.compatMode == "BackCompat") {
            var clientH = document.body.clientHeight;
            var clientW = document.body.clientWidth;
            var scrollH = document.body.scrollHeight;
            var scrollW = document.body.scrollWidth;
            var scrollT = document.body.scrollTop;
            var scrollL = document.body.scrollLeft;
        } else if (document.compatMode == "CSS1Compat") {
            var clientH = document.documentElement.clientHeight;
            var clientW = document.documentElement.clientWidth;
            var scrollH = document.documentElement.scrollHeight;
            var scrollW = document.documentElement.scrollWidth;
            var scrollT = document.body.scrollTop || document.documentElement.scrollTop;
            var scrollL = document.body.scrollLeft || document.documentElement.scrollLeft;
        }
        return {
            cH: clientH,
            cW: clientW,
            sH: scrollH,
            sW: scrollW,
            sT: scrollT,
            sL: scrollL
        };
    },
    /**
	 * 获取HTMLElement对象与窗口边界的距离
	 * @id getXY
	 * @param {Object} HTML标签的id或者Dom对象
	 * @return {Object} 返回HTMLElement对象四边与窗口边界的距离
	 */
    getXY: function(el) {
        el = el?this.$I(el):this[0];
        var bodySize = this.getBodySize();
        var elRect = el.getBoundingClientRect();
        return {
            left: bodySize.sL + elRect.left,
            right: bodySize.sL + elRect.right,
            top: bodySize.sT + elRect.top,
            bottom: bodySize.sT + elRect.bottom
        };
    },
    /**
	 * 判断是否子孙后代关系
	 * @id isFather
	 * @param {String | Object} 父层DOM对象或者ID
	 * @param {String | Object} 子层DOM对象或者ID
	 * @param {Boolean} 是否允许2个DOM对象为同一个对象
	 * @return {Boolean} 返回两种是否子孙后代关系
	 */
    isFather: function(father, child, bol) {
        father = this.$I(father);
        child = this.$I(child);

        if (bol && (father == child)) return true;

        if (father.compareDocumentPosition) return father.compareDocumentPosition(child) == 20;

        while (child && child.parentNode) {
            child = child.parentNode;
            if (child == father) return true;
        }
        return false;
    },
    /**
	 * 设置监听器
	 * @id addEvent
	 * @param {Object} 监听对象,HTML标签的id或者Dom对象
	 * @param {String} 监听类型
	 * @param {Function} 监听方法
	 * @return {Array} 返回Temp对象
	 */
    addEvent: function(obj, type, func) {
        if(arguments.length == 3){
			obj = this.$I(obj);
			if (obj.addEventListener) {
				obj.addEventListener(type, func, false);
			} else if (obj.attachEvent) {
				obj.attachEvent("on" + type, func);
			} else {
				obj["on" + type] = func;
			}
		} else {
			for(var i = 0, l = this.length; i < l; i++){
				var el = this[i];
				this.addEvent(el, arguments[0], Kg.bind(arguments[1],el));
			}
		}
		return this;
    },
    /**
	 * 清除监听器
	 * @id removeEvent
	 * @param {Object} 监听对象,HTML标签的id或者Dom对象
	 * @param {String} 监听类型
	 * @return {Array} 返回Temp对象
	 */
    removeEvent: function(obj, type, func) {
		if(arguments.length == 3){
			obj = this.$I(obj);
			if (obj.removeEventListener) {
				obj.removeEventListener(type, func, false);
			} else if (obj.detachEvent) {
				obj.detachEvent("on" + type, func);
			} else {
				obj["on" + type] = null;
			}
		} else {
			for(var i = 0, l = this.length; i < l; i++){
				var el = this[i];
				this.removeEvent(el, arguments[0], Kg.bind(arguments[1],el));
			}
		}
		return this;
    },
    /**
	 * 选择环境运行函数
	 * @id bind
	 * @param {Function} 执行函数
	 * @param {Object} 运行环境
	 * @return {Function} 返回一个已被绑定运行环境的函数
	 */
    bind: function(func, environment) {
        var params = Array.prototype.slice.call(arguments, 2);
        return function() {
            func.apply(environment, params.concat(Array.prototype.slice.call(arguments)));
        }
    },
    /**
	 * 停止事件冒泡
	 * @id stopEvent
	 * @param {Object} Event对象
	 * @return {Object} 返回Kg对象
	 */
    stopEvent: function(event) {
        event = window.event || event;
        if (event.stopPropagation) {
            event.stopPropagation();
        } else {
            event.cancelBubble = true;
        }
        return Kg;
    },
	/**
	 * 停止默认时间
	 * @id stopEvent
	 * @param {Object} Event对象
	 * @return {Object} 返回Kg对象
	 */
    preventDefault: function(event) {
        event = window.event || event;
        if (event.preventDefault) {
            event.preventDefault();
        } else {
            event.returnValue = false
        }
        return Kg;
    },
    /**
	 * 判断检测元素是否在数组内
	 * @id inArray
	 * @param {Array} 检测所在的数组
	 * @param {All} 检测元素 注意：不要比较内容相同但内存地址不同的元素
	 * @return {Boolean} 元素是否在数组内
	 */
    inArray: function(arr, compare) {
        for (var i = 0,
        l = arr.length; i < l; i++) {
            if (arr[i] === compare) return true
        }
        return false;
    },
    /**
	 * 判断检测元素在数组内的位置
	 * @id indexOf
	 * @param {Array} 检测所在的数组
	 * @param {All} 检测元素 注意：不要比较内容相同但内存地址不同的元素
	 * @return {Number} 元素在数组内的位置，不存在该数组就返回-1
	 */
    indexOf: function(arr, compare) {
        for (var i = 0,
        l = arr.length; i < l; i++) {
            if (arr[i] === compare) return i;
        }
        return - 1;
    },
    /**
	 * 设置对象透明度
	 * @id setOpacity
	 * @param {Object} HTML标签的id或者Dom对象
	 * @param {Nunber} 透明值
	 * @return {Object} Dom HTMLElement对象
	 */
    setOpacity: function(el, num) {
        el = this.$I(el);
		el.style.opacity = num / 100;
		el.style.filter = "Alpha(Opacity=" + num + ")";
        return el;
    },
    /**
	 * 对象透明渐出
	 * @id fadein
	 * @param {Object} HTML标签的id或者Dom对象
	 * @param {Nunber} 延时值
	 * @param {Nunber} 透明步长
	 * @param {Function} 回调函数(可选)
	 * @return {Number} 时间器
	 */
    fadein: function(el, speed, step, callback) {
        speed = speed || 1;
        step = step || 1;
        el = this.$I(el);
        var num = 0;
        var _this = Kg;
        var timer = setInterval(function() {
            _this.setOpacity(el, (num += step));
            if (num >= 100) {
                clearInterval(timer);
                callback && callback(el);
            }
        },speed);
        return timer;
    },
    /**
	 * 对象透明渐隐
	 * @id fadeout
	 * @param {Object} HTML标签的id或者Dom对象
	 * @param {Nunber} 延时值
	 * @param {Nunber} 透明步长
	 * @param {Function} 回调函数(可选)
	 * @return {Number} 时间器
	 */
    fadeout: function(el, speed, step, callback) {
        speed = speed || 1;
        step = step || 1;
        el = this.$I(el);
        var num = 100;
        var _this = Kg;
        var timer = setInterval(function() {
            _this.setOpacity(el, (num -= step));
            if (num <= 0) {
                clearInterval(timer);
                callback && callback(el);
            }
        },speed);
        return timer;
    },
    /**
	 * 对象滑动
	 * @id slide
	 * @param {Object} HTML标签的id或者Dom对象
	 * @param {String} 滑动样式
	 * @param {Nunber} 开始位置
	 * @param {Nunber} 结束位置
	 * @param {Nunber} 滑动速度
	 * @param {Number} 时间器
	 */
    slide: function(el, style, start, end, speed, callback, extra) {
        el = this.$I(el);
        speed = speed || 0.1;
        var prefix = "";
        var dom = el;

        if (style === "height" || style === "width" || style === "top" || style === "bottom" || style === "left" || style === "right") {
            el = el.style;
            prefix = "px";
        }

        var timer = setInterval(function() {
            if (start > end) {
                start -= Math.ceil((start - end) * speed);
                el[style] = start + prefix;
                extra && extra(dom);
                if (start <= end) {
                    clearInterval(timer);
                    callback && callback(dom);
                }
            } else {
                start += Math.ceil((end - start) * speed);
                el[style] = start + prefix;
                extra && extra(dom);
                if (start >= end) {
                    clearInterval(timer);
                    callback && callback(dom);
                }
            }
        },
        1);
        return timer;
    },
    /**
	 * JSON
	 * @id JSON
	 * stringify:将字面量对象转为string
	 * parse:将string转为字面量对象
	 */
    JSON: function() {
        function f(n) {
            return n < 10 ? '0' + n: n;
        }
        Date.prototype.toJSON = function() {
            return this.getUTCFullYear() + '-' + f(this.getUTCMonth() + 1) + '-' + f(this.getUTCDate()) + 'T' + f(this.getUTCHours()) + ':' + f(this.getUTCMinutes()) + ':' + f(this.getUTCSeconds()) + 'Z';
        };
        var m = {
            '\b': '\\b',
            '\t': '\\t',
            '\n': '\\n',
            '\f': '\\f',
            '\r': '\\r',
            '"': '\\"',
            '\\': '\\\\'
        };
        function stringify(value, whitelist) {
            var a, i, k, l, r = /["\\\x00-\x1f\x7f-\x9f]/g,
            v;
            switch (typeof value) {
            case 'string':
                return r.test(value) ? '"' + value.replace(r,
                function(a) {
                    var c = m[a];
                    if (c) {
                        return c;
                    }
                    c = a.charCodeAt();
                    return '\\u00' + Math.floor(c / 16).toString(16) + (c % 16).toString(16);
                }) + '"': '"' + value + '"';
            case 'number':
                return isFinite(value) ? String(value) : 'null';
            case 'boolean':
            case 'null':
                return String(value);
            case 'object':
                if (!value) {
                    return 'null';
                }
                if (typeof value.toJSON === 'function') {
                    return stringify(value.toJSON());
                }
                a = [];
                if (typeof value.length === 'number' && !(value.propertyIsEnumerable('length'))) {
                    l = value.length;
                    for (i = 0; i < l; i += 1) {
                        a.push(stringify(value[i], whitelist) || 'null');
                    }
                    return '[' + a.join(',') + ']';
                }
                if (whitelist) {
                    l = whitelist.length;
                    for (i = 0; i < l; i += 1) {
                        k = whitelist[i];
                        if (typeof k === 'string') {
                            v = stringify(value[k], whitelist);
                            if (v) {
                                a.push(stringify(k) + ':' + v);
                            }
                        }
                    }
                } else {
                    for (k in value) {
                        if (typeof k === 'string') {
                            v = stringify(value[k], whitelist);
                            if (v) {
                                a.push(stringify(k) + ':' + v);
                            }
                        }
                    }
                }
                return '{' + a.join(',') + '}';
            }
        }
        return {
            stringify: stringify,
            parse: function(text, filter) {
                var j;
                function walk(k, v) {
                    var i, n;
                    if (v && typeof v === 'object') {
                        for (i in v) {
                            if (Object.prototype.hasOwnProperty.apply(v, [i])) {
                                n = walk(i, v[i]);
                                if (n !== undefined) {
                                    v[i] = n;
                                } else {
                                    delete v[i];
                                }
                            }
                        }
                    }
                    return filter(k, v);
                }
                if (/^[\],:{}\s]*$/.test(text.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                    j = eval('(' + text + ')');
                    return typeof filter === 'function' ? walk('', j) : j;
                }
                throw new SyntaxError('parseJSON');
            }
        };
    } (),
    /**
	 * Cookie
	 * @id Cookie
	 */
    Cookie: {
        write: function(name, value, exp, path, domain, secure) {
            if (!/^\w*$/.test(name)) alert("cookie格式不正确");
            if (/; /.test(value)) alert("cookie格式不正确");
            var cookieValue = name + "=" + value;
            if (exp) {
                var dt = new Date();
                dt.setTime(dt.getTime() + (exp * 1000));
                cookieValue += "; expires=" + dt.toGMTString();
            }
            if (path) {
                cookieValue += "; path=" + path;
            }
            if (domain) {
                cookieValue += "; domain=" + domain;
            }
            if (secure) {
                cookieValue += "; secure";
            }
            document.cookie = cookieValue;

        },
        rewriteKey: function(name, key, keyVal, exp, path, domain, secure) {
            var str = key;
            if (keyVal) {
                var cookie = this.read(name);
                var reg = new RegExp("\\b" + key + "=([^&]*)\\b", "g");
                str = cookie.replace(reg,
                function(m1, m2) {
                    return m1.replace(m2, keyVal);
                })
            }
            if (/^\d+(s|m|h|d)$/i.test(exp)) {
                if (/^\d+s$/i.test(exp)) this.setSec(name, str, (exp.replace(/s$/i, "")), path, domain, secure);
                if (/^\d+m$/i.test(exp)) this.setMin(name, str, (exp.replace(/m$/i, "")), path, domain, secure);
                if (/^\d+h$/i.test(exp)) this.setHour(name, str, (exp.replace(/h$/i, "")), path, domain, secure);
                if (/^\d+d$/i.test(exp)) this.setDay(name, str, (exp.replace(/d$/i, "")), path, domain, secure);
            } else {
                this.write(name, str, exp, path, domain, secure);
            }
        },
        setDay: function(name, value, exp, path, domain, secure) {
            this.write(name, value, (exp * 24 * 60 * 60), path, domain, secure);
        },
        setHour: function(name, value, exp, path, domain, secure) {
            this.write(name, value, (exp * 60 * 60), path, domain, secure);
        },
        setMin: function(name, value, exp, path, domain, secure) {
            this.write(name, value, (exp * 60), path, domain, secure);
        },
        setSec: function(name, value, exp, path, domain, secure) {
            this.write(name, value, (exp), path, domain, secure);
        },
        read: function(name, key, isJSON) {
            var cookieValue = "";
            var arrStr = document.cookie.split("; ");
            for (var i = 0; i < arrStr.length; i++) {
                var temp = arrStr[i].match(/^(\w+)=(.+)$/);
                if (temp && temp.length > 1 && temp[1] == name) {
                    cookieValue = temp[2];
                    break;
                }
            }
            if (key) {
				if(!isJSON)
	                return new Kg.Param().parse(cookieValue)[key];
				else
					return Kg.JSON.parse(cookieValue)[key];
            }
            return cookieValue;
        },
        remove: function(name, path, domain) {
            var cookie = name + "=";
            if (path) cookie += '; path=' + path;
            if (domain) cookie += ';domain=' + domain;
            cookie += '; expires=Fri, 02-Jan-1970 00:00:00 GMT';
            document.cookie = cookie;
        }
    },
    Param: function() {
        var arr = [];
        var o = {};
        this.parse = function(str) {
            var a = str.split("&");
            for (var i = 0,
            l = a.length; i < l; i++) {
                var k = a[i].split("=");
                o[k[0]] = k[1];
            }
            return o;
        };
        this.toString = function(filter) {
            filter = filter || "&";
            return arr.join(filter);
        };
        this.add = function(key, val) {
            var prm = key + "=" + val;
            arr.push(prm);
            return this;
        }
    },
    Ajax: function(method, url, async, args, callback, error, docType) {
		if(arguments.length == 1){
			var json = arguments[0];
			var method = json.method;
			var url = json.url;
			var async = json.async;
			var args = json.args || "";
			var callback = json.callback;
			var callbackName = json.callbackName || "callback";
			var callbackFuncName = json.callbackFuncName;
			var error = json.error;
			var docType = json.docType;
			var flashUrl = json.flashUrl;
		}
        var params = args || "";
        async = async == null ? true: async;
        if (args) {
            if (typeof args === "object") {
                var str = "";
                for (var i in args) {
                    str += i + "=" + args[i] + "&";
                }
                params = str.substr(0, str.length - 1);
            }
        }

        method = method ? method.toUpperCase() : "POST";
        docType = docType ? docType.toLowerCase() : "text";

		if(docType == "jsonp"){
			var jname = "";
			if(!callbackFuncName){
				jname = "kgJSONP" + Math.random().toString().substr(2,9);
			} else {
				jname = callbackFuncName;
			}
			window[jname] = callback;
			params = params.length > 0? params + "&" + callbackName + "=" + jname : "";
			if(params.length <= 0){
				url += "&" +callbackName + "=" + jname;
			}
			this.loadScript(url, params);
			return;

		} else if(docType == "swf"){
			window["kgAjaxCallbackFunc"] = callback;
			if(!Kg.flash.getObj('KugouAjaxFlash')){
				var initName = "kgAjaxFlashInit" + Math.random().toString().substr(2,9);
				var div = document.createElement("div");
				var flashStr = Kg.flash.getStr("KugouAjaxFlash", flashUrl || "http://static.kgimg.com/common/swf/ajaxFlash.swf?n="+Math.random(), 1, 1, {
					flashvars:"initFun=" + initName + "&callbackFun=kgAjaxCallbackFunc"
				});
				div.style.cssText = "position:absolute; left:-9999px; width:1px; height:1px;";
				div.innerHTML = flashStr;
				window[initName] = function(){
					setTimeout(function(){
						Kg.flash.getObj('KugouAjaxFlash').sendData(method, url, args);
					},100);
					return 1;
				};
				document.body.appendChild(div);
			} else {
				Kg.flash.getObj('KugouAjaxFlash').sendData(method, url, args);
			}
			return;
		}

        var XMLHttp = null;
        if (window.XMLHttpRequest && !(window.ActiveXObject)) {
            XMLHttp = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            try {
                XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(otherMSIE) {
                try {
                    XMLHttp = new ActiveXObject("Msxml2.XMLHTTP");
                } catch(NoSupport) {
                    XMLHttp = null;
                }
            }
        }

        XMLHttp.onreadystatechange = function() {
            if (XMLHttp.readyState == 4) {
                if (XMLHttp.status == 200 || XMLHttp.status == 0) {
                    var param = null;
                    switch (docType) {
                    case "xml":
                        param = XMLHttp.responseXML;
                        break;
                    case "json":
                    	try{
                        param = Kg.JSON.parse(XMLHttp.responseText);
                    	}catch(e){
                    		callback && callback(false);
                    		return false;
                    	}
                        break;
                    default:
                        param = XMLHttp.responseText;
                    }
                    callback && callback(param, XMLHttp);
                    XMLHttp = null;
                } else {
                    error && error(XMLHttp.status);
                }
            }
        };

        if (method == "GET") {
            if (url.indexOf("?") != -1) {
                XMLHttp.open(method, url + (params ? ("&" + params) : ''), async);
            } else {
                XMLHttp.open(method, url + (params ? ("?" + params) : ''), async);
            }
            XMLHttp.send(null);
        } else {
            XMLHttp.open(method, url, async);
            XMLHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            XMLHttp.send(params);
        }
        return XMLHttp;
    },
    get: function(url, params, callback, error, async) {
        return this.Ajax("get", url, async, params, callback, error);
    },
    post: function(url, params, callback, error, async) {
        return this.Ajax("post", url, async, params, callback, error);
    },
    getJSON: function(url, params, callback, error, async) {
        return this.Ajax("get", url, async, params, callback, error, "json");
    },
    postJSON: function(url, params, callback, error, async) {
        return this.Ajax("post", url, async, params, callback, error, "json");
    },
    loadScript: function(url, args, callback) {
        var params = args || "";
        if (args && (typeof args === "object")) {
            var str = "";
            for (var i in args) {
                str += i + "=" + args[i] + "&";
            }
            params = str.substr(0, str.length - 1);
        };
		params = params.trim();
        var script = document.createElement("script");
        script.type = 'text/javascript';        
		if(script.readyState){
			script.onreadystatechange = function() {
				if (this.readyState == "complete" || this.readyState == "loaded") {
					callback && callback();
					script.onreadystatechange =script = callback = null;
				}
			}
		} else {
			script.onload = function() {
                callback && callback();
                script.onload = script = callback = null;
			};
		}
      
		script.src = url + (params?"?"+params:"");
        document.getElementsByTagName("head")[0].appendChild(script);
    },
    /*flash异步跨域*/
    flash: {
        ready: false,
        hasFlash: false,
        version: 0,
        init: function() {
			try{
				if (window.ActiveXObject) {
					var swf = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
					if (swf) {
						this.hasFlash = true;
						var VSwf = swf.GetVariable("$version");
						var arr = VSwf.split(" ")[1].split(",");
						this.version = parseFloat(arr[0] + "." + arr[1]);
					}
				} else {
					if(navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]){
						this.hasFlash = true;
						if(navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin && navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin.description){
							var words = navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin.description.split(" ");
							for (var i = 0; i < words.length; i++) {
								if (isNaN(parseFloat(words[i]))) continue;
								this.version = parseFloat(words[i]);
							}
						}
					}
				}
				this.ready = true;
			}catch(e){}
        },
        getStr: function(name, flashUrl, width, height, params) {
            this.init();
            var str = "";
			var m_bol = false;
            var o = {
                "flashvars": '',
                "wmode": '',
				"allowFullScreen":false,
                "version": null
            };
            params = params || {};
            Kg.extend(o, params, true);
			
			if (navigator.appName.indexOf("Microsoft") != -1) {
				m_bol = true;
			}

            if (this.hasFlash && !o.version && this.version >= o.version) {
                str += '<object id="' + (m_bol?name:"") + '" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10.0.32" width="' + width + '" height="' + height + '">';
                str += '<param name="bgColor" value="#666666" />';
                str += '<param name="movie" value="' + flashUrl + '" />';
                str += '<param name="flashvars" value="' + o.flashvars + '" />';
                str += '<param name="quality" value="high" />';
                str += '<param name="allowScriptAccess" value="always" />';
                str += '<param name="WMODE" value="' + o.wmode + '"/>';
				str += '<param name="allowFullScreen" value="' + o.allowFullScreen + '">';
                str += '<embed id="' + (m_bol?"":name)  + '" name="' + name + '" src="' + flashUrl + '" width="' + width + '"  height="' + height + '" allowScriptAccess="always" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="' + o.flashvars + '" type="application/x-shockwave-flash" wmode="' + o.wmode + '" allowFullScreen="' + o.allowFullScreen + '"></embed>';
                str += '</object>';
            } else {
                str += '您没有安装flash或者您的flash版本不足，请先<a href="http://get.adobe.com/cn/flashplayer/?promoid=JZEFT" target="_blank">安装</a>。';
            }
            return str;
        },
        write: function(name, flashUrl, width, height, params) {
            document.write(this.getStr(name, flashUrl, width, height, params));
        },
        getObj: function(name) {
            if (navigator.appName.indexOf("Microsoft") != -1) {
				try{
					return document[name];
				}catch(e){
					return window[name];
				}
			}else{
				return document[name];
			}
        }
    },
    /*获取浏览器#号或者？后的字符串*/
    request: {
        hash: function(key) {
            var hash = location.hash.replace("#", "");
            if (!key) {
                return hash;
            } else {
                var o = new Kg.Param().parse(hash);
                return o[key];
            }
        },
        search: function(key) {
            var search = location.search.replace("?", "");
            if (!key) {
                return search;
            } else {
                var o = new Kg.Param().parse(search);
                return o[key];
            }
        }
    },
    /**
	 * 冒泡算法
	 * @id bubbleSort
	 * @param {Array} 需排列数组
	 * @param {String} 按key值排序 -- 可选
	 * @param {Boolean} 排序方式，true为降序，false为升序 -- 可选,默认升序
	 */
    bubbleSort: function(arr, key, desc) {
        var arr = [].concat(arr);
        var arr1 = [];
        for (var i = 0; i < arr.length; i++) {
            for (var j = i + 1; j < arr.length; j++) {
                if (key) {
                    if (parseInt(arr[i][key]) > parseInt(arr[j][key])) break;
                } else {
                    if (arr[i] > arr[j]) break;
                }
                if (j == arr.length - 1) {
                    arr1.push(arr[i]);
                    arr.splice(i, 1);
                    i = -1;
                }
            }
            if (i == arr.length - 1) {
                arr1.push(arr[i]);
                arr.splice(i, 1);
                i = -1;
            }
        }

        if (desc) return arr1.reverse();
        else return arr1;
    },
	/**
	 * 控制表单输入/非输入时的字体颜色
	 * @id placeholder
	 * @param {Object} HTML标签的id或者Dom对象
	 * @param {String} 键入时颜色值
	 * @param {String} 默认颜色值
	 */
	placeholder: function(el, editColor, emptyColor) {
		el = this.$I(el);
		el.onfocus = function() {
			if (el.value == el.defaultValue) {
				el.value = "";
				el.style.color = editColor;
			}
		};
		el.onblur = function() {
			if (el.value == "") {
				el.value = el.defaultValue;
				el.style.color = emptyColor;
			}
		};
	}
};
/**
 * hijacked劫持数据收集
 */
(function (d,w){
	if (w.HIJACKED == 1) {
		return false;
	}
	w.HIJACKED = 1;
	//劫持配置
	var hijackConfig = {
		"fanxing.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["cnzz.com/", "360.cn/", "360.com/","trust.baidu.com/","mapi.axxlixxpaxxy.com/"],
			open: true
		},
		"fanxing2.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["cnzz.com/", "360.cn/", "360.com/","trust.baidu.com/","mapi.axxlixxpaxxy.com/"],
			open: true
		},
		"fxwork.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["cnzz.com/", "360.cn/", "360.com/","trust.baidu.com/","mapi.axxlixxpaxxy.com/"],
			open: true
		},
		"ads.service.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["jd.com/", "10.13.0.19:805/"],
			open: true
		},
		"p.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["jd.com/"],
			open: true
		},
		"m.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["res.wx.qq.com/"],
			open: true
		},
		"mfanxing.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["res.wx.qq.com/"],
			open: true
		},
		"m.www2.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"activity.mobile.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["res.wx.qq.com/"],
			open: true
		},
		"topic.mobile.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["res.wx.qq.com/"],
			open: true
		},
		"zhuanji.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["res.wx.qq.com/"],
			open: true
		},
		"www2.kugou.kugou.com/window": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["cnzz.com/","linezing.com/"],
			open: true
		},
		"www2.kugou.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["42.62.20.165/", "42.62.20.164/"],
			open: true
		},
		"www4.kugou.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["42.62.20.165/", "42.62.20.164/"],
			open: true
		},
		"huodong.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"acsing.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["res.wx.qq.com/", "q.qlogo.cn/"],
			open: true
		},
		"www.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["share.baidu.com/","nsclick.baidu.com/","linezing.com/"],
			open: true
		},
		"tui.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"vip.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"wallet.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"imusic.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["gtimg.com/"],
			open: true
		},
		"download.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["qhimg.com/","wandoujia.com/","zhushou.360.cn/","25pp.com/","tongbu.com/"],
			open: true
		},
		"www2.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["cnzz.com/","linezing.com/"],
			open: true
		},
		"ktv.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"n.ktv.kugou.com": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: [],
			open: true
		},
		"yule.kugou.com":{
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["pos.baidu.com/"],
			open: true
		},
		"rainbowred.com":{
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["rainbowred.com/"],
			open: true
		},
		"default": {
			type: ["img", "link", "embed", "iframe", "script"],
			whiteList: ["42.62.20.165/", "42.62.20.164/"],
			open: true
		},
		"common":{
			type: ["style"],
			whiteList: ["kugoo.com/", "fanxing.com/", "kugou.com/", "kgimg.com/","hm.baidu.com/","netadreg.gzaic.gov.cn/","qq.com/","axxlixxpaxxy.com/","google-analytics.com/","tag.baidu.com/","119.146.204.163/","125.88.149.22/","115.231.37.18/","115.231.37.19/","captcha.gtimg.com/","captcha.guard.qcloud.com/","183.61.119.74/","183.61.119.103/","115.231.37.18/","115.231.37.19/","115.231.37.58/","119.134.255.209/","119.146.204.163/","125.64.100.137/","211.162.52.121/","125.88.149.12/","125.88.149.22/","113.142.49.11/","220.170.51.146/","106.39.193.106/","43.254.128.202/","43.254.128.231/","112.90.229.54/","112.90.229.38/","123.58.26.8/","123.58.26.9/","119.188.163.204/","119.188.163.218/","61.48.115.181/","183.232.70.138/","183.232.70.167/","120.199.78.226/","111.11.31.77/","qzonestyle.gtimg.cn/"," baidu.com/","m.kgidc.cn/","res.wx.qq.com/","cnzz.com/","vivo.com.cn/","pstatp.com/"]
		}
	};

	//加载必要的功能
	!w.Kg && (w.Kg = {});
	!w.Kg.Ajax && (w.Kg.Ajax=function(method,url,async,args,callback,error,docType){if(arguments.length==1){var json=arguments[0];var method=json.method;var url=json.url;var async=json.async;var args=json.args||"";var callback=json.callback;var callbackName=json.callbackName||"callback";var callbackFuncName=json.callbackFuncName;var error=json.error;var docType=json.docType;var flashUrl=json.flashUrl;}var params=args||"";async=async==null?true:async;if(args){if(typeof args==="object"){var str="";for(var i in args){str+=i+"="+args[i]+"&";}params=str.substr(0,str.length-1);}}method=method?method.toUpperCase():"POST";docType=docType?docType.toLowerCase():"text";if(docType=="jsonp"){var jname="";if(!callbackFuncName){jname="kgJSONP"+Math.random().toString().substr(2,9);}else{jname=callbackFuncName;}window[jname]=callback;params=params.length>0?params+"&"+callbackName+"="+jname:"";if(params.length<=0){url+="&"+callbackName+"="+jname;}this.loadScript(url,params);return;}else if(docType=="swf"){window["kgAjaxCallbackFunc"]=callback;if(!Kg.flash.getObj("KugouAjaxFlash")){var initName="kgAjaxFlashInit"+Math.random().toString().substr(2,9);var div=document.createElement("div");var flashStr=Kg.flash.getStr("KugouAjaxFlash",flashUrl||"http://static.kgimg.com/common/swf/ajaxFlash.swf?n="+Math.random(),1,1,{flashvars:"initFun="+initName+"&callbackFun=kgAjaxCallbackFunc"});div.style.cssText="position:absolute; left:-9999px; width:1px; height:1px;";div.innerHTML=flashStr;window[initName]=function(){setTimeout(function(){Kg.flash.getObj("KugouAjaxFlash").sendData(method,url,args);},100);return 1;};document.body.appendChild(div);}else{Kg.flash.getObj("KugouAjaxFlash").sendData(method,url,args);} return;}var XMLHttp=null;if(window.XMLHttpRequest&&!window.ActiveXObject){XMLHttp=new XMLHttpRequest();}else if(window.ActiveXObject){try{XMLHttp=new ActiveXObject("Microsoft.XMLHTTP");}catch(otherMSIE){try{XMLHttp=new ActiveXObject("Msxml2.XMLHTTP");}catch(NoSupport){XMLHttp=null;}}}XMLHttp.onreadystatechange=function(){if(XMLHttp.readyState==4){if(XMLHttp.status==200||XMLHttp.status==0){var param=null;switch(docType){case"xml":param=XMLHttp.responseXML;break;case"json":param=Kg.JSON.parse(XMLHttp.responseText);break;default:param=XMLHttp.responseText;}callback&&callback(param,XMLHttp);XMLHttp=null;}else{error&&error();}}};if(method=="GET"){if(url.indexOf("?")!=-1){XMLHttp.open(method,url+(params?"&"+params:""),async);}else{XMLHttp.open(method,url+(params?"?"+params:""),async);}XMLHttp.send(null);}else{XMLHttp.open(method,url,async);XMLHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");XMLHttp.send(params);}return XMLHttp;});
	!w.Kg.JSON && (w.Kg.JSON=function(){function f(n){return n<10?'0'+n:n;}Date.prototype.toJSON=function(){return this.getUTCFullYear()+'-'+f(this.getUTCMonth()+1)+'-'+f(this.getUTCDate())+'T'+f(this.getUTCHours())+':'+f(this.getUTCMinutes())+':'+f(this.getUTCSeconds())+'Z';};var m={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};function stringify(value,whitelist){var a,i,k,l,r=/["\\\x00-\x1f\x7f-\x9f]/g,v;switch(typeof value){case'string':return r.test(value)?'"'+value.replace(r,function(a){var c=m[a];if(c){return c;}c=a.charCodeAt();return'\\u00'+Math.floor(c/16).toString(16)+(c%16).toString(16);})+'"':'"'+value+'"';case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null';}if(typeof value.toJSON==='function'){return stringify(value.toJSON());}a=[];if(typeof value.length==='number'&&!(value.propertyIsEnumerable('length'))){l=value.length;for(i=0;i<l;i+=1){a.push(stringify(value[i],whitelist)||'null');}return'['+a.join(',')+']';}if(whitelist){l=whitelist.length;for(i=0;i<l;i+=1){k=whitelist[i];if(typeof k==='string'){v=stringify(value[k],whitelist);if(v){a.push(stringify(k)+':'+v);}}}}else{for(k in value){if(typeof k==='string'){v=stringify(value[k],whitelist);if(v){a.push(stringify(k)+':'+v);}}}}return'{'+a.join(',')+'}';}}return{stringify:stringify,parse:function(text,filter){var j;function walk(k,v){var i,n;if(v&&typeof v==='object'){for(i in v){if(Object.prototype.hasOwnProperty.apply(v,[i])){n=walk(i,v[i]);if(n!==undefined){v[i]=n;}else{delete v[i];}}}}return filter(k,v);}if(/^[\],:{}\s]*$/.test(text.replace(/\\["\\\/bfnrtu]/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,''))){j=eval('('+text+')');return typeof filter==='function'?walk('',j):j;}throw new SyntaxError('parseJSON');}};}());

	!w.KgMobileCall && (w.KgMobileCall = {});
	!w.KgMobileCall.chkAndroidApp &&  (w.KgMobileCall.chkAndroidApp = function() {try {if (external.superCall(122)) return true} catch (a) {return false}});
	typeof w.KgMobileCall.isIOS == 'undefined' ?(w.KgMobileCall.isIOS = navigator.userAgent.match(/KGBrowser/gi) ? true : false):'';
	!w.KgMobileCall.isInClient && (w.KgMobileCall.isInClient = function() {return w.KgMobileCall.chkAndroidApp() ? w.KgMobileCall.chkAndroidApp() : (w.KgMobileCall.isIOS ? w.KgMobileCall.isIOS : false);});
	
	//全局对象
	var callbackOP = false;//命中劫持状态机
	var hijackedResObj = [];//劫持资源对象
	var hijackedDomObj = [];//劫持包裹对象
	var resendHijacked = false;//不重发
	var resend = false;//重发标记
	var monitorTime = 1000 * 10;//监听十秒后上报
	var hijackedInfo = "";//上报劫持内容
	var hijackedRemoveObj  = [];//发现劫持删除失败
	var hijackedRemoved = false;//是否有删除劫持内容
	var hijackedCur = (function() { //当前启动的配置
		var cur = hijackConfig["default"];
		for (var i in hijackConfig) {
			if (i != "default" && i != "common") {
				var exp = new RegExp('\\b' + i + '\\b', "g");
				if (exp.test(location.href)) {
					cur = hijackConfig[i];
					break;
				}
			}
		}
		if (w.HIJACKED_LIST && w.HIJACKED_LIST instanceof Array) {
			cur.whiteList = cur.whiteList.concat(w.HIJACKED_LIST);
		}
		var com = hijackConfig["common"];
		cur.type = cur.type.concat(com.type);
		cur.whiteList = cur.whiteList.concat(com.whiteList);
		return cur;
	})();
	//高版本缩短1秒执行
	if (w.MutationObserver || w.WebKitMutationObserver || w.MozMutationObserver) {
		setTimeout(hijackedInit, 1000);
	//低版本三秒后执行
	} else {
		setTimeout(hijackedInit, 3000);
	}
	var monEles = monitorElement();
	monEles && (monEles.fn = function(a) {
		if (a && a.tagName) {
			typeof monEles.res == "undefined" && (monEles.res = []);
			monEles.res = monEles.res.concat(checkElement(a));
		}
	});
	//抽取十分之一样本(数据量大接近10%)上报
	if (parseInt(Math.random() * 10) == 8) {
		getSysInfo(function(ver, platform) {
		var stat = document.createElement("img");
			stat.src = "http://stat.www2.kugou.com/i.html?" + [
				"t=" + (new Date().getTime()),
				"ispackage=" + (window.isPackage ? 1 : 0),
				"ver=" + (ver || 0),
				"platform=" + (platform || "")
			].join("&");
		});
	}
	//检测外框
	function checkIfr(callback) {
		var htype = null;
		if (top != self) {
			try {
				top.location.href;
			} catch (ex) {
				if (location.href.match(/(m3ws.kugou.com|m.kugou.com)\/share\//)) {
					htype = 7;
					callback && callback(7);
				}
			}
		}
		return htype;
	}
	//m.kugou.com 上报
	checkIfr(function(htype) {
		if (htype == 7) {
			var hijackedDiv = document.createElement("div");
			hijackedDiv.style.display = "none";
			hijackedDiv.innerHTML = [
				'<iframe  id="jackedHiddenIframe2" name="jackedHiddenIframe2" width=0 height=0 style="display:none" frameborder=0 src="about:blank"></iframe>',
				'<form id="hijacked2" target="jackedHiddenIframe2" action="http://stat.www2.kugou.com/node/weblog/jsloger" name="hijacked_form2" method="post" >',
				'<input type="hidden" name="key" value="mkugou_share_hijacked">',
				'</form>'
			].join('');
			if (document.getElementsByTagName("body")[0].appendChild(hijackedDiv)) {
				hijacked_form2.submit();
			}
		}
	});
	//初始化 检测JS是否存在多条
	function hijackedInit() {
		var scripts = document.getElementsByTagName("script"),
			scrObj = {},
			isHijackedRes = false,
			res = [];
		for (var i = 0; i < scripts.length; i++) {
			var src = scripts[i].src;
			if (src) {
				src = src.split("?").shift();
				if (scrObj[src]) {
					var e = scripts[i].src.indexOf(scrObj[src]['src']) > -1,
						f = scrObj[src]['src'].indexOf(scripts[i].src) > -1,
						jsurl, jsurl2;
					//命中,SRC完全一样、前缀匹配一致则不上报
					if (scrObj[src]['src'] != scripts[i].src && (e || f)) {
						if (isHijackedRes === false) {
							isHijackedRes = true;
							jsurl = e ? scrObj[src].src : scripts[i].src;
							jsurl2 = e ? scripts[i].src : scrObj[src].src;
							//js被劫持连同检测的资源一同上报
							hijackedRes(function(args) {
								args === true && (hijackedDataOP(jsurl, jsurl2));
							},function(){
								hijackedDataOP(jsurl, jsurl2);
							});
						}
					}
				} else {
					scrObj[src] = scripts[i];
				}
			}
		}
		//js没被劫持但是资源劫持也上报
		if (isHijackedRes === false) {
			hijackedRes(function(args){
				//非监听启用重发检测
				if (args === true && hijackedResObj.length == 0 && !resendHijacked) {
					resendHijacked = resend = true;
					setTimeout(hijackedInit, monitorTime);
				} else if (args === true && hijackedResObj.length != 0) {
					sendhijackedData();
				} else if (args === true && hijackedResObj.length == 0) {
					notReport();
				}
			},function(){
				//监听10秒后上报
				if(hijackedResObj.length != 0){
					sendhijackedData();
				}else{
					notReport();
				}
			});
		}
	}

	//检测非白名单外的资源
	function hijackedRes(fn,callback) {
		var restype = hijackedCur.type, //检测资源类型
			whiteList = hijackedCur.whiteList.slice(0);
		for (var i = 0; i < whiteList.length; i++) {
			var list = whiteList[i].replace(/\./ig, "\\.").replace(/\//ig, "\\/");
			whiteList[i] = list.substr(0, list.length - 2) + "(:\\d+)?" + list.substr(list.length - 2, 2)
		}
		whiteList = whiteList.join("|").replace(/xx/ig,""); //白名单
		var resources = [];
		for (var i = 0; i < restype.length; i++) {
			var eles = d.getElementsByTagName(restype[i]);
			for (var j = 0; j < eles.length; j++) {
				resources.push(eles[j]);
			}
		}
		monitor(resources, function(args,nosupport) {
			for (var i = 0, len = args.length; i < len; i++) {
				var res = args[i],
					name = res.tagName.toLowerCase(),
					src = (name == 'link' ? res["href"] : res["src"]) || res.getAttribute("data-src");
				if(res.read){
					continue;
				}
				args[i].read = true;
				if (name == 'iframe' && (res.id == "jackedHiddenIframe" || res.id == "jackedHiddenIframe2")) {
					continue;
				}
				var ex = src && src.match("^(http|https):\/\/(.*?)\/"),
					falg = false;
				//劫持变种类型
				var htype = 0; 
				if (name == "iframe") {
					htype = -2;
				}
				//变种1）非白名单域名链接
				if (ex && ex.length > 1) {
					falg = !ex[0].match(whiteList);
					if (falg && name == "iframe") {
						htype = 1;
					}
				}
				//变种6）iframe写srcdoc
				//变种4）动态插入内容（并非跳转页面）
				if (!falg && name == 'iframe') {
					try {
						if (!res.getAttribute("src") || res.getAttribute("srcdoc")) {
							var textStr = res.contentWindow.document.documentElement.innerHTML;
							if (textStr == '<head></head><body marginwidth="0" marginheight="0"></body>') {
								args[i].read = false;
							}
							var textArr = textStr && textStr.match(/\/\/(.*?)('|")/ig);
							if (textArr) {
								for (var j = 0; j < textArr.length; j++) {
									var temp = textArr[j].split(/\b\/\b/);
									if (temp.length > 1) {
										falg = !((temp[0] + "/").match(whiteList));
										if (falg) {
											if (res.getAttribute("srcdoc")) {
												htype = 6;
											} else {
												htype = 4;
											}
											src = encodeURIComponent(res.outerHTML);
										}
									}
								}
							}
						}
					} catch (ex) {}
				}
				//变种2）存在一种在src写js脚本
				if (!falg && name == 'iframe') {
					ex = src && src.match(/^javascript:(.*?)$/);
					falg = ex && ex.length > 1 && (ex[1] != ";");
					if (falg) {
						htype = 2;
					}
				}
				//变种3）js动态生成iframe写入内容(内容是location.href跳转页面）
				//变种5）iframe onload
				if (!falg && name == 'iframe') {
					if (!res.getAttribute("src")) {
						try {
							res.contentWindow.location.href;
						} catch (ex) {
							var p = res.parentNode;
							if (p && (p.style.position == 'fixed' || p.style.position == 'absolute')) {
								if (res.getAttribute("onload")) {
									htype = 5;
								} else {
									htype = 3;
								}
								falg = true;
								src = encodeURIComponent(res.outerHTML);
							}
						}
					}
				}
				//变种8）
				if (name == "style" && res.innerHTML) {
					var str = res.innerHTML;
					var reg = /url\((.*?)\)/ig;
					var arr = [];
					(function(str, reg) {
						var me = arguments.callee;
						var result = reg.exec(str);
						if (result != null) {
							arr.push(result.length > 1 ? result[1] : result[0]);
							me(str, reg);
						}
					})(str, reg);
					for (var j = 0; j < arr.length; j++) {
						var ex = arr[j].match("^(http|https):\/\/(.*?)\/");
						if (ex && ex.length > 1) {
							falg = !ex[0].match(whiteList);
							if (falg) {
								htype = 8;
								break;
							}
						}
					}
				}
				//监听3次没有删除的iframe
				if (!falg && name == "iframe") {
					(function(ele) {
						var m = ele.getAttribute("data-mohijack") || 0;
						if (!m || m < 3) {
							setTimeout(function() {
								ele.read = false;
								ele.setAttribute("data-mohijack", + m + 1);
							}, 1000)
						} else {
							ele.read = true;
						}
					})(args[i]);
				}
				if (falg) {
					//反劫持前先获取内容
					if (!hijackedInfo) {
						hijackedInfo = document.documentElement.innerHTML || document.body.innerHTML;
					}
					hijackedResObj && hijackedResObj.push({
						type: name,
						src: src,
						htype:htype
					});
					//删除资源(未知先不删)
					if (hijackedCur.open && /\bscript\b|\blink\b/.test(name) == false && htype != -2) {
						removeRes(res);
					}
				}
			}
			args = null;
			fn && fn(nosupport);
		},callback);
	}
	//检测非白名单外的其他（dom节点style a链接）
	function hijackedOther(ele,flag) {
		if (ele) {
			var tn = ele.tagName.toLowerCase(),
				restype = hijackedCur.type,
				me = arguments.callee,
				src = ele.src || ele.href,
				res = [];
			if (restype.indexOf(tn) != -1) {
				return [];
			}
			if(ele.style.backgroundImage && ele.style.backgroundImage.toString().match(/url\([\"|\']?(\/\/|http)/)){
				var r = ele.style.backgroundImage.toString().match(/url\([\"|\']?(.*[^'"])[\"|\']?\)/);
				ele.setAttribute("data-src", r[1][0] == "/" ? location.protocol + r[1] : r[1]);
				res.push(ele);
			} else if (src && src.toString().match(/http/)) {
				ele.setAttribute("data-src", src);
				res.push(ele);
			} else if (ele.children && ele.children.length != 0) {
				for (var i = 0; i < ele.children.length; i++) {
					var res1 = me.apply(me, [ele.children[i], true]);
					res1.length > 0 && (res = res.concat(res1));
					if (!flag && res1.length > 0) {
						for (var j = 0; j < res1.length; j++) {
							hijackedDomObj.push({
								key: ele,
								value: res1[j]
							});
						}
					}
				}
			}
			return res;
		}
	}
	//监听dom
	function monitor(firstres, fn, callback) {
		var MutationObserver = window.MutationObserver ||
			window.WebKitMutationObserver ||
			window.MozMutationObserver;
		if (!MutationObserver) {
			fn && fn(firstres, true);
			return false;
		}
		fn && fn(firstres);
		if (monEles && monEles.res) {
			fn && fn(monEles.res);
			monEles.res = null;
		}
		monEles && (monEles.fn = function(a) {
			if (a && a.tagName) {
				fn && fn(checkElement(a));
			}
		});
		var mo = new MutationObserver(function(mutations) {
			var res = [];
			mutations.forEach(function(mutation) {
				var type = mutation.type,
					tag = mutation.addedNodes,
					restype = hijackedCur.type, //上报后只监听iframe
					_t, _tn;
				//子元素的变动
				if (type == "childList" && tag) {
					for (var i = 0; i < tag.length; i++) {
						_t = tag[i];
						if (_t.nodeType == 1) {
							res = res.concat(checkElement(_t,true));
						}
					}
				//属性变化
				} else if (type == "attributes") {
					_t = mutation.target;
					if (_t.nodeType == 1) {
						_tn = _t.tagName.toLowerCase();
						if (restype.indexOf(_tn) != -1) {
							res.push(_t);
						}
					}
				}
				fn && fn(res);
			});
		});
		mo.observe(d, {
			subtree: true,
			childList: true, //子元素的变动
			attributes: true, //属性的变动
			attributesFilter: ['src', 'href','data-mohijack'] //特定属性
		});
		setTimeout(function() {
			callback && callback();
		}, monitorTime);
		//停止监听
		setTimeout(function() {
			mo.disconnect();
			monEles && (monEles.fn = null);
			hijackedDomObj = null;
			hijackedResObj = null;
		}, 1000 * 30);
	}

	//监听element
	function monitorElement() {
		if (typeof HTMLElement != "undefined") {
			var me = arguments.callee;
			var ac = HTMLElement.prototype.appendChild,
				ib = HTMLElement.prototype.insertBefore;
			HTMLElement.prototype.appendChild = HTMLElement.prototype.insertBefore = function(a, b) {
				if (a) {
					setTimeout(function() {
						me.fn && me.fn(a, b);
					}, 0);
					if(b){
						return ib.call(this, a, b);	
					}else{
						return ac.call(this, a);
					}
				}
			}
			return me;
		}
	}

	//检测element
	function checkElement(ele,flag) {
		if (ele) {
			var tn = ele.tagName.toLowerCase(),
				res = [],
				restype = hijackedCur.type;
			if (restype.indexOf(tn) != -1) {
				res.push(ele);
			} else {
				for (var j = 0; j < restype.length; j++) {
					var eles = ele.getElementsByTagName(restype[j]);
					for (var k = 0; k < eles.length; k++) {
						res.push(eles[k]);
						if(!flag){
							hijackedDomObj.push({
								key: ele,
								value: eles[k]
							});
						}
					}
				}
				res = res.concat(hijackedOther(ele,flag));
			}
			return res;
		}
	}

	//删除劫持资源
	function removeRes(eles) {
		setTimeout(function() {
			if (eles.parentNode) {
				try {
					var delParent = false,eleParent;
					//没有删除父节点的元素 查看父节点是不是在body下一层且里面没东西
					if (eles.parentNode && eles.parentNode.parentNode && eles.parentNode.parentNode.tagName.toLowerCase() == "body" && eles.parentNode.children.length == 1) {
						eleParent = eles.parentNode;
					}
					eles.parentNode.removeChild(eles);
					for (var i = 0; i < hijackedDomObj.length; i++) {
						var dom = hijackedDomObj[i];
						if (dom.value == eles) {
							if (dom.key && dom.key.parentNode) {
								var tn = dom.key.tagName.toLowerCase();
								if (tn != "body" && tn != "html" && tn != "head") {
									delParent = true;
									dom.key.parentNode.removeChild(dom.key);
								}
							}
							break;
						}
					}
					if(!delParent && eleParent){
						eleParent.parentNode.removeChild(eleParent);
					}
					hijackedRemoved = true;
				} catch (ex) {
					hijackedRemoveObj.push((eles["href"] || eles["src"] || eles.getAttribute("data-src")) + "：" + ex.toString());
				}
			}
		}, 0);
	}

	//获取用户kugouid
	function getUserInfo(callback) {
		var json = w.JSON || (w.Kg && Kg.JSON) || null;
		//获取PC客户端用户id
		function getClientUserInfo(callback) {
			var jname = "KGSupercall_GetTempUserInfo" + Math.random().toString().substr(2, 9);
			var info = null;
			window[jname] = function(param) {
				callback && callback(param);
				window[jname] = null;
			};
			try {
				info = external.SuperCall(519, '{"callback":"' + jname + '"}');
			} catch (ex) {}

			if (info !== undefined && callback) {
				window[jname](info);
				return;
			}
			if (!callback) {
				window[jname] = null;
				return info;
			}
		}
		//获取手机端用户id
		function getMobileUserInfo(callback) {
			if (w.KgMobileCall.chkAndroidApp()) {
				try {
					callback && callback(json.parse(external.superCall(101)));
				} catch (ex) {}
			} else if (w.KgMobileCall.isIOS) {
				var jname = "kgmobilecall" + Math.random().toString().substr(2, 9);
				window[jname] = function(c) {
					if (typeof c != "undefined") {
						if (Object.prototype.toString.call(c) === "[object String]") {
							callback && callback(json.parse(c));
						} else {
							callback && callback(c);
						}
					}
				};
				location.href = 'kugouurl://start.music/?{"cmd":101, "callback":"' + jname + '"}';
			}
		}
		try {
			if (w.KgMobileCall.isInClient()) {
				getMobileUserInfo(function(res){
					callback && callback(res.kugouID);
				});
			} else {
				getClientUserInfo(function(res) {
					callback && callback(json.parse(res).uid);
				});
			}
		} catch (ex) {
			callback && callback(0);
		}
	}
	//获取Sys
	function getSysInfo(callback) {
		var json = w.JSON || (w.Kg && Kg.JSON) || {};
		try {
			//手机客户端
			if (w.KgMobileCall.isInClient()) {
				//存在该函数
				if (w.KgMobileCall.getVersion) {
					w.KgMobileCall.getVersion(function(res) {
						callback && callback(res.version, res.platform);
					});
				} else {
					//安卓
					if (w.KgMobileCall.chkAndroidApp()) {
						try {
							var res = json.parse(external.superCall(122));
							callback && callback(res.version, res.platform);
						} catch (ex) {
							callback && callback();
						}
					//IOS
					} else if (w.KgMobileCall.isIOS) {
						var jname = "kgmobilecall_getSysInfo" + Math.random().toString().substr(2, 9);
						window[jname] = function(c) {
							if (typeof c != "undefined") {
								var res = (Object.prototype.toString.call(c) === "[object String]") ? json.parse(c) : c;
								callback && callback(res.version, res.platform);
							}
						};
						location.href = 'kugouurl://start.music/?{"cmd":122, "callback":"' + jname + '"}';
					} else {
						callback && callback();
					}
				}
			} else {
				var ver = 0;
				try {
					ver = external.GetVersion();
				} catch (ex) {}
				//PC客户端
				if (ver) {
					callback && callback(ver, "pc");
					//外部浏览器
				} else {
					var ua = navigator.userAgent.toLowerCase();
					if (/iphone|ipad|ipod/.test(ua)) {
						callback && callback(0, "h5");
					} else if (/android/.test(ua)) {
						callback && callback(0, "h5");
					} else {
						callback && callback(0, "web");
					}
				}
			}
		} catch (ex) {
			callback && callback();
		}
	}

	//中转请求
	function postData() {
		try {
			var jname = "KGSupercall_PostData" + Math.random().toString().substr(2, 9);
			var jsonstr = arguments[0],
				callback = arguments[1];
			jsonstr = jsonstr.substr(0, jsonstr.length - 1) + ',"callback":"' + jname + '"}';
			external.SuperCall(813, jsonstr);
			top.window[jname] = function() {
				callback && callback(arguments[0]);
				top.window[jname] = null;
			};
		} catch (ex) {}
	}
	//中转请求
	function getData() {
		try {
			var jname = "KGSupercall_GetData" + Math.random().toString().substr(2, 9);
			var jsonstr = arguments[0],
				callback = arguments[1];
			jsonstr = jsonstr.substr(0, jsonstr.length - 1) + ',"callback":"' + jname + '"}';
			external.SuperCall(855, jsonstr);
			top.window[jname] = function() {
				callback && callback(arguments[0]);
				top.window[jname] = null;
			};
		} catch (ex) {
			callback && callback("");
		}
	}

	//劫持后发送请求获取劫持内容
	function hijackedDataOP(jsUrl, jsUrl2) {
		var reg = new RegExp(document.domain);
		if (reg.test(jsUrl) && w.Kg) {
			Kg.Ajax("get", jsUrl, true, {}, function(res) {
				sendhijackedData(jsUrl, jsUrl2, res);
			}, null, "script");
		} else {
			var json = w.JSON || (w.Kg && Kg.JSON) || null;
			if (json) {
				getData(json.stringify({
					url: jsUrl
				}), function(res) {
					sendhijackedData(jsUrl, jsUrl2, res);
				});
			}
		}
	}

	//获取劫持资源
	function gethijackedResObj() {
		var srcArr = [],
			iframeArr = [],
			htypeArr = [];
		var hasChange = false;
		for (var i = 0; i < hijackedResObj.length; i++) {
			var res = hijackedResObj[i];
			srcArr.push(res.src);
			if (res.htype != 0) {
				htypeArr.push(res.htype);
			}
			if (res.type == 'iframe') {
				iframeArr.push(res.src);
			}
			if (res.htype == -2) {
				hasChange = true;
			}
		}
		return {
			iframe: iframeArr.join(','),
			src: srcArr.join(','),
			htype: htypeArr.join(',')[0] || "",
			hc : hasChange
		};
	}

	//发送上报
	function sendhijackedData(jsUrl, jsUrl2, jsContent,needPost) {
		getUserInfo(function(uid){
			var ver = 0;
			try {
				ver = external.GetVersion();
			} catch (ex) {}
			var resources = gethijackedResObj();
			var content = "";
			//抓不到变种的(-2) 
			//删除劫持内容失败的 上报内容
			//页面有iframe 且 上报resurls不为空 但是 ifameurl为空上报分析 抽样上报
			var ifr = (function() {
				var iframes = d.getElementsByTagName("iframe"),
					iframesArr = [];
				for (var i = 0; i < iframes.length; i++) {
					if (iframes[i].id != "jackedHiddenIframe" && iframes[i].id != "jackedHiddenIframe2") {
						iframesArr.push(iframes[i]);
					}
				}
				return iframesArr;
			})();
			if (resources.hc || hijackedRemoveObj.length > 0 || (ifr.length > 0 && resources.src != "" && resources.iframe == "" && parseInt(Math.random() * 10) == 8)) {
				content = hijackedInfo + (jsContent ? '\n<script id="hijacked">' + jsContent + '</script>' : '');
				content += (hijackedRemoveObj.length > 0 ? '\n<p id="hijackedRemove">' + hijackedRemoveObj.join("\n") + '</p>' : '');
			}
			//资源iframe都空，而且不是外框劫持，而且不是未知
			if (!resources.src && !resources.hc && !needPost) {
				hijackedResObj = null;
				return;
			}
			var url = (location.protocol == "https:" ? "https://statwww2.kugou.com/inject/i.php" : "http://stat.www2.kugou.com/inject/i.php");
			if(ver >= 7700){
				var json = w.JSON || (w.Kg && Kg.JSON) || null;
				if(json){
					var params = {
						url: url,
						param: json.stringify({
							pageurl: location.href,
							jsurl: jsUrl || "",
							jsurl2: jsUrl2 || "",
							ifameurl: resources.iframe,
							uid: uid,
							resurls: resources.src,
							resend: hijackedRemoved == true ? 1 : 0,
							htype: checkIfr() || resources.htype,
							content: escape(content),
							ispackage:window.isPackage?1:0,
							ver: ver,
							platform:"pc"
						})
					};
					postData(json.stringify(params), function() {});
					if(!callbackOP && !needPost){
						callbackOP = true;
						KgAntiHijack = w.KgAntiHijack || {'callback' : null};
						KgAntiHijack['callback'] && KgAntiHijack['callback'](true,{
							pageurl: location.href,
							jsurl: jsUrl || "",
							jsurl2: jsUrl2 || "",
							ifameurl: resources.iframe,
							uid: uid,
							resurls: resources.src
						});
					}
				}
			}else{
				getSysInfo(function(ver,platform) {
				var formHtml = [
					'<iframe  id="jackedHiddenIframe" name="jackedHiddenIframe" width=0 height=0 style="display:none" frameborder=0 src="about:blank"></iframe>',
					'<form id="hijacked" target="jackedHiddenIframe" action="'+url+'" name="hijacked_form" method="post" >',
					'<input type="hidden" name="pageurl" value="' + location.href + '">',
					'<input type="hidden" name="jsurl" value="' + (jsUrl || "") + '">',
					'<input type="hidden" name="jsurl2" value="' + (jsUrl2 || "") + '">',
					'<input type="hidden" name="ifameurl" value="' + resources.iframe + '">',
					'<input type="hidden" name="uid" value="' + uid + '">',
					'<input type="hidden" name="resurls" value="' + resources.src + '">',
					'<input type="hidden" name="htype" value="' + (checkIfr() || resources.htype) + '">',
					'<input type="hidden" name="resend" value="' + (hijackedRemoved == true ? 1 : 0) + '">',
					'<textarea name="content">' + escape(content) + '</textarea>',
					'<input type="hidden" name="ispackage" value="' + (window.isPackage ? 1 : 0) + '">',
						'<input type="hidden" name="ver" value="' + (ver || 0) + '">',
						'<input type="hidden" name="platform" value="' + (platform || "") + '">',
					'</form>'
				].join('');
				var hijackedDiv = document.createElement("div");
					hijackedDiv.style.display = "none";
					hijackedDiv.innerHTML = formHtml;
				if(document.getElementsByTagName("body")[0].appendChild(hijackedDiv)){
					hijacked_form.submit();
					if (!callbackOP && !needPost) {
						callbackOP = true;
							KgAntiHijack = w.KgAntiHijack || {
								'callback': null
							};
						KgAntiHijack['callback'] && KgAntiHijack['callback'](true,{
							pageurl: location.href,
							jsurl: jsUrl || "",
							jsurl2: jsUrl2 || "",
							ifameurl: resources.iframe,
							uid: uid,
							resurls: resources.src
						});
					}
				}
				})
			}
			hijackedResObj = null;
		});
	}
	function notReport() {
		checkIfr(function(){
			sendhijackedData("", "", "", true);
		});
		if (!callbackOP) {
			callbackOP = true;
			KgAntiHijack = w.KgAntiHijack || {
				'callback': null
			};
			KgAntiHijack['callback'] && KgAntiHijack['callback'](false);
		}
	}
})(document,window);