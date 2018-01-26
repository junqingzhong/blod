@extends('layouts.admin')

@section('title','文章列表')

@section('content')
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="{{url('admin/index')}}">主页</a></li>
						<li><i class="fa fa-table"></i>文章列表</li>
					</ol>
				</div>
			</div>
        
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_clipboard"></i> 序号</th>
                                 <th><i class="icon_printer"></i> 类型</th>
                                 <th><i class="icon_printer"></i> 标题</th>
                                 <th><i class="icon_printer"></i> 缩略图</th>
                                 <th><i class="icon_printer"></i> 状态</th>
                                 <th><i class="icon_printer"></i> 排序</th>
                                 <th><i class="icon_cogs"></i> 操作</th>
                              </tr>
                              @foreach ( $lists as $list)
                              <tr>
                                 <td>{{$list->id}}</td>
                                 <td>{{$list->type_id}}</td>
                                 <td>{{$list->title}}</td>
                                 <td>@unless(!$list->img_path)<img src="{{$list->img_path}}" width="100"  height="70" />@endunless</td>
                                 <td>
                                @switch($list->status)
                                @case(-1)已删除@break
                                @case(0)<a href="{{url('admin/list/'.$list->id.'/1')}}">未发布</a>@break
                                @case(1)<a href="{{url('admin/list/'.$list->id.'/0')}}">已发布</a>@break
                                @endswitch
                                 </td>
                                 <td>{{$list->sort}}</td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{url('admin/editArticle/?id='.$list->id)}}"><i class="icon_pencil-edit"></i></a>
                                      <a class="btn btn-danger" href="{{url('admin/list/'.$list->id.'/-1')}}" onclick="if(confirm('是否删除!')){return true;}else{return false;}"><i class="icon_trash"></i></a>
                                  </div>
                                  </td>
                              </tr>
                                @endforeach

                           </tbody>
                        </table>
                        {{ $lists->links() }}
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
@endsection
