@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        @if (count($errors) > 0)
        <div class="mws-form-message error">
            错误信息
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif @if(session('success'))
        <div class="mws-form-message info">
            {{session('success')}}
        </div>
        @endif
        <form class="mws-form" id="art_form" action="/admin/album/{{$rs->aid}}" method="post"
        enctype="multipart/form-data">
            <div class="mws-form-block">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        专辑名
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="aname" value="{{$rs->aname}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        歌手名
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="sname" value="{{$rs->sname}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        发布时间
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="times" value="{{$rs->times}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        发行公司
                    </label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="company" value="{{$rs->company}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        图片
                    </label>
                    <div class="mws-form-item">
                        <div class="mws-form-item">
                            <img id="img1" style="width: 120px" src="{{$rs->photo}}">
                        </div>
                        <div class="fileinput-holder" style="position: relative;">
                            <span>
                                <input type="file" id="file_upload" name="photo" style=" position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="mws-button-row">
    <!-- {{csrf_field()}} -->
    <input type="submit" value="修改" class="btn btn-primary">
</div>

{{csrf_field()}} {{ method_field('PUT') }}
</form>
</div>
</div>
@stop

@section('js')



<script type="text/javascript">
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    $(function () {
        $("#file_upload").change(function () {
            uploadImage();
        })
    })

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
        $.ajax({
            type: "POST",
            url: "/admin/upload",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
               
               console.log(data);
                $('#img1').attr('src',data);
                $('#art_thumb').val(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

</script>


	<script type="text/javascript">
          // alert($);
		setTimeout(function(){
			$('.mws-form-message').slideUp(2000);
		},3000)
	</script>
@stop