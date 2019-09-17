@extends('layouts.app')
@section('content')
          <div class="d-flex justify-content-end mb-2">
                  <a href="{{route('posts1.create')}}" class="btn btn-success">เพิ่มข้อมูลรถยนต์</a>
          </div>
          <div class="card card-default">
            <div class="card-header">
                  ข้อมูลรถยนต์
            </div>
            <div class="card-body">
                {{-- @if($post1->count()>0) --}}
                    <table class="table">
                        <thead>
                            <th>รูปรถยนต์</th>
                            <th>ค่ายผู้ผลิต</th>
                            <th>รุ่นรถ</th>
                            <th>เลขทะเบียนรถยนต์</th>
                            <th></th>
                            <th></th>
                            
                        </thead>
                        <tbody>
                          @foreach($posts1 as $post1)
                              <tr>
  
                                  <td>
                                      <img src="storage/{{$post1->image2}}" alt="" width="70" height="60">
                                  </td>

                                  <td>{{$post1->make}}</td>

                                  <td>{{$post1->model}}</td>  

                                  <td>{{$post1->license}}</td>
                                  
                                  <td>
                                        <a href="{{route('posts1.edit',$post1->id)}}" class="btn btn-info btn-sm">แก้ไข</a>
                                  </td>
  
                                  <td>
                                      <form class="delete_form" action="{{route('posts1.destroy',$post1->id)}}" method="post">
                                              @csrf
                                              <input type="hidden" name="_method" value="DELETE">
                                              <input type="submit" name="" value="ลบ" class="btn btn-danger btn-sm">
                                      </form>
                                  </td>
  
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{-- @else
                      <h3 class="text text-center">ไม่มีข้อมูลร้าน</h3>
                @endif --}}
            </div>
          </div>

          <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
          <script type="text/javascript">
                  $(document).ready(function(){
                        $('.delete_form').on('submit',function(){
                              if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
                                    return true;
                              }else{
                                    return false;
                              }

                        });
                  });
          </script>

@endsection