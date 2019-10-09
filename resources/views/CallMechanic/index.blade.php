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

      <!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h5>ข้อมูลรถยนต์</h2>
                <h6>คุณมีรถยนต์ {{$posts1->count()}} คัน</h6>
                <h6>เลือกที่ต้องการทำรายการ</h6>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start Portfolio -page -->
            {{-- <div class="awesome-project-1 fix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="awesome-menu ">
                  <ul class="project-menu">
                    <li>
                      <a href="#" class="active" data-filter="*">All</a>
                    </li>
                    <li>
                      <a href="#" data-filter=".development">Development</a>
                    </li>
                    <li>
                      <a href="#" data-filter=".design">Design</a>
                    </li>
                    <li>
                      <a href="#" data-filter=".photo">Photoshop</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> --}}
            <br>
            <div class="awesome-project-content">

              <!-- single-awesome-project start -->
              @forelse($posts1 as $posts2)
              <div class="col-md-4 col-sm-4 col-xs-12 design development">
                <div class="single-awesome-project">
                  <div class="awesome-img">
                    <a href="#"><img class="card-img-top" src="../../storage/{{$posts2->image2}}" alt="Card image cap"></a>
                    <div class="add-actions text-center">
                      <div class="project-dec">
                        <a href="{{route('CallMechanic.create',$posts2->id)}}">                          
                          <h4 href="">{{$posts2->lname}}</h4>
                          <span>
                             {{$posts2->make}} {{$posts2->fname}}
                        </span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                    
                @endforelse
              <!-- single-awesome-project end -->

            </div>
          </div>
        </div>
      </div>
      <!-- awesome-portfolio end -->

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
