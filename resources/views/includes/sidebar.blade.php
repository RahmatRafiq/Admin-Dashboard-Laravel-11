<nav id="sidebar" class="sidebar-wrapper">
    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll custom-scrollbar">
        <ul class="sidebar-menu">
            <li class="{{ request()->routeIs('dashboard') ? 'active current-page' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <!-- Ikon baru untuk Dashboard -->
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            {{-- Admin dashboard --}}
            <li class="treeview {{ request()->is('mbkm/admin/role-permissions*') ? 'active current-page open' : '' }}">
                <a href="#" class="treeview-toggle">
                    <i class="bi bi-person-gear"></i> <!-- Ikon baru untuk Manajemen Pengguna -->
                    <span class="menu-text">Manajemen Pengguna</span>
                </a>
                <ul class="treeview-menu"
                    style="{{ request()->is('admin/role-permissions*') ? 'display: block;' : 'display: none;' }}">
                    <li class="{{ request()->routeIs('permission.index') ? 'active-sub' : '' }}">
                        <a href="{{ route('permission.index') }}">Permissions</a>
                    </li>
                    <li class="{{ request()->routeIs('role.index') ? 'active-sub' : '' }}">
                        <a href="{{ route('role.index') }}">Role</a>
                    </li>
                    <li class="{{ request()->routeIs('user.index') ? 'active-sub' : '' }}">
                        <a href="{{ route('user.index') }}">Users</a>
                    </li>
                    <li class="{{ request()->routeIs('about-app.index') ? 'active-sub' : '' }}">
                        <a href="{{ route('about-app.index') }}">About MBKM</a>
                    </li>
                </ul>
            </li>
            {{-- End Admin dashboard --}}
        </ul>
    </div>
    <!-- Sidebar menu ends -->
</nav>