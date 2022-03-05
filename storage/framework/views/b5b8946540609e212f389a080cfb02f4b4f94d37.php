<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/toastify/toastify.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ungu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/sweetalert2/sweetalert2.min.css')); ?>">

    <title>Edit Berita</title>
    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .container {
            max-width: 800px;
        }

        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">
        <a href="<?php echo e(route('admin.berita')); ?>"><i class="bi bi-x-lg"></i></a>
        <form action="<?php echo e(route('admin.update_berita', $berita->id)); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <h3 class="text-center mb-5">Edit Berita</h3>
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <?php if($message = Session::get('error')): ?>
                <div class="alert alert-danger">
                    <strong><?php echo e($message); ?></strong>
                </div>
            <?php endif; ?>

            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul: </label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo e($berita->judul); ?>">
                                    <span class="text-danger"><?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="isi">Isi: </label>
                                    <textarea type="text" class="form-control" id="isi" name="isi" ><?php echo e($berita->isi); ?></textarea>
                                    <span class="text-danger"><?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                                
                                <div class="custom-file">                                    
                                    <label>Tersimpan: <?php echo e(substr($berita->nama_file, 11, strlen($berita->nama_file))); ?></label>
                                    <br><label class="custom-file-upload" for="file">
                                        <i class="bi bi-cloud-upload-fill"></i>&nbsp;Pilih file baru: </label>
                                    <input id="file" name='file' type="file" style="display:none;" onchange="namafile()">
                                    <label id="file-name"></label>
                                    <?php if($message = Session::get('file')): ?>
                                        <span class="text-danger">*<?php echo e($message); ?></span>
                                    <?php endif; ?>
                                </div>

                                <button type="submit" name="submit" class="btn btn-save btn-block mt-4" onclick="return confirm('Apakah anda yakin untuk mengubah data ini?')">
                                    Save
                                </button>

                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    <script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- toastify -->
<script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
 <script type="text/javascript">
    function submitForm(form) {
        swal({
            title: "Apakah anda yakin?",
            text: 'This record and it`s details will be permanantly updated!',
            icon: "warning",
            buttons: ["Cancel", "Yes!"],
            dangerMode: true,
        })
        .then(function() {
            form.submit();
        });
        return false;
    }

    function namafile(){
        var filename = document.getElementById("file").files[0].name;
        document.getElementById("file-name").textContent = filename;
    }
    ClassicEditor
        .create( document.querySelector( '#isi' ) )
        .catch( error => {
            console.error( error );
    } );
</script>

<script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
</body>
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/berita/edit_berita.blade.php ENDPATH**/ ?>