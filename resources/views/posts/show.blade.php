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
                    <div class="form-group" align="middle">
                        <img src="../storage/{{$post->image}}" width="300px" height="300px">
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
                    <div class="form-group">
                        <strong>รายละเอียดร้าน : </strong>
                        {!!$post->description!!}
                    </div>

                    <strong>ประเภทการบริการ : </strong>
                    <table class="table table-borderless">
                        <thead>
                            <th>ประเภทการซ่อม </th>
                            <th>รายละเอียดเพิ่มเติม</th>
                            <th>เรทราคาเริ่มต้น</th>
                            <th>ถึงราคา</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $post->engine }}</td>
                                <td>{{ $post->detail_engine }}</td>
                                <td>{{ $post->start_price_engine }}</td>
                                <td>{{ $post->end_price_engine }}</td>
                            </tr>
                            <tr>
                                <td>{{ $post->suspension }}</td>
                                <td>{{ $post->detail_suspension }}</td>
                                <td>{{ $post->start_price_suspension }}</td>
                                <td>{{ $post->end_price_suspension }}</td>
                            </tr>
                            <tr>
                                <td>{{ $post->electrical }}</td>
                                <td>{{ $post->detail_electrical }}</td>
                                <td>{{ $post->start_price_electrical }}</td>
                                <td>{{ $post->end_price_electrical }}</td>
                            </tr>
                            <tr>
                                <td>{{ $post->tank }}</td>
                                <td>{{ $post->detail_tank }}</td>
                                <td>{{ $post->start_price_tank }}</td>
                                <td>{{ $post->end_price_tank }}</td>
                            </tr>
                            <tr>
                                <td>{{ $post->betterlet }}</td>
                                <td>{{ $post->detail_betterlet }}</td>
                                <td>{{ $post->start_price_betterlet }}</td>
                                <td>{{ $post->end_price_betterlet }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <strong> วันที่เปิดทำการ : </strong>
                    <div class="form-group">
                        <i class="fa fa-calendar-check-o"></i><strong> จันทร์ </strong>
                        - {{ $post->mon }}
                        <br>
                        <i class="fa fa-calendar-check-o"></i><strong> อังคาร </strong>
                        - {{ $post->tue }}
                        <br>
                        <i class="fa fa-calendar-check-o"></i><strong> พุธ </strong>
                        - {{ $post->wed }}
                        <br>
                        <i class="fa fa-calendar-check-o"></i><strong> พฤหัสบดี </strong>
                        - {{ $post->thu }}
                        <br>
                        <i class="fa fa-calendar-check-o"></i><strong> ศุกร์ </strong>
                        - {{ $post->fri }}
                        <br>
                        <i class="fa fa-calendar-check-o"></i><strong> เสาร์ </strong>
                        - {{ $post->sat }}
                        <br>
                        <i class="fa fa-calendar-check-o"></i><strong> อาทิตย์ </strong>
                        - {{ $post->sun }}
                    </div>

                    <div class="form-group">
                        <strong>เวลาเปิดทำการ : </strong>
                        {{ $post->time_start }}
                        <label> - </label>
                        {{ $post->time_end }} น.
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
                        {{ $post->category->name }}
                    </div>

                    <div class="form-group">
                        <strong> รูปใบประกอบกิจการร้าน : </strong> <br>
                        <img src="../storage/{{$post->image1}}" width="200px" height="200px">
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
