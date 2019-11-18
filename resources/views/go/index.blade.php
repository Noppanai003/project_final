<?php

use App\Post;
use App\Post1;
use App\CallMechanic;
use App\Category;

?>
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
            <h3></h3>
            <table class="table">
              <thead>
                <th>รายการ</th>
                <th>รูปภาพรถยนต์</th>
                <th>ข้อมูลเพิ่มเติม</th>
                <th>เบอร์โทรศัพท์ผู้ขับรถยนต์</th>
                <th>วันและเวลาการตอบรับ</th>
                <th></th>
              </thead>
              <tbody>

                {{-- @if($CallMechanic->status == NULL)  --}}
                <tr>
                  <td>{{$CallMechanic->id}}</td>
                  <td>
                    <img src="../../storage/{{$CallMechanic->image3}}" alt="" width="120px" height="120px">
                  </td>
                  <td>{{$CallMechanic->info}}</td>
                  <td>{{$CallMechanic->cartel}}</td>
                  <td>{{$CallMechanic->created_at}} น.</td>
                  <td>
                    {{-- <a href="{{route('managerequests.show',$find->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a> --}}
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$CallMechanic->id}}">
                      รายละเอียด
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong{{$CallMechanic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดคำร้องขอ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          {{-- <div class="modal-body">
                                              <div class="row">
                                                  ?php 
                                                  $find = Post1::find($CallMechanic->post1s_id);
                                                  // $find1 = Category::find($find->category_id); 
                                                  ?>
                                                      <div class="form-group">
                                                          <strong>ข้อมูลรถยนต์ผู้ร้องขอ : </strong><br><br>
                                                          <img src="../../storage/{{$find->image2}}" width="300px" height="300px"><br>
                          ยี่ห้อ :{{$find->make}}<br>
                          รุ่นรถยนต์ :{{$find->model}}<br>
                          ป้ายรถยนต์ :{{$find->license}}
                        </div>
                        <strong> รูปรถยนต์ที่เกิดเหตุ : </strong><br><br>
                        <div class="form-group" align="middle">
                          <img src="../../storage/{{$CallMechanic->image3}}" width="300px" height="300px">
                        </div> <br>
                        <div class="form-group">
                          <strong>จุดสังเกต : </strong>
                          {{$CallMechanic->info}}
                        </div>
                        <div class="form-group">
                          <strong>เบอร์โทรผู้ขับ : </strong>
                          {{ $CallMechanic->cartel }}
                        </div>
                        <div class="form-group">
                          <strong>เวลาคำร้องขอ : </strong>
                          {{ $CallMechanic->updated_at }}
                        </div>

                        <div id="map-canvas"></div><br><br>

                      </div>
                    </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> --}}
        </div>
      </div>
    </div>
    </td>
    </tr>
    <tr>
      <h3>รหัสยืนยันตัวตนช่าง</h3>
      <h3>{{$CallMechanic->gencode}}</h3>
    </tr>

    </tbody>
    </table>
    <form action="" method="post" enctype="multipart/form-data">
      @csrf
      <button type="submit" name="ok" value="1" class="btn btn-success">ยืนยันการทำงาน</button>
    </form>
    <form action="" method="post" class="delete_form" enctype="multipart/form-data">
      @csrf
      <button type="submit" name="no" value="0" class="btn btn-danger">แจ้งรายงาน</button>
    </form>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>
  <script>
    var lat = {
      {
        $CallMechanic - > lat
      }
    };
    var lng = {
      {
        $CallMechanic - > long
      }
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), {

      center: {
        lat: lat,
        lng: lng
      },
      zoom: 15
    });

    var marker = new google.maps.Marker({
      position: {
        lat: lat,
        lng: lng
      },
      map: map
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.delete_form').on('submit', function() {
        if (confirm("เมื่อเดินทางแล้วไม่พบผู้ใช้งาน กรุณาทำการแจ้งเตือนกลับมายังระบบ เพื่อร้องขอค่ามัดจำ")) {
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