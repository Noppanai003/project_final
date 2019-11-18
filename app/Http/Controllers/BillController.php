<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Http\Requests\CreateBillRequest;
use App\Post;
use App\CallMechanic;
use App\Post1;
use App\Articlerating;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bill.place');
        // ->with('callMechanic', CallMechanic::all());
        // ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
        // ->with('callMechanic', CallMechanic::where('user_id','=',auth()->user()->id)->get());
        // ->with('bill', Bill::where('user_id','=',auth()->user()->id)->get());
        // ->with('posts', Post::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.index')
        ->with('callMechanic', CallMechanic::
        join('posts','call_mechanics.posts_id','=','posts.id')
        ->where('call_mechanics.user_id',auth()->user()->id)
        ->Orderby('call_mechanics.updated_at','desc')->first())
        
        ->with('bills', Bill::where('bills.user_id','=',auth()->user()->id)
        ->join('call_mechanics','bills.call_mechanics_id','=','call_mechanics.id')
        ->where('bill_status',NULL)
        ->Orderby('call_mechanics.updated_at','desc')->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBillRequest $request)
    {
        // error_log($request);
        if($request->demo == NULL ){
            return view('CallMechanic.show')
            ->with('posts', Post::all())
            ->with('callMechanic', CallMechanic::join('posts','call_mechanics.posts_id','=','posts.id')->where('call_mechanics.user_id',auth()->user()->id)->get());
        }

        Bill::create([
            'user_id' => auth()->user()->id,
            'call_mechanics_id' => $request->demo,
           
        ]);
        return redirect(route('bill.index'));
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

    public function bill(Request $request, $id)
    {
        // error_log($request->ok);
         if($request->ok == '1'){
            // error_log('if');
            $call_id = Bill::find($id);
            $call_id->bill_status = $request->ok;
            $call_id->save();
            return redirect(route('confirm.index'));
        }
        
        if($request->no == '0'){
            $call_id = Bill::find($id);
            $call_id->bill_status = $request->no;
            $call_id->save();
            return redirect(route('CallMechanic.index'));
        }

    }
    public function confirm(Request $request)
    {
        // $rating = $request->$id;
        Articlerating::create([
            'user_id' => auth()->user()->id,
            'posts_id' => $request->shop,
            'rating' => $request->ok,
        ]);
        return back()
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
        ->first());
        // select AVG(carcare3.articleratings.rating) AS rating FROM carcare3.posts LEFT JOIN carcare3.articleratings 
        // ON carcare3.posts.id=carcare3.articleratings.posts_id GROUP BY carcare3.posts.id

        // ->Leftjoin('articleratings', 'posts.id', '=', 'articleratings.posts_id')
        // ->raw('round(AVG(articleratings.rating) as rating)')
        // ->groupBy('posts.id')
        // // ->select('id','name',DB::raw('round(AVG(quantity),0) as quantity'))
        // //          ->groupBy('id','name')
    }
}
