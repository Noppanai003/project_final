<?php

use Illuminate\Support\Facades\DB;
use App\Post;
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

                            <br>
                            <?php
                            $posts2 = $posts1;
                            ?>

                            <input type="hidden" name="post1" value="{{$posts2->id}}" class="form-control" class="b" readonly>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <img class="card-img-top" src="/storage/{{$posts2->image2}}" alt="Card image cap" width="500px" height="500px">
                                    </div>
                                    <div class="p-6 text-center">
                                        <h5 class="mb-0"><a class="text-dark" href="{{route('CallMechanic.edit',$posts2->id)}}">{{$posts2->lname}}</a></h5>
                                        <p><a class="small-3 text-dark text-uppercase ls-2 fw-400" href="{{route('CallMechanic.edit',$posts2->id)}}">{{$posts2->make}} {{$posts2->fname}}</a></p>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="title">ยี่ห้อรถยนต์ </label>
                                        <input type="text" name="make" value="{{$posts2->make}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">รุ่นรถ </label>
                                        <input type="text" name="modelcar" value="{{$posts2->fname}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">ปีรุ่นรถ </label>
                                        <input type="text" name="model" value="{{$posts2->model}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">เลขทะเบียนรถยนต์ </label>
                                        <input type="text" name="license" value="{{$posts2->license}}" class="form-control" placeholder="กรุณาใส่ข้อมูล" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">เบอร์โทรผู้ขับ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                                <input type="text" name="cartel" value="" class="form-control">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="title">ระบุอาการ <a class="text-danger">(*ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        </div>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("input[type='radio']").change(function() {
                                    if ($(this).val() == "other") {
                                        $("#otherAnswer").show();
                                    } else {
                                        $("#otherAnswer").hide();
                                    }
                                });
                            });
                        </script>

                        <input type="radio" name="answer" value="yes" /> ไม่ทราบสาเหตุ <br>
                        <input type="radio" name="answer" value="other" /> ทราบสาเหตุ <br>
                        <p id="otherAnswer" style="display:none" name="otherAnswer">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="bat" value="แบตเตอรี่" class="img-checker"> แบตเตอรี่
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../img/batt.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="di" value="ไดชาร์จ"> ไดชาร์จ
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../img/di.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="motor" value="มอเตอร์สตาร์ท"> มอเตอร์สตาร์ท
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../img/motor.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="head" value="หัวเทียน"> หัวเทียน
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../img/hhh.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="oil" value="น้ำมันรั่ว"> น้ำมันรั่ว
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../../img/mam.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="dry" value="หม้อน้ำรั่ว,หม้อแห้ง"> หม้อน้ำรั่ว,หม้อแห้ง
                                &nbsp;<img src="../../img/nam.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>
                                <input type="checkbox" name="flat" value="ยางแบน"> ยางแบน
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../img/yang.jpg" width="90px" height="70px">
                            </label>
                            <br><br>
                            <label>
                                <textarea cols="50" name="other" class="form-control" placeholder="ระบุอาการรถของท่านเบื้องต้น"></textarea>
                            </label>
                        </p>

                        <div class="form-group">
                            <label for="title">ข้อมูลเพิ่มเติม <a class="text-danger">(*ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <textarea name="info" rows="4" cols="4" class="form-control" placeholder="กรุณาใส่ข้อมูล"></textarea>
                        </div>

                        <?php
                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                        $result = substr(str_shuffle($permitted_chars), 0, 5);
                        ?>

                        <div class="form-group">
                            <input type="hidden" name="gencode" value="{{$result}}" class="form-control" class="b" readonly>
                        </div>

                        <div class="form-group">
                            <label for="title">สภาพรถยนต์<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="file" name="image3" value="" class="form-control">
                        </div>


                        {{-- Map เริ่มตรงนี้ --}}
                        <div class="form-group">
                            <label form="">ตำแหน่งที่เกิดเหตุ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label><br>
                            {{-- <label form=""><b>ค้นหาตำแหน่งที่อยู่ร้าน</b></label><br> --}}
                            {{-- <input type="text" id="searchmap" placeholder=" กรุณาใส่ข้อมูล"> --}}
                            <div></div><br>

                            <div id="map-canvas"></div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label form="">ละติจูด</label>
                                        <input type="text" value="" class="form-control input-sm" name="lat" id="lat">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label form="">ลองติจูด</label>
                                        <input type="text" value="" class="form-control input-sm" name="long" id="lng">
                                    </div>
                                </div>
                            </div>

                            {{-- Map สิ้นสุดตรงนี้ --}}

                            <!-- Start Service area -->
                            <div id="services" class="services-area area-padding">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <h6 class="sidebar-title">ข้อมูลศูนย์บริการ<a class="text-danger">(* กรุณาเลือกร้านที่จะทำการเรียกช่าง)</a></h6>
                                            <h4>สถานประกอบการ</h4>

                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="services-contents">

                                            <!-- Start services -->
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-md-12">

                                                        <table cla ss="table">
                                                            <thead>
                                                                <th>select</th>
                                                                <th>รูปร้าน</th>
                                                                <th>ชื่อร้าน</th>
                                                                <th>ประเภทร้าน</th>
                                                                <th>ที่อยู่</th>
                                                                <th>ระยะห่างจากอู่ซ่อม</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $post = DB::select('select * from posts');
                                                                // $find = Post::find($bills->id);
                                                                // $find1 = Category::find($find->category_id);

                                                                $kilometers = [];
                                                                ?>

                                                                @foreach($post as $posts)
                                                                <?php
                                                                // 19.2698419 Lat พะเยา
                                                                // 99.5954193 Long พะเยา
                                                                $lat1 = 19.2698419;
                                                                $lon1 = 99.5954193;

                                                                $lat2 = $posts->lat;
                                                                $lon2 = $posts->long;

                                                                $theta = $lon1 - $lon2;
                                                                $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                                                                $miles = acos($miles);
                                                                $miles = rad2deg($miles);
                                                                $miles = $miles * 60 * 1.1515;
                                                                $feet = $miles * 5280;
                                                                $yards = $feet / 3;

                                                                $km = $miles * 1.609344;

                                                                array_push($kilometers, $km);

                                                                $array[] = array(
                                                                    'id_shop' => $posts->id,
                                                                    'category'=> 'อู่ซ่อม',
                                                                    'title' => $posts->title,
                                                                    'kilometers' => $km,
                                                                    'content' => $posts->content,
                                                                    'image' => $posts->image,
                                                                    'district' => $posts->district,
                                                                    'amphur' => $posts->amphur,
                                                                    'city_name' => $posts->city_name,
                                                                );
                                                                ?>
                                                                @endforeach

                                                                <?php
                                                                array_multisort(array_map(function ($element) {
                                                                    return $element['kilometers'];
                                                                }, $array), SORT_ASC, $array);

                                                                // echo '<pre>';
                                                                // print_r($array);
                                                                // echo '</pre>';
                                                                ?>

                                                                @foreach($array as $post)

                                                                <tr>
                                                                    <td><label><input type="checkbox" name="checkshop" value="{{$post['id_shop']}}"></label></td>
                                                                    <td>
                                                                        <a href=""><img src="../../storage/{{$post['image']}}" alt="Card image cap" width="100" height="100"></a>
                                                                    </td>
                                                                    <td>ร้าน{{$post['title']}}</td>
                                                                    <td>{{$post['category']}}</td>
                                                                    <td>ตำแหน่งร้าน : {{$post['content']}} ตำบล{{$post['district']}} อำเภอ{{$post['amphur']}} จังหวัด{{$post['city_name']}}</td>

                                                                    <td>
                                                                        <?php

                                                                        // $lat1 = 18.79464648105186;
                                                                        // $lon1 = 98.97679500156255;

                                                                        // $lat2 = $post->lat;
                                                                        // $lon2 = $post->long;

                                                                        // $theta = $lon1 - $lon2;
                                                                        // $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
                                                                        // $miles = acos($miles);
                                                                        // $miles = rad2deg($miles);
                                                                        // $miles = $miles * 60 * 1.1515;
                                                                        // $feet = $miles * 5280;
                                                                        // $yards = $feet / 3;
                                                                        // $kilometers = $miles * 1.609344;
                                                                        // $meters = $kilometers * 1000;

                                                                        // DB::table('posts')
                                                                        //     ->where('id', $post->id)
                                                                        //     ->update(['distance' => $kilometers]);

                                                                        ?>
                                                                        {{number_format($post['kilometers'],2)}} กิโลเมตร
                                                                    </td>
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
                            <!-- End Service area -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block">แจ้งข้อมูลรถ</button>
                            </div>
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
        $(document).ready(function() {
            $('#select-tags').select2();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#city_name').keyup(function() {
                var query = $(this).val();

                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                }

                $.ajax({
                    url: "{{ route('autocomplete.show') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#cityList').fadeIn();
                        $('#cityList').html(data);
                    }
                })
            });
        });
        $(document).on('click', 'li', function() {
            $('#cityList').fadeOut();
            $('#city_name').val($(this).text());

        });
    </script>

    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {

                lat: 19.0284952,
                lng: 99.8941534
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {

                lat: 19.0284952,
                lng: 99.8941534
            },
            map: map,
            draggable: true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(1);
        });
        google.maps.event.addListener(marker, 'position_changed', function() {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
            // $(document).ready(function() {
            //     $("#map-canvas").click(function() {
            //         $.ajax({
            //             url: '/caldis',
            //             type: "POST",
            //             data: {
            //                 lat: lat,
            //                 lng: lng
            //             },
            //             success: function(data) {
            //                 console.log(data);
            //             },
            //         });
            //     });
            // });
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