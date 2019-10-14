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
              <h3>รอการตอบรับการเรียกช่าง</h3>
              <form action="{{route('bill.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                  <table class="table">
                      <thead>
                          <th>เลือก</th>
                          <th>รายการ</th>
                          <th>รูปร้าน</th>
                          <th>ชื่อร้าน</th>
                          <th>ประเภทร้าน</th>
                          <th>วันที่</th>
                          <th>เวลาการตอบรับ</th>
                          <th></th>
                      </thead>
                      <tbody>
                          @foreach($posts as $post)
                          <tr>
                              <td>
                                <input type="radio" name="demo" value="{{$post->id}}" id="radio-one" class="form-radio" >
                              </td>
                              <td>{{$post->id}}</td>
                              <td>
                                <a href=""><img src="../../storage/{{$post->image}}" alt="Card image cap" width="100" height="100"></a>                                                                                             
                              </td>
                              <td>ร้าน{{$post->title}}</td>
                              <td>{{$post->category->name}}</td> 
                              <td>{{$post->daterequest}}</td>
                              <td>{{$post->timerequest}} น.</td>
                              <td>
                                <a href="{{route('managerequests.show',$post->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
      
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">ยืนยันร้าน</button>
                    </div>
              </form>
            </div>
          </div>
        </div>

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
