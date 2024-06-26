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
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }

        .container {
            max-width: 800px;
        }

        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container mt-5">
        <a href="{{route('admin.berita')}}"><i class="bi bi-x-lg"></i></a>
        <form action="{{ route('admin.update_berita', $berita->id) }}" id="frm_input_srt" method="post" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate>
            <h3 class="text-center mb-5">Edit Berita</h3>
            @csrf
            @method('PATCH')
            {{-- @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @endif --}}

            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul: </label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $berita->judul}}" minlength="5" maxlength="255" required>
                                    @error('judul') 
                                        <span class="text-danger">*{{$message}}</span>  
                                    @else
                                        <span class="invalid-feedback">
                                            Judul harus diisi minimal 5 karakter dan maksimal 50 karakter.
                                        </span> 
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="isi">Isi: </label>
                                    <textarea type="text" class="form-control" id="isi" name="isi" required>{{ $berita->isi}}</textarea>
                                    @error('isi') 
                                        <span class="text-danger">*{{$message}}</span>  
                                    @else
                                        <span class="invalid-feedback">
                                            Isi berita harus diisi.
                                        </span> 
                                    @enderror
                                </div>
                                
                                <div class="custom-file">                                    
                                    <label>Tersimpan: {{ substr($berita->nama_file, 11, strlen($berita->nama_file)) }}</label>
                                    <br><label class="custom-file-upload" for="file">
                                        <i class="bi bi-cloud-upload-fill"></i>&nbsp;Pilih file baru: </label>
                                    <input id="file" name='file' type="file" style="display:none;" onchange="namafile()">
                                    <label id="file-name"></label>
                                    @if ($message = Session::get('file'))
                                        <div class="invalid-feedback">*{{ $message }}</div>
                                    @endif
                                </div>

                                <a class="btn btn-save btn-block mt-4" id="btnsubmit">Save</a>

                        </div>
                    </div>
                </div>
            </div>
            
        </form>
    </div>

    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- toastify -->
<script src="{{ asset('assets/vendors/toastify/toastify.js') }}"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
 <script type="text/javascript">
    $("#btnsubmit").on('click',function(e){
        swal({
            title: "Apakah anda yakin?",
            text: 'Data ini akan diubah secara permanen!',
            icon: "warning",
            buttons: ["Cancel", "Yes!"],
            dangerMode: true,
        })
        .then(function(value) {
            if (value) {
                $('#frm_input_srt').submit();
            }
        });
        return false;
    });
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
    function submitForm() {
        swal({
            title: "Apakah anda yakin?",
            text: 'This record and it`s details will be permanantly updated!',
            icon: "warning",
            buttons: ["Cancel", "Yes!"],
            dangerMode: true,
        })
        .then(function() {
            $('#frm_input_srt').submit();
        });
        return false;
    }

    function namafile(){
        var filename = document.getElementById("file").files[0].name;
        document.getElementById("file-name").textContent = filename;
    }
    ClassicEditor
        .create( document.querySelector( '#isi' ) )
        .catch( error => {
            console.error( error );
    } );
</script>

<script src="{{ asset('assets/js/mazer.js') }}"></script>
</body>
</html>