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
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">  
    
    <?php echo $__env->yieldContent('style'); ?>

</head>
<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app">
        <div id="main-content">
            <div class="page-heading"> 
                <div class="container mt-3">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-6 order-md-1 order-last">
                                    <a href="<?php echo e(URL::previous()); ?>"><i class="bi bi-arrow-return-left" style="font-size: 20px"></i></a>
                                </div>
                            </div>
                        </div>        
                        
                        <div class="container">
                            <div class="article-meta text-center">
                                <h1 class="headline"><?php echo e($berita->judul); ?></h1>
                                <div class="author">
                                    <p class="byline">by <b>Administrator</b> <?php echo e($berita->created_at->format('M d, Y')); ?></p>
                                </div>
                            </div>
                            <div class="article">
                                <br>
                                <?php echo $berita->isi; ?>

                                <aside>
                                    <blockquote class="bq-short">
                                        <?php if($berita->nama_file): ?>
                                            <a href="<?php echo e(route('downloadFile', $berita->nama_file)); ?>" class="mr-auto"><b>Download file : <?php echo e(substr($berita->nama_file,11,strlen($berita->nama_file))); ?></b></a>
                                        <?php endif; ?>
                                    </blockquote>
                                </aside>
                            </div>
                        </div>
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
    </div>
    
    <script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    
    <?php echo $__env->yieldContent('datatable'); ?>
    
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
                            $("#kota").append('<option value="'+value.id+'">'+value.nama_kota+'</option>');
                        });
                    }
                });
            });
        });
    </script>
    
    <?php echo $__env->yieldContent('script'); ?>

    <script type="text/javascript">
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
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/detail.blade.php ENDPATH**/ ?>