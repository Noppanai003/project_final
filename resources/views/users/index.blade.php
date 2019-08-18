@extends('layouts.app')
@section('content')
          <div class="card card-default">
            <div class="card-header">
                  จัดการข้อมูลผู้ใช้
            </div>
            <div class="card-body">
                  @if($users->count()>0)
                  <table class="table">
                        <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                  <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if(!$user->isAdmin())
                                      <td>
                                          <form class="" action="{{route('user.makeadmin',$user->id)}}" method="post">
                                                  @csrf
                                                  <button type="submit" name="button" class="btn btn-primary btn-sm">Make Admin</button>
                                          </form>
                                      </td>
                                      {{-- @elseif($user->isRevenue_officer()) --}}
                                          {{-- <td> --}}
                                                {{-- <form class="" action="{{route('user.makeadmin',$user->id)}}" method="post">
                                                        @csrf --}}
                                                        {{-- <button type="submit" name="button" class="btn btn-primary btn-sm">Make Admin</button> --}}
                                                {{-- </form> --}}
                                            {{-- </td> --}}
                                    @endif
                                  </tr>
                            @endforeach
                        </tbody>
                  </table>
                  @else
                        <h3 class="text text-center">ไม่มีผู้ใช้งาน</h3>
                  @endif
            </div>
          </div>
@endsection
