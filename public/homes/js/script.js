// user
var user_Boolean = false;
var password_Boolean = false;
var varconfirm_Boolean = false;
var emaile_Boolean = false;
$('#t01Unm').blur(function(){
  if ((/^[a-z0-9_-]{4,8}$/).test($("#t01Unm").val())){
    $('.user_hint').html("✔").css("color","green");
    user_Boolean = true;
  }else {
    $('.user_hint').html("×").css("color","red");
    user_Boolean = false;
  }
});

// uname
$('#t01Unm2').blur(function(){
  if ((/^[a-z0-9_-]{4,8}$/).test($("#t01Unm2").val())){
    $('.unm_hint').html("✔").css("color","green");
    user_Boolean = true;
  }else {
    $('.unm_hint').html("×").css("color","red");
    user_Boolean = false;
  }
// password
$('#t01Psw').blur(function(){
  if ((/^[a-z0-9_-]{6,16}$/).test($("#t01Psw").val())){
    $('.password_hint').html("✔").css("color","green");
    password_Boolean = true;
  }else {
    $('.password_hint').html("×").css("color","red");
    password_Boolean = false;
  }
});


// password_confirm
$('#t01Psw2').blur(function(){
  if (($(".reg_password").val())==($("#t01Psw2").val())){
    $('.confirm_hint').html("✔").css("color","green");
    varconfirm_Boolean = true;
  }else {
    $('.confirm_hint').html("×").css("color","red");
    varconfirm_Boolean = false;
  }
});


// Email
$('#t01Email').blur(function(){
  if ((/^[a-z\d]+(\.[a-z\d]+)*@([\da-z](-[\da-z])?)+(\.{1,2}[a-z]+)+$/).test($("#t01Email").val())){
    $('.email_hint').html("✔").css("color","green");
    emaile_Boolean = true;
  }else {
    $('.email_hint').html("×").css("color","red");
    emaile_Boolean = false;
  }
});


// Mobile



// click
$('#red_button').click(function(){
  if(user_Boolean && password_Boolea && varconfirm_Boolean && emaile_Boolean && Mobile_Boolean == true){
    alert("注册成功");
  }else {
    alert("请完善信息");
  }
});
