<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITPG | <?php echo e($title); ?></title>

    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"> 

    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    

    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/fc-4.0.1/fh-3.2.1/r-2.2.9/datatables.min.css"/>
    
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.svg" type="image/x-icon')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweetalert2/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ungu.css')); ?>">
    
    <?php echo $__env->yieldContent('style'); ?>

</head>
<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                            <h6 class="mb-0 text-gray-600">
                                                <?php if(Auth::guard('admin')->check()): ?>
                                                    <?php echo e(Auth::guard('admin')->user()->name); ?>                                                
                                                <?php elseif(Auth::guard('web')->check()): ?>
                                                    <?php echo e(Auth::guard('web')->user()->name); ?>   
                                                <?php endif; ?>
                                            </h6>
                                            <p class="mb-0 text-sm text-gray-600">
                                                <?php if(Auth::guard('admin')->check()): ?>
                                                    Administrator                                             
                                                <?php elseif(Auth::guard('web')->check()): ?>
                                                    Operator Cabdin <?php echo e(Auth::guard('web')->user()->cabdin); ?>    
                                                <?php endif; ?>
                                                
                                            </p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <?php if(Auth::guard('admin')->check()): ?>
                                                    <img src="<?php echo e(asset('assets/images/faces/1.jpg')); ?>">
                                                <?php elseif(Auth::guard('web')->check()): ?>
                                                    <img src="<?php echo e(asset('assets/images/faces/2.jpg')); ?>"> 
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">
                                            <?php if(Auth::guard('admin')->check()): ?>
                                                Hello, <?php echo e(Auth::guard('admin')->user()->name); ?>                                                
                                            <?php elseif(Auth::guard('web')->check()): ?>
                                                Hello, <?php echo e(Auth::guard('web')->user()->name); ?>   
                                            <?php endif; ?>
                                        </h6>
                                    </li>
                                    <?php if(Auth::guard('admin')->check()): ?>
                                        <li><a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a></li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault();document.
                                            getElementById('logout-form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                            <form action="<?php echo e(route('admin.logout')); ?>" method="post" class="d-none" ><?php echo csrf_field(); ?></form>
                                        </li>                                        
                                    <?php elseif(Auth::guard('web')->check()): ?>
                                        <li><a class="dropdown-item" href=""><i class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a></li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>" onclick="event.preventDefault();document.
                                            getElementById('logout-form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                            <form action="<?php echo e(route('admin.logout')); ?>" method="post" class="d-none" ><?php echo csrf_field(); ?></form>
                                        </li> 
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading"> 
                    <?php echo $__env->yieldContent('page'); ?>
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
    <script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="<?php echo e(asset('assets/vendors/choices.js/choices.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/form-element-select.js')); ?>"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    
    
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/fc-4.0.1/fh-3.2.1/r-2.2.9/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.4/dataRender/ellipsis.js"></script>
    
    <?php echo $__env->yieldContent('script'); ?>
    
    <?php echo $__env->yieldContent('datatable'); ?>
    
    <script type="text/javascript">
        function bsSelectValidation() {
            if ($("#formvalid").hasClass('was-validated')) {
                $(".choices").each(function (i, el) {
                if ($(el).is(":invalid")) {
                    $(el).closest(".form-group").find(".valid-feedback").removeClass("d-block");
                    $(el).closest(".form-group").find(".invalid-feedback").addClass("d-block");
                }
                else {
                    $(el).closest(".form-group").find(".invalid-feedback").removeClass("d-block");
                    $(el).closest(".form-group").find(".valid-feedback").addClass("d-block");
                }
                });
            }
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated');
                bsSelectValidation();
            }, false)
            })
        })()
        // Set delete confirmation alert
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apakah anda yakin?',
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
</html><?php /**PATH E:\IF\Semester 5\PBP\Laravel\SITPG\resources\views/layouts/main.blade.php ENDPATH**/ ?>