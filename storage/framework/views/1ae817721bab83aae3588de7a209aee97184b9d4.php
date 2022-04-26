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

    <style>
        .choices {
            margin-bottom: 0px;
        }
    </style>
</head>
<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-5">
        <a href="<?php echo e(route('admin.userManagement')); ?>"><i class="bi bi-x-lg"></i></a>
        <form action="<?php echo e(route('admin.update_user', $user->id)); ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate id="formvalid">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            

            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header"><h3 class="text-center">User Edit for <?php echo e($user->name); ?></h3></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"class="form-label">Name: </label>
                                <input type="text" class="form-control" id="name" name="name"  value="<?php echo e($user->name); ?>" minlength="5" maxlength="30" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <span class="text-danger">*<?php echo e($message); ?></span>  
                                <?php else: ?>
                                    <span class="invalid-feedback">
                                        Nama harus diisi minimal 5 karakter dan maksimal 30 karakter.
                                    </span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <span class="text-danger">*<?php echo e($message); ?></span>  
                                <?php else: ?>
                                    <span class="invalid-feedback">
                                        Email harus diisi.
                                    </span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone: </label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo e($user->phone); ?>" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                    <span class="text-danger">*<?php echo e($message); ?></span>  
                                <?php else: ?>
                                    <span class="invalid-feedback">
                                        Phone harus diisi.
                                    </span> 
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cabdin" >Cabang Dinas: </label>
                                        <select class="form-control choices" id="cabdin" name="cabdin" required>
                                            <option value="">--pilih wilayah cabang dinas--</option>
                                            <?php $__currentLoopData = $cabdin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cd->id); ?>" <?php echo e(( $cd->id == $user->cabdin) ? 'selected' : ''); ?>><?php echo e($cd->nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['cabdin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                            <span class="text-danger">*<?php echo e($message); ?></span>  
                                        <?php else: ?>
                                            <span class="invalid-feedback">
                                                Cabang dinas harus diisi.
                                            </span> 
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota" >Kabupaten/Kota: </label>
                                        <input type="hidden" id="hdnkota" value="<?php echo e($user->kotaid->nama_kota); ?>">
                                        <select class="form-control" id="kota" name="kota" required>
                                            <option value="<?php echo e($user->kota); ?>" ><?php echo e($user->kotaid->nama_kota); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                            <span class="text-danger">*<?php echo e($message); ?></span>  
                                        <?php else: ?>
                                            <span class="invalid-feedback">
                                                Kabupaten/Kota harus diisi.
                                            </span> 
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <a class="btn btn-save btn-block mt-4" id="btnsubmit">Save</a>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="<?php echo e(asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/mazer.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    
    
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
        const kota = document.querySelector('#kota');
        const nmkota = document.querySelector('#hdnkota');
        const cabdin = document.querySelector('#cabdin');

        $("#btnsubmit").on('click',function(e){
            swal({
                title: "Apakah anda yakin?",
                text: 'Data ini akan diubah secara permanen!',
                icon: "warning",
                buttons: ["Cancel", "Yes!"],
                dangerMode: true,
            })
            .then(function(value) {
                if (value) {
                    $('#formvalid').submit();
                }
            });
            return false;
        });

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
        
        if(cabdin.value){
            getKota();
        }

        $('#cabdin').on('change', function () {
            getKota();
        });

        function getKota () {
            var cabdinId = cabdin.value;
            var idkota = kota.value;
            var namakota = nmkota.value;
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
                    $('#kota').html('<option value="'+idkota+'">'+namakota+'</option>'); 
                    $.each(result, function(key,value){
                        if(idkota != value.id){
                            $("#kota").append('<option value="'+value.id+'">'+value.nama_kota+'</option>');
                        }
                    });
                }
            });
        }
    </script>

</body>
</html><?php /**PATH E:\IF\Semester 5\PBP\Laravel\SITPG\resources\views/dashboard/usermanagement/edit_user.blade.php ENDPATH**/ ?>