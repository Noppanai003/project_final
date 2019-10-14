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
        {{isset($post)?'แก้ไขข้อมูล':'ข้อมูลร้าน'}}
    </div>
    <div class="card-body">
        <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">ชื่อสถานประกอบการ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="title" value="{{isset($post)?$post->title:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
            </div>
            <div class="form-group">
                <label for="title">ชื่อ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="fname" value="{{isset($post)?$post->fname:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
            </div>
            <div class="form-group">
                <label for="title">นามสกุล <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="lname" value="{{isset($post)?$post->lname:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
            </div>
            <div class="form-group">
                <label for="title">รายละเอียดร้าน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input id="x" type="hidden" name="description" value="{{isset($post)?$post->description:''}}">
                <trix-editor input="x" placeholder="กรุณาใส่ข้อมูล"></trix-editor>
            </div>

            <label for="title">ประเภทการบริการ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
            <div class="row">
                <div class="col-sm-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="engine" value="เครื่องยนต์"> เครื่องยนต์
                            <textarea cols="25" name="detail_engine" class="form-control" placeholder="รายละเอียดเพิ่มเติม">{{isset($post)?$post->detail_engine:''}}</textarea>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="suspension" value="ช่วงล่าง"> ช่วงล่าง
                            <textarea cols="25" name="detail_suspension" class="form-control" placeholder="รายละเอียดเพิ่มเติม">{{isset($post)?$post->detail_suspension:''}}</textarea>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="electrical" value="ระบบไฟฟ้า"> ระบบไฟฟ้า
                            <textarea cols="25" name="detail_electrical" class="form-control" placeholder="รายละเอียดเพิ่มเติม">{{isset($post)?$post->detail_electrical:''}}</textarea>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="tank" value="ตัวถัง"> ตัวถัง
                            <textarea cols="25" name="detail_tank" class="form-control" placeholder="รายละเอียดเพิ่มเติม">{{isset($post)?$post->detail_tank:''}}</textarea>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="betterlet" value="เบ็ตเตล็ด"> เบ็ตเตล็ด
                            <textarea cols="25" name="detail_betterlet" class="form-control" placeholder="รายละเอียดเพิ่มเติม">{{isset($post)?$post->detail_betterlet:''}}</textarea>
                        </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="title">ช่วงเรทราคาเริ่มต้น :</label>
                        <input type="number" name="start_price_engine" value="{{isset($post)?$post->start_price_engine:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">ช่วงเรทราคาเริ่มต้น :</label>
                        <input type="number" name="start_price_suspension" value="{{isset($post)?$post->start_price_suspension:''}}" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title">ช่วงเรทราคาเริ่มต้น :</label>
                        <input type="number" name="start_price_electrical" value="{{isset($post)?$post->start_price_electrical:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">ช่วงเรทราคาเริ่มต้น :</label>
                        <input type="number" name="start_price_tank" value="{{isset($post)?$post->start_price_tank:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">ช่วงเรทราคาเริ่มต้น :</label>
                        <input type="number" name="start_price_betterlet" value="{{isset($post)?$post->start_price_betterlet:''}}" class="form-control">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="title">ถึงราคา : </label>
                        <input type="number" name="end_price_engine" value="{{isset($post)?$post->end_price_engine:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">ถึงราคา :</label>
                        <input type="number" name="end_price_suspension" value="{{isset($post)?$post->end_price_suspension:''}}" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for="title">ถึงราคา :</label>
                        <input type="number" name="end_price_electrical" value="{{isset($post)?$post->end_price_electrical:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">ถึงราคา :</label>
                        <input type="number" name="end_price_tank" value="{{isset($post)?$post->end_price_tank:''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">ถึงราคา :</label>
                        <input type="number" name="end_price_betterlet" value="{{isset($post)?$post->end_price_betterlet:''}}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="title">บ้านเลขที่อยู่ปัจจุบัน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <textarea name="content" rows="4" cols="4" class="form-control" placeholder="กรุณาใส่ข้อมูล">{{isset($post)?$post->content:''}}</textarea>
            </div>

            <div class="form-group">
                <label for="title">จังหวัด <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="city_name" value="{{isset($post)?$post->city_name:''}}" id="city_name" class="form-control" placeholder="กรุณาใส่ข้อมูล" />
                <div id="cityList">
                </div>
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">อำเภอ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="amphur" value="{{isset($post)?$post->amphur:''}}" id="city_name1" class="form-control" placeholder="กรุณาใส่ข้อมูล" />
                <div id="cityList">
                </div>
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">ตำบล <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="district" value="{{isset($post)?$post->district:''}}" id="city_name2" class="form-control" placeholder="กรุณาใส่ข้อมูล" />
                <div id="cityList">
                </div>
            </div>
            {{ csrf_field() }}

            {{-- <div class="form-group">
                <label for="title">รหัสไปรษณีย์ <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="postcode" value="{{isset($post)?$post->postcode:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
            </div> --}}

            <div class="form-group">
                <label for="title">เบอร์โทรร้าน <a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="text" name="tel" value="{{isset($post)?$post->tel:''}}" class="form-control" placeholder="กรุณาใส่ข้อมูล">
            </div>

            <div class="form-group">
                <label for="title">ประเภทการสถานประกอบการ <a class="text-danger">*</a></label>
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        @if(isset($post))
                        @if($category->id == $post->category_id)
                            selected
                        @endif
                        @endif
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">รูปศูนย์บริการ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="file" name="image" value="" class="form-control">
            </div>

            <div class="form-group">
                <label for="title">รูปใบประกอบกิจการศูนย์บริการ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label>
                <input type="file" name="image1" value="" class="form-control">
            </div>

            <!-- {{-- Map เริ่มตรงนี้ --}} -->
            <div class="form-group">
                <label form="">ตำแหน่งที่อยู่ร้านของคุณ<a class="text-danger">(* ข้อมูลที่จำเป็นต้องกรอก)</a></label><br>
                <label form=""><b>ค้นหาตำแหน่งที่อยู่ร้าน</b></label><br>
                <input type="text" id="searchmap" placeholder=" กรุณาใส่ข้อมูล">
                <div></div><br>

                <div id="map-canvas" class="form-group" align="middle"></div><br>

                <div class="form-group">
                    <label form="">ละติจูด</label>
                    <input type="text" value="{{isset($post)?$post->lat:''}}" class="form-control input-sm" name="lat" id="lat">
                </div>

                <div class="form-group">
                    <label form="">ลองติจูด</label>
                    <input type="text" value="{{isset($post)?$post->long:''}}" class="form-control input-sm" name="long" id="lng">
                </div>
                <!-- {{-- Map สิ้นสุดตรงนี้ --}} -->

                <!-- checkbox -->
                <label>วันที่เปิดทำการ :</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="mon" value="เปิดทำการ"> จันทร์
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tue" value="เปิดทำการ"> อังคาร
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="wed" value="เปิดทำการ"> พุธ
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="thu" value="เปิดทำการ"> พฤหัสบดี
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="fri" value="เปิดทำการ"> ศุกร์
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="sat" value="เปิดทำการ"> เสาร์
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="sun" value="เปิดทำการ"> อาทิตย์
                    </label>
                </div>

                <!-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">วันที่เปิดทำการ :</label>
                                        <input type="text" name="day_start" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">วันหยุด :</label>
                                        <input type="text" name="day_end" class="form-control">
                                    </div>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">เวลาเปิดทำการ :</label>
                            <input type="text" name="time_start" value="{{isset($post)?$post->time_start:''}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">สิ้นสุดเวลาทำการ :</label>
                            <input type="text" name="time_end" value="{{isset($post)?$post->time_end:''}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" name="" value="{{isset($post)?'แก้ไขข้อมูล':'เพิ่มข้อมูลอู่ซ่อม'}}" class="btn btn-success">
                </div>

        </form>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js" charset="utf-8"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">

<script type="text/javascript">
    $(document).ready(function() {
        $('#select-tags').select2();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#city_name').keyup(function() {
            var query = $(this).val();

            if (query != '') {
                var _token = $('input[name="_token"]').val();
            }

            $.ajax({
                url: "{{ route('autocomplete.show') }}",
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#cityList').fadeIn();
                    $('#cityList').html(data);
                }
            })
        });
    });
    $(document).on('click', 'li', function() {
        $('#cityList').fadeOut();
        $('#city_name').val($(this).text());

    });
</script>

<script>
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {

            lat: 19.0284952,
            lng: 99.8941534
        },
        zoom: 15
    });
    var marker = new google.maps.Marker({
        position: {

            lat: 19.0284952,
            lng: 99.8941534
        },
        map: map,
        draggable: true
    });
    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location);
        }
        map.fitBounds(bounds);
        map.setZoom(1);
    });
    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        $('#lat').val(lat);
        $('#lng').val(lng);
    });
</script>

@endsection
