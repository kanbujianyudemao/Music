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

    	<form action="/admin/music/{{$res->mid}}" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">歌曲名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='mname' value='{{$res->mname}}'>
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">歌曲时长</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='times' value='{{$res->times}}'>
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">歌手名称</label>
    				<div class="mws-form-item">
    				    <input type="text" class="small" name='sname' value="{{$res->sname}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">专辑名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='aname' value="{{$res->aname}}">
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">曲风</label>
                    <div class="mws-form-item">
                        <select name="styles">
                            <option value="0"  @if($res->styles== 0) checked="checked" @endif>电子</option>
                            <option value="1"  @if($res->styles== 1) checked="checked" @endif>流行</option>
                            <option value="2"  @if($res->styles== 2) checked="checked" @endif>古典</option>
                            <option value="3"  @if($res->styles== 3) checked="checked" @endif>华语</option>
                            <option value="4"  @if($res->styles== 4) checked="checked" @endif>轻音乐</option>
                            <option value="5"  @if($res->styles== 5) checked="checked" @endif>影视原声</option>
                            <option value="6"  @if($res->styles== 6) checked="checked" @endif>摇滚</option>
                            <option value="6"  @if($res->styles== 7) checked="checked" @endif>治愈</option>
                        </select> 
                    </div>
        			<div class="mws-form-row">
                        <label class="mws-form-label">歌曲图片</label>
                        <div class="mws-form-item">
                            <img src="{{$res->photp}}" alt="" width='100px'>
                            <div style="position: relative;" class="fileinput-holder"><input type="file" name='photp' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;" ></div>
                        </div>
                    </div>
                    <div class="mws-form-row">    
                        <div class="mws-form-label">歌曲上传</div>
                        <div class="mws-form-item">               
                            <input id="" type="file" class="form-control" name="urll" >     
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">歌词添加</label>
                        <div class="mws-form-item">
                            <input  type="file" class="form-control" name="lrc" value="{{$res->lrc}}" >
                        </div>
                    </div>
        		</div>
        		<div class="mws-button-row">
        			{{csrf_field()}}
                    {{method_field('PUT')}}
        			<input type="submit" class="btn btn-primary" value="修改">
        		</div>
    	</form>
    </div>    	
</div>
@stop

@section('js')
<script >
    var ue = UE.getEditor('editor');
    $('.mws-form-message').delay(3000).fadeOut(2000);
    //删除图片
    $('.photp').click(function(){
        var gid = $(this).attr('mid');
        var imgs = $(this);
        $.get('/admin/music/'+gid,{},function(data){
            if(data == '1'){
                imgs.remove();
            }
        })
    })
    //删除歌曲
    $('.urll').click(function(){
        var gid = $(this).attr('mid');
        var urls = $(this);
        $.get('/admin/music/'+gid,{},function(data){
            if(data == '1'){
                urls.remove();
            }
        })
    })
</script>

@stop
