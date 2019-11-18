@extends('layouts.app')
@section('content')


<div class="card card-default">
    <div class="card-header">
    {{isset($user)?'แก้ไขข้อมูลส่วนตัว':'ข้อมูลส่วนตัว'}}
        <!-- ข้อมูลส่วนตัว -->
    </div>
    <div class="card-body">
        <!-- <img src={{asset('img/no-image-profile.png')}} style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <h2>{{ $user->name }}</h2>
        <form enctype="multipart/form-data" action="/profile" method="POST">
            <!-- <label>Update Profile Image</label> -->
        <!-- <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

        <!-- </form>
        <br><br><br><br>
        <div class="container">
            <div class="form-group">
                <strong>อีเมล์ : </strong>
                {{ $user->email}}
            </div>
            <div class="form-group">
                <strong>ชื่อ-นามสกุล : </strong>
                {{ $user->name}}
            </div>
            <div class="form-group">
                <strong>เลขบัตรประชาชน : </strong>
                {{ $user->id_card}}
            </div>
        </div>  -->
        <div class="pull-left">
            <a class="btn btn-dark btn-sm" href="/profile">
                <i class="fa fa-arrow-left"></i> <span>กลับ</span>
            </a>
        </div><br><br>
        <form action="{{isset($profile)?route('profile.update',$user->id):route('profile.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($user))
            @method('PUT')
            @endif
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src={{asset('img/no-image-profile.png')}} style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">
                    </div>
                    <!-- <input type="file" (change)="onConvertImage(inputFile)" #inputFile> -->
                    <!-- <input type="file" name="photo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                    <div class="form-group">
                        <input type="file" name="photo" value="" class="form-control">
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="">อีเมล์</label>
                        <input type="text" name="email" value="{{isset($user)?$user->email:''}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ชื่อ-นามสกุล</label>
                        <input type="text" name="name" value="{{isset($user)?$user->name:''}}" class="form-control">
                    </div>
                    @if($user->role == 'member'){
                    <div class="form-group">
                        <label for="">เลขบัตรประชาชน</label>
                        <input type="text" name="idcard" value="{{isset($user)?$user->idcard:''}}" class="form-control">
                    </div>
                    }
                    @endif
                    <div class="form-group">
                        <label for="">เบอร์โทรศัพท์</label>
                        <input type="text" name="phone" value="{{isset($user)?$user->phone:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" value="บันทึกข้อมูล" class="btn btn-success">
                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection
