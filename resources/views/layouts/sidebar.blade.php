<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{ route('admin.home') }}">SITPG</a>
            </div>
        </div>
    </div>
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
                <a href="form-layout.html" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            
            <li
                class="sidebar-item {{ ($title == 'Data User') ? 'active' : '' }}">
                <a href="{{ route('admin.userManagement') }}" class='sidebar-link'>
                    <i class="bi bi-pen-fill"></i>
                    <span>User Management</span>
                </a>
            </li>

            <li class="sidebar-title">Setting</li>

            <li
                class="sidebar-item {{ ($title == 'Profile') ? 'active' : '' }}">
                <a href="{{ route('admin.profile') }}" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>