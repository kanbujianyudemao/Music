@extends('layout.admins')

@section('title',$title)

@section('content')

	@if(session('success'))  
            <div class="mws-form-message info">
                {{session('success')}}  

            </div>
            @endif
	<div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/album" method="get">
            <fieldset class="mws-form-inline">
                <div class="mws-form-row bordered">
                    <label class="mws-form-label">选择显示位置</label>
                    <div class="mws-form-item">
                        <select class="large" name="dingwei">
                            <option value="0">首页专辑显示位置 1</option>
                            <option value="1">首页专辑显示位置 2</option>
                            <option value="2">首页专辑显示位置 3</option>
                            <option value="3">首页专辑显示位置 4</option>
                            <option value="4">首页专辑显示位置 5</option>
                            <option value="5">首页专辑显示位置 6</option>
                            <option value="6">首页专辑显示位置 7</option>
                            <option value="7">首页专辑显示位置 8</option>
                            <option value="8">首页专辑显示位置 9</option>
                            <option value="9">首页专辑显示位置 10</option>
                        </select>
                        <input type="hidden" name="hidden" value="{{$id}}">
                    </div>
                </div>
            </fieldset>
            <div class="mws-button-row">
            	{{csrf_field()}}
                <input type="submit" value="Submit" class="btn btn-danger">
                <input type="reset" value="Reset" class="btn ">
            </div>
        </form>
    </div>
@stop

@section('js')
<script>
	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>

@stop