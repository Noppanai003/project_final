@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        รายละเอียด
    </div>

    <div class="card-body">
        <div class="pull-left">
        <a class="btn btn-dark btn-sm" href="{{ route('users.index') }}">
            <i class="fa fa-arrow-left"></i> <span>กลับ</span>
        </a>
        </div>
<br><br>
        <form action="" method="post" >
            <div class="row">
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
                        <strong>ประเภทผู้ใช้ : </strong>
                        {{ $user->role}}
                    </div>
                    <div class="form-group">
                        <strong>เบอร์โทรศัพท์ : </strong>
                        {{ $user->phone}}
                    </div>
                    <div class="form-group">
                        <strong>เลขบัตรประชาชน : </strong>
                        -{{ $user->idcard}}
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>

@endsection
