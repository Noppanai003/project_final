<?php

namespace App\Http\Controllers;

use App\Bill;
use App\CallMechanic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;

class DepositManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('DepositManages.index')
        ->with('bills', Bill::where('bills.user_id','>' ,0)
        ->join('call_mechanics','bills.call_mechanics_id','=','call_mechanics.id')
        ->join('posts','call_mechanics.posts_id','=','posts.id')
        ->join('post1s','call_mechanics.post1s_id','=','post1s.id')
        ->join('users','call_mechanics.user_id','=','users.id')
        // ->where('bill_status',NULL)
        // ->Orderby('call_mechanics.updated_at','desc')
        ->get());
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
         return view('DepositManages.show');

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
}
