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
        การแจ้งเตือน
    </div>
    <div class="card-body">
        <form action="{{url('send/email')}}" method="post">
            @csrf

            <!-- @if(Session::has("success"))
            <div class="alert alert-success">
                <b>บันทึกข้อมูลสำเร็จ!</b>, ระบบจะแจ้งเตือนอีกครั้งเมื่อถึงเวลา
            </div>
            @endif -->

            <div class="form-group">
                <input type="hidden" name="subject" value="แจ้งเตือนจาก Carcare" class="form-control" autofocus>
            </div>

            <div class="form-group ">
                <label for="email"></label>

                <div>
                    <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="title"></label>
                <input type="hidden" name="message" value="{{$notification->deadline}}" class="form-control" autofocus>
            </div>

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
                <button type="submit" class="btn btn-success btn-lg btn-block">บันทึกการแจ้งเตือน</button>
            </div>

        </form>

    </div>
</div>

@endsection



