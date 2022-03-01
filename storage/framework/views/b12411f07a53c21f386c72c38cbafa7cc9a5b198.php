

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Selamat Datang di Sistem Informasi Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Sistem Informasi Tunjangan Profesi Guru ini disediakan oleh Operator Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah.</p>
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
    
    
    <?php if($cari->count()): ?>
    <div class="card" id="news">
        <div class="card-content">
            <div class="card-body text-center">
                <div class="tags">
                        <div class="tag">New!</div>
                    </div>
                    <h4 class="card-title">
                        <a href="<?php echo e(route('detail_berita', $cari[0]->id)); ?>"><?php echo e($cari[0]->judul); ?></a>
                    </h4>
                    <p class="card-text isinya">
                        <?php if(strlen($cari[0]->isi) > 500): ?>
                        <?php echo substr($cari[0]->isi,0,500); ?>. . .
                        <?php else: ?>
                            <?php echo $cari[0]->isi; ?>

                        <?php endif; ?>
                    </p>
                    <div class="date"><?php echo e(\Carbon\Carbon::parse($cari[0]->created_at)->diffForHumans()); ?></div>
                </div>
            </div>
            <div id="cf" class="card-footer d-flex">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#viewDetails" data-bs-backdrop="false">
                        Read More
                    </button>
                    
                    <?php if($cari[0]->nama_file): ?>
                    <a href="<?php echo e(route('downloadFile', $cari[0]->nama_file)); ?>" data-bs-toggle="tooltip" title=<?php echo e($cari[0]->nama_file); ?>>
                        <i class="bi bi-cloud-arrow-down-fill float-right" id="donwnloadfile" style="font-size:26px; "></i>
                    </a>
                <?php endif; ?> 
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="viewDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo e($cari[0]->judul); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p class="card-text"><small class="text-muted">Created at <?php echo e($cari[0]->created_at->format('d-m-Y')); ?> by Admin</small></p> 
                    <p style="text-align: justify; text-justify: inter-word;"><?php echo $cari[0]->isi; ?></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <?php if($cari[0]->nama_file): ?>
                        <a href="<?php echo e(route('downloadFile', $cari[0]->nama_file)); ?>" class="mr-auto"> 
                            Download file 
                        </a>
                    <?php endif; ?>
                    <button type="button" class="btn btn-save" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    <?php else: ?> 
    <p class="text-center">Not Found</p> 
    <?php endif; ?>
    
    <i class="bi-search form__icon"></i>
    <input type="text" class="searchq form__input" id="searchq" placeholder="Search.." name="search">
    <section class="wrapper">
        <div class="container">
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
            <div class="d-flex justify-content-center">
                <?php echo $berita->links(); ?>

            </div>
        </div>
    </section>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $('#searchq').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '<?php echo e(route('search')); ?>',
                data:{'search':$value},
                success:function(data){
                    $('.wrapper').html(data);
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/admin/home.blade.php ENDPATH**/ ?>