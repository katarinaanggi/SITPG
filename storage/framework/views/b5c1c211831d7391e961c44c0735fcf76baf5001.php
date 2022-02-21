<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="<?php echo e(route('admin.home')); ?>">SITPG</a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
             <li class="sidebar-item <?php echo e(($title == 'Admin Dashboard') ? 'active' : ''); ?>" >
                <a id="yuyu" href="<?php echo e(route('admin.home')); ?>" class='sidebar-link' >
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item <?php echo e(($title == 'Berita Dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.berita')); ?>" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="sidebar-title">Data</li>
            
            <li
                class="sidebar-item  <?php echo e(($title == 'Data Guru') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.guru')); ?>" class='sidebar-link'>
                    <i class="bi bi-server"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            
            <li
                class="sidebar-item <?php echo e(($title == 'User Management') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.userManagement')); ?>" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>User Management</span>
                </a>
            </li>

            <li class="sidebar-title">Setting</li>

            <li
                class="sidebar-item <?php echo e(($title == 'Profile') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.profile')); ?>" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li
                class="sidebar-item <?php echo e(($title == 'Logout') ? 'active' : ''); ?>">
                <a class="sidebar-link" href="<?php echo e(route('admin.logout')); ?>"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left "></i>
                    <span>Logout</span>
                </a>
                <form action="<?php echo e(route('admin.logout')); ?>" method="post" class="d-none" id="logout-form"><?php echo csrf_field(); ?></form>
            </li>

                

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>