(function () {
  $.MsgBox = {
    Confirm: function (callback) {
      GenerateHtml();
      btnOk(callback);
      btnNo();
    }
  }
 var   GenerateHtml = function(){
	 $(".open").show();
}
  //确定按钮事件
  var btnOk = function (callback) {
    $(".ok").unbind("click").click(function () {
      if (typeof (callback) == 'function') {
        callback();
      }
    });
  }
 
  //取消按钮事件
  var btnNo = function () {
    $(".close,.cance").unbind("click").click(function () {
      $(".open").hide();
    });
  }
})();