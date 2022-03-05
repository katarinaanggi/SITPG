

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/profile.css')); ?>">   
    <style>
      .choices {
        margin-bottom: 0px;
      }
    </style> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('user.home')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>    
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle admin_picture" src="<?php echo e(asset('assets/images/faces/2.jpg')); ?>" alt="User profile picture">
                  </div>
                  <br>
  
                  <h3 class="profile-username text-center admin_name" style="margin: 0"><?php echo e(Auth::guard('web')->user()->name); ?></h3>
                  <p class="text-muted text-center">Operator Cabdin <?php echo e(Auth::guard('web')->user()->cabdin); ?></p>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <?php if($key = Session::get('tab')): ?>  
                      <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo e(($key == 'Personal Information') ? 'active' : ''); ?>" id="pills-pi-tab" data-bs-toggle="pill" data-bs-target="#pills-pi" type="button" role="tab" aria-controls="pills-pi" aria-selected="true">Personal Information</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo e(($key == 'Password') ? 'active' : ''); ?>" id="pills-pass-tab" data-bs-toggle="pill" data-bs-target="#pills-pass" type="button" role="tab" aria-controls="pills-pass" aria-selected="false">Change Password</button>
                      </li>
                      <?php else: ?>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pi-tab" data-bs-toggle="pill" data-bs-target="#pills-pi" type="button" role="tab" aria-controls="pills-pi" aria-selected="true">Personal Information</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link " id="pills-pass-tab" data-bs-toggle="pill" data-bs-target="#pills-pass" type="button" role="tab" aria-controls="pills-pass" aria-selected="false">Change Password</button>
                      </li>
                      <?php endif; ?>
                    </ul>
                  <?php if($message = Session::get('error')): ?>
                      <div class="alert alert-danger">
                          <strong><?php echo e($message); ?></strong>
                      </div>
                  <?php endif; ?>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <?php if($key = Session::get('tab')): ?>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade <?php echo e(($key == 'Personal Information') ? 'show active' : ''); ?>" id="pills-pi" role="tabpanel" aria-labelledby="pills-pi-tab">
                          <form class="form-horizontal" method="POST" action="<?php echo e(route('user.changeProfile', Auth::guard('web')->user()->id)); ?>" id="UserInfoForm">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('PATCH'); ?>
                              <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?php echo e(Auth::guard('web')->user()->name); ?>" name="name" minlength="5" maxlength="255">
                                    <?php $__errorArgs = ['name'];
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
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo e(Auth::guard('web')->user()->email); ?>" name="email">
                                    <?php $__errorArgs = ['email'];
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
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPhone" placeholder="Phone" value="<?php echo e(Auth::guard('web')->user()->phone); ?>" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <?php $__errorArgs = ['phone'];
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
                            <div class="form-group row">
                                <label for="inputCabdin" class="col-sm-3 col-form-label">Cabang Dinas</label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="cabdin" name="cabdin" required>
                                      <?php $__currentLoopData = $cabdin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($cd->id); ?>" <?php echo e(( $cd->id == Auth::guard('web')->user()->cabdin ) ? 'selected' : ''); ?>><?php echo e($cd->nama); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['cabdin'];
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
                            <div class="form-group row">
                              <label for="inputKota" class="col-sm-3 col-form-label">Kota/Kab</label>
                              <div class="col-sm-9">
                                  <select class="form-control choices" id="kota" name="kota" >
                                      <option value="">--pilih wilayah kabupaten/kota--</option>
                                      <?php $__currentLoopData = $kota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($k->nama_kota); ?>" <?php echo e(Auth::guard('web')->user()->kota == $k->nama_kota ? 'selected' : ''); ?>><?php echo e($k->nama_kota); ?></option>
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
                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-save">Save Changes</button>
                                </div>
                              </div>
                          </form>
                      </div><!-- /.tab-pane -->
                      <div class="tab-pane fade <?php echo e(($key == 'Password') ? 'show active' : ''); ?>" id="pills-pass" role="tabpanel" aria-labelledby="pills-pass-tab">
                          <form class="form-horizontal" action="<?php echo e(route('user.changePassword', Auth::guard('web')->user()->id)); ?>" method="POST" id="changePasswordUserForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                              <div class="form-group row">
                              <label for="inputOldPass" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputOldPass" placeholder="Enter current password" name="oldpassword">
                                <span class="text-danger"><?php $__errorArgs = ['oldpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                                <span class="text-danger"><?php $__errorArgs = ['newpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                                <span class="text-danger"><?php $__errorArgs = ['cnewpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-save btn-danger">Update Password</button>
                              </div>
                            </div>
                          </form>
                      </div> 
                    </div><!-- /.tab-content -->
                  <?php else: ?>
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-pi" role="tabpanel" aria-labelledby="pills-pi-tab">
                          <form class="form-horizontal" method="POST" action="<?php echo e(route('user.changeProfile', Auth::guard('web')->user()->id)); ?>" id="UserInfoForm">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('PATCH'); ?>
                              <div class="form-group row">
                                  <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="inputName" placeholder="Name" value="<?php echo e(Auth::guard('web')->user()->name); ?>" name="name" minlength="5" maxlength="255">
                                      <?php $__errorArgs = ['name'];
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
                              <div class="form-group row">
                                  <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                  <div class="col-sm-9">
                                      <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo e(Auth::guard('web')->user()->email); ?>" name="email">
                                      <?php $__errorArgs = ['email'];
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
                              <div class="form-group row">
                                  <label for="inputPhone" class="col-sm-3 col-form-label">Phone</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="inputPhone" placeholder="Phone" value="<?php echo e(Auth::guard('web')->user()->phone); ?>" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                      <?php $__errorArgs = ['phone'];
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
                              <div class="form-group row">
                                  <label for="inputCabdin" class="col-sm-3 col-form-label">Cabang Dinas</label>
                                  <div class="col-sm-9">
                                      <select class="form-control choices" id="cabdin" name="cabdin" required>
                                        <?php $__currentLoopData = $cabdin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cd->id); ?>" <?php echo e(( $cd->id == Auth::guard('web')->user()->cabdin ) ? 'selected' : ''); ?>><?php echo e($cd->nama); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                      <?php $__errorArgs = ['cabdin'];
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
                              <div class="form-group row">
                                <label for="inputKota" class="col-sm-3 col-form-label">Kota/Kab</label>
                                <div class="col-sm-9">
                                    <select class="form-control choices" id="kota" name="kota" >
                                        <option value="">--pilih wilayah kabupaten/kota--</option>
                                        <?php $__currentLoopData = $kota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k->nama_kota); ?>" <?php echo e(Auth::guard('web')->user()->kota == $k->nama_kota ? 'selected' : ''); ?>><?php echo e($k->nama_kota); ?></option>
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
                              <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-save">Save Changes</button>
                                </div>
                              </div>
                          </form>
                      </div><!-- /.tab-pane -->
                      <div class="tab-pane fade" id="pills-pass" role="tabpanel" aria-labelledby="pills-pass-tab">
                          <form class="form-horizontal" action="<?php echo e(route('user.changePassword', Auth::guard('web')->user()->id)); ?>" method="POST" id="changePasswordUserForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                              <div class="form-group row">
                              <label for="inputOldPass" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputOldPass" placeholder="Enter current password" name="oldpassword">
                                <span class="text-danger"><?php $__errorArgs = ['oldpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                                <span class="text-danger"><?php $__errorArgs = ['newpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                                <span class="text-danger"><?php $__errorArgs = ['cnewpassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-save btn-danger">Update Password</button>
                              </div>
                            </div>
                          </form>
                      </div> 
                    </div><!-- /.tab-content -->
                  <?php endif; ?>
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/user/profile.blade.php ENDPATH**/ ?>