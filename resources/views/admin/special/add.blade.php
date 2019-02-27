@extends('layout.admins')

@section('title', $title)

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
		@if (count($errors) > 0)
		    <div class="mws-form-message error">
	        	错误信息
	            <ul>
	            	@foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
	            </ul>
	        </div>
		@endif
    	<form action="/admin/special" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">歌单名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='gdname'>
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">风格</label>
                    <div class="mws-form-item">
                        <input type="radio" name="styles" value="0" checked>电子
                        <input type="radio" name="styles" value="1" checked>流行
                        <input type="radio" name="styles" value="2">古典
                        <input type="radio" name="styles" value="3">华语
                        <input type="radio" name="styles" value="4">轻音乐
                        <input type="radio" name="styles" value="5">影视原声
                        <input type="radio" name="styles" value="6">摇滚
                        <input type="radio" name="styles" value="7">治愈
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标题</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='title'>
                        </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">制作人</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='zhizuo'>
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">简介</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='jianjie'>
        				</div>
        			</div>
        			<div class="mws-form-row">
                    	<label class="mws-form-label">图片</label>
                    	<div class="mws-form-item">
                        	<div style="position: relative;" class="fileinput-holder"><input type="file" name='photo' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></div>
                        </div>
                    </div>
    		    </div>
        		<div class="mws-button-row">
        			{{csrf_field()}}
        			<input type="submit" class="btn btn-primary" value="添加">
        		</div>
            </div>
    	</form>
    </div>    	
</div>
@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>
@stop
