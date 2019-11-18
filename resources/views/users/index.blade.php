@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('users.create')}}" class="btn btn-success">เพิ่มข้อมูลสมาชิก</a>
</div>

<div class="card card-default">
    <div class="card-header">
        จัดการข้อมูลผู้ใช้

        <!-- ส่วนค้นหา -->
        <div class="col-md-6 float-right">
            <form action="/search3" method="get">
                <div class="input-group">
                    <input type="search" name="search3" class="form-control" placeholder="ค้นหาข้อมูล">
                    <span class="input-group-prepend">
                        <!-- <button type="submit" class="btn btn-dark" >Search</button> -->
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

    </div>
    <div class="card-body">
        @if($users->count()>0)
        <table class="table">
            <thead>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล์</th>
                <th>ประเภทผู้ใช้</th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{route('users.show',$user->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                    </td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">แก้ไข</a>
                    </td>
                    <td>
                        <form class="delete_form" action="{{route('users.destroy',$user->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
        @else
        <h3 class="text text-center">ไม่มีผู้ใช้งาน</h3>
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.delete_form').on('submit', function() {
            if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                return true;
            } else {
                return false;
            }

        });
    });
</script>

@endsection
