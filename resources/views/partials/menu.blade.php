<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">
                    </i>
                    <span>dashboard</span>
                </a>
            </li>
            {{--User Management--}}
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>users management</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>permissions</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>roles</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>users</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    
                </li>
            @endcan

            {{--Product Management--}}
            @can('product_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-pen">

                    </i>
                    <span>{{ trans('product management') }}</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">

                    @can('product_access')
                        <li class="{{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.products.index") }}">
                                <i class="fa-fw fas fa-box">

                                </i>
                                <span>products</span>
                            </a>
                        </li>
                    @endcan
                    @can('brand_access')
                        <li class="{{ request()->is('admin/brands') || request()->is('admin/brands/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.brands.index") }}">
                                <i class="fa-fw fas fa-align-justify">

                                </i>
                                <span>brands</span>
                            </a>
                        </li>
                    @endcan
                    @can('gender_access')
                         <li class="{{ request()->is('admin/genders') || request()->is('admin/genders/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.genders.index") }}">
                                <i class="fa-fw fas fa-address-card">

                                </i>
                                <span>genders</span>
                            </a>
                         </li>
                    @endcan
                    @can('size_access')
                         <li class="{{ request()->is('admin/sizes') || request()->is('admin/sizes/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.sizes.index") }}">
                                 <i class="fa-fw fas fa-list-ol">

                                 </i>
                                 <span>sizes</span>
                            </a>
                         </li>
                    @endcan

                   {{-- @can('user_access')
                        <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.users.index") }}">
                                <i class="fa-fw fas fa-user">

                                </i>
                                <span>{{ trans('user') }}</span>
                            </a>
                        </li>
                    @endcan--}}
                </ul>

            </li>
            @endcan

            {{--Category Management--}}
            @can('category_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa-fw fas fa-pen">

                    </i>
                    <span>category management</span>
                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">

                    @can('category_access')
                        <li class="{{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.categories.index") }}">
                                <i class="fa-fw fas fa-shopping-cart">

                                </i>
                                <span>categories</span>
                            </a>
                        </li>
                    @endcan
                    @can('subcategory_access')
                        <li class="{{ request()->is('admin/subcategories') || request()->is('admin/subcategories/*') ? 'active' : '' }}">
                            <a href="{{ route("admin.subcategories.index") }}">
                                <i class="fa-fw fas fa-cart-plus">

                                </i>
                                <span>subcategories</span>
                            </a>
                        </li>
                    @endcan

                </ul>

            </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    <span>logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

