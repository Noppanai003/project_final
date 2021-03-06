<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Articlerating;

class ArticleratingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ratings.index');
        // ->with('categories',Category::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $postt= $post->id;
        // $rating=$_GET['rating'];
        $rating = $request->rating;
        Articlerating::create([
            'user_id' => auth()->user()->id,
            'posts_id' => $request->postshop,
            'rating' => $request->$rating,
        ]);  
        // dd($request);    
        // Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('CallMechanic.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ratings.show')
        ->with('posts', Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function ratings(Request $request , $id)
    {
        error_log($id);
    }

    // public function rating(Request $request, $id, $rating)
    // {
    //     // $rating = $request->rating;
    //     error_log($id);
    //     // Articlerating::create([
    //     //     'user_id' => auth()->user()->id,
    //     //     'posts_id' => $request->$id,
    //     //     'rating' => $request->$rating,
    //     // ]);  

    //     // $call_id = Articlerating::find($id);
    //     // $call_id->bill_status = $request->ok;
    //     // $call_id->save();
    //     // return redirect(route('confirm.index'));
    // }
}
