<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/ungu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent" >
            <h4 class="active fadeIn first">User Login</h4>
            <form method="POST" action="{{ route('user.check') }}" autocomplete="off">
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>                    
                @endif
                @csrf
                <div class="form-group fadeIn second fontuser">
                    <input type="email" class="form-control" name="email" placeholder="Enter mail address" value="{{ old('email') }}">
                    <i class="fa fa-user fa-lg"></i>
                    <span class="text-danger">@error('email')<br>{{ $message }}@enderror</span>
                </div>
                <div class="form-group fadeIn third fontpassword">
                    <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                    <i class="fa fa-lock fa-lg"></i>
                    <span class="text-danger">@error('password')<br>{{ $message }}@enderror</span>
                </div>
                <div class="form-group fadeIn fourth">
                    <button type="submit" class="button">Login</button>
                </div>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="{{ url('/') }}">Landing Page</a>
            </div>
        </div>
    </div>
    
</body>
</html>