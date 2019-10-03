@extends('layouts.app')
@section('content')
          <div class="d-flex justify-content-end mb-2">
                  <a href="{{route('makecar.create')}}" class="btn btn-success">Add Make car</a>
          </div>
          <div class="card card-default">
            <div class="card-header">
                  ยี่ห้อรถยนต์
            </div>
            <div class="card-body">
                  @if($makecar->count()>0)
                  <table class="table">
                        <thead>
                            <th>ชื่อยี่ห้อรถยนต์</th>
                          <th>Counts</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($makecar as $makecars)
                                  <tr>
                                    <td>{{$makecars->title}}</td>
                                    <td>{{$makecars->post1->count()}}</td>
                                   
                                    <td>
                                      <a href="{{route('makecar.edit',$makecars->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form class="delete_form" action="{{route('makecar.destroy',$makecars->id)}}" method="post">
                                              @csrf
                                              <input type="hidden" name="_method" value="DELETE">
                                              <input type="submit" name="" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                  </tr>
                            @endforeach
                        </tbody>
                  </table>
                  {{ $makecar->links() }}
                  @else
                        <h3 class="text text-center">ไม่มียี่ห้อรถยนต์</h3>
                  @endif
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
