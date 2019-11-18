@extends('layouts.app')
@section('content')


<div class="card card-default">
    <div class="card-header">
        ข้อมูลส่วนตัว
    </div> <br>
    <div class="d-flex justify-content-end mb-2" >
        <a href="{{'editprofile'}}" class="btn btn-primary" ><i class="fa fa-pencil-square-o"></i> แก้ไขข้อมูล</a>
    </div>

    <div class="card-body">
        @if($user->avatar == NULL)
            <img src={{asset('img/no-image-profile.png')}} style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">
        
        @else
            {{-- <img class="rounded-circle"  src="storage/avatars/{{ Auth::user()->avatar}}" /> --}}
            <img class="rounded-circle" src="storage/avatars/{{ Auth::user()->avatar}}" style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;"> 
        @endif
        
        <!-- <h2>{{ $user->name }}</h2> -->
        <form enctype="multipart/form-data" action="/profile" method="POST">
            <!-- <label>Update Profile Image</label> -->
            <!-- <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

        </form>
        <br><br><br><br><br><br><br><br><br><br>
        <div class="container">
            <div class="form-group">
                <strong>อีเมล์ : </strong>
                {{ $user->email}}
            </div>
            <div class="form-group">
                <strong>ชื่อ-นามสกุล : </strong>
                {{ $user->name}}
            </div>
            @if($user->role == 'member')
                <div class="form-group">
                    <strong>เลขบัตรประชาชน : </strong>
                    {{ $user->id_card}}
                </div>
            @endif
            
        </div>

        <!-- <form enctype="multipart/form-data" action="/profile" method="POST">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src={{asset('img/no-image-profile.png')}} style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    </div> -->

        <!-- <input type="file" (change)="onConvertImage(inputFile)" #inputFile> -->
        <!-- <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
        <!-- </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="">อีเมล์</label>
                        <input type="text" name="email" value="{{isset($user)?$user->email:''}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ชื่อ-นามสกุล</label>
                        <input type="text" name="name" value="{{isset($user)?$user->name:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">เลขบัตรประชาชน</label>
                        <input type="text" name="id_card" value="{{isset($user)?$user->id_card:''}}" class="form-control">
                    </div>
                </div>
            </div>
        </form> -->

    </div>
</div>

@endsection
