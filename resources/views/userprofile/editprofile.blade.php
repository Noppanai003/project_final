@extends('layouts.app')
@section('content')


<div class="card card-default">
    <div class="card-header">
        ข้อมูลส่วนตัว
    </div>
    <div class="card-body">
      
        <div class="pull-left">
            <a class="btn btn-dark btn-sm" href="/profile">
                <i class="fa fa-arrow-left"></i> <span>กลับ</span>
            </a>
        </div><br><br>
        <form action="/user/update" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-sm-4">
                    @if($user->avatar == NULL)
                        <img src={{asset('img/no-image-profile.png')}} style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">
                    
                    @else
                        <img class="rounded-circle" src="storage/avatars/{{ Auth::user()->avatar}}" style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;"> 
                    @endif

                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="">อีเมล์</label>
                        <input type="text" name="email" value="{{$user->email}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">ชื่อ-นามสกุล</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                    </div>
                    @if($user->role == 'member')
                        <div class="form-group">
                            <label for="">เลขบัตรประชาชน</label>
                            <input type="text" name="id_card" value="{{$user->id_card}}" class="form-control">
                        </div>
                    
                    @endif
                    
                    <div class="form-group">
                        <input type="submit" name="" value="บันทึกข้อมูล" class="btn btn-success">
                    </div>
                </div>

            </div>

        </form>

    </div>
</div>

@endsection
