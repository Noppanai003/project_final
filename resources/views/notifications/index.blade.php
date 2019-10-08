@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('notifications.create')}}" class="btn btn-success">เพิ่มข้อมูลการแจ้งเตือน</a>
</div>

<!-- ส่วนของการแสดง  -->
<div class="card card-default">
    <div class="card-header">
        จัดการข้อมูลการแจ้งเตือน
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
                            echo date("d-m-Y",strtotime("+1 year, -3 days" ,strtotime($adate)));
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
        <h3 class="text text-center">ไม่มีข้อมูลร้าน</h3>
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

@endsection
