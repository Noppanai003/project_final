@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        รายละเอียด
    </div>

    <div class="card-body">
        <div class="pull-left">
        <a class="btn btn-dark btn-sm" href="{{ route('posts.index') }}">
            <i class="fa fa-arrow-left"></i> <span>กลับ</span>
        </a>
        </div>
<br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="container">
                <strong> รูปร้าน : </strong>
                    <div class="form-group" align= "middle">
                    <img src="../storage/{{$post->image}}" width="300px" height="300px" >
                    </div> <br>
                    <div class="form-group">
                        <strong>ชื่อสถานประกอบการ : </strong>
                        {{ $post->title }}
                    </div>
                    <div class="form-group">
                        <strong>ชื่อ : </strong>
                        {{ $post->fname }}
                    </div>
                    <div class="form-group">
                        <strong>นามสกุล : </strong>
                        {{ $post->lname }}
                    </div>
                    <div class="form-group" >
                        <strong >รายละเอียดร้าน : </strong>
                        {!!$post->description!!}
                    </div>
                    <div class="form-group">
                        <strong>บ้านเลขที่อยู่ปัจจุบัน : </strong>
                        {{ $post->content }}
                    </div>
                    <div class="form-group">
                        <strong>ตำบล : </strong>
                        {{ $post->district }}
                    </div>
                    <div class="form-group">
                        <strong>อำเภอ : </strong>
                        {{ $post->amphur }}
                    </div>
                    <div class="form-group">
                        <strong>จังหวัด : </strong>
                        {{ $post->city_name }}
                    </div>


                    <div class="form-group">
                        <strong>รหัสไปรษณีย์ : </strong>
                        {{ $post->postcode }}
                    </div>
                    <div class="form-group">
                        <strong>เบอร์โทรร้าน : </strong>
                        {{ $post->tel }}
                    </div>
                    <!-- <div class="form-group">
                        <strong>ประเภทร้าน : </strong>
                        {{ $post-> category_store_id}}
                    </div> -->
                    <div class="form-group">
                        <strong>ประเภทการสถานประกอบการ : </strong>
                        {{ $post->category_id }}
                    </div>

                    <div class="form-group">
                    <strong> รูปใบประกอบกิจการร้าน : </strong> <br>
                    <img src="../storage/{{$post->image1}}" width="200px" height="200px" >
                    </div>

                    <div class="form-group">
                        <strong>ละติจูด : </strong>
                        {{ $post->lat }}
                    </div>
                    <div class="form-group">
                        <strong>ลองติจูด : </strong>
                        {{ $post->long }}
                    </div>


                </div>
            </div>
        </form>

    </div>

</div>

@endsection
