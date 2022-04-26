<div style="white-space: nowrap;">
    <a href="{{ route('operator.detail_guru', $model->id) }}" data-bs-toggle="tooltip" title="detail guru"><i class="bi bi-eye-fill text-primary"></i></i></a>&nbsp;&nbsp;
    <a href="{{ route('operator.edit_guru', $model->id) }}" data-bs-toggle="tooltip" title="edit guru"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;&nbsp;
    <a href="{{ route('operator.delete_guru', $model->id) }}" class="button delete-confirm" data-id="{{ $model->id }}" data-bs-toggle="tooltip" title="delete guru"><i class="bi bi-trash-fill text-danger"></i></span></a>
</div>
    
    <script type="text/javascript">
        // Set delete confirmation alert
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apakah anda yakin?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
        
    </script>