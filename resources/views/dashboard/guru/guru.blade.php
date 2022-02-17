@extends('layouts.main')

@section('page')
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar User</h4>
            </div>
            <div class="card-body">
                <a class="btn" href="{{ route('admin.add_guru') }}">+Add New Guru</a>
                <a class="btn btn-save" href="{{ route('admin.deleteAll_guru') }}" id="delall">Delete All Data</a><br /><br />
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
            </div>
        </div>
    </section>
</div>    
@endsection

@section('datatable')
<script>
    $(document).ready( function () {
        var s = $('#guruTable').DataTable(
            {
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.data_guru') !!}',
                columns: [
                    { data: 'action', name: 'action' },
                    { data: 'id', name: 'gurus.id' },
                    { data: 'nrg', name: 'gurus.nrg' },
                    { data: 'no_peserta', name: 'gurus.no_peserta' },
                    { data: 'nuptk', name: 'gurus.nuptk' },
                    { data: 'no_sk', name: 'gurus.no_sk' },
                    { data: 'nama', name: 'gurus.nama' },
                    { data: 'jenjang', name: 'gurus.jenjang' },
                    { data: 'tempat_tugas', name: 'gurus.tempat_tugas' },
                    { data: 'nama_kota', name: 'kota.nama_kota' },
                    { data: 'nip', name: 'gurus.nip' },
                    { data: 'nama_bank', name: 'gurus.nama_bank' },
                    { data: 'kantor_cabang', name: 'gurus.kantor_cabang' },
                    { data: 'no_rek', name: 'gurus.no_rek' },
                    { data: 'nama_rek', name: 'gurus.nama_rek' },
                    { data: 'pangkat', name: 'gurus.pangkat' },
                    { data: 'masa_kerja', name: 'gurus.masa_kerja' },
                    { data: 'gaji_pokok', name: 'gurus.gaji_pokok' },
                    { data: 'jan', name: 'gurus.jan' },
                    { data: 'feb', name: 'gurus.feb' },
                    { data: 'mar', name: 'gurus.mar' },
                    { data: 'jumlah', name: 'gurus.jumlah' },
                    { data: 'pajak', name: 'gurus.pajak' },
                    { data: 'nom_pajak', name: 'gurus.nom_pajak' },
                    { data: 'bpjs', name: 'gurus.bpjs' },
                    { data: 'jumlah_diterima', name: 'gurus.jumlah_diterima' }
                ],
                scrollX: true,
            }
        );
    } );
</script>    
@endsection

@section('script')
<script type="text/javascript">
    // Set delete confirmation alert
    $('#delall').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'All record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection