<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    @yield('title')

     <!-- Styles -->
     <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/style1.css')}}" rel="stylesheet">
     <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    
     <!-- Favicons -->
     <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
     <link rel="icon" href="{{asset('img/logoWeb-carcare.png')}}">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="/">
            <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
            <img class="logo-light" src="{{asset('img/logo_carcare.png')}}" alt="logo">
          </a>
        </div>
        <a class="btn btn-xs btn-round btn-success" href="{{route('home')}}">เข้าสู่ระบบ</a>
      </div>
    </nav>

    @yield('header')

    @yield('content')
    <script src="{{asset('js/page.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

  </body>
</html>
