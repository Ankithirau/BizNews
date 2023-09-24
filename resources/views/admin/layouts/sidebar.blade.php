  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div> --}}

          <!-- SidebarSearch Form -->
          {{-- <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{
                        !empty($is_page) && $is_page =='dashboard'?'active':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{!empty($is_page) && (($is_page== 'category') || ($is_page=='subcategory')) ? 'menu-open':''}}">
                    <a href="javascript:void" class="nav-link {{!empty($is_page) && (($is_page== 'category') || ($is_page=='subcategory')) ?'active':''}}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Manage Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link {{!empty($is_page) && $is_page=='category'?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('subcategory.index')}}" class="nav-link {{!empty($is_page) && $is_page=='subcategory'?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subcategory</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{!empty($is_page) && in_array($is_page,['post','tag']) ?'menu-open':''}}">
                    <a href="javascript:void" class="nav-link {{!empty($is_page) && in_array($is_page,['post','tag']) ?'active':''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                           Manage Post
                           <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('posts.index')}}" class="nav-link {{!empty($is_page) && in_array($is_page,['post','tag']) ?'active':''}}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Post
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('tags.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>
                                    Tags
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>
                                    Comment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-thumbs-up"></i>
                                <p>
                                    Likes
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('enquiry.index')}}" class="nav-link {{!empty($is_page) && $is_page=='enquiry'?'active':''}}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            Enquiry 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void" class="nav-link {{!empty($is_page) && $is_page=='users'?'active':''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role and Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                    </ul>
                </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
