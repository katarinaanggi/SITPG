@extends('layouts.main')

@section('page')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Selamat Datang di Sistem Informasi Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Sistem Informasi Tunjangan Profesi Guru ini disediakan oleh operator Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah.</p>
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

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="{{ route('admin.home') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                    <button class="btn btn-save" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    
    @if ($berita->count())
        <div class="card" id="news">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="tags">
                        <div class="tag">New!</div>
                    </div>
                    <h4 class="card-title">
                        <a href="{{ route('admin.detail_berita', $berita[0]->id) }}">{{ $berita[0]->judul }}</a>
                    </h4>
                    <p class="card-text isinya">
                        @if(strlen($berita[0]->isi) > 500)
                            {!! substr($berita[0]->isi,0,500) !!}. . .
                        @else
                            {!! $berita[0]->isi !!}
                        @endif
                    </p>
                    <div class="date">{{ \Carbon\Carbon::parse($berita[0]->created_at)->diffForHumans() }}</div>
                </div>
            </div>
            <div id="cf" class="card-footer d-flex">
                
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#viewDetails" data-bs-backdrop="false">
                        Read More
                    </button>

                @if ($berita[0]->nama_file)
                    <a href="{{ route('downloadFile', $berita[0]->nama_file) }}" data-bs-toggle="tooltip" title={{$berita[0]->nama_file}}>
                        <i class="bi bi-cloud-arrow-down-fill float-right" id="donwnloadfile" style="font-size:26px; "></i>
                    </a>
                @endif 
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="viewDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $berita[0]->judul }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="card-text"><small class="text-muted">Created at {{ $berita[0]->created_at->format('d-m-Y') }} by Admin</small></p> 
                    <p style="text-align: justify; text-justify: inter-word;">{!! $berita[0]->isi !!}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    @if ($berita[0]->nama_file)
                        <a href="{{ route('downloadFile', $berita[0]->nama_file) }}" class="mr-auto"> 
                            Download file 
                        </a>
                    @endif
                    <button type="button" class="btn btn-save" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    @else 
        <p class="text-center">Not Found</p> 
    @endif

    <section class="wrapper">
        <div class="container">
            <div class="row">
                @foreach ($berita->skip(1) as $value)
                <div class="col-md-4">
                    <div class="card bcard-hover">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('admin.detail_berita', $value->id) }}">{{ $value->judul }}</a>
                                </h4>
                                <p class="card-text " >
                                    @if(strlen($value->isi) > 50)
                                        {!! substr($value->isi,0,50) !!}. . .
                                    @else
                                        {!! $value->isi !!}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span><small class="text-muted">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</small></span>
                            <a href="{{ route('admin.detail_berita', $value->id) }}" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </section>    
@endsection