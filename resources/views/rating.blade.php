<?php

$db = new mysqli(
  "localhost",
  "root",
  "",
  "carcare3"
);
$articleArr = [];
$query = $db->query(
  "select *,AVG(carcare3.articleratings.rating) AS rating FROM carcare3.posts LEFT JOIN carcare3.articleratings ON carcare3.posts.id=carcare3.articleratings.posts_id GROUP BY carcare3.posts.id");
while ($row = $query->fetch_object()) {
  $articleArr[] = $row;
}
mysqli_query($db, 'SET CHARACTER SET UTF8');
?>

<!DOCTYPE html>
<html>

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logoWeb-carcare.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- Styles -->

  <link href="css/style1.css" rel="stylesheet">

  <meta charset="UTF-8">
  <title>Rating</title>
</head>
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

              <a class="navbar-brand page-scroll sticky-logo" href="{{route('welcome')}}">
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

<body>
  <br>
  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="section-headline services-head">
        <h3>Ratings System</h3>
        <table class="table">
          <thead>
            <th>รูปร้าน</th>
            <th>ชื่อร้าน</th>
            <!--  <th>ประเภทร้าน</th>  -->
            <th>คะแนนศูนย์บริการ</th>
            <th></th>
            <th></th>

          </thead>
          <tbody>
            <?php foreach ($articleArr as $article) : ?>
              <tr>

                <td>
                  <?php
                    echo "<img src='../../storage/$article->image' alt='' width='100' height='100' />";
                    ?>
                </td>
                <td> <?php echo $article->title; ?></td>
                <td>Rating: <?php echo round($article->rating); ?>/5</td>
                <td>
                  <?php
                    echo "<a href='/article?id=$article->id' class='btn btn-primary btn-sm'>vote</a>";
                    ?>
                </td>

                <td>
                  <?php
                    echo '<a href="" class="btn btn-warning btn-sm">รายละเอียด</a>';
                    ?>
                </td>

              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      </div>

      <!-- End Service area -->

</body>

</html>