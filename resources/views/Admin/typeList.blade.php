@extends('layouts.admin')

@section('title','文章列表')

@section('content')
        <!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin/index')}}">栏目管理</a></li>
                    <li><i class="fa fa-table"></i>栏目列表</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="navbar-form">
                        <a class="btn btn-info"  onclick="alert_confirm('{{url("admin/type/editType")}}','新增栏目')">
                            新增栏目
                        </a>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th><i class="icon_clipboard"></i> 序号</th>
                            <th><i class="icon_printer"></i> 名称</th>
                            <th><i class="icon_printer"></i> 状态</th>
                            <th><i class="icon_cogs"></i> 操作</th>
                            <th><i class="icon_printer"></i> 排序</th>

                        </tr>
                        @foreach ( $lists as $list)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$list->name}}</td>
                                <td>
                                    @switch($list->status)
                                    @case(0)<a href="{{url('admin/type/list/'.$list->id.'/1')}}">禁用</a>@break
                                    @case(1)<a href="{{url('admin/type/list/'.$list->id.'/0')}}">已发布</a>@break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="btn-group" id="tag{{$list->id}}">
                                        <a class="btn btn-success" onclick="alert_confirm('{{url("admin/type/editType")}}','新增{{$list->name}}子项','','',{{$list->id}})"><i class="icon_folder-add_alt"></i></a>
                                        <a class="btn btn-primary" onclick="alert_confirm('{{url("admin/type/editType")}}','修改{{$list->name}}','{{$list->name}}',{{$list->id}})"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn btn-danger"  onclick="alert_confirm('{{url("admin/type/editType")}}','删除{{$list->name}}','{{$list->name}}',{{$list->id}},'','1')"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                                <td>{{$list->sort}}</td>
                            </tr>

                            @unless(!$list->childs)
                                @foreach( $list->childs as $child )
                                    <tr>
                                        <td></td>
                                        <td> |--{{$child->name}}</td>
                                        <td>
                                            @switch($child->status)
                                            @case(0)<a href="{{url('admin/type/list/'.$child->id.'/1')}}">禁用</a>@break
                                            @case(1)<a href="{{url('admin/type/list/'.$child->id.'/0')}}">已发布</a>@break
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" onclick="alert_confirm('{{url("admin/type/editType")}}','修改{{$child->name}}','{{$child->name}}',{{$child->id}})"><i class="icon_pencil-edit"></i></a>
                                                <a class="btn btn-danger" onclick="alert_confirm('{{url("admin/type/editType")}}','删除{{$child->name}}','{{$child->name}}',{{$child->id}},'','1')"><i class="icon_trash"></i></a>
                                            </div>
                                        </td>
                                        <td>{{$child->sort}}</td>
                                    </tr>
                                @endforeach
                            @endunless
                        @endforeach

                        </tbody>
                    </table>

                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
@include("layouts.myConfirm")
@endsection

@section('script')
    <script>
    if("{{session('urlTag')}}")window.location.href="#tag{{session('urlTag')}}";
    </script>
@endsection
