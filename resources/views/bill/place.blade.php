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

          {{-- asdsad --}}
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  ข้อตกลงการชำระเงิน
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">เงื่อนไขและข้อตกลง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p>1. ค่ามัดจำการเรียก ซึ่งมีอยู่ 3 อัตรา ได้แก่ ระยะทาง 10 กิโลเมตร เก็บค่ามัดจำ 100 บาท, ระยะทางเกิน 20 กิโลเมตรแต่ไม่ถึง 50 กิโลเมตร เก็บค่ามัดจำ 200 บาท, ระยะทางเกิน 50 กิโลเมตรขึ้นไปเก็บค่ามัดจำ 500 บาท </p> 
       <p>2. ผู้ใช้ต้องทำการโอนเงินเข้าสู่ระบบ หลังจากอู่ซ่อมตอบรับการทำงาน ระบบจะกำหนดระยะเวลาให้ผู้ใช้ทำการโอนเงินตามที่ระบบกำหนดจำนวนเงินไว้ ภายในระยะเวลา 5 นาที </p> 
       <p>3. ในกรณีที่อู่ซ่อมปฏิเสธการทำงาน โดยกำหนดไว้ว่าภายในระยะเวลา 5 นาที เมื่ออู่ซ่อมไม่ตอบรับการทำงาน ระบบจะทำการยกเลิกการเรียก และแจ้งให้ผู้ใช้ทำการเลือกอู่ซ่อมใหม่</p>
       <p>4. ผู้ใช้สามารถยกเลิกการเรียกอู่ซ่อมได้<br>
       4.1 สามารถยกเลิกในระยะเวลาที่อู่ซ่อมยังไม่ออกให้บริการ เมื่ออู่ซ่อมออกให้บริการจะไม่สามารถยกเลิกการเรียกได้</p>
       <p>5. อู่ซ่อมแจ้งการออกให้บริการส่งข้อมูลสถานะการออกให้บริการภายในระยะเวลา 5 นาที</p>
       <p>6. หากอู่ซ่อมเดินทางถึงที่หมายล่าช้ากว่ากำหนด อู่ซ่อมทำการติดต่อกับผู้ใช้เพื่อทำการขอเพิ่มเวลาในการเดินทาง ผู้ใช้สามารถทำการต่อระยะเวลาเพิ่มให้กับทางอู่ซ่อมได้ และผู้ใช้สามารถยกเลิกอู่ซ่อมเพื่อทำการเลือกใหม่ได้</p>
       <p>7. ในกรณีที่อู่ซ่อมไม่มาตามระยะเวลาที่กำหนด ผู้ใช้สามารถทำการยกเลิกและร้องขอคืนเงินได้</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

          {{-- asdasd --}}
          
            

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
                          <a class="btn btn-warning btn-lg btn-block" href="{{route('bill.create')}}"> ชำระเงินเสร็จสมบูรณ์</a>
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