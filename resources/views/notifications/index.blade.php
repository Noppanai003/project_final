@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('notifications.create')}}" class="btn btn-success">เพิ่มประเภทการแจ้งเตือน</a>
</div>

<!-- ส่วนของการแสดง -->
<div class="card card-default">
    <div class="card-header">
        รายการแจ้งเตือน
    </div>
    <div class="card-body">

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
