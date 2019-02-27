@extends('layout.admins')

@section('title',$title)

@section('content')
    @if(session('success'))
        <div class="mws-form-message info">
            {{session('success')}}                 
        </div>
    @endif
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>
                <i class="icon-table">
                </i>
                {{$title}}
            </span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <form action='/admin/userssong' method='get'>
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>
                            歌手姓名:
                            <input aria-controls="DataTables_Table_1"  name='sname' type="text">
                        </label>
                        <button class='btn btn-info'>搜索</button>
                    </div>
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
                aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width:100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                歌手ID
                            </th>
                             <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width:100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                歌手名
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 100px;" aria-label="Browser: activate to sort column ascending">
                                性别
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 100px;" aria-label="Platform(s): activate to sort column ascending">
                                图片
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 118px;" aria-label="CSS grade: activate to sort column ascending">
                                地区
                            </th>
                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                               简介
                            </th>
                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                               操作
                            </th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($rs as $k=>$v)
                        <tr class="if($k % 2 == 0) :odd ?even">
                            <td class="  sorting_1">
                                {{$v->sid}}
                            </td>
                            <td class=" ">
                                {{$v->sname}}
                            </td>
                            <td class=" ">
                                @if($v->sex ==1) 男
                                @elseif($v->sex ==0) 女
                                @endif
                            </td>
                            <td class=" ">
                               <img src="{{$v->photo}}"> 
                            </td>
                             <td class=" ">
                                @if($v->szone ==0) 中国大陆
                                @elseif($v->szone ==1) 港台
                                @elseif($v->szone ==2) 日韩
                                @elseif($v->szone ==3) 欧美
                                @elseif($v->szone ==4) 其他
                                @endif
                            </td>
                             <td class=" ">
                                {{$v->cv}}
                            </td>
                            <td class=" ">
                                <a class='btn btn-primary' href="/admin/userssong/{{$v->sid}}/edit">修改</a>
                                
                                <form action='/admin/userssong/{{$v->sid}}' method='post'>
                                    
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button class='btn btn-danger'>删除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="dataTables_info" id="DataTables_Table_1_info">
                    Showing 1 to 10 of 57 entries
                </div>
                <style type="text/css">
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
                        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    }
                    .pagination li a{
                        color:#fff;
                    }
                    .pagination .active{
                        background-color: #c5d52b;
                        color: #323232;
                        border: none;
                        background-image: none;
                        box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    }
                    .pagination .disabled{
                        color:#666666;
                        cursor:default;
                    }
                    .pagination{
                        margin:0px;
                    }
                </style>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                    {{$rs->appends($request->all())->links()}}
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')

<script type="text/javascript">
    $('.mws-form-message').delay(1000).fadeOut(2000);
</script>

@stop