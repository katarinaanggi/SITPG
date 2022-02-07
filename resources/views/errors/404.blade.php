<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/error.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">

</head>

<body>
    {{-- <div id="error"> --}}
        

{{-- <div class="error-page container">
    <div class="col-md-8 col-12 offset-md-2">
        <img class="img-error" src="{{ asset('assets/images/samples/error-404.png') }}" alt="Not Found">
        <div class="text-center">
            <h1 class="error-title">NOT FOUND</h1>
            <p class='fs-5 text-gray-600'>The page you are looking not found.</p>
            <a href="{{ route('admin.home') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
        </div>
    </div>
</div> --}}

<a href="" target="_blank">
    <header class="top-header">
  </header>
  
  <!--dust particel-->
  <div>
    <div class="starsec"></div>
    <div class="starthird"></div>
    <div class="starfourth"></div>
    <div class="starfifth"></div>
  </div>
  <!--Dust particle end--->
  
  
  <div class="lamp__wrap">
    <div class="lamp">
      <div class="cable"></div>
      <div class="cover"></div>
      <div class="in-cover">
        <div class="bulb"></div>
      </div>
      <div class="light"></div>
    </div>
  </div>
  <!-- END Lamp -->
  <section class="error">
    <!-- Content -->
    <div class="error__content">
      <div class="error__message message">
        <h1 class="message__title">Page Not Found</h1>
        <p class="message__text">We're sorry, the page you were looking for isn't found here. The link you followed may either be broken or no longer exists. Please try again, or take a look at our.</p>
      </div>
      <div class="error__nav e-nav">
        <a href="{{ route('admin.home') }}" target="_blanck" class="e-nav__link"></a>
      </div>
    </div>
    <!-- END Content -->
  
  </section>
  
</a>


    {{-- </div> --}}
</body>

</html>
