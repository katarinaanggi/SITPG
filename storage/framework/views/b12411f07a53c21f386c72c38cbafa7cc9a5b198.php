

<?php $__env->startSection('page'); ?>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Selamat Datang di Sistem Informasi Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Sistem Informasi Tunjangan Profesi Guru ini disediakan oleh operator Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <?php if($berita->count()): ?>
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <h4 class="card-title">
                        <a href="#"><?php echo e($berita[0]->judul); ?></a>
                    </h4>
                    <p class="card-text" style=" text-align: justify;">
                        <?php if(strlen($berita[0]->isi) > 500): ?>
                            <?php echo e(substr($berita[0]->isi,0,500)); ?><span 
                                class="read-more-show hide_content">More<i class="bi bi-chevron-down"></i></span><span 
                                class="read-more-content"><?php echo e(substr($berita[0]->isi,500,strlen($berita[0]->isi))); ?><span 
                                class="read-more-hide hide_content">Less <i class="bi bi-chevron-up"></i></span> </span>
                        <?php else: ?>
                            <?php echo e($berita[0]); ?>

                        <?php endif; ?>
                    </p>
                    <p class="card-text"><small class="text-muted"><?php echo e(\Carbon\Carbon::parse($berita[0]->created_at)->diffForHumans()); ?></small></p>
                </div>
            </div>
            <div class="card-footer d-flex card-read-more" style="justify-content: space-between; background-color:#F3CFFC">
                <button class="btn btn-light">Read More</button>
                <?php if($berita[0]->nama_file): ?>
                    <a href="<?php echo e(route('downloadFile', $berita[0]->nama_file)); ?>">
                        <i class="bi bi-cloud-arrow-down-fill float-right" style="font-size:26px; "></i>
                    </a>
                <?php endif; ?> 
            </div>
        </div>
    <?php else: ?> 
    <p>None</p>  
    <?php endif; ?>

    <section class="wrapper">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $berita->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#"><?php echo e($value->judul); ?></a>
                                </h4>
                                <p class="card-text " >
                                    <?php if(strlen($value->isi) > 50): ?>
                                        <?php echo e(substr($value->isi,0,50)); ?><span 
                                            class="read-more-show hide_content">More<i class="bi bi-chevron-down"></i></span><span 
                                            class="read-more-content"><?php echo e(substr($value->isi,50,strlen($value->isi))); ?><span 
                                            class="read-more-hide hide_content">Less <i class="bi bi-chevron-up"></i></span> </span>
                                    <?php else: ?>
                                        <?php echo e($value->isi); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span><small class="text-muted"><?php echo e(\Carbon\Carbon::parse($value->created_at)->diffForHumans()); ?></small></span>
                            <button class="btn btn-light">Read More</button>
                        </div>
                        
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
        </div>
    </section>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/admin/home.blade.php ENDPATH**/ ?>