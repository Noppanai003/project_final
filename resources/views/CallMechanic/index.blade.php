<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
</head>

<body data-spy="scroll" data-target="#navbar-example">

  {{-- <div id="preloader"></div> --}}

@include('layouts.sidebar')

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="{{ url('/home') }}">
                  {{-- <h1><span>e</span>Business</h1> --}}
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <img class="" src="{{asset('img/logo_carcare.png')}}" alt="logo">
                  {{-- <img src="img/logo_carcare" alt="" title=""> --}}
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">

                @if (Route::has('login'))
                    {{-- <div class="top-right links"> --}}
                        @auth
                            <li class="active">
                                <a href="{{ url('/home') }}">หน้าหลัก</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
                            </li>
                            {{-- <a href="{{ route('login') }}">เข้าสู่ระบบ</a> --}}

                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">สมัครสมาชิก</a>
                                </li>
                            @endif
                        @endauth
                    {{-- </div> --}}
                @endif

                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->                       

  <br><br>
  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h4>ข้อมูลรถยนต์</h4><br>
              <h6>คุณมีรถยนต์ {{$posts1->count()}} คัน</h6>
              <h6>เลือกที่ต้องการทำรายการ</h6>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="services-contents">

          <br>
            <!-- Start services -->
            <div class="section bg-gray">
                <div class="container">
                  <div class="row">
        
                    <div class="col-md-8 col-xl-9">
                      <div class="row gap-y">
                        @forelse($posts1 as $posts2)
                        <div class="col-md-6">
                            <div class="card border hover-shadow-6 mb-6 d-block">
                                <a href="{{route('CallMechanic.create',$posts2->id)}}"><img class="card-img-top" src="storage/{{$posts2->image2}}" alt="Card image cap"></a>
                                <div class="p-6 text-center">

                                    <h5 class="mb-0"><a class="text-dark" href="{{route('CallMechanic.create',$posts2->id)}}">{{$posts2->lname}}</a></h5>
                                    <p><a class="small-3 text-dark text-uppercase ls-2 fw-400" href="{{route('CallMechanic.create',$posts2->id)}}">{{$posts2->make}} {{$posts2->fname}}</a></p>                              

                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">ไม่มีผลลัพธ์ : <strong>{{request()->query('search')}}</strong></p>
                        @endforelse
                    </div>
                        {{$posts->appends(['search'=>request()->query('search')])->links()}}
                    </div>                 

                  </div>
                </div>
              </div>
              <!-- End services -->
      
        </div>
      </div>
    </div>
    <!-- End Service area -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->

    <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('lib/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/parallax/parallax.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/nivo-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('lib/appear/jquery.appear.js')}}"></script>
    <script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>

    <!-- Contact Form JavaScript File -->
    <script src="{{asset('contactform/contactform.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}"></script>
</body>

</html>
