<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
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
        {{-- @include('ratings.connect'); --}}
        <?php
          header('Content-Type: text/html; charset=utf-8');       
          $db=new mysqli("localhost","root","","carcare3");

            $articleArr=[];
            $query=$db->query("select * from posts");
            while ($row=$query->fetch_object()){
              $articleArr[]=$row;
            }
            mysqli_query($db, 'SET CHARACTER SET UTF8');
            
        ?>
        {{-- @foreach ($articleArr as $article ) --}}
   
              <div class="section-headline services-head">
                
                  <table class="table">
                      <thead>
                          <th>รูปร้าน</th>
                          <th>ชื่อร้าน</th>
                          {{-- <th>ประเภทร้าน</th>               --}}
                          <th>คะแนนศูนย์บริการ</th>
                          <th></th>
                          <th></th>
          
                      </thead>
                      <tbody>
                          @foreach ($articleArr as $article )
                          <tr>
          
                              <td>
                                  <img src="storage/{{$article->image}}" alt="" width="100" height="100">
                              </td>
                              <td>{{$article->title}}</td>
                              <td>Rating: x/5</td>                           
                            
                              {{-- <td>{{$article->content}} {{$article->district}} {{$article->amphur}} {{$article->city_name}} {{$article->postcode}} </td> --}}
                              <td>
                                  <a href="{{route('rating.show',$article->id)}}" class="btn btn-primary btn-sm">vote</a>
                              </td>

                              <td>
                                  <a href="{{route('posts.show',$article->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                              </td>
                              
          
                              {{-- <td>
                                  <form class="delete_form" action="{{route('posts.destroy',$article->id)}}" method="post">
                                      @csrf
                                      <input type="hidden" name="_method" value="DELETE">
                                      <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                                  </form>
                              </td>  --}}
          
                          </tr>
                          @endforeach
                      </tbody>
                  </table>

              </div>

        
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
