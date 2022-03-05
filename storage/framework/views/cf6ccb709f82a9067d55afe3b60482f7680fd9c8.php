

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Berita terbaru mengenai Tunjangan Profesi Guru yang disediakan oleh operator dinas.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Berita</h4>
            </div>
            <div class="card-body">
                <a class="btn" href="<?php echo e(route('admin.add_berita')); ?>">+Add New Berita</a><br /><br />
                <table class="table table-inverse table-responsive table-hover" id="beritaTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href="<?php echo e(route('operator.detail_berita', $value->id)); ?>" ><?php echo e($value->judul); ?></a></td>
                            <td>
                                <?php if(strlen($value->isi) > 75): ?>
                                    <?php echo substr($value->isi,0,75); ?>. . .
                                <?php else: ?>
                                    <?php echo $value->isi; ?>

                                <?php endif; ?>
                            </td>
                            <td style="white-space: nowrap">
                                <?php if($value->nama_file): ?>
                                    <a href="<?php echo e(route('downloadFile', $value->nama_file)); ?>"><i class="bi bi-cloud-arrow-down-fill"></i></a>
                                <?php else: ?>
                                    <p> </p>
                                <?php endif; ?> 
                            </td>    
                            <td><a href="<?php echo e(route('admin.edit_berita', $value->id)); ?>"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;&nbsp;
                                <?php if($value->nama_file): ?>
                                    <a href="<?php echo e(route('admin.delete_file', ['id'=>$value->id, 'filename'=>$value->nama_file])); ?>" class="button delete-confirm"
                                        data-id="<?php echo e($value->id); ?>"><i class="bi bi-trash-fill text-danger"></i></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('admin.delete_berita', $value->id)); ?>" class="button delete-confirm" 
                                        data-id="<?php echo e($value->id); ?>"><i class="bi bi-trash-fill text-danger"></i></span></a>
                                <?php endif; ?>
                            </td>                        
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('datatable'); ?>
<script>
    $(document).ready( function () {
        $('#beritaTable').DataTable();
    } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/berita/berita.blade.php ENDPATH**/ ?>