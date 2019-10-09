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
                                    <form action="{{route('CallMechanic.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($post))
                                            @method('PUT')
                                        @endif
                                        <br>

                                            <div class="form-group">
                                                <label for="title">ข้อมูลรถยนต์</label>

                                                <?php
                                                $posts2=$posts1;
                                                ?>
                                                <input type="hidden" name="post1" value="{{$posts2->id}}" class="form-control" class="b" readonly>
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

                                            <div class="form-group">
                                                    <label for="title">ข้อมูลเพิ่มเติม <a class="text-danger">(*ถ้ามี)</a></label>
                                                    <textarea name="info" rows="4" cols="4" class="form-control" placeholder="กรุณาใส่ข้อมูล"></textarea>
                                            </div>

                                            <?php
                                                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                                                $result = substr(str_shuffle($permitted_chars), 0, 5);
                                            ?>

                                            <div class="form-group">
                                                    <input type="hidden" name="gencode" value="{{$result}}" class="form-control" class="b" readonly>
                                            </div>
                                            {{-- <div class="form-group">

                                            </div>  --}}

                                            <div class="form-group">
                                                    <label for="title">สภาพรถยนต์<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                    <input type="file" name="image3" value="" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">เบอร์โทรผู้ขับ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                <input type="text" name="cartel" value="" class="form-control">
                                            </div>

                                                {{-- Map เริ่มตรงนี้ --}}
                                                <div class="form-group">
                                                    <label form="">ตำแหน่งที่เกิดเหตุ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label><br>
                                                    {{-- <label form=""><b>ค้นหาตำแหน่งที่อยู่ร้าน</b></label><br> --}}
                                                    {{-- <input type="text" id="searchmap" placeholder=" กรุณาใส่ข้อมูล"> --}}
                                                    <div></div><br>

                                                <div id="map-canvas"></div><br>

                                                <div class="form-group">
                                                    <label form="">ละติจูด</label>
                                                    <input type="text" value="" class="form-control input-sm" name="lat" id="lat">
                                                </div>

                                                <div class="form-group">
                                                    <label form="">ลองติจูด</label>
                                                    <input type="text" value="" class="form-control input-sm" name="long" id="lng">
                                                </div>
                                                {{-- Map สิ้นสุดตรงนี้ --}}

                                        <!-- Start Wellcome Area -->

                                            <h6 class="sidebar-title">ข้อมูลศูนย์บริการ<a class="text-danger">(* กรุณาเลือกร้านที่จะทำการเรียกช่าง)</a></h6>

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="">
                                                        <div class="well-text text-center">
                                                            <h4 class="sidebar-title">ค้นหาอู่ซ่อมรถยนต์</h4>

                                                            <form class="" action="{{route('welcome')}}" method="GET">
                                                                <input type="text" class="" name="search" placeholder="Search" value="{{request()->query('search')}}">

                                                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>

                                                            </form>
                                                            <br>
                                                            <h4 class="sidebar-title">ประเภทร้าน</h4>
                                                            <div class="row link-color-default fs-14 lh-24">
                                                                @foreach($categories as $category)
                                                                    <a class="btn btn-primary" href="{{route('blog.category',$category->id)}}" role="button">{{$category->name}}</a>
                                                                @endforeach
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
                                                            <h4>สถานประกอบการ</h4>
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
                                                                    {{-- <div class="row gap-y"> --}}
                                                                            <table class="table">
                                                                                    <thead>
                                                                                        <th>select</th>
                                                                                        <th>รูปร้าน</th>
                                                                                        <th>ชื่อร้าน</th>
                                                                                        <th>ประเภทร้าน</th>
                                                                                        <th>ที่อยู่</th>
                                                                                        {{-- <th></th>
                                                                                        <th></th> --}}

                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach($posts as $post)
                                                                                        <tr>
                                                                                                {{-- <input type="checkbox" name="variable_check" id=" variable_check " value="0"> --}}
                                                                                            <td><label><input type="checkbox" name="checkshop" value="{{$post->id}}"></label></td>
                                                                                            <td>
                                                                                                <a href=""><img src="../../storage/{{$post->image}}" alt="Card image cap" width="100" height="100"></a>
                                                                                            </td>
                                                                                            <td>ร้าน{{$post->title}}</td>
                                                                                            <td>{{$post->category->name}}</td>
                                                                                            <td>ตำแหน่งร้าน : {{$post->content}} ตำบล{{$post->district}} อำเภอ{{$post->amphur}} จังหวัด{{$post->city_name}}</td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                    </div>

                                                                </div>
                                                                </div>
                                                            </div>
                                                            <!-- End services -->

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- End Service area -->

                                                <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-lg btn-block">แจ้งข้อมูลรถ</button>
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
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">

            <script type="text/javascript">
                    $(document).ready(function(){
                            $('#select-tags').select2();
                    });
            </script>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#city_name').keyup(function(){
                        var query = $(this).val();

                        if(query != ''){
                        var _token = $('input[name="_token"]').val();
                        }

                        $.ajax({
                            url:"{{ route('autocomplete.show') }}",
                            method:"POST",
                            data:{query:query,_token:_token},
                            success:function(data){
                                $('#cityList').fadeIn();
                                $('#cityList').html(data);
                            }
                        })
                        });
                    });
                    $(document).on('click', 'li', function(){
                        $('#cityList').fadeOut();
                        $('#city_name').val($(this).text());

                    });
                </script>

                <script>
                    var map = new google.maps.Map(document.getElementById('map-canvas'),{
                    center:{

                        lat:19.0284952,
                        lng:99.8941534
                    },
                    zoom:15
                    });
                    var marker= new google.maps.Marker({
                    position:{

                        lat:19.0284952,
                        lng:99.8941534
                    },
                        map:map,
                        draggable:true
                    });
                    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
                        google.maps.event.addListener(searchBox,'places_changed',function(){
                        var places = searchBox.getPlaces();
                        var bounds = new google.maps.LatLngBounds();
                        var i , place;
                        for(i=0;place=places[i];i++){
                            bounds.extend(place.geometry.location);
                            marker.setPosition(place.geometry.location);
                        }
                        map.fitBounds(bounds);
                        map.setZoom(1);
                    });
                    google.maps.event.addListener(marker,'position_changed',function(){
                        var lat = marker.getPosition().lat();
                        var lng = marker.getPosition().lng();
                        $('#lat').val(lat);
                        $('#lng').val(lng);
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
