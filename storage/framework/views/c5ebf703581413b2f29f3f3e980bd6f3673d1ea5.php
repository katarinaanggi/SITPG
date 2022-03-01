

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
                    <?php if(Auth::guard('admin')->check()): ?>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('operator.guru')); ?>">Data Guru</a></li>
                    <?php elseif(Auth::guard('web')->check()): ?>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('operator.guru')); ?>">Data Guru</a></li>
                    <?php endif; ?>
                    <li class="breadcrumb-item active" aria-current="page">Add Guru</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<form action="<?php echo e(route('operator.store_guru')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger">
        <strong><?php echo e($message); ?></strong>
    </div>
    <?php endif; ?>
    
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-content">
                <a href="<?php echo e(route('operator.guru')); ?>"><i class="bi bi-x-lg"></i></a>
                <div class="card-header"><h3 class="text-center">Create New Guru</h3></div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="no_peserta" class="col-sm-3 col-form-label">No. Peserta: </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="no_peserta" name="no_peserta" value="<?php echo e(old('no_peserta')); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            <?php $__errorArgs = ['no_peserta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">*<?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="nama" class="col-sm-3 col-form-label">Nama: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(old('nama')); ?>">
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">*<?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="nip" class="col-sm-3 col-form-label">NIP: </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="nip" name="nip" value="<?php echo e(old('nip')); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            <?php $__errorArgs = ['nip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">*<?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col">
                            <h5 >Kepegawaian</h5>
                            <div class="form-group row mb-3">
                                <label for="nrg" class="col-sm-3 col-form-label">NRG: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="nrg" name="nrg" value="<?php echo e(old('nrg')); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <?php $__errorArgs = ['nrg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
        
                            <div class="form-group row mb-3">
                                <label for="nuptk" class="col-sm-3 col-form-label">NUPTK: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="nuptk" name="nuptk" value="<?php echo e(old('nuptk')); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <?php $__errorArgs = ['nuptk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="no_sk" class="col-sm-3 col-form-label">No. SK: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_sk" name="no_sk" value="<?php echo e(old('no_sk')); ?>">
                                    <?php $__errorArgs = ['no_sk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
        
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Jenjang: </label>
                                <div class="col-sm-9">
                                    <label class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" id="pengawas" name="jenjang" value="PENGAWAS" <?php echo e((old('jenjang') == 'PENGAWAS') ? 'checked' : ''); ?>> Pengawas <br/>
                                            <input type="radio" class="form-check-input" id="slb" name="jenjang" value="SLB" <?php echo e((old('jenjang') == 'SLB') ? 'checked' : ''); ?>> SLB <br/>
                                            <input type="radio" class="form-check-input" id="smk" name="jenjang" value="SMK" <?php echo e((old('jenjang') == 'SMK') ? 'checked' : ''); ?>> SMK <br/>
                                            <input type="radio" class="form-check-input" id="sma" name="jenjang" value="SMA" <?php echo e((old('jenjang') == 'SMA') ? 'checked' : ''); ?>> SMA <br/>
                                        </label>
                                    </label>
                                    <?php $__errorArgs = ['jenjang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="tempat_tugas" class="col-sm-3 col-form-label">Tempat Tugas: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tempat_tugas" name="tempat_tugas" value="<?php echo e(old('tempat_tugas')); ?>">
                                    <?php $__errorArgs = ['tempat_tugas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="kota" class="col-sm-3 col-form-label">Kabupaten/Kota: </label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="kota" name="kota" >
                                        <option value="">--pilih wilayah kabupaten/kota--</option>
                                        <?php $__currentLoopData = $kota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k->nama_kota); ?>" <?php echo e(old('kota') == $k->nama_kota ? 'selected' : ''); ?>><?php echo e($k->nama_kota); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['kota'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <h5 >Rekening</h5>
                            <div class="form-group row mb-3">
                                <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="<?php echo e(old('nama_bank')); ?>">
                                    <?php $__errorArgs = ['nama_bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="kantor_cabang" class="col-sm-3 col-form-label">Kantor Cabang: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kantor_cabang" name="kantor_cabang" value="<?php echo e(old('kantor_cabang')); ?>">
                                    <?php $__errorArgs = ['kantor_cabang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="no_rek" class="col-sm-3 col-form-label">No. Rekening: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="no_rek" name="no_rek" value="<?php echo e(old('no_rek')); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <?php $__errorArgs = ['no_rek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="nama_rek" class="col-sm-3 col-form-label">Nama Rekening: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_rek" name="nama_rek" value="<?php echo e(old('nama_rek')); ?>">
                                    <?php $__errorArgs = ['nama_rek'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">   
                        <h5 >Pendapatan</h5>            
                        <div class="col"> 
                            <div class="form-group row mb-3">
                                <label for="pangkat" class="col-sm-3 col-form-label">Pangkat/Golongan: </label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="pangkat" name="pangkat" >
                                        <option value="">--pilih pangkat/golongan--</option>
                                        <option value="I/a" <?php echo e(old('pangkat') == 'I/a' ? 'selected' : ''); ?>>I/A</option>
                                        <option value="I/b" <?php echo e(old('pangkat') == 'I/b' ? 'selected' : ''); ?>>I/B</option>
                                        <option value="I/c" <?php echo e(old('pangkat') == 'I/c' ? 'selected' : ''); ?>>I/C</option>
                                        <option value="I/d" <?php echo e(old('pangkat') == 'I/d' ? 'selected' : ''); ?>>I/D</option>
                                        <option value="II/a" <?php echo e(old('pangkat') == 'II/a' ? 'selected' : ''); ?>>II/A</option>
                                        <option value="II/b" <?php echo e(old('pangkat') == 'II/b' ? 'selected' : ''); ?>>II/B</option>
                                        <option value="II/c" <?php echo e(old('pangkat') == 'II/c' ? 'selected' : ''); ?>>II/C</option>
                                        <option value="II/d" <?php echo e(old('pangkat') == 'II/d' ? 'selected' : ''); ?>>II/D</option>
                                        <option value="III/a" <?php echo e(old('pangkat') == 'III/a' ? 'selected' : ''); ?>>III/A</option>
                                        <option value="III/b" <?php echo e(old('pangkat') == 'III/b' ? 'selected' : ''); ?>>III/B</option>
                                        <option value="III/c" <?php echo e(old('pangkat') == 'III/c' ? 'selected' : ''); ?>>III/C</option>
                                        <option value="III/d" <?php echo e(old('pangkat') == 'III/d' ? 'selected' : ''); ?>>III/D</option>
                                        <option value="IV/a" <?php echo e(old('pangkat') == 'IV/a' ? 'selected' : ''); ?>>IV/A</option>
                                        <option value="IV/b" <?php echo e(old('pangkat') == 'IV/b' ? 'selected' : ''); ?>>IV/B</option>
                                        <option value="IV/c" <?php echo e(old('pangkat') == 'IV/c' ? 'selected' : ''); ?>>IV/C</option>
                                        <option value="IV/d" <?php echo e(old('pangkat') == 'IV/d' ? 'selected' : ''); ?>>IV/D</option>
                                    </select>
                                    <?php $__errorArgs = ['pangkat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="masa_kerja" class="col-sm-3 col-form-label">Masa Kerja: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="masa_kerja" name="masa_kerja" value="<?php echo e(old('masa_kerja')); ?>">
                                    <?php $__errorArgs = ['masa_kerja'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
        
                            <div class="form-group row mb-3">
                                <label for="gaji_pokok" class="col-sm-3 col-form-label">Gaji Pokok: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?php echo e(old('gaji_pokok')); ?>">
                                    <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        </div>
                        
                        <div class="col">
                            <div class="form-group row mb-3">
                                <label for="triw" class="col-sm-3 col-form-label">Triwulan: </label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="triw" name="triw" >
                                        <option value="">--pilih triwulan--</option>
                                        <option value="1" <?php echo e(old('triw') == '1' ? 'selected' : ''); ?>>I</option>
                                        <option value="2" <?php echo e(old('triw') == '2' ? 'selected' : ''); ?>>II</option>
                                        <option value="3" <?php echo e(old('triw') == '3' ? 'selected' : ''); ?>>III</option>
                                        <option value="4" <?php echo e(old('triw') == '4' ? 'selected' : ''); ?>>IV</option>
                                    </select>
                                    <?php $__errorArgs = ['triw'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger">*<?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="tw-I">
                                <div class="form-group row mb-3">
                                    <label for="jan" class="col-sm-4 col-form-label">Januari: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="jan" name="jan" value="<?php echo e(old('jan')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Januari is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="feb" class="col-sm-4 col-form-label">Februari: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="feb" name="feb" value="<?php echo e(old('feb')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Februari is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="mar" class="col-sm-4 col-form-label">Maret: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="mar" name="mar" value="<?php echo e(old('mar')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Maret is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-II" style="display: none">
                                <div class="form-group row mb-3">
                                    <label for="apr" class="col-sm-4 col-form-label">April: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="apr" name="apr" value="<?php echo e(old('apr')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for April is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="mei" class="col-sm-4 col-form-label">Mei: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="mei" name="mei" value="<?php echo e(old('mei')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Mei is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="jun" class="col-sm-4 col-form-label">Juni: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="jun" name="jun" value="<?php echo e(old('jun')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Juni is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-III" style="display: none">
                                <div class="form-group row mb-3">
                                    <label for="jul" class="col-sm-4 col-form-label">Juli: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="jul" name="jul" value="<?php echo e(old('jul')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Juli is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="agu" class="col-sm-4 col-form-label">Agustus: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="agu" name="agu" value="<?php echo e(old('agu')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Agustus is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="sep" class="col-sm-4 col-form-label">September: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="sep" name="sep" value="<?php echo e(old('sep')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for September is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tw-IV" style="display: none">
                                <div class="form-group row mb-3">
                                    <label for="okt" class="col-sm-4 col-form-label">Oktober: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="okt" name="okt" value="<?php echo e(old('okt')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Oktober is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="nov" class="col-sm-4 col-form-label">November: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="nov" name="nov" value="<?php echo e(old('nov')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for November is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-3">
                                    <label for="des" class="col-sm-4 col-form-label">Desember: </label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="des" name="des" value="<?php echo e(old('des')); ?>">
                                        <?php $__errorArgs = ['gaji_pokok'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">*Gaji for Desember is required</div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo e(old('jumlah')); ?>">
                                <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
    
                        <div class="form-group row mb-3">
                            <label for="pajak" class="col-sm-3 col-form-label">Pajak (%): </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="pajak" name="pajak" value="<?php echo e(old('pajak')); ?>">
                                <?php $__errorArgs = ['pajak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="nom_pajak" class="col-sm-3 col-form-label">Nominal Pajak: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="nom_pajak" name="nom_pajak" value="<?php echo e(old('nom_pajak')); ?>">
                                <?php $__errorArgs = ['nom_pajak'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
    
                        <div class="form-group row mb-3">
                            <label for="bpjs" class="col-sm-3 col-form-label">BPJS (Max 1%): </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="bpjs" name="bpjs" value="<?php echo e(old('bpjs')); ?>">
                                <?php $__errorArgs = ['bpjs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
    
                        <div class="form-group row mb-3">
                            <label for="jumlah_diterima" class="col-sm-3 col-form-label">Jumlah Diterima: </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="jumlah_diterima" name="jumlah_diterima" value="<?php echo e(old('jumlah_diterima')); ?>">
                                <?php $__errorArgs = ['jumlah_diterima'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-save btn-block mt-4">
                        Add New User
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        var gapok = document.getElementById('gaji_pokok');
        var tw = document.getElementById('triw');
        var jan = document.getElementById('jan');
        var feb = document.getElementById('feb');
        var mar = document.getElementById('mar');
        var apr = document.getElementById('apr');
        var mei = document.getElementById('mei');
        var jun = document.getElementById('jun');
        var jul = document.getElementById('jul');
        var agu = document.getElementById('agu');
        var sep = document.getElementById('sep');
        var okt = document.getElementById('okt');
        var nov = document.getElementById('nov');
        var des = document.getElementById('des');
        var jml = document.getElementById('jumlah');
        var pajak = document.getElementById('pajak');
        var nom = document.getElementById('nom_pajak');
        var bpjs = document.getElementById('bpjs');
        var diterima = document.getElementById('jumlah_diterima');

        $(".row").keyup(function(){
            jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value) + Number(apr.value) + Number(mei.value) + Number(jun.value) + Number(jul.value) + Number(agu.value) + Number(sep.value) + Number(okt.value) + Number(nov.value) + Number(des.value);
            nom.value = jml.value*pajak.value/100;
            diterima.value = Number(jml.value) - Number(nom.value) - Number(bpjs.value);
        }); 

        $("#gaji_pokok").keyup(function(){
            var triw = $('#triw').find(":selected").text();
            switch(triw){
                case 'I':
                    $(".tw-I").show();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    jan.value = feb.value = mar.value = gapok.value;
                    apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value);
                    break;
                case 'II':
                    $(".tw-I").hide();
                    $(".tw-II").show();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    apr.value = mei.value = jun.value = gapok.value;
                    jan.value = feb.value = mar.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(apr.value) + Number(mei.value) + Number(jun.value);
                    break;
                case 'III':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").show();
                    $(".tw-IV").hide();
                    jul.value = agu.value = sep.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jul.value) + Number(agu.value) + Number(sep.value);
                    break;
                case 'IV':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").show();
                    okt.value = nov.value = des.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = 0;
                    jml.value = Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
            }
            nom.value = jml.value*pajak.value/100;
            diterima.value = Number(jml.value) - Number(nom.value) - Number(bpjs.value);
        });

        $("#triw").change(function(){
            var triw = $('#triw').find(":selected").text();
            switch(triw){
                case 'I':
                    $(".tw-I").show();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    jan.value = feb.value = mar.value = gapok.value;
                    apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jan.value) + Number(feb.value) + Number(mar.value);
                    break;
                case 'II':
                    $(".tw-I").hide();
                    $(".tw-II").show();
                    $(".tw-III").hide();
                    $(".tw-IV").hide();
                    apr.value = mei.value = jun.value = gapok.value;
                    jan.value = feb.value = mar.value = jul.value = agu.value = sep.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(apr.value) + Number(mei.value) + Number(jun.value);
                    break;
                case 'III':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").show();
                    $(".tw-IV").hide();
                    jul.value = agu.value = sep.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = okt.value = nov.value = des.value = 0;
                    jml.value = Number(jul.value) + Number(agu.value) + Number(sep.value);
                    break;
                case 'IV':
                    $(".tw-I").hide();
                    $(".tw-II").hide();
                    $(".tw-III").hide();
                    $(".tw-IV").show();
                    okt.value = nov.value = des.value = gapok.value;
                    jan.value = feb.value = mar.value = apr.value = mei.value = jun.value = jul.value = agu.value = sep.value = 0;
                    jml.value = Number(okt.value) + Number(nov.value) + Number(des.value);
                    break;
            }
        });
        
    })
</script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/guru/add_guru.blade.php ENDPATH**/ ?>