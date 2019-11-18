<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CallMechanic;
use App\Confirm;
use App\ManageRequests;

class ManageRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $CallMechanic = DB::table('call_mechanics')->get();

        return view('managerequests.index')
        ->with('callMechanic', CallMechanic::
        Join('posts','call_mechanics.posts_id','=','posts.id')->select('call_mechanics.*')
        ->where('posts.user_id',auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $call_id = CallMechanic::join('posts','call_mechanics.posts_id','=','posts.id')->where('posts.user_id',auth()->user()->id)->first();
        // dd($call_id);
        // error_log($call_id->id);
        // if($request->ok == '1'){
        //     $ok = $request->ok;
        //     Confirm::create([
        //         'status' => $ok,
        //         'user_id' => auth()->user()->id,
        //         'call_mechanics_id' => $call_id->id,
        //     ]);
        // }
        
        // if($request->no == '0'){
        //     $no = $request->no;
        //     Confirm::create([
        //         'status' => $no,
        //         'user_id' => auth()->user()->id,
        //         'call_mechanics_id' => $call_id->id,
        //     ]);
        // }

        // return redirect(route('CallMechanic.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('managerequests.show')
        ->with('CallMechanic', CallMechanic::all());

        // $CallMechanic = CallMechanic::find($id);
        // return view('manageRequests.show',compact('CallMechanic'));
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
    public function update(Request $request,$id)
    {
        // dd($request->all()); // debug
        // error_log($request->ok);
        // if($request->ok == '1'){
            
            // $call_id = CallMechanic::find($id);
            // $call_id->status = $request->ok;
            // $call_id->save();
            
        // }
        
        // if($request->no == '0'){
        //     $call_id = CallMechanic::find($id);
        //     $call_id->status = $request->no;
        //     $call_id->save();
        // }
        
        // $id->update([
        //     'name'=>$request->name
        // ]);
        // return redirect(route('categories.index'));
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

    public function callmechanic(Request $request,$id)
    {
        // error_log($request->ok);
         if($request->ok == '1'){
            // error_log('if');
            $call_id = CallMechanic::find($id);
            $call_id->status = $request->ok;
            $call_id->save();
        }
        
        if($request->no == '0'){
            $call_id = CallMechanic::find($id);
            $call_id->status = $request->no;
            $call_id->save();
            
        }

        return view('go.index')
        // ->with('callMechanic', CallMechanic::
        // join('posts','call_mechanics.posts_id','=','posts.id')
        // ->where('call_mechanics.user_id',auth()->user()->id)
        // ->Orderby('call_mechanics.updated_at','desc')->first())
        
        ->with('CallMechanic', CallMechanic::where('status','=',1)
        // ->join('call_mechanics','bills.call_mechanics_id','=','call_mechanics.id')
        // ->where('bill_status',NULL)
        ->Orderby('call_mechanics.updated_at','desc')->first())
        ;
    }
}
