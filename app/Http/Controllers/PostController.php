<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\VerifyCategory;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use DB;
use App\Category;
use App\category_store;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('verifyCategory')->only(['create', 'store']);
    }

    public function index()
    {
        return view('posts.index')
        // ->with('posts', Post::paginate(5))
        ->with('posts', Post::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')
            ->with('categories', Category::all())
            ->with('category_s', category_store::all())
            ->with('tags', Tag::all());
    }

    public function search2(Request $request)
    {
        $search2 = $request->get('search2');
        $posts = DB::table('posts')->where('title', 'like', '%' . $search2 . '%')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function autoprovince(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('provinces')->where('name_th', 'LIKE', "{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            foreach ($data as $row) {
                $output .= '<li><a href="#">' . $row->name_th . '</a></li>';
            }

            $output .= '</ul>';

            echo $output;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // dd($request->all());
        $image = $request->image->store('post');
        $image1 = $request->image1->store('posts');
        // dd($image,$image1);
        $post = Post::create([

            'title' => $request->title,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'description' => $request->description,
            'content' => $request->content,
            'city_name' => $request->city_name,
            'amphur' => $request->amphur,
            'district' => $request->district,
            // 'postcode' => $request->postcode,
            'tel' => $request->tel,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'lat' => $request->lat,
            'long' => $request->long,
            'image' => $image,
            'image1' => $image1,
            // 'day' => $request->day,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,

            //วันที่เปิดทำการ
            'mon' => $request->mon,
            'tue' => $request->tue,
            'wed' => $request->wed,
            'thu' => $request->thu,
            'fri' => $request->fri,
            'sat' => $request->sat,
            'sun' => $request->sun,

            //ประเภทการซ่อม
            'engine' => $request->engine,
            'suspension' => $request->suspension,
            'electrical' => $request->electrical,
            'tank' => $request->tank,
            'betterlet' => $request->betterlet,

            //รายละเอียดเพิ่มเติม
            'detail_engine' => $request->detail_engine,
            'detail_suspension' => $request->detail_suspension,
            'detail_electrical' => $request->detail_electrical,
            'detail_tank' => $request->detail_tank,
            'detail_betterlet' => $request->detail_betterlet,

            //เรทราคาเริ่มต้น
            'start_price_engine' => $request->start_price_engine,
            'start_price_suspension' => $request->start_price_suspension,
            'start_price_electrical' => $request->start_price_electrical,
            'start_price_tank' => $request->start_price_tank,
            'start_price_betterlet' => $request->start_price_betterlet,

            //ราคาสิ้นสุด
            'end_price_engine' => $request->end_price_engine,
            'end_price_suspension' => $request->end_price_suspension,
            'end_price_electrical' => $request->end_price_electrical,
            'end_price_tank' => $request->end_price_tank,
            'end_price_betterlet' => $request->end_price_betterlet,

            //   'day_start' => $request->day_start,
            //     'day_end' => $request->day_end

        ]);

        // dd($request->day);
        $post = new Post;
        $post->day = $request->day;

        //  $post->day = implode(",",$request->day);

        // $post->save();

        //  $post->day = $request('day');

        // 'category_id'=>$request->category,
        // 'user_id'=>auth()->user()->id
        //   ]);
        //   if($request->tags){
        //           $post->tags()->attach($request->tags);
        //   }

        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('posts.index'));
    }

    // public static function checkbox($request_array, $day)
    //     {
    //         if(!array_key_exists($day,$request_array)){
    //             $request_array[$day]=0;
    //         }
    //         else{
    //             $request_array[$day]=1;
    //         }

    //         return $request_array;
    //     }

    // public function checkbox(Request $request)
    // {
    //     $check = implode(",",$_POST['day']);

    //     $day = $request->input('day');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)
            ->with('categories', Category::all())
            ->with('category_s', category_store::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->only(
            [
                'title',
                'fname',
                'lname',
                'description',
                'content',
                'city_name',
                'amphur',
                'district',
                'tel'
            ]
        );
        if ($request->hasFile('image')) { // มีภาพส่งมามั้ย
            $image = $request->image->store('post'); // สั่ง update
            $post->deleteImage(); // ลบรูปเดิม
            $data['image'] = $image; // กำหนดก้อน Data
        }
        if ($request->hasFile('image1')) { // มีภาพส่งมามั้ย
            $image1 = $request->image1->store('post'); // สั่ง update
            $post->deleteImage(); // ลบรูปเดิม
            $data['image1'] = $image1; // กำหนดก้อน Data
        }
        if ($request->category) {
            $data['category_id'] = $request->category;
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        $post->update($data); // ทำการ Update ข้อมูล
        Session()->flash('success', 'แก้ไขข้อมูลแล้ว');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete(); //ลบข้อมูลในฐานข้อมูล
        $post->tags()->detach($post->post_id);
        $post->deleteImage();
        Session()->flash('success', 'ลบข้อมูลแล้ว');
        return redirect(route('posts.index'));
    }
}
