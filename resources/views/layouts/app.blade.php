
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Carcare') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Favicons ไอคอนวิ่งที่นี่-->
    <link href="{{asset('img/logoWeb-carcare.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{asset('img/logoWeb-carcare.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #map-canvas {
            width: 780px;
            height: 370px;
        }

        /* #map {
            height: 100%;
        } */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* type number ซ่อนปุ่มกด ขึ้น-ลง ของ text เลขบัตรประชาชน */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            /* display: none; <- Crashes Chrome on hover */
            -webkit-appearance: none;
            margin: 0;
            /* <-- Apparently some margin are still there even though it's hidden */
        }

        input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }
    </style>

    {{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- <!-- {{ config('', 'Carcare') }} --> --}}
                    <img class="logo-light" src="{{asset('img/logo-dark.png')}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <!-- เช็คบุคคลทั่วไป -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->avatar == NULL)
                                        <img src={{asset('img/no-image-profile.png')}} style="width:25px; height:25px; float:left; border-radius:50%; margin-right:25px;">

                                    @else
                                        <img class="rounded-circle" src="storage/avatars/{{ Auth::user()->avatar}}" style="width:25px; height:25px; float:left; border-radius:50%; margin-right:25px;">
                                    @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i> ข้อมูลส่วนตัว</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>
                                    {{ __('ออกจากระบบ') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content เมื่อ login เสร็จแล้ว-->
        <main class="py-4">
            @auth
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-header"> {{ Auth::user()->name }} </div>
                        <ul class="list-group">
                            @if(auth()->user()->isAdmin())

                                {{-- <li class="list-group-item">
                                    <a href="{{route('dashboard.index')}}">แดชบอร์ด</a>
                                </li> --}}
                                <li class="list-group-item">
                                    <a href="{{route('users.index')}}">จัดการข้อมูลสมาชิก</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('categories.index')}}">ประเภทศูนย์บริการ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('showadmin.index')}}">จัดการข้อมูลร้าน</a>
                                </li>
                                {{-- <li class="list-group-item">
                                    <a href="{{route('manageAssessment.index')}}">จัดการข้อมูลประเมินการใช้บริการ</a>
                                </li> --}}
                                <li class="list-group-item">
                                    <a href="{{route('showadmin.create')}}">จัดการข้อมูลโปรโมชัน</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('makecar.index')}}">จัดการข้อมูลยี่ห้อรถ</a>
                                </li>
                            @endif

                            @if(auth()->user()->isRevenue_officer())
                                <li class="list-group-item">
                                    <a href="{{route('DepositManages.index')}}">จัดการข้อมูลเรียกช่างนอกพื้นที่</a>
                                </li>
                                {{-- <li class="list-group-item">
                                    <a href="{{route('TransferMoneys.index')}}">จัดการข้อมูลการโอนเงิน</a>
                                </li> --}}
                                {{-- <li class="list-group-item">
                                    <a href="{{route('MoneyRequests.index')}}">จัดการคำร้องขอคืนเงิน</a>
                                </li> --}}
                            @endif

                            @if(auth()->user()->isMember())
                            {{-- เริ่มศูนย์บริการ --}}
                                <li class="list-group-item">
                                    <a href="{{route('managerequests.index')}}">จัดการคำขอบริการ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('posts.index')}}">จัดการข้อมูลร้าน</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('promotions.index')}}">จัดการข้อมูลโปรโมชัน</a>
                                </li>
                            @endif
                            {{-- สิ้นสุดศูนย์บริการ --}}

                            {{-- เริ่มผู้ใช้รถยนต์ --}}
                            @if(auth()->user()->isUser())
                                <li class="list-group-item">
                                    <a href="{{route('posts1.index')}}">จัดการข้อมูลรถยนต์</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('CallMechanic.index')}}">เรียกช่าง</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('userpromotions.index')}}">โปรโมชัน</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{route('notifications.index')}}">การแจ้งเตือน</a>
                                </li>
                            @endif
                            {{-- สิ้นสุดผู้ใช้รถยนต์ --}}

                        </ul>
                    </div>
                    <div class="col-md-9">

                        @if(Session()->has('success'))
                        <div class="alert alert-success">
                            {{Session()->get('success')}}
                        </div>
                        @endif
                        @if(Session()->has('error'))
                        <div class="alert alert-danger">
                            {{Session()->get('error')}}
                        </div>
                        @endif
                        @yield('content')

                    </div>
                </div>
            </div>
            @else
            @yield('content')
            @endauth
        </main>
    </div>
</body>

</html>
