<!DOCTYPE html>
<html>
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
                        <img class="" src="{{asset('img/logo_carcare.png')}}" alt="logo">
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
      <div class="section-headline text-center">
        <div class="container">

          <div class="page-header">
            <h1>การชำระเงิน<br><small>ด้วยบัตรเครดิต</small></h1>
          </div>

          <!-- Credit Card Payment Form - START -->

          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="row">
                      <h3 class="text-center">รายละเอียดการจ่ายเงิน</h3>
                      <img class="img-responsive cc-img" src="http://prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                    </div>
                  </div>
                  <div class="panel-body">
                    <form role="form">
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label>หมายเลขบัตร</label>
                            <div class="input-group">
                              <input type="tel" class="form-control" placeholder="Valid Card Number" />
                              <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-7 col-md-7">
                          <div class="form-group">
                            <label><span class="hidden-xs">วันบัตรหมดอายุ</span><span class="visible-xs-inline">วันบัตรหมดอายุ</span></label>
                            <input type="tel" class="form-control" placeholder="MM / YY" />
                          </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                          <div class="form-group">
                            <label>รหัสความปลอดภัย</label>
                            <input type="tel" class="form-control" placeholder="CVC" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="form-group">
                            <label>ชื่อบนบัตร</label>
                            <input type="text" class="form-control" placeholder="Name on the card" />
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="panel-footer">
                    <div class="row">
                      <div class="col-xs-12">
                        <button class="btn btn-warning btn-lg btn-block">ชำระเงินเสร็จสมบูรณ์</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <style>
            .cc-img {
              margin: 0 auto;
            }
          </style>
          <!-- Credit Card Payment Form - END -->

        </div>
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