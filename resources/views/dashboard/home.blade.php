@extends('layouts.main')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/styles.css') }}">    
@endsection

@section('page')

@if (Auth::guard('web')->check())
    @if (Hash::check(Auth::guard('web')->user()->email, Auth::guard('web')->user()->password))
        <div class="alert alert-warning" role="alert">
            Password anda masih password pemberian admin. Harap <a href=" {{ route('user.profile') }} ">ubah password</a> anda supaya keamanan akun tetap terjaga.
        </div>    
    @endif
@endif


    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Selamat Datang di Sistem Informasi Tunjangan Profesi Guru</h3>
                <p class="text-subtitle text-muted">Sistem Informasi Tunjangan Profesi Guru ini disediakan oleh Operator Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah.</p>
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
    
    
    @if ($cari->count())
    <div class="card" id="news">
        <div class="card-content">
            <div class="card-body text-center">
                <div class="tags">
                    <div class="tag">New!</div>
                </div>
                <h4 class="card-title">
                    <a href="{{ route('operator.detail_berita', $cari[0]->id) }}">{{ $cari[0]->judul }}</a>
                </h4>
                <p class="card-text isinya">
                    @if(strlen($cari[0]->isi) > 500)
                    {!! substr($cari[0]->isi,0,500) !!}. . .
                    @else
                        {!! $cari[0]->isi !!}
                    @endif
                </p>
                <div class="date">{{ \Carbon\Carbon::parse($cari[0]->created_at)->diffForHumans() }}</div>
            </div>
        </div>
        <div id="cf" class="card-footer d-flex">
            <button type="button" class="btn readmore" data-bs-toggle="modal" data-bs-target="#viewDetails" data-bs-backdrop="false">
                Read More
            </button>
            
            @if ($cari[0]->nama_file)
            <a href="{{ route('downloadFile', $cari[0]->nama_file) }}" data-bs-toggle="tooltip" title={{$cari[0]->nama_file}}>
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
                    <h5 class="modal-title" id="staticBackdropLabel">{{ $cari[0]->judul }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <p class="card-text"><small class="text-muted">Created at {{ $cari[0]->created_at->format('d-m-Y') }} by Admin</small></p> 
                    <p style="text-align: justify; text-justify: inter-word;">{!! $cari[0]->isi !!}</p>
                </div>
                <div class="modal-footer justify-content-between">
                    @if ($cari[0]->nama_file)
                        <a href="{{ route('downloadFile', $cari[0]->nama_file) }}" class="mr-auto"> 
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
    
    {{-- <i class="bi-search form__icon"></i> --}}
    <input type="text" class="searchq form__input" id="searchq" placeholder="Search.." name="search">
    <section class="wrapper">
        <div class="container">
            <div class="row">
                @foreach ($berita as $value)
                <div class="col-md-4">
                    <div class="card bcard-hover">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ route('operator.detail_berita', $value->id) }}">{{ $value->judul }}</a>
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
                            <a href="{{ route('operator.detail_berita', $value->id) }}" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            <div class="d-flex justify-content-center">
                {!! $berita->links() !!}
            </div>
        </div>
    </section>    
@endsection

@section('script')
    <script type="text/javascript">
        $('#searchq').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{ route('search') }}',
                data:{
                    'search':$value,
                    'login': "yes"},
                success:function(data){
                    $('.container').html(data);
                }
            });
        })
    </script>
@endsection