@extends('layouts.app')
@section('content')
    
<div class="card card-default">
    @if($errors->any())
        <div class="alert alert-danger">
              <ul class="list-group">
                    @foreach($errors->all() as $error)
                          <li class="list-group-item">{{$error}}</li>
                    @endforeach
              </ul>
        </div>
    @endif
    <div class="card-header">
            {{isset($post1)?'แก้ไขข้อมูล':'ข้อมูลรถยนต์'}} 
    </div>
    <div class="card-body">
            <form action="{{isset($post1)?route('posts1.update',$post1->id):route('posts1.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post1))
                    @method('PUT')
                @endif
                    <div class="form-group">
                        <label for="title">ชื่อรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="model" value="" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
                    <div class="form-group">
                        <label for="title">ยี่ห้อรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <select class="form-control" name="make" id="make">
                             <option value="">เลือกยี่ห้อรถ</option>
                             @foreach ($list as $row)
                                <option value="{{$row->title}}">{{$row->title}}</option>
                             @endforeach
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">รุ่นรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="model" value="" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>

                    <div class="form-group">
                        <label for="title">เลือกปีรุ่นรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="model" value="" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>

                    <div class="form-group">
                        <label for="title">เลขทะเบียนรถยนต์ <a class="text-danger">(*ไม่จำเป็นต้องใช้)</a></label>
                        <input type="text" name="license" value="{{isset($post1)?$post1->license:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>                    
                            
                        <div class="form-group">
                            <label for="title">รูปรถ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="file" name="image2" value="" class="form-control">
                        </div>                     

                        <div class="form-group">
                                <input type="submit" name="" value="{{isset($post1)?'แก้ไขข้อมูล':'เพิ่มข้อมูลรถยนต์'}}" class="btn btn-success">
                        </div>
                   
            </form>
    </div>
</div>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
      
{{--           
        <script type="text/javascript">
         $(document).ready(function(){
               $('.make').change(function(){
                   if($(this).val()!=''){
                        var select = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url:"{{ route('dropdown.fetch') }}",
                            method:"POST",
                            data:{select:select,_token:_token},
                            success:function(result){
                                $('.model').html(result);
                            }
                        })
                   }
               });
            });
        </script> --}}

@endsection