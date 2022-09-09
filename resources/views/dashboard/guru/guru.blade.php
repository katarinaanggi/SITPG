@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/css/landing/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing/magnific-popup.css') }}">
    
    
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: white;
            color: var(--army);
        }

        .nav-pills .nav-link.active {
            box-shadow: none;
        }

        .alert-warning {
            background-color: #ffc107;
            color: #483602;
        }

        .bi {
            position: relative;
            top: calc(50% - 10px);
            color: #483602;
        }

        .shot-item {
            margin-right: 15px;
            border-radius: 4px;
            background: #fff;
            position: relative;
        }

        .shot-item img {
            width: 100%;
        }

        .shot-item .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            text-align: center;
            opacity: 0;
            background: rgba(0, 0, 0, 0.7);
            top: 0;
            left: 0;
        }

        .shot-item:hover .overlay {
            opacity: 1;
        }

        .overlay .item-icon {
            height: 48px;
            width: 48px;
            line-height: 48px;
            color: #61D2B4;
            left: 50%;
            margin-left: -24px;
            margin-top: -24px;
            top: 50%;
            position: absolute;
            z-index: 2;
            visibility: hidden;
            opacity: 0;
            cursor: pointer;
            text-align: center;
            font-size: 20px;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
            border: 1px solid #61D2B4;
            border-radius: 50%;
        }

        .overlay .item-icon:hover {
            background: #61D2B4;
            color: #fff;
        }

        .shot-item:hover .item-icon {
            visibility: visible;
            opacity: 1;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            background: #61D2B4;
            opacity: 0.9;
            filter: alpha(opacity=90);
        }
    </style>
@endsection

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
                <ul class="nav nav-pills" id="pills-import" role="tablist">
                    @if ($key = Session::get('pill'))  
                        <li class="nav-item" role="presentation">
                            <button class="nav-link card-title {{ ($key == 'dataguru') ? 'active' : '' }}" id="pills-dg-tab" data-bs-toggle="pill" data-bs-target="#pills-dg" role="tab" aria-controls="pills-dg" aria-selected="true">Data Guru</button>
                        </li>
                        @auth('admin')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link card-title {{ ($key == 'import') ? 'active' : '' }}" id="pills-imp-tab" data-bs-toggle="pill" data-bs-target="#pills-imp" role="tab" aria-controls="pills-imp" aria-selected="false">Import Excel</button>
                        </li>
                        @endauth
                    @else
                        <li class="nav-item" role="presentation">
                            <button class="nav-link card-title active" id="pills-dg-tab" data-bs-toggle="pill" data-bs-target="#pills-dg" role="tab" aria-controls="pills-dg" aria-selected="true">Data Guru</button>
                        </li>
                        @auth('admin')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link card-title" id="pills-imp-tab" data-bs-toggle="pill" data-bs-target="#pills-imp" role="tab" aria-controls="pills-imp" aria-selected="false">Import Excel</button>
                        </li>
                        @endauth
                    @endif
                </ul>
            </div>
            <div class="card-body" >
                <div class="tab-content" id="pills-tabContent">
                    @if ($key = Session::get('pill'))
                    <a class="btn" href="{{ route('operator.add_guru') }}">+Add New Guru</a>
                    <a class="btn btn-save" href="{{ route('operator.deleteAll_guru') }}" id="delall">Delete All Data</a><br /><br />
                        <div class="tab-pane fade {{ ($key == 'dataguru') ? 'show active' : '' }}" id="pills-dg" role="tabpanel" aria-labelledby="pills-dg-tab">
                            {{-- <div style="position: absolute; left: 65%; width: auto">
                            </div> --}}
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
                            <a class="btn btn-save mt-3" href="{{ route('operator.file_export') }}">Export All Data</a>
                        </div>

                        @auth('admin')
                            <div class="tab-pane fade {{ ($key == 'import') ? 'show active' : '' }}" id="pills-imp" role="tabpanel" aria-labelledby="pills-imp-tab">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger align-items-center" role="alert">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div>
                                                Terjadi kesalahan. Mohon baca kembali aturan yang ditentukan.
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        <div>
                                            Baca aturan upload file excel yang sudah disediakan.
                                        </div>
                                    </div>
                                @endif
                                <div>
                                    <b>Aturan:</b>
                                    <ul>
                                        <li>Ukuran file tidak boleh lebih dari 2MB.</li>
                                        <li>Ekstensi yang diperbolehkan hanya xlsx dan xls.</li>
                                        {{-- <li>Data yang dimasukkan tidak boleh lebih dari 10.000 data. Jika terdapat data lebih dari 10.000, diharapkan dipecah terlebih dahulu.</li> --}}
                                        <li>Sheet dalam file maksimal 1 sheet.</li>
                                        <li>Penamaan header file sebaiknya sama seperti contoh di bawah ini.</li>
                                        <div class="shot-item">
                                            <img src="{{ asset('assets/images/samples/header.png') }}" alt="" />  
                                            <a class="overlay lightbox" href="{{ asset('assets/images/samples/header.png') }}">
                                                <i class="bi bi-eye item-icon"></i>
                                            </a>
                                        </div>
                                        <p>*Tidak perlu semua header harus ada.</p>
                                    </ul>
                                </div>
                                <form action="{{ route('admin.file_import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4" >
                                        <label>Import File</label>
                                        <div class="input-group mb-3">
                                            <input type="file" id="importfile" name="importfile" class="form-control" aria-describedby="button-addon2">
                                            <button class="btn btn-save" type="submit" id="button-addon2">Import</button>
                                        </div>
                                        <span class="text-danger">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </span>
                                    </div>
                                </form>                    
                            </div>                            
                        @endauth
                    @else
                    <div class="tab-pane fade show active" id="pills-dg" role="tabpanel" aria-labelledby="pills-dg-tab">
                            <a class="btn" href="{{ route('operator.add_guru') }}">+Add New Guru</a>
                            <a class="btn btn-save" href="{{ route('operator.deleteAll_guru') }}" id="delall">Delete All Data</a><br /><br />
                            {{-- <div style="position: absolute; left: 65%; width: auto">
                            </div> --}}
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
                            <a class="btn btn-save mt-3" href="{{ route('operator.file_export') }}">Export All Data</a>
                        </div>

                        @auth('admin')
                            <div class="tab-pane fade" id="pills-imp" role="tabpanel" aria-labelledby="pills-imp-tab">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger align-items-center" role="alert">
                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div>
                                                Terjadi kesalahan. Mohon baca kembali aturan yang ditentukan.
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </svg>
                                        <div>
                                            Baca aturan upload file excel yang sudah disediakan.
                                        </div>
                                    </div>
                                @endif
                                <div>
                                    <b>Aturan:</b>
                                    <ul>
                                        <li>Ukuran file tidak boleh lebih dari 2MB.</li>
                                        <li>Ekstensi yang diperbolehkan hanya xlsx dan xls.</li>
                                        {{-- <li>Data yang dimasukkan tidak boleh lebih dari 10.000 data. Jika terdapat data lebih dari 10.000, diharapkan dipecah terlebih dahulu.</li> --}}
                                        <li>Sheet dalam file maksimal 1 sheet.</li>
                                        <li>Penamaan header file sebaiknya sama seperti contoh di bawah ini.</li>
                                        <div class="shot-item">
                                            <img src="{{ asset('assets/images/samples/header.png') }}" alt="" />  
                                            <a class="overlay lightbox" href="{{ asset('assets/images/samples/header.png') }}">
                                                <i class="bi bi-eye item-icon"></i>
                                            </a>
                                        </div>
                                        <p>*Tidak perlu semua header harus ada.</p>
                                    </ul>
                                </div>
                                <form action="{{ route('admin.file_import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4" >
                                        <label>Import File</label>
                                        <div class="input-group mb-3">
                                            <input type="file" id="importfile" name="importfile" class="form-control" aria-describedby="button-addon2">
                                            <button class="btn btn-save" type="submit" id="button-addon2">Import</button>
                                        </div>
                                        <span class="text-danger">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </span>
                                    </div>
                                </form>                    
                            </div>                            
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection

@section('datatable')
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
                ajax: '{!! route('operator.data_guru') !!}',
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
@endsection

@section('script')
    
<script src="{{ asset('assets/js/landing/nivo-lightbox.js') }}"></script>
<script src="{{ asset('assets/js/landing/jquery.magnific-popup.min.js') }}"></script>  
 

<script type="text/javascript">
    $('.overlay').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });
    $('.lightbox').nivoLightbox({
        effect: 'fadeScale',
        keyboardNav: true,
    });
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
@endsection