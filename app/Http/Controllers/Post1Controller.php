<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePost1Request;
use App\Post1;
use App\Makecar;
use DB;

class Post1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('posts1.index')
            // ->with('posts1', Post1::paginate(5))
            ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
            ->with('makecar',Makecar::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $list = DB::table('make')->get();

        return view('posts1.create')
        ->with('makecar',Makecar::all());
            // ->with('list', $list);
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

            'make' => $request->makecar,
            'model' => $request->model,
            'fname' => $request->modelcar,
            'lname' => $request->lname,
            'image2' => $image2,
            'license' => $request->license,
            'user_id'=>auth()->user()->id,

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
        return view('posts1.index')
            ->with('posts1', Post1::paginate(5))
            ->with('makecar',Makecar::all());
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
        // $post1->delete(); //ลบข้อมูลในฐานข้อมูล
        // // $post1->deleteImage();
        // Session()->flash('success', 'ลบข้อมูลแล้ว');
        // return redirect(route('posts1.index'));

        $post1->delete();
        Session()->flash('success','ลบข้อมูลเรียบร้อยแล้ว');
        return redirect(route('posts1.index'));
    }
}
