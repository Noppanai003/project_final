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
                @if($post1s->count()>0)
                    <table class="table">
                        <thead>
                            <th>รูปรถยนต์</th>
                            <th>ยี่ห้อ</th>
                            <th>รุ่นรถ</th>
                            <th>ป้ายทะเบียน</th>
                            <th></th>
                            <th></th>
                            
                        </thead>
                        <tbody>
                          @foreach($post1s as $post1)
                              <tr>
  
                                  <td>
                                      <img src="storage/{{$post1s->image}}" alt="" width="70" height="60">
                                  </td>
                                  <td>{{$post1s->title}}</td>
                                  <td>{{$post1s->name}}</td>                                 
                                  <td>{{$post1s->license}}</td>
                                  
                                  <td>
                                        <a href="{{route('posts1.edit',$post1s->id)}}" class="btn btn-info btn-sm">แก้ไข</a>
                                  </td>
  
                                  <td>
                                      <form class="delete_form" action="{{route('posts1.destroy',$post1s->id)}}" method="post">
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
