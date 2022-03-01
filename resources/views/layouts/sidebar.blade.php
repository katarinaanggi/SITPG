<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ route('admin.home') }}" id="sitpg">SITPG</a>
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ route('user.home') }}" id="sitpg">SITPG</a>
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::guard('admin')->check())
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    
                    <li class="sidebar-item {{ ($title == 'Admin Dashboard') ? 'active' : '' }}" >
                        <a id="yuyu" href="{{ route('admin.home') }}" class='sidebar-link' >
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ ($title == 'Berita Dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.berita') }}" class='sidebar-link'>
                            <i class="bi bi-newspaper"></i>
                            <span>Berita</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Data</li>
                    
                    <li
                        class="sidebar-item  {{ ($title == 'Data Guru') ? 'active' : '' }}">
                        <a href="{{ route('operator.guru') }}" class='sidebar-link'>
                            <i class="bi bi-server"></i>
                            <span>Data Guru</span>
                        </a>
                    </li>
                    
                    <li
                        class="sidebar-item {{ ($title == 'User Management') ? 'active' : '' }}">
                        <a href="{{ route('admin.userManagement') }}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>User Management</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Setting</li>

                    <li
                        class="sidebar-item {{ ($title == 'Profile') ? 'active' : '' }}">
                        <a href="{{ route('admin.profile') }}" class='sidebar-link'>
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li
                        class="sidebar-item {{ ($title == 'Logout') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left "></i>
                            <span>Logout</span>
                        </a>
                        <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                    </li>

                        

                </ul>
            </div>
        @elseif (Auth::guard('web')->check())
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    
                    <li class="sidebar-item {{ ($title == 'Operator Dashboard') ? 'active' : '' }}" >
                        <a id="yuyu" href="{{ route('user.home') }}" class='sidebar-link' >
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
            
                    <li class="sidebar-title">Data</li>
                    
                    <li
                        class="sidebar-item  {{ ($title == 'Data Guru') ? 'active' : '' }}">
                        <a href="{{ route('operator.guru') }}" class='sidebar-link'>
                            <i class="bi bi-server"></i>
                            <span>Data Guru</span>
                        </a>
                    </li>
            
                    <li class="sidebar-title">Setting</li>
            
                    <li
                        class="sidebar-item {{ ($title == 'Profile') ? 'active' : '' }}">
                        <a href="{{ route('user.profile') }}" class='sidebar-link'>
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span>
                        </a>
                    </li>
            
                    <li
                        class="sidebar-item {{ ($title == 'Logout') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left "></i>
                            <span>Logout</span>
                        </a>
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                    </li>
            
                        
            
                </ul>
            </div>
        @endif
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>