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

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
            <div class="container">
                    <div class="card card-default">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-group">
                                            @foreach($errors->all() as $error)
                                                <li class="list-group-item">{{$error}}</li>
                                            @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-header">
                                   
                            </div>
                            <div class="card-body">
                                    <form action="{{route('notifications.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($post))
                                            @method('PUT')
                                        @endif                            
                                        <br>

                                            <div class="form-group">
                                                <label for="title">ข้อมูลรถยนต์</label><br>                                 
                                                
                                                <?php
                                                $posts2=$posts1;
                                                ?>

                                                <input type="hidden" name="post1" value="{{$posts2->id}}" class="form-control" class="b" readonly>

                                                    <img src="../../storage/{{$posts2->image2}}" alt="" width="500" height="600"><br>
                                                    <div class="form-group">
                                                                <label for="title">ยี่ห้อรถยนต์ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label >
                                                                <input type="text" name="make" value="{{$posts2->make}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                                    </div>                                                    
                            
                                                    <div class="form-group">
                                                                <label for="title">รุ่นรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                                <input type="text" name="modelcar" value="{{$posts2->fname}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                                <label for="title">ปีรุ่นรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                                <input type="text" name="model" value="{{$posts2->model}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                                    </div>
                                        
                                                    <div class="form-group">
                                                                <label for="title">เลขทะเบียนรถยนต์ <a class="text-danger">(*ไม่จำเป็นต้องใช้)</a></label>
                                                                <input type="text" name="license" value="{{$posts2->license}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                                    </div>                                                                                            
                                            </div>
                                                    
                                                    <form action="{{isset($notification)?route('notifications.update',$notification->id):route('notifications.store')}}" method="post">
                                                            @csrf
                                                            @if(isset($notification))
                                                            @method('PUT')
                                                            @endif
                                                
                                                                <div class="form-group">
                                                                    <label>เลือกประเภทการแจ้งเตือน</label>
                                                                    <select class="form-control" name="nonti_data" value="{{isset($notification)?$notification->nonti_data:''}}">
                                                                        <option>พ.ร.บ</option>
                                                                        <option>การต่อภาษีทะเบียนรถยนต์</option>
                                                                        <option>การต่อประกันรถยนต์</option>
                                                                    </select>
                                                                </div>
                                                
                                                            <div class="form-group">
                                                                <label for="title">วันที่ทำการต่อทะเบียน</label>
                                                                <input type="date" name="startdate" value="{{isset($notification)?$notification->startdate:''}}" class="form-control">
                                                            </div>
                                                
                    
                                                <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-lg btn-block">บันทึก</button>
                                                </div>
                    
                                    </form>
                            </div>
                        </div>
            </div>
    </div>
    <!-- End Service area -->
    
            <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js" charset="utf-8"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">

            <script type="text/javascript">
                    $(document).ready(function(){
                            $('#select-tags').select2();
                    });
            </script>

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
