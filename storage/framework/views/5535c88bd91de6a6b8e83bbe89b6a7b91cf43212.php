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

    <title>Add Berita</title>
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
            max-width: 500px;
        }

        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="<?php echo e(route('admin.berita')); ?>"><i class="bi bi-x-lg"></i></a>
        <form action="<?php echo e(route('admin.store_berita')); ?>" method="post" enctype="multipart/form-data">
            <h3 class="text-center mb-5">Add New Berita</h3>
            <?php echo csrf_field(); ?>
            <?php if($message = Session::get('failure')): ?>
                <div class="alert alert-danger">
                    <strong><?php echo e($message); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul: </label>
                                    <input type="text" class="form-control" id="judul" name="judul">
                                </div>

                                <div class="form-group">
                                    <label for="isi">Isi: </label>
                                    <textarea type="text" class="form-control" id="isi" name="isi"></textarea>
                                </div>
                                
                                <div class="custom-file">                                    
                                    <label class="custom-file-upload" for="file">
                                     <i class="bi bi-cloud-upload-fill"> </i>Pilih file disini</label>
                                    <input id="file" name='file' type="file" style="display:none;" onchange="namafile()">
                                    <label id="file-name"></label>
                                </div>

                                
                                
                                <button type="submit" name="submit" class="btn btn-save btn-block mt-4">
                                    Add New Berita
                                </button>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    <script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- toastify -->
<script src="<?php echo e(asset('assets/vendors/toastify/toastify.js')); ?>"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>


<!-- include FilePond plugins -->

<script>
    function namafile(){
        var filename = document.getElementById("file").files[0].name;
        document.getElementById("file-name").textContent = filename;
    }

    // register desired plugins...
    FilePond.registerPlugin(
        // validates the size of the file...
        FilePondPluginFileValidateSize,
        // validates the file type...
        FilePondPluginFileValidateType,
    );

    // Filepond: With Validation
    const pond = FilePond.create(document.querySelector('.with-validation-filepond'), {
        allowImagePreview: true,
        allowMultiple: false,
        allowFileEncode: false,
        acceptedFileTypes: ['application/*'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });
    FilePond.setOptions({
        server: {
            url: '/upload',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            }
        }
    });
</script>

<script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
</body>
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/berita/add_berita.blade.php ENDPATH**/ ?>