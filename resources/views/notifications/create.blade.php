@extends('layouts.app')
@section('content')

<div class="card card-default">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
            <li class="list-group-item">{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-header">
        {{isset($notification)?'แก้ไขข้อมูลการแจ้งเตือน':'เพิ่มข้อมูลการแจ้งเตือน'}}
    </div>

    <div class="card-body">
        <form action="{{isset($notification)?route('notifications.update',$notification->id):route('notifications.store')}}" method="post">
            @csrf
            @if(isset($notification))
            @method('PUT')
            @endif

                <div class="form-group">
                    <label>เลือกประเภทการแจ้งเตือน</label>
                    <select class="form-control" name="nonti_data" value="{{isset($notification)?$notification->nonti_data:''}}">
                        <option>พ.ร.บ</option>
                        <option>การต่อภาษีทะเบียนรถยนต์</option>
                        <option>การต่อประกันรถยนต์</option>
                    </select>
                </div>

            <div class="form-group">
                <label for="title">วันที่ทำการต่อทะเบียน</label>
                <input type="date" name="startdate" value="{{isset($notification)?$notification->startdate:''}}" class="form-control">
            </div>


            <div class="form-group">
                <input type="submit" name="" value="บันทึกการแจ้งเตือน" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

@endsection
