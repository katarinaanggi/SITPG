@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">    
@endsection

@section('page')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <a href="{{ URL::previous() }}"><i class="bi bi-arrow-return-left" style="font-size: 20px"></i></a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        @if (Auth::guard('admin')->check())
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.berita') }}">Berita</a></li>
                        @elseif (Auth::guard('web')->check())
                            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Dashboard</a></li>  
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">Detail Berita {{ $berita->id }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>        
    
    <div class="container">
        <div class="article-meta text-center">
            <h1 class="headline">{{ $berita->judul }}</h1>
            <div class="author">
                <p class="byline">by <b>{{ $berita->admin->name }}</b> {{ $berita->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        <div class="article">
            <br>
            {!! $berita->isi !!}
            <aside>
                <blockquote class="bq-short">
                    @if ($berita->nama_file)
                        <a href="{{ route('downloadFile', $berita->nama_file) }}" class="mr-auto"><b>Download file : {{ substr($berita->nama_file,11,strlen($berita->nama_file)) }}</b></a>
                    @endif
                </blockquote>
            </aside>
        </div>
    </div>
</div>
@endsection