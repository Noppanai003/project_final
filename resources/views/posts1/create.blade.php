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
            {{isset($post)?'แก้ไขข้อมูล':'ข้อมูลรถยนต์'}}
    </div>
    <div class="card-body">
            <form action="{{isset($post1)?route('posts1.update',$post1->id):route('posts1.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post1))
                    @method('PUT')
                @endif
                    <div class="form-group">
                        <label for="title">ยี่ห้อ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        
                        <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
                    <div class="form-group">
                        <label for="title">รุ่นรถ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="fname" value="{{isset($post)?$post->fname:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
                    <div class="form-group">
                        <label for="title">ป้ายทะเบียน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                        <input type="text" name="lname" value="{{isset($post)?$post->lname:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
                    </div>
    
                        <div class="form-group">
                            <label for="title"> <a class="text-danger">*</a></label>
                            <select class="form-control" name="category">
                                    {{-- @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                @if(isset($post))
                                                    @if($category->id == $post->category_id)
                                                        selected
                                                    @endif
                                                @endif
                                                >{{$category->name}}</option>
                                        @endforeach --}}
                                </select>
                        </div>                      
                            
                        <div class="form-group">
                            <label for="title">รูปรถ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                            <input type="file" name="image" value="" class="form-control">
                        </div>                     

                        <div class="form-group">
                                <input type="submit" name="" value="{{isset($post)?'แก้ไขข้อมูล':'เพิ่มข้อมูลรถยนต์'}}" class="btn btn-success">
                        </div>
                   
            </form>
    </div>
</div>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
      
          
          <script type="text/javascript">
                $(document).ready(function(){
                        $('#select-tags').select2();
                });
          </script>

@endsection