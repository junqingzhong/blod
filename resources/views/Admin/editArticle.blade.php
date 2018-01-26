@extends('layouts.admin')
@section('title','修改文章信息')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin/list')}}">文章列表</a></li>
                    <li><i class="icon_document_alt"></i>修改文章</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        内容
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal " method="post" action="{{url('admin/saveArticle?id='.request()->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group ">
                                <label class="col-sm-2 control-label">文章类型</label>
                                <div class="col-lg-10">
                                    <select class="form-control  m-bot15" name="type_id">
                                    @foreach ($type as $type)
                                    <option value="{{$type->id}}" @if ($article->type_id == $type->id ) selected @endif >{{$type->name}}</option>
                                     @unless(!$type->childs)
                                            @foreach($type->childs as $child)
                                            <option value="{{$child->id}}" @if ($article->type_id == $child->id ) selected @endif >&nbsp;&nbsp;&nbsp;&nbsp;|--{{$child->name}}</option>
                                            @endforeach
                                        @endunless
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" name="title" value="{{ $article->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                 <!-- uploadify -->
                                <script type="text/javascript" charset="utf-8" src="{{asset('admin/assets/uploadify-3.2.1/jquery.uploadify.min.js?v=11')}}"></script>

                                <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/uploadify-3.2.1/uploadify.css?v=11')}}">
                                <label class="col-sm-2 control-label">题图</label>
                                <div class="col-sm-10">
                                    <input type="file" id="upload_img" class="exampleInputFile "  multiple="true">
                                    <input type="hidden" name="img_path" id="img_path" />
                                    <img @unless(!$article->img_path) src="{{$article->img_path}}" @endunless width="120" id="miniImg" />
                                    
                                    <p class="help-block">2M内</p>
                                </div>
                                <script type="text/javascript">
                                //上传图片
                                /* 初始化上传插件 */
                                    $("#upload_img").uploadify({
                                        'formData'     : {
                                            'session_id' : '{{ session()->getId()}}',
                                            '_token' : '{{ csrf_token()}}',
                                        },
                                        "height"          : 30,
                                        "swf"             : "{{asset('admin/assets/uploadify-3.2.1/uploadify.swf')}}",
                                        "fileObjName"     : "upImg",
                                        "buttonText"      : "上传图片",
                                        "uploader"        : "{{URL('admin/articleImg')}}",
                                        "width"           : 120,
                                        'removeTimeout'   : 1,
                                        'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                                        "onUploadSuccess" : function(file,data,respone){
                                            var data  = $.parseJSON(data);
                                            if(data['state']=='SUCCESS'){
                                                $("#img_path").val('{{config("app.url")}}'+data['url']);
                                                $("#miniImg").attr('src',data['url']);
                                            } else {
                                               top_alert('',data);
                                            }
                                        },
                                        'onFallback' : function() {
                                            top_alert('','未检测到兼容版本的Flash.');
                                        }
                                    });

                              
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">描述</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="description" rows="3">{{$article->description}}</textarea>
                                    <span class="help-block">200字内</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容</label>
                                <div class="col-sm-10">
                                    <!-- ueditor -->
                                    <script type="text/javascript" charset="utf-8" src="{{asset('admin/assets/ueditor-1.4.3/ueditor.config.js')}}"></script>

                                    <script type="text/javascript" charset="utf-8" src="{{asset('admin/assets/ueditor-1.4.3/ueditor.all.min.js')}}"> </script>

                                    <script type="text/javascript" charset="utf-8" src="{{asset('admin/assets/ueditor-1.4.3/lang/zh-cn/zh-cn.js')}}"></script>
                                    
                                    <textarea name="content" id="content" style="height:300px;">{{$article->content}}</textarea>

                                    <script type="text/javascript">var ue = UE.getEditor('content');
                                    ue.ready(function(){
                                        //因为Laravel有防csrf防伪造攻击的处理所以加上此行
                                        ue.execCommand('serverparam','_token','{{ csrf_token() }}');
                                    });
                                    </script>
                                    <!-- ueditor -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">标签tag</label>
                                <div class="col-sm-10">
                                    <input name="tags" id="tagsinput" class="tagsinput " value="{{$article->tags}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">保存</button>
                                    <a class="btn btn-default" href="{{url('admin/editArticle')}}">清除全部</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
@endsection
@section('script')
<!--custom tagsinput-->
<script src="{{asset('admin/js/jquery.tagsinput.js')}}"></script>
<!-- custom form component script for this page-->
<script src="{{asset('admin/js/form-component.js')}}"></script>
@endsection