@extends('layouts.admin')
@section('title','网站配置')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.html">系统管理</a></li>
                    <li><i class="fa fa-desktop"></i>网站设置</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!--tab nav start-->
                <section class="panel">
                    <header class="panel-heading tab-bg-primary">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#site">
                                <i class="icon-user"></i>
                                站点设置
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#add">
                                <i class="icon-envelope"></i>
                                添加新变量
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="site" class="tab-pane active">
                                <form class="form-horizontal " method="post" url="{{url('admin/config/save')}}" action="javascript:void(0)" id="save_config">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <section class="panel">
                                                <table class="table table-striped table-advance table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th class="col-lg-2"><i class="icon_clipboard"></i> 参数说明</th>
                                                            <th class="col-lg-8"><i class="icon_printer"></i> 参数值</th>
                                                            <th class="col-lg-2"><i class="icon_printer"></i> 变量名</th>
                                                        </tr>
                                                        @foreach ( $config as $config)
                                                        <tr>
                                                            <td>{{$config->title}}</td>
                                                            <td>
                                                                @switch($config->type)
                                                                @case('i')<input type="text" class="form-control round-input" name="{{$config->id}}" id="{{$config->name}}" value="{{$config->value}}" />@break
                                                                @case('t')<textarea class="form-control ckeditor" name="{{$config->id}}" id="{{$config->name}}" rows="3">{{$config->value}}</textarea>
                                                                @break
                                                                @case('r')
                                                                <select class="form-control  m-bot15" name="{{$config->id}}" id="{{$config->name}}">
                                                                    @foreach(explode(',',$config->extra) as $extra )
                                                                    <option value="{{explode(':',$extra)[0]}}" @if( $config->value == explode(':',$extra)[0] ) selected @endif>
                                                                        {{explode(':',$extra)[1]}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @break
                                                                @endswitch
                                                                <span class="help-block">注:{{$config->remark}}</span>
                                                            </td>
                                                            <td>{{$config->name}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </section>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="add" class="tab-pane ">
                                <div class="col-lg-12" style="padding-top:30px;">
                                <section class="panel">
                                <form class="form-horizontal " method="post" url="{{url('admin/config/save')}}" action="javascript:void(0)" id="add_config">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">配置名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-input" name="name" value="">
                                        <span class="help-block">注:(WEB_SITE)</span>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-1 control-label">配置类型</label>
                                    <div class="col-sm-10">
                                        <select class="form-control  m-bot15" name="type" >
                                             <option value="i">短文本</option>                      
                                             <option value="t">长文本</option>                      
                                             <option value="r">单选</option>                      
                                             <option value="c">多选</option>                      
                                         </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-1 control-label">配置说明</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control round-input" name="title" value="">
                                        <span class="help-block">注:(网站描述)</span>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-1 control-label">配置分组</label>
                                    <div class="col-sm-10">
                                       <select class="form-control  m-bot15" name="group" >
                                             <option value="1">基本设置</option>                      
                                             <option value="2">会员设置</option>                      
                                             <option value="3">评论设置</option>                      
                                         </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">配置值</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control ckeditor" name="extra"  rows="3"></textarea>
                                        <span class="help-block">注:(0:关闭注册,1:允许注册)</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">配置备注</label>
                                    <div class="col-sm-10">
                                        <input type="test" class="form-control round-input" name="remark" value="">
                                        <span class="help-block">注:(注释)</span>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-1 control-label">显示</label>
                                    <div class="col-sm-10">
                                        <input type="test" class="form-control round-input" name="value" value="">
                                        <span class="help-block">注:(配置值的选项 或者 文本信息neffy)</span>
                                    </div>
                                </div>
                                </form>
                                </section>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" onclick="save_config()">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--tab nav start-->
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection
@section('script')
<script>
function save_config(){
            var url = $('div .active').find('form').attr('url');
            var id = $('div .active').find('form').attr('id');
            $.ajax({
                type:'POST',
                url:url,
                data:$('#'+id).serialize(),
                success:function(data){
                top_alert('1',data);
                window.location.reload();
            
            },
            error:function(data){
                var json = JSON.parse(data.responseText);
                $.each(json.errors,function(inx,msg){
                top_alert('',msg);
                });
            },
            dataType:'json',
            });
        }
</script>
@endsection