

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last"></div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('operator.guru')); ?>">Data Guru</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Guru</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <a href="<?php echo e(route('operator.guru')); ?>"><i class="bi bi-x-lg"></i></a>
                <div class="card-header"><h3 class="text-center">Detail of <?php echo e($guru->nama); ?></h3></div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="no_peserta" class="col-sm-3 col-form-label">No. Peserta: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_peserta" name="no_peserta" value="<?php echo e($guru->no_peserta); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e($guru->nama); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="nip" class="col-sm-3 col-form-label">NIP: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nip" name="nip" value="<?php echo e($guru->nip); ?>" readonly>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <h5 >Kepegawaian</h5>
                            <div class="form-group row mb-3">
                                <label for="nrg" class="col-sm-3 col-form-label">NRG: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nrg" name="nrg" value="<?php echo e($guru->nrg); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="nuptk" class="col-sm-3 col-form-label">NUPTK: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nuptk" name="nuptk" value="<?php echo e($guru->nuptk); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="no_sk" class="col-sm-3 col-form-label">No. SK: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_sk" name="no_sk" value="<?php echo e($guru->no_sk); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Jenjang: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jenjang" name="jenjang" value="<?php echo e($guru->jenjang); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="tempat_tugas" class="col-sm-3 col-form-label">Tempat Tugas: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_tugas" name="tempat_tugas" value="<?php echo e($guru->tempat_tugas); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="kota" class="col-sm-3 col-form-label">Kabupaten/Kota: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kota" name="kota" value="<?php echo e($guru->kota); ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <h5 >Rekening</h5>
                            <div class="form-group row mb-3">
                                <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?php echo e($guru->nama_bank); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="kantor_cabang" class="col-sm-3 col-form-label">Kantor Cabang: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kantor_cabang" name="kantor_cabang" value="<?php echo e($guru->kantor_cabang); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="no_rek" class="col-sm-3 col-form-label">No. Rekening: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_rek" name="no_rek" value="<?php echo e($guru->no_rek); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="nama_rek" class="col-sm-3 col-form-label">Nama Rekening: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_rek" name="nama_rek" value="<?php echo e($guru->nama_rek); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">   
                        <h5 >Pendapatan</h5>            
                        <div class="col">    
                            <div class="form-group row mb-3">
                                <label for="pangkat" class="col-sm-3 col-form-label">Pangkat/ Golongan: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo e($guru->pangkat); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="masa_kerja" class="col-sm-3 col-form-label">Masa Kerja: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="masa_kerja" name="masa_kerja" value="<?php echo e($guru->masa_kerja); ?>" readonly>
                                </div>
                            </div>
            
                            <div class="form-group row mb-3">
                                <label for="gaji_pokok" class="col-sm-3 col-form-label">Gaji Pokok: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?php echo e("Rp ".format_uang($guru->gaji_pokok)); ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tw1-tab" data-bs-toggle="tab" href="#tw1" role="tab"
                                        aria-controls="tw1" aria-selected="true">TW 1</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tw2-tab" data-bs-toggle="tab" href="#tw2" role="tab"
                                        aria-controls="tw2" aria-selected="false">TW 2</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tw3-tab" data-bs-toggle="tab" href="#tw3" role="tab"
                                        aria-controls="tw3" aria-selected="false">TW 3</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tw4-tab" data-bs-toggle="tab" href="#tw4" role="tab"
                                        aria-controls="tw4" aria-selected="false">TW 4</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tw1" role="tabpanel" aria-labelledby="tw1-tab"><br>
                                    <div class="form-group row mb-3">
                                        <label for="jan" class="col-sm-4 col-form-label">Januari: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="jan" name="jan" value="<?php echo e("Rp ".format_uang($guru->jan)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="feb" class="col-sm-4 col-form-label">Februari: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="feb" name="feb" value="<?php echo e("Rp ".format_uang($guru->feb)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="mar" class="col-sm-4 col-form-label">Maret: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mar" name="mar" value="<?php echo e("Rp ".format_uang($guru->mar)); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tw2" role="tabpanel" aria-labelledby="tw2-tab"><br>
                                    <div class="form-group row mb-3">
                                        <label for="apr" class="col-sm-4 col-form-label">April: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="apr" name="apr" value="<?php echo e("Rp ".format_uang($guru->apr)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="mei" class="col-sm-4 col-form-label">Mei: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mei" name="mei" value="<?php echo e("Rp ".format_uang($guru->mei)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="jun" class="col-sm-4 col-form-label">Juni: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="jun" name="jun" value="<?php echo e("Rp ".format_uang($guru->jun)); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tw3" role="tabpanel" aria-labelledby="tw3-tab"><br>
                                    <div class="form-group row mb-3">
                                        <label for="jul" class="col-sm-4 col-form-label">Juli: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="jul" name="jul" value="<?php echo e("Rp ".format_uang($guru->jul)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="agu" class="col-sm-4 col-form-label">Agustus: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="agu" name="agu" value="<?php echo e("Rp ".format_uang($guru->agu)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="sep" class="col-sm-4 col-form-label">September: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="sep" name="sep" value="<?php echo e("Rp ".format_uang($guru->sep)); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tw4" role="tabpanel" aria-labelledby="tw4-tab"><br>
                                    <div class="form-group row mb-3">
                                        <label for="okt" class="col-sm-4 col-form-label">Oktober: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="okt" name="okt" value="<?php echo e("Rp ".format_uang($guru->okt)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="nov" class="col-sm-4 col-form-label">November: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nov" name="nov" value="<?php echo e("Rp ".format_uang($guru->nov)); ?>" readonly>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-3">
                                        <label for="des" class="col-sm-4 col-form-label">Desember: </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="des" name="des" value="<?php echo e("Rp ".format_uang($guru->des)); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <code><hr></code>
                    </div>

                    <div class="row">
                        <div class="form-group row mb-3">
                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo e("Rp ".format_uang($guru->jumlah)); ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="pajak" class="col-sm-3 col-form-label">Pajak (%): </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pajak" name="pajak" value="<?php echo e($guru->pajak."%"); ?>" readonly>
                            </div>
                        </div>
        
                        <div class="form-group row mb-3">
                            <label for="nom_pajak" class="col-sm-3 col-form-label">Nominal Pajak: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nom_pajak" name="nom_pajak" value="<?php echo e("Rp ".format_uang($guru->nom_pajak)); ?>" readonly>
                            </div>
                        </div>
        
                        <div class="form-group row mb-3">
                            <label for="bpjs" class="col-sm-3 col-form-label">BPJS (Max 1%): </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bpjs" name="bpjs" value="<?php echo e("Rp ".format_uang($guru->bpjs)); ?>" readonly>
                            </div>
                        </div>
        
                        <div class="form-group row mb-3">
                            <label for="jumlah_diterima" class="col-sm-3 col-form-label">Jumlah Diterima: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jumlah_diterima" name="jumlah_diterima" value="<?php echo e("Rp ".format_uang($guru->jumlah_diterima)); ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="<?php echo e(route('operator.guru')); ?>" class="btn" style="width: 100%">Kembali</a>
                    </div>
                    <div class="col">
                        <a href="<?php echo e(route('operator.edit_guru', $guru->id)); ?>" class="btn btn-save" style="width: 100%">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/guru/detail.blade.php ENDPATH**/ ?>