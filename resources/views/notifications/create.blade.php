@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        การแจ้งเตือน
    </div>

    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <div class="form-group">
                    <label >ประเภทการแจ้งเตือน</label>
                        <select class="form-control" >
                            <option>พ.ร.บ</option>
                            <option>การต่อภาษีทะเบียนรถยนต์</option>
                            <option>การต่อประกันรถยนต์</option>
                        </select>
                </div>
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
