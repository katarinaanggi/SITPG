<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <title>{{ $title }}</title>
</head>
<body>
    <div class="container mt-5">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    {{-- <a href="{{route('admin.userManagement')}}"><i class="bi bi-x-lg"></i></a> --}}
                    <div class="card-header"><h3 class="text-center">User Detail for {{$user->name}}</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="id">ID: </label>
                                <input type="text" class="form-control" id="id" name="id" value="{{$user->id}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone: </label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}" readonly>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cabdin" >Cabang Dinas: </label>
                                        <input type="text" class="form-control" id="cabdin" name="cabdin" value="{{$user->cabdin}}" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota" >Kabupaten/Kota: </label>
                                        <input type="text" class="form-control" id="kota" name="kota" value="{{$user->kota}}" readonly>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('admin.userManagement') }}" class="btn" style="width: 100%">Kembali</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('admin.edit_user', $user->id) }}" class="btn btn-save" style="width: 100%">Edit</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/mazer.js') }}"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.4/b-2.2.2/b-html5-2.2.2/r-2.2.9/sl-1.3.4/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.11.4/dataRender/ellipsis.js"></script>

    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>

</body>
</html>