@extends('layout.admins')

@section('title',$title)

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
                              @if(session('success'))
                                   <div class="mws-form-message info">
                                        {{session('success')}}
                                   </div>
                              @endif
                    	<form class="mws-form" action="/admin/album" method="post" enctype="multipart/form-data">
                    		<div class="mws-form-block">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">专辑名</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="aname">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">歌手名</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="sname">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">发布时间</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="times">
                    				</div>
                    			</div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">发行公司</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="company">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                                    	<label class="mws-form-label">图片</label>
                                    	<div class="mws-form-item">
                                        	<div class="fileinput-holder" style="position: relative;"><input type="file" name="photo" style=" position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></span></div>
                                        </div>
                                    </div>
                    			
                    			</div>
                    			
                    		</div>
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input type="submit" value="添加" class="btn btn-primary">
                    			
                    		</div>
                    	</form>
                    </div>
                </div>
@stop

@section('js')
	<script type="text/javascript">
		setTimeout(function(){
			$('.mws-form-message').slideUp(2000);
		},3000)
	</script>
@stop