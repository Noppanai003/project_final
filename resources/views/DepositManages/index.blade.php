<?php

use App\Bill;
use App\User;
?>
@extends('layouts.app')
@section('content')
<!-- ส่วนของการแสดง  -->
<div class="card card-default">
    <div class="card-header">
        จัดการข้อมูลเรียกช่าง
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
                <th>รายการ</th>
                <th>ผู้ใช้รถยนต์</th>
                <th>อู่ซ่อม</th>
                <th>รายการร้องขอ</th>
                <th>วันที่ทำรายการ</th>
                <th>ยอดเงินชำระ</th>
                <th>สถานะการทำงาน</th>

            </thead>
            <tbody>
                @foreach($bills as $item)

                <?php

                // echo print_r($item);
                ?>
                <tr>
                    <td>{{$item->id}}</td>
                    <?php
                    $ownnow1 = Bill::find($item->users_id);
                    ?>
                    <td>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#payment{{ $item->users_id }}">รายละเอียด</button>
                        <!-- The Modal -->
                        <div class="modal" id="payment{{ $item->users_id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">รายละเอียด</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        @if($item->avatar == NULL)
                                        <img src={{asset('img/no-image-profile.png')}} style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                                        @else
                                        <img class="rounded-circle" src="storage/avatars/{{ $item->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                        @endif
                                        <p> ชื่อ : {{$item->name}}</p>
                                        <p> อีเมล์ : {{$item->email}}</p>

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$item->id}}">
                            รายละเอียด
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดร้าน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <strong> รูปร้าน : </strong>
                                            <div class="form-group" align="middle">
                                                <img src="../../storage/{{$item->image}}" width="300px" height="300px">
                                            </div> <br>
                                            <div class="form-group">
                                                <strong>ชื่อสถานประกอบการ : </strong>
                                                {{ $item->title }}
                                            </div>
                                            <div class="form-group">
                                                <strong>ชื่อ-นามสกุล : </strong>
                                                {{ $item->fname }}
                                                {{ $item->lname }}
                                            </div>
                                            <div class="form-group">
                                                <strong>รายละเอียดร้าน : </strong>
                                                {!!$item->description!!}
                                            </div>
                                            <strong> วันที่เปิดทำการ : </strong><br>
                                            <div class="form-group">
                                                <i class="fa fa-calendar-check-o"></i><strong> จันทร์ </strong>
                                                - {{ $item->mon }}
                                                <br>
                                                <i class="fa fa-calendar-check-o"></i><strong> อังคาร </strong>
                                                - {{ $item->tue }}
                                                <br>
                                                <i class="fa fa-calendar-check-o"></i><strong> พุธ </strong>
                                                - {{ $item->wed }}
                                                <br>
                                                <i class="fa fa-calendar-check-o"></i><strong> พฤหัสบดี </strong>
                                                - {{ $item->thu }}
                                                <br>
                                                <i class="fa fa-calendar-check-o"></i><strong> ศุกร์ </strong>
                                                - {{ $item->fri }}
                                                <br>
                                                <i class="fa fa-calendar-check-o"></i><strong> เสาร์ </strong>
                                                - {{ $item->sat }}
                                                <br>
                                                <i class="fa fa-calendar-check-o"></i><strong> อาทิตย์ </strong>
                                                - {{ $item->sun }}
                                            </div>

                                            <div class="form-group">
                                                <strong>เวลาเปิดทำการ : </strong>
                                                {{ $item->time_start }}
                                                <label> - </label>
                                                {{ $item->time_end }} น.
                                            </div>

                                            <div class="form-group">
                                                <strong>บ้านเลขที่ : </strong>
                                                {{ $item->content }}

                                                <strong>ตำบล : </strong>
                                                {{ $item->district }}

                                                <strong>อำเภอ : </strong>
                                                {{ $item->amphur }}

                                                <strong>จังหวัด : </strong>
                                                {{ $item->city_name }}
                                            </div>
                                            <div class="form-group">
                                                <strong>เบอร์โทรร้าน : </strong>
                                                {{ $item->tel }}
                                            </div>
                                            <div class="form-group">
                                                <strong>ประเภทการสถานประกอบการ : </strong>
                                                {{ $item->name }}
                                            </div>

                                            <div class="form-group">
                                                <strong> รูปใบประกอบกิจการร้าน : </strong> <br>
                                                <img src="../../storage/{{$item->image1}}" width="350px" height="500px">
                                            </div>

                                            <div id="map-canvas"></div><br><br>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
    </div>
    </td>
    <td>
        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaliLongh{{$item->id}}">
            รายละเอียด
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModaliLongh{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">รายการคำร้องขอ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <strong> รูปรถเสีย : </strong>
                        <div class="form-group" align="middle">
                            <img src="../../storage/{{$item->image3}}" width="300px" height="300px">
                        </div> <br>
                        <div class="form-group">
                            <strong>รหัสยืนยันตัวตน : </strong>
                            {{ $item->gencode }}
                        </div>
                        <div class="form-group">
                            <strong>รุ่นรถ : </strong>
                            {{ $item->make }}
                        </div>
                        <div class="form-group">
                            <strong>ยี่ห้อรถยนต์ : </strong>
                            {{ $item->fname }}
                        </div>
                        <div class="form-group">
                            <strong>ปีรถยนต์ : </strong>
                            {{ $item->model }}
                        </div>
                        <div class="form-group">
                            <strong>เบอร์โทรคนขับ : </strong>
                            {{ $item->cartel }}
                        </div>
                        <div class="form-group">
                            <strong>รายละเอียดสถานที่ : </strong>
                            {{ $item->info }}
                        </div>
                        <div id="map-canvas"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
    </td>
    <td>{{ $item->created_at }}</td>
    <td>50 บ.</td>
    <td>
        @if($item->bill_status === 1)

        <p class="text-success">รายการคำร้องขอสำเร็จ</p>

        @elseif($item->bill_status === 0)
        <p class="text-danger">รายการคำร้องขอไม่สำเร็จ</p>
        @endif
    </td>

    </tr>
    @endforeach
    </tbody>
    </table>

</div>
</div>
@endsection