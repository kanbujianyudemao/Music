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
            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            	<form action="/admin/rooter" method='get'>
                    <div id="DataTables_Table_1_length" class="dataTables_length">
                        <label>
                            显示
                            <select name="num" size="1" aria-controls="DataTables_Table_1">
                                <option value="5" selected="selected">
                                    5
                                </option>
                                <option value="10">
                                    10
                                </option>
                                <option value="15">
                                    15
                                </option>
                               
                            </select>
                            条数据
                        </label>
                    </div>
                    <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        <label>
                            管理员用户名:
                            <input type="text" name='rname' aria-controls="DataTables_Table_1">
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
                                管理员用户名
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 50px;" aria-label="Browser: activate to sort column ascending">
                                管理员账号
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                                邮箱
                            </th>
                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                                头像
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                            rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">
                                操作
                            </th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
    					@foreach($rs as $k => $v)
                        <tr class="@if($k % 2 == 0)odd @else even @endif">
                            <td class="">
                                {{$v->rid}}
                            </td>
                            <td class="">
                                {{$v->rname}}
                            </td>
                            <td class=" ">
                                {{$v->username}}
                            </td>
                            
                            
                            <td class=" ">
                                {{$v->email}}
                            </td>
                            <td class=" " style="text-align:center">
                                <img src="{{$v->photo}}" style="max-width: 100px;max-height: 100px" alt="">
                            </td>
                            <td class=" ">
                                <form action="/admin/rooter/{{$v->rid}}" method='post' style='display:inline'>
                                    <a class='btn btn-primary' href="/admin/user_role/{{$v->rid}}">角色</a>
                                    <a class='btn btn-primary' href="/admin/rooter/{{$v->rid}}/edit">修改</a>
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
                    每页显示 {{$request->num}}条数据
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
    				{{$rs->appends($request->all())->links()}}
                </div>
            </div>
        </div>
    </div>
@stop