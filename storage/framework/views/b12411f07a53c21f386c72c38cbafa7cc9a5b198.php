<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ungu.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.svg" type="image/x-icon')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweetalert2/sweetalert2.min.css')); ?>">

    <style>
        @import  url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
        
        .wrapper {
            display: table;
            height: 100%;
            width: 100%;
        }
        
        .card {
            display: block; 
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 5px 0 rgba(213, 186, 235, 0.37),0 2px 10px 0 rgba(213, 186, 235, 0.37); 
            transition: box-shadow .25s; 
            border-radius: 20px;
        }
        .card:hover {
            box-shadow: 0 8px 17px 0 rgba(213, 186, 235, 0.37),0 6px 20px 0 rgba(213, 186, 235, 0.37);
        }
         
        .card-content {
        padding:15px;
        text-align:left;
        }
        .card-title {
        margin-top:0px;
        font-weight: 700;
        font-size: 1.65em;
        }

        .card-title a {
            color: #000;
            text-decoration: none !important;
        }

        .read-more-show{
        cursor:pointer;
        color: #C411F1;
        }
        .read-more-hide{
        cursor:pointer;
        color: #C411F1;
        }
    
        .hide_content{
        display: none;
        }
    </style>
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
            
             <li class="sidebar-item active" >
                <a id="yuyu" href="<?php echo e(route('admin.home')); ?>" class='sidebar-link' >
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            
            <li class="sidebar-item">
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
                <h3>Selamat Datang di Sistem Informasi Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Sistem Informasi Tunjangan Profesi Guru ini disediakan oleh operator Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <?php if($berita->count()): ?>
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <h4 class="card-title">
                        <a href="#"><?php echo e($berita[0]->judul); ?></a>
                    </h4>
                    <p class="card-text" style=" text-align: justify;">
                        <?php if(strlen($berita[0]->isi) > 500): ?>
                            <?php echo e(substr($berita[0]->isi,0,500)); ?><span 
                                class="read-more-show hide_content">More<i class="bi bi-chevron-down"></i></span><span 
                                class="read-more-content"><?php echo e(substr($berita[0]->isi,500,strlen($berita[0]->isi))); ?><span 
                                class="read-more-hide hide_content">Less <i class="bi bi-chevron-up"></i></span> </span>
                        <?php else: ?>
                            <?php echo e($berita[0]); ?>

                        <?php endif; ?>
                    </p>
                    <p class="card-text"><small class="text-muted"><?php echo e(\Carbon\Carbon::parse($berita[0]->created_at)->diffForHumans()); ?></small></p>
                </div>
            </div>
            <div class="card-footer d-flex card-read-more" style="justify-content: space-between; background-color:#F3CFFC">
                <button class="btn btn-light">Read More</button>
                <?php if($berita[0]->nama_file): ?>
                    <a href="<?php echo e(route('downloadFile', $berita[0]->nama_file)); ?>">
                        <i class="bi bi-cloud-arrow-down-fill float-right" style="font-size:26px; "></i>
                    </a>
                <?php endif; ?> 
            </div>
        </div>
    <?php else: ?> 
    <p>None</p>  
    <?php endif; ?>

    <section class="wrapper">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $berita->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#"><?php echo e($value->judul); ?></a>
                                </h4>
                                <p class="card-text " >
                                    <?php if(strlen($value->isi) > 50): ?>
                                        <?php echo e(substr($value->isi,0,50)); ?><span 
                                            class="read-more-show hide_content">More<i class="bi bi-chevron-down"></i></span><span 
                                            class="read-more-content"><?php echo e(substr($value->isi,50,strlen($value->isi))); ?><span 
                                            class="read-more-hide hide_content">Less <i class="bi bi-chevron-up"></i></span> </span>
                                    <?php else: ?>
                                        <?php echo e($value->isi); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span><small class="text-muted"><?php echo e(\Carbon\Carbon::parse($value->created_at)->diffForHumans()); ?></small></span>
                            <button class="btn btn-light">Read More</button>
                        </div>
                        
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
        // Hide the extra content initially:
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });
    </script>
</body>
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/admin/home.blade.php ENDPATH**/ ?>