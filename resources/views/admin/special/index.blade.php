@extends('layout.admins')

@section('title',$title)

@section('content')
<style type="text/css">
    .overflow-text{
        line-height: 30px!important;
        height: 30px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
	@if(session('success'))  
        <div class="mws-form-message info">
            {{session('success')}}  

        </div>
    @endif
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table"></i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
        	<form action="/admin/special" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length"></div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        歌单名:
                        <input type="text" name='gdname' aria-controls="DataTables_Table_1">
                    </label>
                    <button class='btn btn-info'>搜索</button>
                </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Platform(s): activate to sort column ascending">
                           歌单名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="Browser: activate to sort column ascending">
                            风格
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            标题
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Engine version: activate to sort column ascending">
                            制作人
                        </th>
                        <th class="sorting"  role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            简介
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="Engine version: activate to sort column ascending">
                            首页位置
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            图片
                        </th>
                        <!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
                        </th> -->
                        
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
					@foreach($rs as $k => $v)
                    <tr class="@if($k % 2 == 0)odd @else even @endif" >
                        <td class="">
                            {{$v->gdid}}
                        </td>
                        <td class="">
                            {{$v->gdname}}
                        </td>
                        <td class=" ">
                            @if($v->styles ==0) 电子
                            @elseif ($v->styles == 1) 流行
                            @elseif ($v->styles == 2) 古典
                            @elseif ($v->styles == 3) 华语
                            @elseif ($v->styles == 4) 轻音乐
                            @elseif ($v->styles == 5) 影视原声
                            @elseif ($v->styles == 6) 摇滚
                            @elseif ($v->styles == 7) 治愈
                            @endif
                        </td>
                        <td class=" ">
                            {{$v->title}}
                        </td>
                        <td class=" ">
                            {{$v->zhizuo}}
                        </td>
                        <td >
                            <div class="overflow-text">
                                {{$v->jianjie}}
                            </div>
                        </td>
                        <td class=" ">
                           @if($v->status ==0) 第一张
                            @elseif ($v->status == 1) 第二张
                            @elseif ($v->status == 2) 第三张
                            @elseif ($v->status == 3) 第四张
                            @elseif ($v->status == 4) 第五张
                            @endif
                        </td>
                        <td class=" " style="text-align: center">
                            <img src="{{$v->photo}}" style="max-height: 100px;max-width: 100px;" alt="">
                        </td>
                        <td class=" ">
                            <form action="/admin/special/{{$v->gdid}}" method='post' style='display:inline'>
                                <a class='btn btn-primary' href="/admin/special/{{$v->gdid}}/shezhi">设置</a>
                                <a class='btn btn-primary' href="/admin/special/{{$v->gdid}}/edit">修改</a>
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class='btn btn-danger'>删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                每页显示 5 条数据
            </div>
            <style>
                .pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;
                    color: #fff;
                    text-decoration: none;
                    border-right: 1px solid #232323;
                    border-left: 1px solid #666666;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);}

                    .pagination li a{
                         color: #fff;
                    }


                    .pagination .active{
                            background-color: #c5d52b;
                            color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    }

                    .pagination .disabled{
                        color: #666666;
                        cursor: default;
                    }

                    .pagination{
                        margin:0px;
                    }
            </style>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				{{$rs->links()}}
            </div>
        </div>
    </div>
</div>
@stop
