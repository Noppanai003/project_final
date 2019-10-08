@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        รายละเอียด
    </div>

    <div class="card-body">
        <div class="pull-left">
            <a class="btn btn-dark btn-sm" href="{{ route('managerequests.index') }}">
                <i class="fa fa-arrow-left"></i> <span>กลับ</span>
            </a>
        </div>


    </div>

</div>

@endsection
