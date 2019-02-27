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
    	<form action="/admin/rooter/{{$rs->rid}}" id='art_form' method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='rname' value="{{$rs->rname}}">
    				</div>
    			</div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">账号</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='username' value="{{$rs->username}}">
                        </div>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">邮箱</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name='email' value="{{$rs->email}}">
        				</div>
        			</div>
        			<div class="mws-form-row">
                    	<label class="mws-form-label">头像</label>
                    	<div class="mws-form-item">
                            <img src=" {{$rs->photo}}" id='img1' style="max-width: 150px;max-height: 150px;">
                        	<div style="position: relative;" class="fileinput-holder"><input type="file" id='file_upload' name='photo' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;"></div>

                        </div>
                    </div>
    		    </div>
        		<div class="mws-button-row">
        			{{csrf_field()}}
                    {{method_field('PUT')}}
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

    // CSRF 验证
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     // 监听文件改变
    $("#file_upload").change(function () {
        uploadImage();

    });
     // 上传文件
    function uploadImage() {
        //  判断是否有选择上传文件
        var imgPath = $("#file_upload").val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData(document.getElementById('art_form'));
        // console.log(formData);
        $.ajax({
            type: "post",
            url: "/admin/photo",
            data: formData,
            contentType: false,
            processData: false,
            // console.log(formdata);
            success: function(data) {

                // console.log(data);
               $('#img1').attr('src',data);
                $('#art_thumb').val(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
                // console.log(XMLHttpRequest);
            }
        });
    }
</script>

@stop
