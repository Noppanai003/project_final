<!-- Styles -->
{{-- <link href="{{asset('css/page.css')}}" rel="stylesheet"> --}}
<link href="{{asset('css/style1.css')}}" rel="stylesheet">

<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">
      <h6 class="sidebar-title">ค้นหา</h6>
      <form class="input-group" action="{{route('welcome')}}" method="GET">
        <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
        <div class="input-group-addon">
          <button><i class="fa fa-search"></i></button>
        </div>
      </form>
      <hr>
      <h6 class="sidebar-title">ประเภทร้าน</h6>
      <div class="row link-color-default fs-14 lh-24">
        @foreach($categories as $category)
              <div class="col-6"><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
        @endforeach
      </div>
      <hr>
    
    </div>
  </div>
  {{-- <script src="{{asset('js/page.js')}}"></script> --}}
  <script src="{{asset('js/script.js')}}"></script>
  