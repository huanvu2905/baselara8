<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.top.index') }}" class="waves-effect {{ request()->is('admin/top') ? 'active' : '' }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Trang chủ</span>
                    </a>
                </li>

                <li>
                    <a 
                        href="javascript: void(0);" 
                        class="has-arrow waves-effect {{ request()->is('admin/category') || request()->is('admin/category/*') ? 'active' : '' }}"
                    >
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">Danh mục</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a 
                                href="{{ route('admin.post_category.index') }}" 
                                key="t-light-sidebar"
                                class="{{ request()->is('admin/category') ? 'active' : '' }}"
                            >
                            Quản lý danh mục
                            </a>
                        </li>
                        <li>
                            <a 
                                href="{{ route('admin.post_category.create') }}" 
                                key="t-compact-sidebar"
                                class="{{ request()->is('admin/category/create') ? 'active' : '' }}"
                            >
                            Thêm mới danh mục
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a 
                        href="javascript: void(0);" 
                        class="has-arrow waves-effect {{ request()->is('admin/post') || request()->is('admin/post/*') ? 'active' : '' }}"
                    >
                        <i class="bx bx-file"></i>
                        <span key="t-layouts">Quản lý bài viết</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a 
                                href="{{ route('admin.post.index') }}" 
                                key="t-light-sidebar"
                                class="{{ request()->is('admin/post') ? 'active' : '' }}"
                            >
                            Quản lý
                            </a>
                        </li>
                        <li>
                            <a 
                                href="{{ route('admin.post.create') }}" 
                                key="t-compact-sidebar"
                                class="{{ request()->is('admin/post/create') ? 'active' : '' }}"
                            >
                            Thêm mới bài viết
                            </a>
                        </li>
                    </ul>
                </li>
                <hr/>
                <li>
                    <a 
                        href="javascript: void(0);" 
                        class="has-arrow waves-effect {{ request()->is('admin/post') || request()->is('admin/post/*') ? 'active' : '' }}"
                    >
                        <i class="bx bx-brightness"></i>
                        <span key="t-layouts">Cấu hình</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a 
                                href="#" 
                                key="t-compact-sidebar"
                                class="{{ request()->is('admin/about') ? 'active' : '' }}"
                            >
                            About
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->