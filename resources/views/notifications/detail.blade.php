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
                            <label for="title">ข้อมูลรถยนต์</label>

                            <br>
                            <?php
                            $posts2 = $posts1;
                            ?>

                            <input type="hidden" name="post1" value="{{$posts2->id}}" class="form-control" class="b" readonly>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <img src="../../storage/{{$posts2->image2}}" alt="" width="500" height="600"><br>
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
                        </div>

                        <div class="card card-default">
                            <div class="card-header">

                            </div>

                            <div class="card-body">
                                @if($notifications->count()>0)

                                <table class="table">
                                    <thead>
                                        <th>รายการแจ้งเตือน</th>
                                        <th>วันที่ทำการบันทึก</th>
                                        <th>วันที่ครบกำหนด</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach($notifications as $notification)
                                        <tr>
                                            <td>{{$notification->nonti_data}}</td>
                                            <td>{{$notification->startdate}}</td>
                                            <td>
                                                <?php
                                                $adate = date($notification->startdate);
                                                echo date("d-m-Y", strtotime("+1 year, -3 days", strtotime($adate)));
                                                ?>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-sm">รายละเอียด</a>
                                            </td>
                                            <td>
                                                <a href="{{route('notifications.edit',$notification->id)}}" class="btn btn-primary btn-sm">แก้ไข</a>
                                            </td>
                                            <td>
                                                <form class="delete_form" action="{{route('notifications.destroy',$notification->id)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @else
                                <h3 class="text text-center">ไม่มีข้อมูลการแจ้งเตือน</h3>
                                @endif
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('.delete_form').on('submit', function() {
                                    if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                                        return true;
                                    } else {
                                        return false;
                                    }

                                });
                            });
                        </script>

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
        $(document).ready(function() {
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
