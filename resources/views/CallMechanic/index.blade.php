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
                  {{-- <li class="active">
                    <a class="page-scroll" href="#home">Home</a>
                  </li> --}}
                  {{-- <li>
                    <a class="page-scroll" href="#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Services</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Team</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                  </li> --}}

                  {{-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href=# >Drop Down 1</a></li>
                      <li><a href=# >Drop Down 2</a></li>
                    </ul>
                  </li> --}}

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

<!-- Start Wellcome Area -->
    <div class="wellcome-area">
        <div class="well-bg">
          <div class="test-overly"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wellcome-text">
                  <div class="well-text text-center">
                    <h2>ค้นหาอู่ซ่อมรถยนต์</h2>

                    <form class="input-group" action="{{route('welcome')}}" method="GET">
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
                        <div class="input-group-addon">
                          <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                      </form>
                      <br>
                      <h3 class="sidebar-title">ประเภทร้าน</h3>
                      <div class="row link-color-default fs-14 lh-24">
                        @foreach($categories as $category)
                              <a class="btn btn-primary" href="{{route('blog.category',$category->id)}}" role="button">{{$category->name}}</a>
                        @endforeach
                      </div>


                        {{-- <input type="text" class="text form-control width-80" id="sus_email" placeholder="ค้นหาอู่">
                        <button type="submit" id="sus_submit" <i class="fa fa-search"></i> </button>
                        <div id="msg_Submit" class="h3 text-center hidden"></div> --}}


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Wellcome Area -->

  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>สถานประกอบการ</h2>
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
                          @forelse($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                  <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="storage/{{$post->image}}" alt="Card image cap"></a>
                                  <div class="p-6 text-center">

                                    <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">ร้าน{{$post->title}}</a></h5>
                                    <p><a class="small-3 text-dark text-uppercase ls-2 fw-400" href="{{route('blog.show',$post->id)}}">{{$post->category->name}}</a></p>
                                    <p><a class="small-3 text-dark text-uppercase ls-2 fw-400" href="#">ตำแหน่งร้าน : {{$post->content}} ตำบล{{$post->district}} อำเภอ{{$post->amphur}} จังหวัด{{$post->city_name}} {{$post->postcode}}</a><br>
                                    <a class="small-3 text-dark text-uppercase ls-2 fw-400" href="#">เบอรโทรร้าน : {{$post->tel}}</a></p>

                                  </div>
                                </div>
                            </div>
                          @empty
                            <p class="text-center">ไม่มีผลลัพธ์ : <strong>{{request()->query('search')}}</strong></p>
                          @endforelse
                      </div>
                      {{$posts->appends(['search'=>request()->query('search')])->links()}}
                    </div>
                      {{-- @include('layouts.sidebar1') --}}

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
