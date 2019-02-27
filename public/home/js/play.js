function playsong(songId,songName,mp3,lrcurl,musician,musiciancover,duration,musicianId,discId){
	this.songId = songId;
	this.songName = songName;
	this.mp3 = mp3;
	this.lrcurl = lrcurl;
	this.musician = musician;
	this.musiciancover = musiciancover;
	this.timeduration = duration;
	this.musicianId = musicianId;
	this.discId = discId;
}
function formatSong(songlist){
	var listarray = new Array();
	$.each(songlist,function(index,value){
		var ps = new playsong(this.id,this.songName,this.songUrl,this.lyricUrl,this.musician,this.discCoverUrl,this.duration,this.musicianId,this.discId);
		listarray.push(ps);
	});
	return eval("("+JSON.stringify(listarray)+")");
}
function resize(){
	var winw = $(window).width(),winh = $(window).height(),min_winh =winh*0.6, min_winh1 =winh*0.15;
    $('.operation').css({height:min_winh1})
    if(winw<1200){
        winw =1200
        $('.bg_class, .music_bg, .boxxx').css({width:winw,minHeight:winh})
    }else{
        $('.bg_class, .music_bg, .boxxx').css({width:winw,minHeight:winh})
    }
    if(winh<800){
        $('.swiper-container1').css({height:'170px'})
    }
}
$(function(){
	  swiperbanner();
	  $(window).resize(function() {
		 resize();
	  });
	  swiperlrcbanner();
	  resize();
}) 
function swiperlrcbanner(){
	$(".lrc_list").mCustomScrollbar({
		theme:"minimal",
		scrollInertia:5,
		mouseWheelPixels:100
    });
}
var listswiper = null;
function swiperbanner(){
	$(".music_list").mCustomScrollbar({
		theme:"minimal"
    });
}
function transformTt(values){
	$(".music_list").mCustomScrollbar("scrollTo","#"+values);
}
$(function(){
	$("#progreeBar").slider({
		animate: false , //代表在点击滑动条时滑动块的移动是否有动画效果；
		max:100,         //取值的最大和最小范围；
		min:0,
		range:false,      //是否显示范围区间，如果为false，则显示如下效果：
		orientation: 'auto', //水平还是垂直显示 'horizontal' 或 'vertical'.
		slide:function(event, ui) {
			$("#jquery_jplayer_2").jPlayer("playHead",ui.value);  //改变MP3播放位置
		 }
	});
	$("#soundBar").slider({
		animate: false , //代表在点击滑动条时滑动块的移动是否有动画效果；
		max:100,         //取值的最大和最小范围；
		min:0,
		range:false,      //是否显示范围区间，如果为false，则显示如下效果：
		value:80,
		orientation: 'auto', //水平还是垂直显示 'horizontal' 或 'vertical'.
		slide:function(event, ui) {
			$("#jquery_jplayer_2").jPlayer("volume",ui.value/100); //改变播放声音大小
		 }
	});
	
});