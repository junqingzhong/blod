@extends('layouts.admin')

@section('title','文章列表')

@section('content')
        <!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin/index')}}">系统管理</a></li>
                    <li><i class="fa fa-table"></i>用户列表</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="navbar-form">
                        <a class="btn btn-info"  onclick="user_confirm('{{url("admin/user/editUser")}}','新增用户','myAdd')">
                            新增用户
                        </a>
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th><i class="icon_clipboard"></i> 序号</th>
                            <th><i class="icon_printer"></i> 姓名</th>
                            <th><i class="icon_printer"></i> 头像</th>
                            <th><i class="icon_printer"></i> 性别</th>
                            <th><i class="icon_printer"></i> 电话/email</th>
                            <th><i class="icon_printer"></i> ip/登陆次数/最后时间</th>
                            <th><i class="icon_printer"></i> 状态</th>
                            <th><i class="icon_cogs"></i> 操作</th>
                        </tr>
                        @foreach ( $user as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td><img @unless(!$user->logo) src="{{$user->logo}}" @endunless  width="80" /></td>
                                <td>{{$user->sex}}</td>
                                <td>{{$user->phone}}/{{$user->email}}</td>
                                <td>{{long2ip($user->ip)}} / {{$user->login}} / {{date('Y-m-d',$user->logintime)}}</td>
                                <td>
                                    @switch($user->status)
                                    @case(0)<a href="{{url('admin/user/list/'.$user->id.'/1')}}">禁用</a>@break
                                    @case(1)<a href="{{url('admin/user/list/'.$user->id.'/0')}}">正常</a>@break
                                    @endswitch
                                </td>
                                <td>
                                    <div class="btn-group" id="tag{{$user->id}}">
                                        <a class="btn btn-success" onclick="alert_confirm('新增{{$user->name}}子项','','',{{$user->id}})" ><i class="arrow_move"></i></a>
                                        <a class="btn btn-primary" onclick="getUserMsg('{{$user->id}}')"><i class="icon_pencil-edit"></i></a>
                                        <a class="btn btn-danger"  href="{{url('admin/user/list/'.$user->id.'/-1')}}" onclick="if(confirm('是否删除!')){return true;}else{return false;}"><i class="icon_trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!-- Modal -->
<a class="hidden alert_confirm" data-toggle="modal" href="#myAdd"></a>
<div class="modal fade" id="myAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="opacity: 1">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tittle</h4>
            </div>
            <div class="modal-body">
               <form class="form-horizontal " method="post"  id="f_myAdd" action="javascript:void(0);">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-1 control-label">账号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" name="name" value="" request>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-1 control-label">密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control round-input" name="password" value="" request>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-1 control-label">性别</label>
                                <div class="col-lg-10">
                                    <select class="form-control  m-bot15" name="sex">
                                    <option value="保密" >保密</option>
                                    <option value="女" >女</option>
                                    <option value="男" >男</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">电话</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control round-input" name="phone" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                 <!-- uploadify -->
                                <script type="text/javascript" charset="utf-8" src="{{asset('admin/assets/uploadify-3.2.1/jquery.uploadify.min.js?v=11')}}"></script>

                                <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/uploadify-3.2.1/uploadify.css?v=11')}}">
                                <label class="col-sm-1 control-label">头像</label>
                                <div class="col-sm-10">
                                    <input type="file" id="upload_img" class="exampleInputFile "  multiple="true">
                                    <input type="hidden" name="logo" id="img_path" />
                                    <img  width="120" id="miniImg" />
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
                                <label class="col-sm-1 control-label">描述</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                                    <span class="help-block">200字内</span>
                                </div>
                            </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                <button class="btn btn-warning editType" type="submit"> 提交</button>
            </div>
        </form>
        </div>
    </div>
</div>


<div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="opacity: 1">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tittle</h4>
            </div>
            <div class="modal-body">
               <form class="form-horizontal " method="post"  id="f_myEdit" action="javascript:void(0);">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-1 control-label">账号</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" name="name" value="" request>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-sm-1 control-label">性别</label>
                                <div class="col-lg-10">
                                    <select class="form-control  m-bot15" name="sex">
                                    <option value="保密" >保密</option>
                                    <option value="女" >女</option>
                                    <option value="男" >男</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">电话</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control round-input" name="phone" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                 <!-- uploadify -->
                                <label class="col-sm-1 control-label">头像</label>
                                <div class="col-sm-10">
                                    <input type="file" id="upload_logo" class="exampleInputFile "  multiple="true">
                                    <input type="hidden" name="logo" id="logo_path" />
                                    <img  width="120" id="miniLogo" />
                                    <p class="help-block">2M内</p>
                                </div>
                                <script type="text/javascript">
                                //上传图片
                                /* 初始化上传插件 */
                                    $("#upload_logo").uploadify({
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
                                                $("#logo_path").val('{{config("app.url")}}'+data['url']);
                                                $("#miniLogo").attr('src',data['url']);
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
                                <label class="col-sm-1 control-label">描述</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                                    <span class="help-block">200字内</span>
                                </div>
                            </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value=""/>
                <button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>
                <button class="btn btn-warning editType" type="submit"> 提交</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- modal -->
@endsection

@section('script')
<script>

function getUserMsg(id){
      $.ajax({
                type:'POST',
                url:"{{url('admin/user/getUserMsg')}}",
                data:{id:id,'_token':"{{csrf_token()}}"},
                success:function(data){
                    var form = $('#myEdit');
                    form.find('input[name=name]').val(data.name);
                    form.find('select[name=sex]').val(data.sex);
                    form.find('input[name=phone]').val(data.phone);
                    form.find('input[name=logo]').val(data.logo);
                    form.find('#miniLogo').attr('src',data.logo);
                    form.find('input[name=id]').val(data.id);
                    form.find('textarea[name=description]').html(data.description);
                    user_confirm('{{url("admin/user/editUser")}}','修改'+data.name+'信息','myEdit');
               
               },
               dataType:'json',
             });
}
function user_confirm(url,title,action){
            $('.alert_confirm').attr('href','#'+action);
            $('.modal-title').html(title);
            $('.alert_confirm').click();
            $('.editType').off().on('click',function(){
            $.ajax({
                type:'POST',
                url:url,
                data:$('#f_'+action).serialize(),
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
            })

        }
</script>
@endsection
