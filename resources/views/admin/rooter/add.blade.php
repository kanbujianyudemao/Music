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
    	<form action="/admin/rooter" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='rname'>
    				</div>
    			</div>

                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">账号</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='username'>
                        </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">密码</label>
        				<div class="mws-form-item">
        					<input type="password" class="small" name='password'>
        				</div>
        			</div>
        			<div class="mws-form-row">
                        <label class="mws-form-label">确认密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name='repass'>
                        </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='email'>
        				</div>
        			</div>
        			<div class="mws-form-row">
                    	<label class="mws-form-label">头像</label>
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
