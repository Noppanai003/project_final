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
                  {{-- <li class="active">
                    <a class="page-scroll" href="#home">Home</a>
                  </li> --}}
                  {{-- <li>
                    <a class="page-scroll" href="#about">About</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Services</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Team</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                  </li> --}}

                  {{-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href=# >Drop Down 1</a></li>
                      <li><a href=# >Drop Down 2</a></li>
                    </ul>
                  </li> --}}

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

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="img/wcf_adv_image1.jpg" alt="" title="#slider-direction-1" />
        <img src="img/wcf_adv_image2.jpg" alt="" title="#slider-direction-1" />
        <img src="img/wcf_adv_image3.jpg" alt="" title="#slider-direction-1" />
      </div>

      <!-- direction 1 -->
      {{-- <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best Business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">We're In The Business Of Helping You Start Your Business</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

      {{--
      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best Business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">We're In The Business Of Get Quality Business Service</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best business Information </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Helping Business Security  & Peace of Mind for Your Family</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <!-- End Slider Area -->

    <!-- Start Service area -->
    <div id="services" class="services-area area-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline services-head text-center">
                <h4>ทำไมคุณถึงต้องใช้บริการ Carcare <br>
                    บริการที่เข้ามาช่วยเติมเต็มทุกความต้องการของผู้ใช้รถยนต์</h4>
              </div>
            </div>
          </div>
          <div class="row text-center">
            <div class="services-contents">
              <!-- Start Left services -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                  <div class="services-details">
                    <div class="single-services">
                      {{-- <a class="services-icon" href="#">
                            <i class="fa fa-code"></i>
                    </a> --}}
                        <img src="img/ic_devices_auto.png" alt="">
                        {{-- <h4>Expert Coder</h4> --}}
                      <p>
                          <b>
                              ช่วยหาอู่ซ่อมรถหรือบริการที่เกี่ยวกับรถได้รวดเร็ว ทุกที่ ทุกเวลา
                          </b>

                      </p>
                    </div>
                  </div>
                  <!-- end about-details -->
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="about-move">
                  <div class="services-details">
                    <div class="single-services">
                      {{-- <a class="services-icon" href="#">
                                                <i class="fa fa-camera-retro"></i>
                                            </a> --}}
                        <img src="img/ic_oneplatform_auto.png" alt="">
                            <p>
                                <b>
                                    รวบรวมบริการเกี่ยวกับรถยนต์ไว้บนแพลตฟอร์มเดียวเพื่อตอบสนองความต้องการในทุกแง่มุมของผู้ใช้รถยนต์
                                </b>

                            </p>
                    </div>
                  </div>
                  <!-- end about-details -->
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                  <div class="services-details">
                    <div class="single-services">
                        <img src="img/ic_review_auto.png" alt="">
                            <p>
                                <b>
                                    มีระบบการให้คะแนนผู้ให้บริการ ทำให้คุณสบายใจได้ว่ารถของคุณจะได้รับบริการจากผู้ให้บริการที่มีความเป็นมืออาชีพ
                                </b>

                            </p>
                    </div>
                  </div>
                  <!-- end about-details -->
                </div>
              </div>

              <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                  <div class="services-details">
                    <div class="single-services">
                        <img src="img/ic_trust_auto.png" alt="">
                            <p>
                                <b>
                                    ไว้วางใจได้ในทุกบริการเกี่ยวกับรถยนต์ที่เราคัดสรรมาไว้เพื่อคุณ
                                </b>

                            </p>
                    </div>
                  </div>
                  <!-- end about-details -->
                </div>
              </div>
              <!-- End Left services -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                  <div class="services-details">
                        <div class="single-services">
                            <img src="img/ic_savecost_auto.png" alt="">
                                <p>
                                    <b>
                                        ช่วยตัดค่าใช้จ่ายที่ไม่ชัดเจน ไม่จำเป็นทำให้ได้รับบริการที่คุ้มค่า คุ้มราคา
                                    </b>

                                </p>
                        </div>
                  </div>
                  <!-- end about-details -->
                </div>
              </div>
              <!-- End Left services -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <!-- end col-md-4 -->
                <div class=" about-move">
                  <div class="services-details">
                    <div class="single-services">
                        <img src="img/ic_offer_auto.png" alt="">
                            <p>
                                <b>
                                    ผู้ใช้ได้รับประโยชน์ เช่น ส่วนลดโปรโมชันจากสิทธิพิเศษที่หลากหลาย
                                </b>
                            </p>
                    </div>
                  </div>
                  <!-- end about-details -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Service area -->
    
<!-- Start Wellcome Area -->
    <div class="wellcome-area">
        <div class="well-bg">
          <div class="test-overly"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wellcome-text">
                  <div class="well-text text-center">
                    <h2>ค้นหาอู่ซ่อมรถยนต์</h2>

                    <form class="input-group" action="{{route('welcome')}}" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
                        <div class="input-group-addon">
                          <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                      </form>
                      <br>
                      <h3 class="sidebar-title">ประเภทร้าน</h3>
                      <div class="row link-color-default fs-14 lh-24">
                        @foreach($categories as $category)
                          <a class="btn btn-primary" href="{{route('blog.category',$category->id)}}" role="button">{{$category->name}}</a>
                        @endforeach
                      </div>
                     
 
                        {{-- <input type="text" class="text form-control width-80" id="sus_email" placeholder="ค้นหาอู่">
                        <button type="submit" id="sus_submit" <i class="fa fa-search"></i> </button>
                        <div id="msg_Submit" class="h3 text-center hidden"></div> --}}

                        
                      </div>
                    </div>
                  </div>
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
              <h2>สถานประกอบการ</h2>
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
                          @forelse($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                  <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="storage/{{$post->image}}" alt="Card image cap"></a>
                                  <div class="p-6 text-center">

                                    <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">ร้าน{{$post->title}}</a></h5>
                                    <p><a class="small-3 text-dark text-uppercase ls-2 fw-400" href="{{route('blog.show',$post->id)}}">{{$post->category->name}}</a></p>
                                    <p><a class="small-3 text-dark text-uppercase ls-2 fw-400" href="#">ตำแหน่งร้าน : {{$post->content}} ตำบล{{$post->district}} อำเภอ{{$post->amphur}} จังหวัด{{$post->city_name}} {{$post->postcode}}</a><br>
                                    <a class="small-3 text-dark text-uppercase ls-2 fw-400" href="#">เบอรโทรร้าน : {{$post->tel}}</a></p>
                                    
                                  </div>
                                </div>
                            </div>
                          @empty
                            <p class="text-center">ไม่มีผลลัพธ์ : <strong>{{request()->query('search')}}</strong></p>
                          @endforelse
                      </div>
                      {{$posts->appends(['search'=>request()->query('search')])->links()}}
                    </div>
                      {{-- @include('layouts.sidebar1') --}}

                  </div>
                </div>
              </div>
              <!-- End services -->
      
        </div>
      </div>
    </div>
    <!-- End Service area -->

  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>ที่อยู่ของเรา</h2>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: +1 5589 55488 55<br>
                  <span>Monday-Friday (9am-5pm)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: info@example.com<br>
                  <span>Web: www.example.com</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  ที่ตั้ง: 19 หมู่ 2 เมือง ตำบลแม่กา<br>
                  <span>จังหวัดพะเยา 56000 ประเทศไทย</span>
                </p>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md">
            <!-- Start Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          {{-- <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact --> --}}
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  {{-- <h2><span>e</span>Business</h2> --}}
                <img src="{{asset('img/logo-dark.png')}}" alt="" />
                </div>
                <a class="col-md-4" href="{{ url('/') }}">เว็บไซต์</a><br>
                <a class="col-md-4" href="#">เกี่ยวกับเรา</a>
                {{-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p> --}}
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/profile.php?id=100002944770659"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>                
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>ติดต่อเรา</h4>
                <p>
                    19 หมู่ 2 เมือง ตำบลแม่กา พะเยา 56000 ประเทศไทย
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +636512065</p>
                  <p><span>Email:</span> Swordart003@gmail.com</p>
                  <p><span>Working Hours:</span> 08:00 - 17:00 น.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                    <h4>ติดตามข่าวสารเพิ่มเติม</h4>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v4.0"></script>
                    <div class="fb-page" data-href="https://www.facebook.com/Car-Care-Application-1915851115378804/" data-tabs="timeline" data-width="300" data-height="150" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Car-Care-Application-1915851115378804/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Car-Care-Application-1915851115378804/">Car Care Application</a></blockquote></div>
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>   
    
  </footer>
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
