<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ungu.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/login.css')); ?>">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent" >
            <h4 class="active fadeIn first">Admin Login</h4>
            <form method="POST" action="<?php echo e(route('admin.check')); ?>" autocomplete="off">
                <?php if(Session::get('fail')): ?>
                <div class="alert alert-danger">
                    <?php echo e(Session::get('fail')); ?>

                </div>                    
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <div class="form-group fadeIn second fontuser">
                    <input type="email" class="form-control" name="email" placeholder="Enter mail address" value="<?php echo e(old('email')); ?>">
                    <i class="fa fa-user fa-lg"></i>
                    <span class="text-danger"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><br><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                </div>
                <div class="form-group fadeIn third fontpassword">
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo e(old('password')); ?>">
                    <i class="fa fa-lock fa-lg"></i>
                    <span class="text-danger"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><br><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                </div>
                <div class="form-group fadeIn fourth">
                    <button type="submit" class="button">Login</button>
                </div>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="<?php echo e(url('/')); ?>">Landing Page</a>
            </div>
        </div>
    </div>
    
</body>
</html><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/admin/login.blade.php ENDPATH**/ ?>