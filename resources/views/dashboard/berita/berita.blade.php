@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">    
@endsection

@section('page')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Berita terbaru mengenai Tunjangan Profesi Guru yang disediakan oleh operator dinas.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Berita</h4>
            </div>
            <div class="card-body">
                <a class="btn" href="{{ route('admin.add_berita') }}">+Add New Berita</a><br /><br />
                <table class="table table-inverse table-responsive table-hover" id="beritaTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Author</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $value)
                        <tr>
                            <td>{{ $value->admin->name }}</td>
                            <td><a href="{{ route('operator.detail_berita', $value->id) }}" >{{ $value->judul }}</a></td>
                            <td>
                                @if(strlen($value->isi) > 75)
                                    {!! substr($value->isi,0,75) !!}. . .
                                @else
                                    {!! $value->isi !!}
                                @endif
                            </td>
                            <td style="white-space: nowrap">
                                @if ($value->nama_file)
                                    <a href="{{ route('downloadFile', $value->nama_file) }}"><i class="bi bi-cloud-arrow-down-fill"></i></a>
                                @else
                                    <p> </p>
                                @endif 
                            </td>    
                            <td><a href="{{ route('admin.edit_berita', $value->id) }}"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;&nbsp;
                                @if ($value->nama_file)
                                    <a href="{{ route('admin.delete_file', ['id'=>$value->id, 'filename'=>$value->nama_file]) }}" class="button delete-confirm"
                                        data-id="{{ $value->id }}"><i class="bi bi-trash-fill text-danger"></i></a>
                                @else
                                    <a href="{{ route('admin.delete_berita', $value->id) }}" class="button delete-confirm" 
                                        data-id="{{ $value->id }}"><i class="bi bi-trash-fill text-danger"></i></span></a>
                                @endif
                            </td>                        
                        </tr>
                        @endforeach   
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
        $('#beritaTable').DataTable();
    } );
</script>
@endsection