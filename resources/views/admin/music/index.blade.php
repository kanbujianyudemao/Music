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
            <i class="icon-table"></i>
            {{$title}}
        </span>
    </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <form action='/admin/music' method='get'>
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>
                            歌曲名:
                            <input aria-controls="DataTables_Table_1"  name='mname' type="text">
                        </label>
                        <button class='btn btn-info'>搜索</button>
                    </div>
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
                aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width:50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                歌曲id
                            </th>
                             <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width:50px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                歌曲名
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="Browser: activate to sort column ascending">
                                歌手
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="Platform(s): activate to sort column ascending">
                                专辑名称
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 58px;" aria-label="CSS grade: activate to sort column ascending">
                                曲风
                           
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 58px;" aria-label="CSS grade: activate to sort column ascending">
                                歌曲时长
                            </th>
                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                               歌曲图片
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                               歌曲地址
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
                                {{$v->mid}}
                            </td>
                            <td class=" ">
                                {{$v->mname}}
                            </td>
                            <td class=" ">
                                {{$v->sname}}
                            </td>
                            <td class=" ">
                                {{$v->aname}}
                            </td>
                            <td class=" ">
                                @if($v -> styles ==0 ) 电子
                                @elseif($v->styles ==1) 流行
                                @elseif($v->styles ==2) 古典
                                @elseif($v->styles ==3) 华语
                                @elseif($v->styles ==4) 轻音乐
                                @elseif($v->styles ==5) 影视原声
                                @elseif($v->styles ==6) 摇滚
                                @elseif($v->styles ==7) 治愈
                                @endif
                            </td>
                            <td>
                                {{$v->times}}
                            </td>
                            <td class=" ">
                               <img src="{{$v->photp}}" style="max-height: 100px;max-width: 100px;">
                            </td>
                             <td class=" " >
                                <div style="width: 180px;overflow: hidden;text-overflow: ellipsis;">
                                {{$v->urll}}
                                </div>
                            </td>
                            <td class=" ">
                                <a class='btn btn-primary' href="/admin/music/{{$v->mid}}/edit">修改</a>
                                
                                <form action='/admin/music/{{$v->mid}}' method='post'>
                                    
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
                    每页显示 {{$request->num}} 条数据
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