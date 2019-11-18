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
        {{isset($user)?'แก้ไขข้อมูลสมาชิก' :'เพิ่มข้อมูลสมาชิก'}}
    </div>
    <div class="card-body">
        <form action="{{isset($user)?route('users.update',$user->id):route('users.store')}}" method="post">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">อีเมล์</label>
                <input type="text" name="email" value="{{isset($user)?$user->email:''}}" class="form-control" placeholder="กรุณากรอกข้อมูล" {{isset($user)?'readonly' :''}} >
            </div>
            <div class="form-group">
                <label for="title">รหัสผ่าน</label>
                <input type="password" name="password" value="{{isset($user)?$user->password:''}}" class="form-control" placeholder="กรุณากรอกข้อมูล" {{isset($user)?'readonly' :''}}>
            </div>
            <div class="form-group">
                <label for="title">ชื่อ-นามสกุล</label>
                <input type="text" name="name" value="{{isset($user)?$user->name:''}}" class="form-control" placeholder="กรุณากรอกข้อมูล">
            </div>
            <div class="form-group">
                <label for="title">เบอร์โทรศัพท์</label>
                <input type="number" name="phone" value="{{isset($user)?$user->phone:''}}" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="กรุณากรอกข้อมูล">
            </div>
            <div class="form-group">
                <label for="title">เลขบัตรประชาชน</label>
                <input type="number" name="idcard" value="{{isset($user)?$user->idcard:''}}" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="กรุณากรอกข้อมูล">
            </div>
            <div class="form-group">
                <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

@endsection
