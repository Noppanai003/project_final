<!DOCTYPE html>
@extends('layouts.blog')
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    @section('title')
      <title>ร้าน{{$post->title}}</title>
    @endsection
  </head>

  <body>
    @section('header')
    <header class="header text-white h-fullscreen pb-80" style="background-image: url('../../storage/{{$post->image}}');" data-overlay="9">
      <div class="container text-center">

        <div class="row h-100">
          <div class="col-lg-8 mx-auto align-self-center">

            <p class="opacity-70 text-uppercase small ls-1">{{$post->category->name}}</p>
            <h1 class="display-4 mt-7 mb-8">ร้าน{{$post->title}}</h1>

            <p><span class="opacity-70 mr-1">By</span> <a class="text-white">{{$post->user->name}}</a></p>
            {{-- <p><img class="avatar avatar-sm" src="../assets/img/avatar/2.jpg" alt="..."></p> --}}
          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
          </div>

        </div>

      </div>
    </header><!-- /.header -->
    @endsection

    @section('content')
    
    <div class="section" id="section-content">
      <div class="container">
     
              {{-- <div class="row">
                <div class="col">
                
                </div>
                <div class="col-5">
                
                </div>
                <div class="col">
                    <a class="btn btn-success" href="{{route('CallMechanic.create')}}" role="button">เรียกช่างนอกพื้นที่</a>
                </div>
              </div> --}}
    
        <div class="row">
          <div class="col-lg-8 mx-auto">
              <h2><b>ร้าน{{$post->title}}</b></h2>
                <h3>ประเภทร้าน: {{$post->category->name}}</h3>
                <h5><i class="fa fa-map-marker col-red">
                    {{$post->content}} ตำบล{{$post->district}} อำเภอ{{$post->amphur}} จังหวัด{{$post->city_name}} {{$post->postcode}}
                </i></h5>

                <h4>รายละเอียดร้าน</h4>
                    {!!$post->description!!}
                <br>
                <h5><i class="fa fa-phone-square" aria-hidden="true">
                    ช่องทางติดต่อ โทร {{$post->tel}}
                </i></h5>
                <br>

                <div class="container">
                  <h3 class="opacity-70 mr-1"><i class="fa fa-thumbs-up"></i> คะแนนจากผู้ใช้งาน</h3>
                  <div class="star-rating">
                      <span class="fa fa-star-o" title="1"></span>
                      <span class="fa fa-star-o" title="2"></span>
                      <span class="fa fa-star-o" title="3"></span>
                      <span class="fa fa-star-o" title="4"></span>
                      <span class="fa fa-star-o" title="5"></span>
                  </div>
                  
                  <h3 class="opacity-70 mr-1"><i class="fa fa-trophy"></i> รีวิวอู่</h3>
                  <div class="review-rating">
                      <div class="left-review">
                          <div class="review-title">3.5</div>
                          <div class="review-star">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-half-o"></span>
                              <span class="fa fa-star-o"></span>
                          </div>
                          <div class="review-people"><i class="fa fa-user"></i> 8,445,600 total</div>
                      </div>
                      <div class="right-review">
                          <div class="row-bar">
                              <div class="left-bar">5</div>
                              <div class="right-bar">
                                  <div class="bar-container">
                                      <div class="bar-5" style="width: 80%"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-bar">
                              <div class="left-bar">4</div>
                              <div class="right-bar">
                                  <div class="bar-container">
                                      <div class="bar-4" style="width: 40%"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-bar">
                              <div class="left-bar">3</div>
                              <div class="right-bar">
                                  <div class="bar-container">
                                      <div class="bar-3" style="width: 15%"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-bar">
                              <div class="left-bar">2</div>
                              <div class="right-bar">
                                  <div class="bar-container">
                                      <div class="bar-2" style="width: 20%"></div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-bar">
                              <div class="left-bar">1</div>
                              <div class="right-bar">
                                  <div class="bar-container">
                                      <div class="bar-1" style="width: 35%"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

                <br><br><br>
                <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function () {
                          this.page.url = "{{config('app.url')}}/blog/posts/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
                          this.page.identifier = "{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                          var d = document, s = d.createElement('script');
                          s.src = 'https://http-localhost-8000-box97w81ox.disqus.com/embed.js';
                          s.setAttribute('data-timestamp', +new Date());
                          (d.head || d.body).appendChild(s);
                        })();
                    </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
        </div>
      </div>
    </div>
    @endsection

  </body>
</html>

