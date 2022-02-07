<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ungu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    <title>Edit Berita</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Archivo+Black');

        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .container {
            max-width: 500px;
        }

        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        /* News */
        html {
            font-size: 9px;
        }
        body {
            font-size: 1.6rem;
            max-width: 50rem;
            padding: 5rem;
            margin: 5rem auto;
            background: var(--bg);
            text-align: justify
        }
        /* .main-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        } */
        .headline {
            font-family: "Archivo Black", sans-serif;
            letter-spacing: 1;
            text-transform: uppercase;
            margin: 0;
            text-align: left 
        }
        .highlight {
            font-style: italic;
            font-weight: bold;
            padding: 0rem 2rem;
            width: 70%;
        }
        .highlight-1 {
            color: magenta;
            background: yellow;
            box-shadow: 10px 10px 2px #0ebeff;
        }
        .author p {
            margin-right: 1rem;
            color: rgb(128, 128, 128);
            font-style: bold;
            font-family: "Nunito";
        }        
        /* .article-meta {
            max-width: 96rem;
            width: 100%;
            display: flex;
            flex-direction: column;

            align-items: flex-start;
            justify-content: space-between;
        } */
        .author {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }
        .article {
            font-size: 1.8rem;
            line-height: 2;
        }
        .article-para-1 {
            font-size: 2rem;
            line-height: 1.5;
            color: gray;
            margin-top: 10rem;
        }
        .article-row {
            display: flex;
            flex-direction: column;

            justify-content: stretch;
        }
        .article-col {
            flex: 1 1;
            justify-content: stretch;
        }
        aside {
            font-size: 2.4rem;
            font-weight: bold;
            line-height: 1.2;
        }
        blockquote {
            text-indent: 0.5rem;
            box-shadow: -20px 0px 0px #CA29F3;
        }
        figcaption {
            font-weight: bold;
            background: linear-gradient(to right, #D659F5, #190994);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        a {
            text-decoration: none;
            color: var(--ungu);
            /* border-bottom: 4px solid var(--ungumuda); */
            font-weight: bold;
        }
        @media screen and (min-width: 768px) {
            body {
                max-width: 65rem;
            }
            .headline {
                font-size: 12.4rem;
            }
            .subhead {
                font-size: 3.6rem;
            }
            .tag {
                margin-right: 2rem;
                font-size: 1.6rem;
            }
            aside {
                font-size: 3.6rem;
            }
            .article-para-1 {
                font-size: 2.4rem;
            }
        }
        @media screen and (min-width: 1024px) {
            body {
                max-width: 90rem;
            }
            .article-meta {
                flex-direction: row;
                align-items: center;
            }
            .author {
                margin-bottom: unset;
            }
            .article-row {
                flex-direction: row;
            }
            .article-col-1,
            .article-col-2 {
                margin-right: 2rem;
            }
        }
        @media screen and (min-width: 1200px) {
            body {
                max-width: 102.4rem;
            }
        }

    </style>
</head>

<body>
    @include('sweetalert::alert')
    <a href="{{ URL::previous() }}"><i class="bi bi-x-lg"></i></a>
    <div class="main-container">

        <h1 class="headline">{{ $berita->judul }}</h1>
    
        <div class="article-meta">
            <div class="author">
                <p class="byline">by <b>Administrator</b></p>
                <p class="dateline">{{ $berita->created_at->format('M d, Y') }}</p>
            </div>
            {{-- <div class="article-tags">
                <span class="tag">culture</span> <span class="tag">games</span> <span class="tag featured">featured</span>
            </div> --}}
        </div>
        <div class="article">
            <br>
            {!! $berita->isi !!}
            <p class="article-para-1"></p>
            <aside>
                <blockquote class="bq-short">
                    @if ($berita->nama_file)
                        <a href="{{ route('downloadFile', $berita->nama_file) }}" class="mr-auto">Download file</a>
                    @endif
                </blockquote>
            </aside>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script src="{{ asset('assets/js/mazer.js') }}"></script>
</body>
</html>