@extends('layouts.app')
@section('content')
<!-- ส่วนของการแสดง  -->
<div class="card card-default">
    <div class="card-header">
        จัดการคำขอบริการ
    </div>

    <div class="card-body">
        @if($CallMechanic->count()>0)
        <table class="table">
            <thead>
                <th>รายการ</th>
                <th>รูปภาพรถยนต์</th>
                <th>ข้อมูลเพิ่มเติม</th>
                <th>เบอร์โทรศัพท์</th>
                <th></th>
                <th>ตอบรับ/ปฎิเสธ</th>
            </thead>
            <tbody>
                @foreach($CallMechanic as $CallMechanic)
                <tr>
                    <td>{{$CallMechanic->id}}</td>
                    <td>
                        <img src="storage/{{$CallMechanic->image3}}" alt="" width="120px" height="120px">
                    </td>
                    <td>{{$CallMechanic->info}}</td>
                    <td>{{$CallMechanic->cartel}}</td>
                    <td>
                        <a href="{{route('managerequests.show',$CallMechanic->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


        @else
        <h3 class="text text-center">ไม่มีข้อมูลร้าน</h3>
        @endif
    </div>

</div>
@endsection
