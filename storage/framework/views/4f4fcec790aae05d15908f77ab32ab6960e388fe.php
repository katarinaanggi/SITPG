<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/r-2.2.9/sl-1.3.4/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/choices.js/choices.min.css')); ?>" />

    <title>Edit User <?php echo e($user->name); ?></title>
</head>
<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">
        <a href="<?php echo e(route('admin.userManagement')); ?>"><i class="bi bi-x-lg"></i></a>
        <form action="<?php echo e(route('admin.update_user', $user->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <?php if($message = Session::get('error')): ?>
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
                        <div class="card-header"><h3 class="text-center">User Edit for <?php echo e($user->name); ?></h3></div>
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name: </label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone">Phone: </label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?php echo e($user->phone); ?>">
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cabdin" >Cabang Dinas: </label>
                                            <select class="form-control choices" id="cabdin" name="cabdin" required>
                                                <?php $__currentLoopData = $cabdin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($cd->id); ?>" <?php echo e(( $cd->id == $user->cabdin) ? 'selected' : ''); ?>><?php echo e($cd->nama); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="kota" >Kabupaten/Kota: </label>
                                            <select class="form-control" id="kota" name="kota" required>
                                                <option value="<?php echo e($user->kota); ?>"><?php echo e($user->kota); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-save btn-block mt-4" onclick="return confirm('Are you sure to update this data?')">
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

</body>
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/usermanagement/edit_user.blade.php ENDPATH**/ ?>