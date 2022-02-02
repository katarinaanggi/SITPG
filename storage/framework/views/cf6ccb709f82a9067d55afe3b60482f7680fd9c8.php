<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita | Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ungu.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.svg" type="image/x-icon')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweetalert2/sweetalert2.min.css')); ?>">
</head>
<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app">
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
            
            <li
                class="sidebar-item  ">
                <a href="<?php echo e(route('admin.home')); ?>" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            
            <li
                class="sidebar-item active">
                <a href="<?php echo e(route('admin.berita')); ?>" class='sidebar-link'>
                    <i class="bi bi-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
            
            <li class="sidebar-title">Data</li>
            
            <li
                class="sidebar-item  ">
                <a href="form-layout.html" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            
            <li
                class="sidebar-item">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-pen-fill"></i>
                    <span>Data User</span>
                </a>
            </li>

            <li class="sidebar-title">Setting</li>

            <li
                class="sidebar-item">
                <a href="<?php echo e(route('admin.profile')); ?>" class='sidebar-link'>
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>
            </li>

        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="dropdown ms-auto mb-2 mb-lg-0">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo e(Auth::guard('admin')->user()->name); ?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo e(asset('assets/images/faces/1.jpg')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo e(Auth::guard('admin')->user()->name); ?>!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault();document.
                                        getElementById('logout-form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                        <form action="<?php echo e(route('admin.logout')); ?>" method="post" class="d-none" id="logout-form"><?php echo csrf_field(); ?></form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Berita terbaru mengenai Tunjangan Profesi Guru yang disediakan oleh operator dinas.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Berita</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="<?php echo e(route('admin.add_berita')); ?>">+Add New Berita</a><br /><br />
                <table class="table table-inverse table-responsive table-hover">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->judul); ?></td>
                            <td><?php echo e($value->isi); ?></td>
                            <td style="white-space: nowrap">
                                <?php if($value->nama_file): ?>
                                    <a href="<?php echo e(route('downloadFile', $value->nama_file)); ?>"><i class="bi bi-cloud-arrow-down-fill"></i></a>
                                <?php endif; ?> 
                            </td>    
                            <td><a href="<?php echo e(route('admin.edit_berita', $value->id)); ?>"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;&nbsp;

                                </div>
                                <?php if($value->nama_file): ?>
                                    <a href="<?php echo e(route('admin.delete_file', ['id'=>$value->id, 'filename'=>$value->nama_file])); ?>" class="button delete-confirm"
                                        data-id="<?php echo e($value->id); ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('admin.delete_berita', $value->id)); ?>" class="button delete-confirm" 
                                        data-id="<?php echo e($value->id); ?>"><i class="bi bi-trash-fill text-danger"></i></span></a>
                                <?php endif; ?>
                            </td>                        
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2022 &copy; Disdikbud Prov. Jateng</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="">khsa</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });   

        function namafile(){
            var filename = document.getElementById("file").files[0].name;
            document.getElementById("file-name").textContent = filename;
        }
    </script>
</body>
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/berita/berita.blade.php ENDPATH**/ ?>