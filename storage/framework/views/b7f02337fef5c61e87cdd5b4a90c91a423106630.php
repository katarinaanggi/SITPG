<?php if(auth()->guard('web')->check()): ?>   


<?php $__env->startSection('main'); ?>
<div class="page-heading">
    
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <a href="<?php echo e(URL::previous()); ?>"><i class="bi bi-arrow-return-left" style="font-size: 20px"></i></a>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Berita <?php echo e($berita->id); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
    
    <div class="container">
        <div class="article-meta text-center">
            <h1 class="headline "><?php echo e($berita->judul); ?></h1>
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
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.mainu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/user/cb.blade.php ENDPATH**/ ?>