@extends('layouts.main')

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
    <form action="{{ route('admin.store_user') }}" method="post">
        @csrf
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-content">
                    <a href="{{route('admin.userManagement')}}"><i class="bi bi-x-lg"></i></a>
                    <div class="card-header"><h3 class="text-center">Create New User</h3></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone: </label>
                                <input type="number" class="form-control" id="phone" name="phone" required value="{{ old('phone') }}">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cabdin" >Cabang Dinas: </label>
                                        <select class="form-control choices" id="cabdin" name="cabdin" required>
                                            <option value="">--pilih wilayah cabang dinas--</option>
                                            @foreach($cabdin as $cd)
                                                <option value="{{ $cd->id }}">{{ $cd->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota" >Kabupaten/Kota: </label>
                                        <select class="form-control" id="kota" name="kota" required>
                                            <option value="0">--pilih wilayah kabupaten/kota--</option>
                                        </select>
                                        <input type="text" id="hdnPreviousValue" style="display: none" value="{{ old('kota') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password: </label>
                                        <input type="password"  name="password" id="password" required style="padding: 0.375rem 0.75rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; border-radius: 0.25rem; border: 1px solid #dce7f1; width:99.9%">
                                        <span id="togglePassword" class="bi bi-eye-fill" style="margin-left: -30px; cursor: pointer;"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password: </label>
                                        <input type="password"  name="cpassword" id="cpassword" required style="padding: 0.375rem 0.75rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out; border-radius: 0.25rem; border: 1px solid #dce7f1; width:99.9%">
                                        <span id="togglePassword2" class="bi bi-eye-fill" style="margin-left: -30px; cursor: pointer;"></span>
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

    </script>
@endsection