<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post1;
use App\Notification;
use App\notifi_detail;

class NotifDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notifications.notifi_detail')
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
        // ->with('posts1' ,Post1::all())
        ->with('notifications' ,Notification::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.create')
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('notifications.detail')
        // ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
        // ->with('notifications' ,Notification::all())
        ->with('notifications', Notification::where('user_id','=',auth()->user()->id)->get())
        ->with('posts1', Post1::find($id));

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
    public function destroy(Notification $notification)
    {
        $notification->delete(); //ลบข้อมูลในฐานข้อมูล
        Session()->flash('success', 'ลบข้อมูลเรียบร้อยแล้ว!');
        return redirect(route('notifications.detail'));
    }
}
