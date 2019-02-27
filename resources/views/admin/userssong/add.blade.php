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
    	<form action="/admin/userssong" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">歌手名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='sname'>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">性别</label>
    				<div class="mws-form-item">
    				<input name="sex" type="radio" value="1" checked="checked"/>男      
					<input name="sex" type="radio" value="0" />女
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">地区</label>
    				<div class="mws-form-item">
                        <input name="szone" type="radio" value="0" checked="checked"/>中国大陆      
                        <input name="szone" type="radio" value="1" />港台
                        <input name="szone" type="radio" value="2" />日韩
                        <input name="szone" type="radio" value="3" />欧美
                        <input name="szone" type="radio" value="4" />其他
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">简介</label>
    				<div class="mws-form-item">
    					<textarea rows="3" cols="20" class="small" name="cv"></textarea>
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
    	</form>
    </div>    	
</div>
@stop
@section('js')
    <script>
    	$('.mws-form-message').delay(3000).fadeOut(2000);
    </script>
@stop
