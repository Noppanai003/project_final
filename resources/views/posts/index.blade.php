@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">เพิ่มข้อมูลอู่ซ่อม</a>
</div>
<div class="card card-default">
    <div class="card-header">
        ข้อมูลอู่ซ่อม

        <!-- ส่วนค้นหา -->
        <div class="col-md-6 float-right">
            <form action="/search2" method="get">
                <div class="input-group">
                    <input type="search" name="search2" class="form-control" placeholder="ค้นหาข้อมูล">
                    <span class="input-group-prepend">
                        <!-- <button type="submit" class="btn btn-dark" >Search</button> -->
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

    </div>
    <div class="card-body">
        @if($posts->count()>0)
        <table class="table">
            <thead>
                <th>รูปร้าน</th>
                <th>ชื่อร้าน</th>
                <th>ประเภทร้าน</th>
                <!-- <th>ชื่อเจ้าของร้าน</th> -->
                <th>ที่อยู่</th>
                <th></th>
                <th></th>

            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>

                    <td>
                        <img src="storage/{{$post->image}}" alt="" width="100" height="100">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <a href="{{route('categories.edit',$post->category->id)}}"> </a>
                    <!-- <td>{{$post->fname}} {{$post->lname}}</td> -->
                    <td>{{$post->content}} {{$post->district}} {{$post->amphur}} {{$post->city_name}} {{$post->postcode}} </td>

                    <td>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a>
                    </td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">แก้ไข</a>
                    </td>

                    <td>
                        <form class="delete_form" action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}

        @else
        <h3 class="text text-center">ไม่มีข้อมูลร้าน</h3>
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
