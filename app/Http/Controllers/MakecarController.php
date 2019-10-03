<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMakecarRequest;
use App\Http\Requests\UpdateMakecarRequest;
use App\Makecar;
use Illuminate\Http\Request;

class MakecarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('makecar.index')->with('makecar', Makecar::paginate(10));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makecar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMakecarRequest $request)
    {
        Makecar::create(['title'=>$request->title]);
        Session()->flash('success','บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('makecar.index'));
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
    public function edit(Makecar $makecar)
    {
        return view('makecar.create')->with('makecar',$makecar );
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMakecarRequest $request, Makecar $makecar)
    {
        $makecar->update([
            'title'=>$request->title
        ]);
        Session()->flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว');
        return redirect(route('makecar.index'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makecar $makecar)
    {
        $makecar->delete();
        Session()->flash('success','ลบข้อมูลเรียบร้อยแล้ว');
        return redirect(route('makecar.index'));
    }
}
