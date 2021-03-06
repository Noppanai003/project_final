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
            <h3>รายการตอบรับผู้ใช้รถยนต์</h3>
            {{-- ?php
              $callMechanics = $callMechanic;
              ?> --}}
            {{-- @if($callMechanics->status == NULL) --}}
            <table class="table">
              <thead>
                <th>รายการ</th>
                <th>รูปภาพรถยนต์</th>
                <th>ข้อมูลเพิ่มเติม</th>
                <th>เบอร์โทรศัพท์</th>
                {{-- <th>วันที่</th> --}}

                <th>วันและเวลาการตอบรับ</th>
                <th></th>
                <th></th>
                <th>ยืนยัน</th>
              </thead>
              <tbody>
                @foreach($callMechanic as $CallMechanic)
                {{-- @if($CallMechanic->status == NULL) --}}
                <tr>
                  <td>{{$CallMechanic->id}}</td>
                  <td>
                    <img src="../../storage/{{$CallMechanic->image3}}" alt="" width="120px" height="120px">
                  </td>
                  <td>{{$CallMechanic->info}}</td>
                  <td>{{$CallMechanic->cartel}}</td>
                  {{-- <td>{{$CallMechanic->dateresponse}}</td> --}}
                  <td>{{$CallMechanic->created_at}} น.</td>
                  <td>
                    <a href="{{route('managerequests.show',$CallMechanic->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                  </td>
                  <td>
                    <!-- <a href="" class="btn btn-warning btn-sm">ประเมินราคา</a> -->

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                      ประเมินราคา
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ประเมินราคาเบื้องต้น</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <!-- <div class="form-group">
                              <label form=""></label>
                              <input type="text" value="" class="form-control" name="">
                            </div> -->

                            <div class="form-group">
                              <label for="title">รายละเอียด<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                              <textarea name="" rows="4" cols="4" class="form-control" placeholder="กรุณาใส่ข้อมูล"></textarea>
                            </div>

                            <label>ประเมินราคา :</label>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="">ช่วงราคา :</label>
                                  <input type="number" name="" value="" class="form-control">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="">ถึงราคา :</label>
                                  <input type="number" name="" value="" class="form-control">
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="button" class="btn btn-primary">บันทึกการประเมินราคา</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>

                  <td>

                    <form action="/managerequests/create/{{$CallMechanic->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <button type="submit" name="ok" value="1" class="btn btn-success">ตกลง</button>
                    </form>
                    <form action="/managerequests/create/{{$CallMechanic->id}}" method="post" class="delete_form" enctype="multipart/form-data">
                      @csrf
                      <button type="submit" name="no" value="0" class="btn btn-danger">ปฏิเสธ</button>
                    </form>
                  </td>
                </tr>

                {{-- @endif --}}

                @endforeach
              </tbody>
            </table>
            {{-- @else 
                <td>
                    <h3>ยังไม่มีคำร้องขอ</h3>                                                                               
                </td>
            @endif --}}
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

                  </div>

                </div>
              </div>
            </div>
            <!-- End services -->

          </div>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('.delete_form').on('submit', function() {
            if (confirm("คุณต้องการปฏิเสธการทำรายการนี้หรือไม่")) {
              return true;
            } else {
              return false;
            }

          });
        });
      </script>
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