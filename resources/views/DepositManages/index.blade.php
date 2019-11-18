@extends('layouts.app')
@section('content')
<!-- ส่วนของการแสดง  -->
<div class="card card-default">
    <div class="card-header">
        จัดการรายการชำระเงิน
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
                <th>รายการ</th>
                <th>รหัสผู้ใช้</th>
                <th>รหัสศูนย์บริการ</th>
                <th>วันที่ทำรายการ</th>
                <th>รายการร้องขอ</th>
                <th>ยอดเงินชำระ</th>
                <th>สถานะการทำงาน</th>

            </thead>
            <tbody>
                @foreach($Bill as $Bill)
                <!-- ?php

                        // $find = Post::find();
                        // $find1 = Category::find();
                ?> -->
                <tr>
                    <td>{{ $Bill->id}}</td>
                    <!-- <td>{{ $Bill->user_id}}</td> -->
                    <td>
                        <!-- start modal -->

                        <button href="" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                            รายละเอียด
                        </button>

                        <!-- Modal -->
                        <div href="" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">รหัสผู้ใช้</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $Bill->user_id}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end modal -->
                    </td>
                    <td>{{ $Bill->posts_id}}</td>

                    <td>{{ $Bill->created_at }}</td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">รายละเอียด</a>
                    </td>
                    <td>50 บ.</td>
                    <td>สำเร็จ</td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
