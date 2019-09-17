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
  {{-- @extends('layouts.app')
@section('content') --}}
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
                                    <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($post))
                                            @method('PUT')
                                        @endif
                                        <br>

                                            <div class="form-group">
                                                <label for="title">ข้อมูลผู้แจ้ง</label><br>
                                                <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control" placeholder="ชื่อ"><br>
                                                <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control" placeholder="นามสกุล"><br>
                                                <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control" placeholder="เบอร์ผู้ขับ">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">ข้อมูลรถยนต์ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                <input type="text" name="fname" value="{{isset($post)?$post->fname:''}}" class="form-control" placeholder="ตรงนี้ต้องลูปข้อมูลมาแสดง">
                                            </div>  

                                            <div class="form-group">
                                                    <label for="title">ที่เกิดเหตุ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                    <textarea name="content" rows="4" cols="4" class="form-control" placeholder="กรุณาใส่ข้อมูล">{{isset($post)?$post->content:''}}</textarea>
                                            </div>                  
                                           
                                            <div class="form-group">
                                                    <label for="title">สภาพรถยนต์<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                    <input type="file" name="image" value="" class="form-control">
                                            </div>
                    
                                                {{-- <div class="form-group">
                                                    <label for="title">รูปใบประกอบกิจการร้าน<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                                    <input type="file" name="image1" value="" class="form-control">
                                                </div> --}}
                    
                                                {{-- Map เริ่มตรงนี้ --}}
                                                <div class="form-group">
                                                    <label form="">ตำแหน่งที่อยู่ร้านของคุณ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label><br>
                                                    <label form=""><b>ค้นหาตำแหน่งที่อยู่ร้าน</b></label><br>
                                                    <input type="text" id="searchmap" placeholder=" กรุณาใส่ข้อมูล">
                                                    <div></div><br>
                    
                                                <div id="map-canvas"></div><br>
                    
                                                <div class="form-group">
                                                    <label form="">ละติจูด</label>
                                                    <input type="text" value="{{isset($post)?$post->lat:''}}" class="form-control input-sm" name="lat" id="lat">
                                                </div>
                    
                                                <div class="form-group">
                                                    <label form="">ลองติจูด</label>
                                                    <input type="text" value="{{isset($post)?$post->long:''}}" class="form-control input-sm" name="long" id="lng">
                                                </div>
                                                {{-- Map สิ้นสุดตรงนี้ --}}
                    
                                                <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-lg btn-block">แจ้งข้อมูลรถ</button>
                                                        {{-- <input type="submit" name="" value="{{isset($post)?'แก้ไขข้อมูล':'แจ้งข้อมูลรถ'}}" class="btn btn-success"> --}}
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
