@extends('layouts.admin')
@section('title','添加文章信息')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{url('admin/index')}}">主页</a></li>
                    <li><i class="icon_document_alt"></i>修改密码</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        添加内容
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal " method="post" action="{{url('admin/user/rePassword')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">旧密码</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-input" name="oldPassword" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">新密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control round-input" name="password" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">重复新密码</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control round-input" name="password_confirmation" value="">
                                </div>
                            </div>
                       
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="hidden" name="id" value="{{session('user.id')}}"/>
                                    <button class="btn btn-primary" type="submit">保存</button>
                                    <button class="btn btn-default" type="reset">清除全部</button>
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
