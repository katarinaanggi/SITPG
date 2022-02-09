

<?php $__env->startSection('page'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User Management</h3>
                <p class="text-subtitle text-muted">Mengelola akun user atau operator kabupaten/kota.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Management</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar User</h4>
            </div>
            <div class="card-body">
                <a class="btn" href="">+Add New User</a><br /><br />
                <table class="table table-inverse table-responsive table-hover">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Cabdin</th>
                            <th>Kab/Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href="<?php echo e(route('admin.detail_user', $user->id)); ?>" >
                                    <?php echo e($user->id); ?>

                                </a>
                            </td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->phone); ?></td>
                            <td><?php echo e($user->cabdin); ?></td>
                            <td><?php echo e($user->kota); ?></td>
                            <td><a href="<?php echo e(route('admin.detail_user', $user->id)); ?>"><i class="bi bi-eye-fill text-primary"></i></i></a>&nbsp;&nbsp;
                                <a href="<?php echo e(route('admin.edit_user', $user->id)); ?>"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;&nbsp;
                                <a href="<?php echo e(route('admin.delete_user', $user->id)); ?>" class="button delete-confirm" 
                                    data-id="<?php echo e($user->id); ?>"><i class="bi bi-trash-fill text-danger"></i></span></a>
                            </td>                        
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <?php echo $users->links(); ?>

                </div>
            </div>
        </div>
    </section>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/admin/userManage.blade.php ENDPATH**/ ?>