<div style="white-space: nowrap;">
    <a href="<?php echo e(route('admin.detail_guru', $model->id)); ?>"><i class="bi bi-eye-fill text-primary"></i></i></a>&nbsp;&nbsp;
    <a href="<?php echo e(route('admin.edit_guru', $model->id)); ?>"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;&nbsp;
    <a href="<?php echo e(route('admin.delete_guru', $model->id)); ?>" class="button delete-confirm" data-id="<?php echo e($model->id); ?>"><i class="bi bi-trash-fill text-danger"></i></span></a>
</div>
    
    <script type="text/javascript">
        // Set delete confirmation alert
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
        
    </script><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/guru/action.blade.php ENDPATH**/ ?>