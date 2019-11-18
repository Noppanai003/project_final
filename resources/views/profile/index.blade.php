@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        ข้อมูลส่วนตัว
    </div> <br>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('profile.create',$user->id)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> แก้ไขข้อมูล</a>
    </div>

    <div class="card-body">
        @if($user->avatar == NULL)
            <img src={{asset('img/no-image-profile.png')}} style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">

        @else
            {{-- <img class="rounded-circle"  src="storage/avatars/{{ Auth::user()->avatar}}" /> --}}
            <img class="rounded-circle" src="storage/avatars/{{ Auth::user()->avatar}}" style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">
        @endif

        <form enctype="multipart/form-data" action="/profile" method="POST">

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

    </div>
</div>

@endsection
