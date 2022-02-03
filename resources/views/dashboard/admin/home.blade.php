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
    
    @if ($berita->count())
        <div class="card">
            <div class="card-content">
                <div class="card-body text-center">
                    <h4 class="card-title">
                        <a href="#">{{ $berita[0]->judul }}</a>
                    </h4>
                    <p class="card-text" style=" text-align: justify;">
                        @if(strlen($berita[0]->isi) > 500)
                            {{ substr($berita[0]->isi,0,500) }}<span 
                                class="read-more-show hide_content">More<i class="bi bi-chevron-down"></i></span><span 
                                class="read-more-content">{{ substr($berita[0]->isi,500,strlen($berita[0]->isi)) }}<span 
                                class="read-more-hide hide_content">Less <i class="bi bi-chevron-up"></i></span> </span>
                        @else
                            {{ $berita[0] }}
                        @endif
                    </p>
                    <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($berita[0]->created_at)->diffForHumans() }}</small></p>
                </div>
            </div>
            <div class="card-footer d-flex card-read-more" style="justify-content: space-between; background-color:#F3CFFC">
                <button class="btn btn-light">Read More</button>
                @if ($berita[0]->nama_file)
                    <a href="{{ route('downloadFile', $berita[0]->nama_file) }}">
                        <i class="bi bi-cloud-arrow-down-fill float-right" style="font-size:26px; "></i>
                    </a>
                @endif 
            </div>
        </div>
    @else 
    <p>None</p>  
    @endif

    <section class="wrapper">
        <div class="container">
            <div class="row">
                @foreach ($berita->skip(1) as $value)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{ $value->judul }}</a>
                                </h4>
                                <p class="card-text " >
                                    @if(strlen($value->isi) > 50)
                                        {{ substr($value->isi,0,50) }}<span 
                                            class="read-more-show hide_content">More<i class="bi bi-chevron-down"></i></span><span 
                                            class="read-more-content">{{ substr($value->isi,50,strlen($value->isi)) }}<span 
                                            class="read-more-hide hide_content">Less <i class="bi bi-chevron-up"></i></span> </span>
                                    @else
                                        {{ $value->isi }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span><small class="text-muted">{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</small></span>
                            <button class="btn btn-light">Read More</button>
                        </div>
                        {{-- <div class="card-footer d-flex card-read-more">
                            <a href="#" class="btn btn-link btn-block" id="berita"><small>Read More</small></a>
                            @if ($value->nama_file)
                                <a href="{{ route('downloadFile', $value->nama_file) }}"><i class="bi bi-cloud-arrow-down-fill"></i></a>
                            @endif 
                        </div> --}}
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </section>    
@endsection