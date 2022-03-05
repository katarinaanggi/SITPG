

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/styles.css')); ?>">    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Guru Jawa Tengah</h3>
                <p class="text-subtitle text-muted">Mengelola data guru.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Guru</h4>
            </div>
            <div class="card-body">
                <a class="btn" href="<?php echo e(route('operator.add_guru')); ?>">+Add New Guru</a>
                <a class="btn btn-save" href="<?php echo e(route('operator.deleteAll_guru')); ?>" id="delall">Delete All Data</a><br /><br />
                <?php if(auth()->guard('admin')->check()): ?>
                <form action="<?php echo e(route('admin.file_import')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4" >
                        <label>Import File</label>
                        <div class="input-group mb-3">
                            <input type="file" id="importfile" name="importfile" class="form-control" aria-describedby="button-addon2">
                            <button class="btn btn-save" type="submit" id="button-addon2">Import</button>
                        </div>
                        <?php if($message = Session::get('file')): ?>
                            <span class="text-danger">*<?php echo e($message); ?></span>
                        <?php endif; ?>
                    </div>
                </form>                    
                <?php endif; ?>
                <table class="table table-inverse table-responsive table-hover" id="guruTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Action</th>
                            <th>ID</th>
                            <th>NRG</th>
                            <th>No. Peserta</th>
                            <th>NUPTK</th>
                            <th>No. SK</th>
                            <th>Nama</th>
                            <th>Jenjang</th>
                            <th>Tempat Tugas</th>
                            <th>Kab/Kota</th>
                            <th>NIP</th>
                            <th>Nama Bank</th>
                            <th>Kantor Cabang</th>
                            <th>No. Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Pangkat/Gol</th>
                            <th>Masa Kerja</th>
                            <th>Gaji Pokok</th>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>Mei</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Agu</th>
                            <th>Sep</th>
                            <th>Okt</th>
                            <th>Nov</th>
                            <th>Des</th>
                            <th>Jumlah</th>
                            <th>Pajak (%)</th>
                            <th>Nominal Pajak</th>
                            <th>BPJS Max 1%</th>
                            <th>Jumlah Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <a class="btn btn-save mt-3" href="<?php echo e(route('operator.file_export')); ?>">Export All Data</a>
            </div>
        </div>
    </section>
</div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('datatable'); ?>
<script>
    $(document).ready( function () {
        $('#guruTable thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#guruTable thead');

        var s = $('#guruTable').DataTable(
            {
                processing: true,
                serverSide: true,
                scrollX: true,
                scrollY: 500,
                scrollCollapse: true,
                orderCellsTop: true,
                fixedHeader: true,
                fixedColumns: true,
                ajax: '<?php echo route('operator.data_guru'); ?>',
                columns: [
                    { data: 'action', name: 'action' },
                    { data: 'id', name: 'id' },
                    { data: 'nrg', name: 'nrg' },
                    { data: 'no_peserta', name: 'no_peserta' },
                    { data: 'nuptk', name: 'nuptk' },
                    { data: 'no_sk', name: 'no_sk' },
                    { data: 'nama', name: 'nama' },
                    { data: 'jenjang', name: 'jenjang' },
                    { data: 'tempat_tugas', name: 'tempat_tugas' },
                    { data: 'kota', name: 'kota' },
                    { data: 'nip', name: 'nip' },
                    { data: 'nama_bank', name: 'nama_bank' },
                    { data: 'kantor_cabang', name: 'kantor_cabang' },
                    { data: 'no_rek', name: 'no_rek' },
                    { data: 'nama_rek', name: 'nama_rek' },
                    { data: 'pangkat', name: 'pangkat' },
                    { data: 'masa_kerja', name: 'masa_kerja' },
                    { data: 'gaji_pokok', name: 'gaji_pokok' },
                    { data: 'jan', name: 'jan' },
                    { data: 'feb', name: 'feb' },
                    { data: 'mar', name: 'mar' },
                    { data: 'apr', name: 'apr' },
                    { data: 'mei', name: 'mei' },
                    { data: 'jun', name: 'jun' },
                    { data: 'jul', name: 'jul' },
                    { data: 'agu', name: 'agu' },
                    { data: 'sep', name: 'sep' },
                    { data: 'okt', name: 'okt' },
                    { data: 'nov', name: 'nov' },
                    { data: 'des', name: 'des' },
                    { data: 'jumlah', name: 'jumlah' },
                    { data: 'pajak', name: 'pajak' },
                    { data: 'nom_pajak', name: 'nom_pajak' },
                    { data: 'bpjs', name: 'bpjs' },
                    { data: 'jumlah_diterima', name: 'jumlah_diterima' }
                ],
                dom: 'lrtipB',
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Export Current Page',
                        title: 'SITPG Data TPG TW I 2022',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34 ]
                        }
                    }
                ],
                initComplete: function () {
                    var api = this.api();
        
                    // For each column
                    api
                        .columns(':gt(0)')
                        .eq(0)
                        .each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" style="width:100%" placeholder="' + title + '" />');
        
                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('keyup change', function (e) {
                                    e.stopPropagation();
        
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();
        
                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != ''
                                                ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                : '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
        
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            }
        );
    } );
</script>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    // Set delete confirmation alert
    $('#delall').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin?',
            text: 'Semua data akan dihapus secara permanen!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\IF\Semester 5\Pengembangan Berbasis Platform\Laravel\SITPG\resources\views/dashboard/guru/guru.blade.php ENDPATH**/ ?>