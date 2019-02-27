@extends('layout.home')
	<script type="text/javascript" src="/home/js/lib.js"></script>
	<script src="/home/js/kguser_min.js"></script>
	<link rel="stylesheet" type="text/css" href="/home/css/special.css">
@section('content')
	<div class="navWrap">
        <div class="nav">
            <ul class="homeNav">
                <li><a class="normal" href="/">首页</a></li>
                <li><a class="normal"  href="/home/paihang">榜单</a></li>
                <li><a class="normal active"  href="/home/list">歌手</a></li>
                <li><a class="normal"  href="/home/music">音乐</a></li>
                <li><a class="normal"  href="/home/specialshow">歌单</a></li>
                <li><a class="normal"  href="/home/personal">我的音乐</a></li>
            </ul>
        </div>
    </div>
	<div class="wrap sng clear_fix">
		<div class="l">
			<ul class="sng1">
				<li class="all"><a title="大陆歌手"  data='0' class='cat-flag' href="#" >大陆歌手</a></li>
			</ul>
			<ul class="sng2">
				<li><a title="港台歌手" class="cat-flag" data='1' href="#">港台歌手</a></li>
			</ul>
			<ul class="sng3">
				<li><a title="日韩歌手" class="cat-flag" data='2' href="#" >日韩歌手</a></li>
			</ul>
			<ul class="sng4"> 
					<li><a title="欧美歌手" class="cat-flag" data='3' href="#">欧美歌手</a></li>	
			</ul>
		</div>
		<div class="r" id="r">	
			<div style="display: none" >{{$i=0}} </div>
			@foreach($res as $k=>$v)
			<ul id="list_head" class="clear_fix" style="float: left;">
				<li class=''>
					<a title="{{$v->sname}}" class='pic' onclick='sdnClick(12070)' hidefocus='true' href='/home/list/listsinger/{{$v->sid}}'>
						<img alt="{{$v->sname}}" src="{{$v->photo}}" width='68' height='68' />
							<i>@if($i>=0) {{$i+=1}} @endif</i>
					</a>
					<strong><a onclick='sdnClick(12070)' href='/home/list/listsinger/{{$v->sid}}' title='{{$v->sname}}'>{{$v->sname}}</a></strong>
				</li>
			</ul>
			@endforeach							
			<div class="clear"></div>
		</div>
	</div>
			
	<script type="text/javascript">
	    $('.cat-flag').mouseover(function(){
	        var a = $(this).attr('data');
	        $.get("/home/list/list_zone",{szone:a},function(data){
	            $("#r").html('');
	            // 1. 循环遍历ajax放回的数组
	            var a = 1;
	            for (var i = 0; i < data.length; i++) {
	                setSingerHtml(data[i],a);
	            	a +=1 ;
	            }
	        });
	    });
	    // 设置html
	    function setSingerHtml(data,a) {
	        // var str = addClass ? "cptMid": 'cptSmall';
	        var music = `<ul id="list_head" class="clear_fix" style="float: left;">
							<li class=''>
								<a title="${data.sname}" class='pic' onclick='sdnClick(12070)' hidefocus='true' href='/home/list/listsinger/${data.sid}'>
									<img alt="${data.sname}" src="${data.photo}" width='68' height='68' />
										<i>${a}</i>
								</a>
								<strong><a onclick='sdnClick(12070)' href='/home/list/listsinger/${data.sid}' title='${data.sname}'>${data.sname}</a></strong>
							</li>
						</ul>`;
	        $(music).appendTo($("#r"));
	    }
    </script>

@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>

@stop
