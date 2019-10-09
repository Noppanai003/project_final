<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Post1;
use App\CallMechanic;
use App\Http\Requests\CreateCallMechanicRequest;

class CallMechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('CallMechanic.index')
        ->with('categories',Category::all())
        ->with('posts', Post::all())
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showcall()
    {
        return view('CallMechanic.show')
        ->with('categories',Category::all())
        ->with('posts', Post::all())
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // แล้วให้มันแสดงค่ารถตามไอดีที่ถูกส่งมา
        return view('CallMechanic.show')
        ->with('categories',Category::all())
        ->with('posts', Post::paginate(5))
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCallMechanicRequest $request)
    {
        $image3 = $request->image3->store('posts');
        // dd($image,$image1);
        CallMechanic::create([
            'user_id' => auth()->user()->id,
            'posts_id' => $request->checkshop,
            'post1s_id' => $request->post1,
            'gencode' => $request->gencode,
            'info' => $request->info,
            'cartel' => $request->cartel,
            'lat' => $request->lat,
            'long' => $request->long,
            'image3' => $image3,

        ]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('CallMechanic.create'));
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
    public function edit($id)
    {
        //what data do i want?

        return view('CallMechanic.create')
        ->with('categories',Category::all())
        ->with('posts', Post::paginate(5))
        ->with('posts1', Post1::find($id));
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
    public function destroy($id)
    {
        //
    }
}
