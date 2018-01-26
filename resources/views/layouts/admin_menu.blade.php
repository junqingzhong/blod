          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class=" active">
                      <a class="" href="{{ url('admin/index') }}">
                          <i class="icon_house_alt"></i>
                          <span>主页</span>
                      </a>
                  </li>
                  <li class="sub-menu" >
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>内容管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('admin/list')}}">文章列表</a></li>
                          <li><a class="" href="{{ url('admin/editArticle')}}">添加文章</a></li>
                      </ul>
                  </li>    
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>栏目管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('admin/type/list')}}">栏目列表</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>用户管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ url('admin/user/list') }}">用户管理</a></li>
                      </ul>
                  </li>
                 <!--  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>评论管理</span>
                      </a>
                  </li> -->
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>配置管理</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('config') }}">网站配置</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
