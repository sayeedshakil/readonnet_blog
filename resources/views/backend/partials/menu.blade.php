<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <h4>{{auth()->user()->name}}</h4>
            <li class="nav-item">
                <a href="{{ route('backend.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">
                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                        <li class="nav-item">
                            <a href="{{ route('backend.permissions.index') }}" class="nav-link {{ request()->is('backend.permissions') || request()->is('backend.permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                        @endcan
                        @can('role_access')
                        <li class="nav-item">
                            <a href="{{route('backend.roles.index')}}" class="nav-link {{ request()->is('backend.roles') || request()->is('backend.roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                        @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="{{route('backend.users.index')}}" class="nav-link {{ request()->is('backend.users') || request()->is('backend.users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('post_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    {{-- <i class="fa-fw fas fa-users nav-icon"> --}}

                        <i class="fas fa-bezier-curve nav-icon"></i>
                    </i>
                    Posts
                </a>
                <ul class="nav-dropdown-items">
                    @can('post_access')
                    <li class="nav-item">
                        <a href="{{route('backend.posts.index')}}" class="nav-link {{ request()->is('backend.posts') || request()->is('backend.posts/') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            View All
                        </a>
                    </li>
                    @endcan
                    @can('post_create')
                    <li class="nav-item">
                        <a href="{{route('backend.posts.create')}}" class="nav-link {{ request()->is('backend.posts/create') || request()->is('backend.posts/create/*') ? 'active' : '' }}">

                            <i class="fas fa-plus-circle nav-icon"></i>

                            </i>
                            Add New
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan


            @can('category_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    {{-- <i class="fa-fw fas fa-users nav-icon"> --}}

                        <i class="fas fa-bezier-curve nav-icon"></i>
                    </i>
                    Categories
                </a>
                <ul class="nav-dropdown-items">
                    @can('category_access')
                    <li class="nav-item">
                        <a href="{{route('backend.categories.index')}}" class="nav-link {{ request()->is('backend.categories') || request()->is('backend.categories/') ? 'active' : '' }}">
                            <i class="fas fa-stream nav-icon"></i>
                            View All
                        </a>
                    </li>
                    @endcan
                    @can('category_create')
                    <li class="nav-item">
                        <a href="{{route('backend.categories.create')}}" class="nav-link {{ request()->is('backend.categories/create') || request()->is('backend.categories/create/*') ? 'active' : '' }}">

                            <i class="fas fa-plus-circle nav-icon"></i>

                            </i>
                            Add New
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            {{-- @can('change_password_access')
            <li class="nav-item">
                <a href="{{ route('backend.auth.change_password') }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-key">

                    </i>
                    Change password
                </a>
            </li>
            @endcan --}}
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
