<!DOCTYPE html>
<html lang="en">
<body>
    <?php if($berita->count()): ?>
        <?php if(auth()->guard()->check()): ?>
            <div class="row">
                <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card bcard-hover">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="<?php echo e(route('detail_berita', $value->id)); ?>"><?php echo e($value->judul); ?></a>
                                </h4>
                                <p class="card-text " >
                                    <?php if(strlen($value->isi) > 50): ?>
                                        <?php echo substr($value->isi,0,50); ?>. . .
                                    <?php else: ?>
                                        <?php echo $value->isi; ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span><small class="text-muted"><?php echo e(\Carbon\Carbon::parse($value->created_at)->diffForHumans()); ?></small></span>
                            <a href="<?php echo e(route('detail_berita', $value->id)); ?>" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
            
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card bcard-hover">
                        <div class="card-content wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="meta-tags">
                                    <span class="date"><?php echo e(\Carbon\Carbon::parse($value->created_at)->diffForHumans()); ?></span>
                                </div>
                                <h3>
                                    <a href="<?php echo e(route('detail_berita', $value->id)); ?>" style="font-size: 20px"><?php echo e($value->judul); ?></a>
                                </h3>
                                <p>
                                    <?php if(strlen($value->isi) > 100): ?>
                                        <?php echo substr($value->isi,0,100); ?>. . .
                                    <?php else: ?>
                                        <?php echo $value->isi; ?>

                                    <?php endif; ?>
                                </p>
                                <a href="<?php echo e(route('detail_berita', $value->id)); ?>" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
            
        <?php endif; ?>
    <?php else: ?>
        <p class="text-danger" style="display: block; margin-left: auto; margin-right: auto">Berita tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html><?php /**PATH E:\IF\Semester 5\PBP\Laravel\SITPG\resources\views/dashboard/hasil.blade.php ENDPATH**/ ?>