<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePost1Request;
use App\Post1;
use DB;

class Post1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function fetch(Request $request)
    // {
    //     $id=$request->get('select');
    //     $result=array();
    //     $query=DB::table('make')
    //     ->join('model','make.id','=','model.make_id')
    //     ->select('model.title')
    //     ->where('make.id',$id)
    //     ->groupBy('model.title')
    //     ->get();

    //     $output='<option value="">เลือกรุ่นรถ</option>';
    //     foreach ($query as $row) {
    //         $output.='<option value= "'.$row->title.'" >'.$row->title.'</option>';
    //     }
    //     echo $output;
    // }

    public function index()
    {

        return view('posts1.index')
            ->with('posts1', Post1::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = DB::table('make')->get();

        return view('posts1.create')
            ->with('list', $list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePost1Request $request)
    {
        $image2 = $request->image2->store('post');
        $post1 = Post1::create([

            'make' => $request->make,
            'model' => $request->model,
            'image2' => $image2,
            'license' => $request->license,
            // 'user_id'=>auth()->user()->id,

        ]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('posts1.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post1 $posts1)
    {
        return view('posts1.create')->with('posts1', $posts1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post1 $post1)
    {
        $post1->delete(); //ลบข้อมูลในฐานข้อมูล
        $post1->deleteImage();
        Session()->flash('success', 'ลบข้อมูลแล้ว');
        return redirect(route('posts1.index'));
    }
}
