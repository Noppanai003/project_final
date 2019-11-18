<?php

namespace App\Http\Controllers;
use App\Bill;
use Illuminate\Http\Request;
use App\CallMechanic;
use App\Articlerating;
use Illuminate\Support\Facades\DB;
class ConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bill.create')
        ->with('callMechanic', CallMechanic::
        join('posts','call_mechanics.posts_id','=','posts.id')
        ->where('call_mechanics.user_id',auth()->user()->id)
        ->Orderby('call_mechanics.updated_at','desc')->first())

        ->with('bills', Bill::where('bills.user_id','=',auth()->user()->id)
        ->join('call_mechanics','bills.call_mechanics_id','=','call_mechanics.id')
        ->where('bill_status',NULL)
        ->Orderby('call_mechanics.updated_at','desc')->first())
        
        ->with('ratings', Articlerating::
        select(array(DB::raw('round(avg(articleratings.rating),1) AS average')))
        ->Leftjoin('posts', 'articleratings.posts_id', '=', 'posts.id')
        ->groupBy('posts.id')
        ->where('articleratings.user_id','=',auth()->user()->id)
        ->Orderby('articleratings.updated_at','desc')
        ->first())
        ;
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
