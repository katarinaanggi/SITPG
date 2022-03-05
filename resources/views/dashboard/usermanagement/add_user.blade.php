@extends('layouts.main')

@section('style')
<style>
    .choices {
        margin-bottom: 0px;
    }
</style>
    
@endsection

@section('page')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last"></div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.userManagement') }}">User Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <form action="{{ route('admin.store_user') }}" method="post" >
        @csrf
        {{-- @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif --}}

        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <a href="{{route('admin.userManagement')}}"><i class="bi bi-x-lg"></i></a>
                    <div class="card-header"><h3 class="text-center">Create New User</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
                                <span class="text-danger">@error('name')*{{$message}} @enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                <span class="text-danger">@error('email')*{{$message}} @enderror</span>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone: </label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                <span class="text-danger">@error('phone')*{{$message}} @enderror</span>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cabdin" >Cabang Dinas: </label>
                                        <select class="form-control choices" id="cabdin" name="cabdin">
                                            <option value="">--pilih wilayah cabang dinas--</option>
                                            @foreach($cabdin as $cd)
                                                <option value="{{ $cd->id }}" {{ old('cabdin') == $cd->id ? 'selected' : '' }}>{{ $cd->nama}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('cabdin')*{{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota" >Kabupaten/Kota: </label>
                                        <select class="form-control" id="kota" name="kota">
                                            <option value="">--pilih wilayah kabupaten/kota--</option>
                                        </select>
                                        <span class="text-danger">@error('kota')*{{$message}} @enderror</span>
                                        <input type="text" id="hdnPreviousValue" style="display: none" value="{{ old('kota') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password: </label>
                                        <input type="password"  name="password" id="password" value="{{ old('password') }}" style="padding: 0.375rem 0.75rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; border-radius: 0.25rem; border: 1px solid #dce7f1; width:99.9%">
                                        <span id="togglePassword" class="bi bi-eye-fill" style="margin-left: -30px; cursor: pointer;"></span>
                                        <span class="text-danger">@error('password')*{{$message}} @enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password: </label>
                                        <input type="password"  name="cpassword" id="cpassword" value="{{ old('cpassword') }}" style="padding: 0.375rem 0.75rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; border-radius: 0.25rem; border: 1px solid #dce7f1; width:99.9%">
                                        <span id="togglePassword2" class="bi bi-eye-fill" style="margin-left: -30px; cursor: pointer;"></span>
                                        <span class="text-danger">@error('cpassword')*{{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-save btn-block mt-4">
                                Add New User
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript">
        const togglePassword = document.querySelector('#togglePassword');
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password = document.querySelector('#password');
        const cpassword = document.querySelector('#cpassword');
        const kotaprev = document.querySelector('#hdnPreviousValue');
        const cabdin = document.querySelector('#cabdin');

        $('#cabdin').on('change', function () {     //tiap cabdin ganti value, kota jg ganti
            getKota();
        });
        
        function getKota () {
            var cabdinId = cabdin.value;
            var prev = kotaprev.value;
            $('#kota').html('');
            $.ajax({
                url: '{{ route('admin.get_kota') }}?id_cabdin='+cabdinId,
                type: "POST",
                data: {
                    cabdinId: cabdinId,
                    _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function(result){
                    $('#kota').html('<option value="">--pilih wilayah kabupaten/kota--</option>'); 
                    $.each(result, function(key,value){
                        if(prev == value.nama_kota){
                            $("#kota").append('<option value="'+value.nama_kota+'" selected>'+value.nama_kota+'</option>');
                        }
                        else{
                            $("#kota").append('<option value="'+value.nama_kota+'">'+value.nama_kota+'</option>');
                        }
                    });
                }
            });
        }

        if(kotaprev.value){     //kalo abis submit ada nulis kota, ntar muncul kaya old()
            getKota();
        }
        
        
        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            $(this).toggleClass("bi-eye-fill bi-eye-slash-fill");
        });
        togglePassword2.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            // toggle the eye slash icon
            $(this).toggleClass("bi-eye-fill bi-eye-slash-fill");
        });

        if(cabdin.value){       //kalo cabdin ada value trs diload, kota ada pilihan sesuai cabdin
            window.onLoad = getKota();
        }
    </script>
@endsection