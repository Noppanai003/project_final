@extends('layouts.app')
@section('content')

<!-- {{-- ส่วนของการแสดง --}} -->

<div class="card card-default">
    <div class="card-header">
        โปรโมชัน

        <!-- ส่วนค้นหา -->
        <div class="col-md-6 float-right">
            <form action="/search4" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="ค้นหาข้อมูล">
                    <span class="input-group-prepend">
                        <!-- <button type="submit" class="btn btn-dark" >Search</button> -->
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>

    </div>
    <div class="card-body">
        @if($promotions->count()>0)
        <table class="table">
            <thead>
                <th>รูปโปรโมชัน</th>
                <th>หัวข้อ</th>
                <th>ส่วนลด%</th>
                <th>วันที่เริ่มต้น</th>
                <th>วันที่สิ้นสุด</th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($promotions as $promotion)
                <tr>
                    <td>
                        <img src="storage/{{$promotion->pro_image}}" alt="" width="120px" height="120px">
                    </td>
                    <td>{{$promotion->pro_name}}</td>
                    <td>{{$promotion->pro_cost}} %</td>
                    <td>{{$promotion->pro_start_date}}</td>
                    <td>{{$promotion->pro_due_date}}</td>
                    <td>
                        <!-- <a href="{{route('promotions.show',$promotion->id)}}" class="btn btn-warning btn-sm">รายละเอียด</a> -->

                        <!-- start modal -->

                        <button href="{{route('promotions.show',$promotion->id)}}" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                            รายละเอียด
                        </button>

                        <!-- Modal -->
                        <div href="{{route('promotions.show',$promotion->id)}}" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด โปรโมชัน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="container">
                                                    <strong> รูปโปรโมชัน : </strong>
                                                    <div class="form-group" align="middle">
                                                        <img src="../storage/{{$promotion->pro_image}}" width="250px" height="250px">
                                                    </div> <br>
                                                    <div class="form-group">
                                                        <strong>หัวข้อ : </strong>
                                                        {{ $promotion->pro_name}}
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>รายละเอียดร้าน : </strong>
                                                        {!!$promotion->pro_detail!!}
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>ส่วนลด : </strong>
                                                        {{ $promotion->pro_cost}}%
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>วันที่เริ่มต้น : </strong>
                                                        {{ $promotion->pro_start_date}}
                                                    </div>
                                                    <div class="form-group">
                                                        <strong>วันที่สิ้นสุด : </strong>
                                                        {{ $promotion->pro_due_date}}
                                                    </div>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end modal -->

                    </td>

                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th colspan="7">
                        จำนวนสมาชิกทั้งหมด {{ $total=$promotions->count() }}  คน
                    </th>
                </tr>
            </tfoot> -->
        </table>

        @else
        <h3 class="text text-center">ไม่มีข้อมูลโปรโมชัน</h3>
        @endif
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
</script> -->

@endsection
