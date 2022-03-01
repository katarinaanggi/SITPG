<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="Grayrids">

        <title>SITPG</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/landing/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/line-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/nivo-lightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/landing/main.css') }}">    
        <link rel="stylesheet" href="{{ asset('assets/css/landing/responsive.css') }}">  

        <!-- Styles -->
        <style>
            /* #recent {
              background-color: #60D1B3;
            } */

            #search {
              width: 170px;
              margin-left: 80%;
              box-sizing: border-box;
              border: 1px solid #195545;
              border-radius: 3px;
              font-size: 16px;
              background-color: white;
              padding: 8px 15px 8px 15px;
            }
                
            .form__icon {
                position: absolute;
                pointer-events: none;
                z-index: 2;
            }
            .form__input {
                position: relative;
                z-index: 3;
            }
            .form__input:placeholder-shown {
                z-index: 1;
            } 

            .bi-search {
                margin-top: 11px;
                margin-left: 1030px;
                font-size: 15px;
                color: #195545
            }

            #rm {
              color: #60D1B3
            }

            .card {
                display: block; 
                margin-bottom: 20px;
                line-height: 1.42857143;
                background-color: white;
                border-radius: 2px;
                box-shadow: 0 2px 5px 0 rgba(186, 235, 220, 0.37),0 2px 10px 0 rgba(186, 235, 227, 0.37); 
                transition: box-shadow .25s; 
                border-radius: 20px;
                border: none;
            }
            .card:hover {
                box-shadow: 0 8px 17px 0 rgba(186, 235, 220, 0.37),0 6px 20px 0 rgba(186, 235, 227, 0.37);
            }
            .card:before, .card:after {
                content: '';
                transform: scale(0);
                transform-origin: top left;
                border-radius: 50%;
                position: absolute;
                left: -50%;
                top: -50%;
                z-index: -5;
                transition: all, 0.3s;
                transition-timing-function: ease-in-out;
            }

            .card:hover:before, .card:hover:after {
                transform: scale(1);
            }
            /* Card bawahnya */
            .bcard-hover {
                transition: all 0.25s ease-in;
                border-bottom: 5px solid transparent;
            }
            .bcard-hover:hover {
                transform: translateY(-5px);
                border: none;
                border-bottom: 5px solid #60D1B3;
            }

            .date {
                position: absolute;
                top: 0;
                font-size: 1em;
                padding: 1em;
                line-height: 1em;
                opacity: .8;
            }

            .tags {
                display: flex;
                animation: blinker 1.5s linear infinite;
            }

            .tag {
                position: absolute;
                top: 0;
                left: 0;
                font-size: 1em;
                background: #60D1B3;
                border-radius: 0.3rem;
                padding: 0 1em;
                margin-right: 0.5em;
                line-height: 1.8em;
                color: #195545;
                transition: all, 0.3s;
            }

            #recent:hover .tags .tag {
                background: #195545;
                color: white
            }

            .my-card {
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                background-color: #fff;
                background-clip: border-box;
                box-shadow: 0px 0px 8px #195545;
                margin-bottom: 28px;
                border-radius: 35px 0;
                overflow: hidden;
                transition: .5s;
                margin: 0px 30px 0px 30px;
            }

            .my-card:hover {
                box-shadow: 0px 0px 8px #60D1B3;
            }

            .my-card img {
                max-height: 200px;
                width: 100%;
                max-width: 100%;
                height: auto;
            }

            .my-card-body {
                padding: 20px;
                margin-bottom: 20px
            }

            .my-card-body h5 {
                text-transform: capitalize;
                line-height: 25px;
                font-size: 20px
            }

            .my-card-body p {
                margin: 10px 0;
                color: #60D1B3
            }

            .social-icons {
                margin-bottom: 25px
            }

            .social-icons a {
                margin-right: 22px;
                color: #3f3642;
                font-size: 16px
            }

            .social-icons a:hover {
                color: #60D1B3
            }

            .my-card-btn {
                color: rgb(231, 231, 231);
                background-color: #60D1B3;
                padding: 10px 28px;
                text-decoration: none;
                text-transform: capitalize;
                border-radius: 10px 0;
                transition: .5s
            }

            .my-card-btn:hover {
                color: rgb(15, 15, 15)
            }

            a{
                background-color:transparent;
                color:inherit;text-decoration:inherit;
            }            
            [hidden]{
                display:none;
            }            
            html{
                line-height:1.15;
                -webkit-text-size-adjust:100%;
                font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
                line-height:1.5;
            }
            *,:after,:before{
                box-sizing:border-box;
                border:0 solid #e2e8f0
            }
            svg,video{
                display:block;
                vertical-align:middle;
            }
            video{
                max-width:100%;height:auto
            }
            .bg-white{
                --bg-opacity:1;
                background-color:#fff;
                background-color:rgba(255,255,255,var(--bg-opacity))
            }
            .bg-gray-100{
                --bg-opacity:1;
                background-color:#f7fafc;
                background-color:rgba(247,250,252,var(--bg-opacity))
            }
            .flex{display:flex}
            .grid{display:grid}
            .hidden{display:none}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .font-semibold{font-weight:600}
            .h-5{height:1.25rem}
            .h-8{height:2rem}
            .h-16{height:4rem}
            .text-sm{font-size:.875rem}
            .text-lg{font-size:1.125rem}
            .leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}
            .overflow-hidden{overflow:hidden}
            .p-6{padding:1.5rem}
            .py-4{padding-top:1rem;padding-bottom:1rem}
            .px-6{padding-left:1.5rem;padding-right:1.5rem}
            .pt-8{padding-top:2rem}.fixed{position:fixed}
            .relative{position:relative}.top-0{top:0}
            .right-0{right:0}
            .shadow{box-shadow:0 1px 3px 0 rgba(189, 1, 226, 0.1),0 1px 2px 0 rgba(203, 0, 253, 0.06)}
            .text-center{text-align:center}
            @media (min-width:768px){
                .md\:border-t-0{border-top-width:0}
                .md\:border-l{border-left-width:1px}
                .md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}
            @keyframes blinker {  
                50% { opacity: 0; }
            }
           
        </style>
    </head>
    <body >

      <!-- Header Section Start -->
      <header id="hero-area" data-stellar-background-ratio="0.5">    
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lnr lnr-menu"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
              <ul class="navbar-nav mr-auto w-100 justify-content-end">
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="#hero-area">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="#recent">Recent</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="#berita">Berita</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="#login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link page-scroll" href="#contact">Contact</a>
                </li>
              </ul>
            </div>
          </div>
  
          <!-- Mobile Menu Start -->
          <ul class="mobile-menu">
             <li>
                <a class="page-scroll" href="#hero-area">Home</a>
              </li>
              <li>
                <a class="page-scroll" href="#recent">Recent</a>
              </li>
              <li >
                <a class="page-scroll" href="#berita">Berita</a>
              </li>
              <li>
                <a class="page-scroll" href="#login">Login</a>
              </li>
              <li>
                <a class="page-scroll" href="#contact">Contact</a>
              </li>
          </ul>
          <!-- Mobile Menu End -->
  
        </nav>
        <!-- Navbar End -->   
        <div class="container">      
          <div class="row justify-content-md-center">
            <div class="col-md-10">
              <div class="contents text-center">
                <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Tunjangan Profesi Guru</h1>
                <p class="lead  wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah</p>
                <a href="#" class="btn btn-common wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Login</a>
              </div>
            </div>
          </div> 
        </div>           
      </header>
      <!-- Header Section End --> 

      <!-- recent Section Start -->
      <div id="recent" class="section" data-stellar-background-ratio="0.1">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-md-12">
              <div class="touch-slider owl-carousel owl-theme">
                @if ($cari->count())
                <div class="testimonial-item">
                  <div class="testimonial-text">
                    <div class="tags">
                        <div class="tag">New!</div>
                    </div>
                    <p>
                      @if(strlen($cari[0]->isi) > 500 || $cari[0]->nama_file)
                      {!! substr($cari[0]->isi,0,500) !!}. . . <a href="{{ route('detail_berita', $cari[0]->id) }}" id="rm">read more</a>
                      @else
                      {!! $cari[0]->isi !!}
                      @endif
                    </p>
                    <h3><a href="{{ route('detail_berita', $cari[0]->id) }}">{{ $cari[0]->judul }}</a></h3>
                    <span>{{ \Carbon\Carbon::parse($cari[0]->created_at)->diffForHumans() }}</span>
                    {{-- @if ($cari[0]->nama_file)
                        <br>
                        <a href="{{ route('downloadFile', $cari[0]->nama_file) }}" data-bs-toggle="tooltip" title={{$cari[0]->nama_file}}>
                            <i class="bi bi-cloud-arrow-down-fill" id="donwnloadfile" style="font-size:26px; "></i>
                        </a>
                    @endif  --}}
                  </div>
                </div>

                <div class="testimonial-item">
                  <div class="testimonial-text">
                    <p>
                      @if(strlen($cari[1]->isi) > 500 || $cari[1]->nama_file)
                      {!! substr($cari[1]->isi,0,500) !!}. . . <a href="{{ route('detail_berita', $cari[1]->id) }}" id="rm">read more</a>
                      @else
                      {!! $cari[1]->isi !!}
                      @endif
                    </p>
                    <h3><a href="{{ route('detail_berita', $cari[1]->id) }}">{{ $cari[1]->judul }}</a></h3>
                    <span>{{ \Carbon\Carbon::parse($cari[1]->created_at)->diffForHumans() }}</span>
                    {{-- @if ($cari[1]->nama_file)
                    <br>
                        <a href="{{ route('downloadFile', $cari[1]->nama_file) }}" data-bs-toggle="tooltip" title={{$cari[1]->nama_file}}>
                            <i class="bi bi-cloud-arrow-down-fill" id="donwnloadfile" style="font-size:26px; "></i>
                        </a>
                    @endif  --}}
                  </div>
                </div>

                <div class="testimonial-item">
                  <div class="testimonial-text">
                    <p>
                      @if(strlen($cari[2]->isi) > 500 || $cari[2]->nama_file)
                      {!! substr($cari[2]->isi,0,500) !!}. . . <a href="{{ route('detail_berita', $cari[2]->id) }}" id="rm">read more</a>
                      @else
                      {!! $cari[2]->isi !!}
                      @endif
                    </p>
                    <h3><a href="{{ route('detail_berita', $cari[2]->id) }}">{{ $cari[2]->judul }}</a></h3>
                    <span>{{ \Carbon\Carbon::parse($cari[2]->created_at)->diffForHumans() }}</span>
                    {{-- @if ($cari[2]->nama_file)
                    <br>
                        <a href="{{ route('downloadFile', $cari[2]->nama_file) }}" data-bs-toggle="tooltip" title={{$cari[2]->nama_file}}>
                            <i class="bi bi-cloud-arrow-down-fill float-right" id="donwnloadfile" style="font-size:26px; "></i>
                        </a>
                    @endif  --}}
                  </div>
                </div>

                @else 
                <div class="testimonial-item">
                  <img src="img/testimonial/customer2.jpg" alt="Client Testimonoal" />
                  <div class="testimonial-text">
                    <p>Not found.</p>
                  </div>
                </div> 
                @endif
                
            {{-- @if ($cari->count())
                <div class="card" id="news">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <div class="tags">
                                <div class="tag">New!</div>
                            </div>
                            <h4 class="card-title">
                                <a href="{{ route('operator.detail_berita', $berita[2]->id) }}">{{ $berita[0]->judul }}</a>
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
            @endif --}}

              </div>
            </div>
          </div>        
        </div>
      </div>
      <!-- recent Section Start -->

      <!-- berita Section -->
      <section id="berita" class="section">
        <!-- Container Starts -->
        <div class="container">
          <div class="section-header">          
            <h2 class="section-title">Daftar Berita</h2>
            <hr class="lines">
            <p class="section-subtitle">Daftar Berita di Sistem Informasi Tunjangan Profesi Guru.</p>
            <i class="bi-search form__icon"></i>
            <input type="text" class="search form__input" id="search" placeholder="Search.." name="search">
          </div>
        <div class="row hasilnya">
            @foreach ($berita as $value)
            <div class="col-md-4">
                <div class="card bcard-hover">
                    <div class="card-content wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                        <div class="card-body">
                            <div class="meta-tags">
                                <span class="date"><i class="bi bi-clock"></i>{{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}</span>
                            </div>
                            <h3>
                                <a href="{{ route('detail_berita', $value->id) }}" style="font-size: 20px">{{ $value->judul }}</a>
                            </h3>
                            <p>
                                @if(strlen($value->isi) > 100)
                                    {!! substr($value->isi,0,100) !!}. . .
                                @else
                                    {!! $value->isi !!}
                                @endif
                            </p>
                            <a href="{{ route('detail_berita', $value->id) }}" style="display: inline-block; font-weight: 700; letter-spacing: 1.5px;">READ MORE</a>
                        </div>
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
      <!-- berita Section End -->  

      <!-- login Section Start -->
      <section id="login" class="section">
        <div class="container">
          <div class="section-header">          
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Login Operator</h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Login diperlukan bagi anda operator tingkat cabang dinas dan admin untuk fitur lebih lengkap. <br> Untuk informasi lebih lanjut harap hubungi operator dinas selaku admin.</p>
          </div>

          <div class="relative flex items-top justify-center min-h-screen dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 wow zoomIn" data-wow-delay="0.3s">
                <div class="grid grid-cols-1 md:grid-cols-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <div class="container">
                        <div class="my-card"> 
                            <div class="my-card-body trainer-card-body justify-content-center">
                                <div class="social-icons"> 
                                    <a href="{{ route('user.login') }}">
                                        <img src="{{ asset('assets/images/logo/user.png') }}" />
                                    </a> 
                                </div>
                                <h5 style="text-align:center">Operator</h5>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="my-card"> 
                            <div class="my-card-body trainer-card-body justify-content-center">
                                <div class="social-icons"> 
                                    <a href="{{ route('admin.login') }}">
                                        <img src="{{ asset('assets/images/logo/admin.png') }}" />
                                    </a> 
                                </div>
                                <h5 style="text-align:center">Admin</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

        </div>
      </section>
      <!-- login Section End -->
  
      <!-- Contact Section Start -->
      <section id="contact" class="section" data-stellar-background-ratio="-0.2">      
          <div class="contact-form">
          <div class="container">
              <h3>Bidang Ketenagaan SMK</h3>
              {{-- <p>A. Handaya Kunwidianta</p> --}}
              <div class="row">     
                  <div class="col-lg-6 col-sm-6 col-xs-12">
                      <div class="contact-us">
                          <div class="contact-address">
                              <p>Jl. Pemuda No.134, Sekayu Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 70132. Gedung D Lt. 2</p>
                              <p class="phone">Phone: <span>(024-3515301)</span></p>
                              <p class="email">E-mail: <span>(disdikbud@jatengprov.go.id)</span></p>
                          </div>
                      </div>
                  </div>
              </div>     
            </div>
          </div>
        </div>           
      </section>
      <!-- Contact Section End -->

      <!-- Footer Section Start -->
      <footer>          
        <div class="container">
        <div class="row">
            <!-- Footer Links -->
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <ul class="footer-links"><li>
                <a href="{{ route('admin.login') }}">Login Admin</a>
                </li>
                <li>
                <a href="{{ route('user.login') }}">Login Operator</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="copyright">
                <p>All copyrights reserved &copy; 2022 - <a rel="nofollow" href="https://www.pdkjateng.go.id/">Disdikbud Prov. Jateng</a></p>
            </div>
            </div>  
        </div>
        </div>
      </footer>
      <!-- Footer Section End --> 

      <!-- Go To Top Link -->
      <a href="#" class="back-to-top">
        <i class="bi bi-arrow-up"></i>
      </a>
    
      <div id="loader">
        <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
        </div>
      </div>      

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{ asset('assets/js/landing/jquery-min.js') }}"></script>
    <script src="{{ asset('assets/js/landing/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing/jquery.mixitup.js') }}"></script>
    <script src="{{ asset('assets/js/landing/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/landing/owl.carousel.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/jquery.stellar.min.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/jquery.nav.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/scrolling-nav.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/jquery.easing.min.js') }}"></script>    
    {{-- <script src="{{ asset('assets/js/landing/smoothscroll.js') }}"></script>     --}}
    <script src="{{ asset('assets/js/landing/jquery.slicknav.js') }}"></script>     
    <script src="{{ asset('assets/js/landing/wow.js') }}"></script>   
    <script src="{{ asset('assets/js/landing/jquery.vide.js') }}"></script>
    <script src="{{ asset('assets/js/landing/jquery.counterup.min.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/jquery.magnific-popup.min.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/waypoints.min.js') }}"></script>    
    <script src="{{ asset('assets/js/landing/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/landing/contact-form-script.js') }}"></script>   
    <script src="{{ asset('assets/js/landing/main.js') }}"></script>

    <script type="text/javascript">
      $('#search').on('keyup',function(){
          $value=$(this).val();
          $.ajax({
              type : 'get',
              url : '{{ route('search') }}',
              data:{'search':$value},
              success:function(data){
                  $('.hasilnya').html(data);
              }
          });
      })
    </script>
    </body>
</html>
