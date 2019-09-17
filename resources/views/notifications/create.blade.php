@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        การแจ้งเตือน
    </div>

    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <!-- <label for="">ชื่อประเภทการร้าน</label>
                <input type="text" name="" value="" class="form-control" placeholder="กรุณาใส่ข้อมูล"> -->
        
            </div>

            <!-- <div class="form-group">
                <label for="">เวลา :</label>
                <input type="time" name="" value="" class="form-control">
            </div> -->

            <div class="form-group">
                <input type="submit" name="" value="บันทึกการแจ้งเตือน" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

@endsection
