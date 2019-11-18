<?php

use App\Post;
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
      <div class="section-headline text-center">

        <h3>ช่างกำลังเดินทาง</h3>

        <table class="table">
          <thead>
            <th>รายการ</th>
            <th>รูปร้าน</th>
            <th>ชื่อร้าน</th>
            <th>ประเภทร้าน</th>
            {{-- <th>วันที่</th> --}}
            <th>เวลาที่ทำการเลือกร้าน</th>
            <th></th>
            {{-- <th>ระยะเวลาที่กำหนด</th> --}}
          </thead>
          <tbody>

            {{-- @if(1) --}}
            {{-- {{$bills}} --}}
            <?php
            $find = Post::find($bills->posts_id);
            $find1 = Category::find($find->category_id);
            ?>
            <tr>
              <td>{{$bills->id}}</td>
              <td>
                <img src="../../storage/{{$find->image}}" alt="Card image cap" width="100" height="100">
              </td>
              <td>ร้าน{{$find->title}}</td>
              <td>{{$find1->name}}</td>
              <td>{{$bills->updated_at}}</td>
              <td>
                {{-- <a href="" class="btn btn-warning btn-sm">รายละเอียด</a> --}}
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$bills->id}}">
                  รายละเอียด
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong{{$bills->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">

                          <strong> รูปร้าน : </strong>
                          <div class="form-group" align="middle">
                            <img src="../../storage/{{$find->image}}" width="300px" height="300px">
                          </div> <br>
                          <div class="form-group">
                            <strong>ชื่อสถานประกอบการ : </strong>
                            {{ $find->title }}
                          </div>
                          <div class="form-group">
                            <strong>ชื่อ-นามสกุล : </strong>
                            {{ $find->fname }}
                            {{ $find->lname }}
                          </div>
                          <div class="form-group">
                            <strong>รายละเอียดร้าน : </strong>
                            {!!$find->description!!}
                          </div>

                          <strong> วันที่เปิดทำการ : </strong>
                          <div class="form-group">
                            <i class="fa fa-calendar-check-o"></i><strong> จันทร์ </strong>
                            - {{ $find->mon }}
                            <br>
                            <i class="fa fa-calendar-check-o"></i><strong> อังคาร </strong>
                            - {{ $find->tue }}
                            <br>
                            <i class="fa fa-calendar-check-o"></i><strong> พุธ </strong>
                            - {{ $find->wed }}
                            <br>
                            <i class="fa fa-calendar-check-o"></i><strong> พฤหัสบดี </strong>
                            - {{ $find->thu }}
                            <br>
                            <i class="fa fa-calendar-check-o"></i><strong> ศุกร์ </strong>
                            - {{ $find->fri }}
                            <br>
                            <i class="fa fa-calendar-check-o"></i><strong> เสาร์ </strong>
                            - {{ $find->sat }}
                            <br>
                            <i class="fa fa-calendar-check-o"></i><strong> อาทิตย์ </strong>
                            - {{ $find->sun }}
                          </div>

                          <div class="form-group">
                            <strong>เวลาเปิดทำการ : </strong>
                            {{ $find->time_start }}
                            <label> - </label>
                            {{ $find->time_end }} น.
                          </div>

                          <div class="form-group">
                            <strong>บ้านเลขที่ : </strong>
                            {{ $find->content }}

                            <strong>ตำบล : </strong>
                            {{ $find->district }}

                            <strong>อำเภอ : </strong>
                            {{ $find->amphur }}

                            <strong>จังหวัด : </strong>
                            {{ $find->city_name }}
                          </div>
                          <div class="form-group">
                            <strong>เบอร์โทรร้าน : </strong>
                            {{ $find->tel }}
                          </div>
                          <div class="form-group">
                            <strong>ประเภทการสถานประกอบการ : </strong>
                            {{ $find1->name }}
                          </div>

                          <div class="form-group">
                            <strong> รูปใบประกอบกิจการร้าน : </strong> <br>
                            <img src="../../storage/{{$find->image1}}" width="350px" height="500px">
                          </div>

                          <div id="map-canvas"></div><br><br>

                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
      </div>
      </td>
      </tr>
      <tr>
        <h3>รหัสยืนยันตัวตนช่าง</h3>
        <h3>{{$bills->gencode}}</h3>
      </tr>

      {{-- @endif --}}

      </tbody>
      </table>
      <form action="/bill/create/{{$bills->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <button type="submit" name="ok" value="1" class="btn btn-success">ยืนยันการทำงาน</button>
      </form>
      <form action="/bill/create/{{$bills->id}}" method="post" class="delete_form" enctype="multipart/form-data">
        @csrf
        <button type="submit" name="no" value="0" class="btn btn-danger">ยกเลิกการเรียกช่าง</button>
      </form>

    </div>
  </div>
  </div>



  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>
  <script>
    // var lat = {{$find->lat}};
    // var lng = {{$find->long}};

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