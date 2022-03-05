

<?php $__env->startSection('style'); ?>
<style>
    .choices {
        margin-bottom: 0px;
    }
</style>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last"></div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.userManagement')); ?>">User Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <form action="<?php echo e(route('admin.store_user')); ?>" method="post" >
        <?php echo csrf_field(); ?>
        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger">
                <strong><?php echo e($message); ?></strong>
            </div>
        <?php endif; ?>

        
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <a href="<?php echo e(route('admin.userManagement')); ?>"><i class="bi bi-x-lg"></i></a>
                    <div class="card-header"><h3 class="text-center">Create New User</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name"  value="<?php echo e(old('name')); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone: </label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cabdin" >Cabang Dinas: </label>
                                        <select class="form-control choices" id="cabdin" name="cabdin">
                                            <option value="">--pilih wilayah cabang dinas--</option>
                                            <?php $__currentLoopData = $cabdin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cd->id); ?>" <?php echo e(old('cabdin') == $cd->id ? 'selected' : ''); ?>><?php echo e($cd->nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="text-danger"><?php $__errorArgs = ['cabdin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota" >Kabupaten/Kota: </label>
                                        <select class="form-control" id="kota" name="kota">
                                            <option value="">--pilih wilayah kabupaten/kota--</option>
                                        </select>
                                        <span class="text-danger"><?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        <input type="text" id="hdnPreviousValue" style="display: none" value="<?php echo e(old('kota')); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password: </label>
                                        <input type="password"  name="password" id="password" value="<?php echo e(old('password')); ?>" style="padding: 0.375rem 0.75rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; border-radius: 0.25rem; border: 1px solid #dce7f1; width:99.9%">
                                        <span id="togglePassword" class="bi bi-eye-fill" style="margin-left: -30px; cursor: pointer;"></span>
                                        <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password: </label>
                                        <input type="password"  name="cpassword" id="cpassword" value="<?php echo e(old('cpassword')); ?>" style="padding: 0.375rem 0.75rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; border-radius: 0.25rem; border: 1px solid #dce7f1; width:99.9%">
                                        <span id="togglePassword2" class="bi bi-eye-fill" style="margin-left: -30px; cursor: pointer;"></span>
                                        <span class="text-danger"><?php $__errorArgs = ['cpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>*<?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-save btn-block mt-4">
                                Add New User
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        const togglePassword = document.querySelector('#togglePassword');
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password = document.querySelector('#password');
        const cpassword = document.querySelector('#cpassword');
        const kotaprev = document.querySelector('#hdnPreviousValue');
        const cabdin = document.querySelector('#cabdin');

        $('#cabdin').on('change', function () {
            getKota();
        });
        
        function getKota () {
            var cabdinId = cabdin.value;
            var prev = kotaprev.value;
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
                    $('#kota').html('<option value="">--pilih wilayah kabupaten/kota--</option>'); 
                    $.each(result, function(key,value){
                        if(prev == value.nama_kota){
                            $("#kota").append('<option value="'+value.nama_kota+'" selected>'+value.nama_kota+'</option>');
                        }
                        else{
                            $("#kota").append('<option value="'+value.nama_kota+'">'+value.nama_kota+'</option>');
                        }
                    });
                }
            });
        }

        if(kotaprev.value){
            getKota();
        }
        
        
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            $(this).toggleClass("bi-eye-fill bi-eye-slash-fill");
        });
        togglePassword2.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            // toggle the eye slash icon
            $(this).toggleClass("bi-eye-fill bi-eye-slash-fill");
        });

        if(cabdin.value){
            window.onLoad = getKota();
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/usermanagement/add_user.blade.php ENDPATH**/ ?>