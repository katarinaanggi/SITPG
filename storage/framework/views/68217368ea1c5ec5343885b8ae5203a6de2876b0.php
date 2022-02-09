<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITPG | <?php echo e($title); ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ungu.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.svg" type="image/x-icon')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweetalert2/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/r-2.2.9/sl-1.3.4/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />

    <style>
        @import  url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
        
        .wrapper {
            display: table;
            height: 100%;
            width: 100%;
        }
        
        .truncate {
            max-width:50px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        :root {
            --transition-time: 0.3s;
        }
        
        .card {
            display: block; 
            margin-bottom: 20px;
            line-height: 1.42857143;
            background-color: white;
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

        .choices__inner{
            border: 1px solid #dce7f1;
            background-color: white
        }

        /* Card bawahnya */
        .bcard-hover {
            transition: all 0.25s ease-in;
            border-bottom: 5px solid transparent;
        }
        .bcard-hover:hover {
            transform: translateY(-5px);
            border: none;
            border-bottom: 5px solid #790995;
        }

        /* New! Card */
        #news {
            --bg-filter-opacity: 0.5;
            padding: 1em;
            align-items: flex-end;
            transition: all, var(--transition-time);
            position: relative;
            overflow: hidden;
            background-color: var(--ungu);
            color: var(--bg);
        }

        #news:hover {
            transform: rotate(0);
            color: var(--ungu);
        }

        #news:before {
            background: #F3CFFC;
            width: 250%;
            height: 250%;
        }

        .date {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 1em;
            padding: 1em;
            line-height: 1em;
            opacity: .8;
            color: var(--bg);
        }

        #news:hover .date {
            color: var(--ungu)
        }

        #news:hover .card-content .card-body h4 a, #news:hover .card-footer a i {
            color: var(--ungu) !important
        }

        #news .card-content .card-body h4 a, #news .card-footer a i {
            color: var(--bg) !important
        }

        #cf {
            justify-content: space-between; 
            background-color:var(--ungu);
            transition: all, var(--transition-time);
        }

        #news:hover #cf {
            background-color: #F3CFFC;
        }

        .tags {
            display: flex;
            animation: blinker 1s linear infinite;
        }

        .tag {
            position: absolute;
            top: 0;
            left: 0;
            font-size: 1em;
            background: #F9E7FE;
            border-radius: 0.3rem;
            padding: 0 1em;
            margin-right: 0.5em;
            line-height: 1.8em;
            color: var(--ungudark);
            transition: all, var(--transition-time);
        }

        #news:hover .tags .tag {
            background: var(--ungu);
            color: var(--bg)
        }

        .card:before, .card:after {
            content: '';
            transform: scale(0);
            transform-origin: top left;
            border-radius: 50%;
            position: absolute;
            left: -50%;
            top: -50%;
            z-index: -5;
            transition: all, var(--transition-time);
            transition-timing-function: ease-in-out;
        }

        .card:hover:before, .card:hover:after {
            transform: scale(1);
        }

        @keyframes  blinker {  
            50% { opacity: 0; }
        }

    </style>
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
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/r-2.2.9/sl-1.3.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.4/dataRender/ellipsis.js"></script>

    <script src="<?php echo e(asset('assets/vendors/choices.js/choices.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/form-element-select.js')); ?>"></script>

    <script>
        $(document).ready( function () {
            $('#userTable').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: '<?php echo route('admin.data_user'); ?>',
                    // columnDefs:[{targets:1,className:"truncate"}],
                    //     createdRow: function(row){
                    //     var td = $(row).find(".truncate");
                    //     td.attr("title", td.html());
                    // }
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'cabdin', name: 'cabdin' },
                        { data: 'kota', name: 'kota' },
                        { data: 'action', name: 'action' }
                    ]
                }
            );
            $('#beritaTable').DataTable();
        } );

    </script>
    <script>
        $(document).ready(function() {
            $('#cabdin').on('change', function () {
                var cabdinId = this.value;
                $('#kota').html('');
                $.ajax({
                    url: '<?php echo e(route('admin.get_kota')); ?>?id_cabdin='+cabdinId,
                    type: "POST",
                    data: {
                        cabdinId: cabdinId,
                        _token: '<?php echo e(csrf_token()); ?>' 
                    },
                    dataType : 'json',
                    success: function(result){
                        $('#kota').html('<option value="0">--pilih wilayah kabupaten/kota--</option>'); 
                        $.each(result, function(key,value){
                            $("#kota").append('<option value="'+value.nama+'">'+value.nama+'</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        // // Hide the extra content initially:
        // $('.read-more-content').addClass('hide_content')
        // $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // // Set up the toggle effect:
        // $('.read-more-show').on('click', function(e) {
        //     $(this).next('.read-more-content').removeClass('hide_content');
        //     $(this).addClass('hide_content');
        //     e.preventDefault();
        // });
        // $('.read-more-hide').on('click', function(e) {
        //     var p = $(this).parent('.read-more-content');
        //     p.addClass('hide_content');
        //     p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
        //     e.preventDefault();
        // });

        const togglePassword = document.querySelector('#togglePassword');
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password = document.querySelector('#password');
        const cpassword = document.querySelector('#cpassword');
        
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            $(this).toggleClass("bi-eye bi-eye-slash");
        });
        togglePassword2.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            // toggle the eye slash icon
            $(this).toggleClass("bi-eye bi-eye-slash");
        });

        // Set delete confirmation alert
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
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/layouts/main.blade.php ENDPATH**/ ?>