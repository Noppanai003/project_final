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
                        {{isset($makecar)?"Edit makecar":"Create makecar"}}
                  </div>
                  <div class="card-body">
                        <form action="{{isset($makecar)?route('makecar.update',$makecar->id):route('makecar.store')}}" method="post">
                            @csrf
                            @if(isset($makecar))
                                  @method('put')
                            @endif
                            <div class="form-group">
                                  <label for="">ยี่ห้อรถยนต์</label>
                                  <input type="text" name="title" value="{{isset($makecar)?$makecar->title:''}}" class="form-control">
                            </div>
                            <div class="form-group">
                                  <input type="submit" name="" value="{{isset($makecar)?'Update makecar':'Add makecar'}}" class="btn btn-success">
                            </div>
                        </form>
                  </div>
          </div>
@endsection
