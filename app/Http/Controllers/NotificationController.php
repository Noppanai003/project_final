<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Post1;
use Illuminate\Support\Facades\DB;
use App\Mail\SendEmail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;

class NotificationController extends Controller
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
        // ->with('notifications', Notification::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.alert_type');
        // ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNotificationRequest $request)
    {

        $adate = date($request->startdate);
        $result = date("Y-m-d", strtotime("+1 year, -3 days", strtotime($adate)));

        Notification::create([
            'user_id' => auth()->user()->id,
            'post1s_id' => $request->post1,
            'nonti_data' => $request->nonti_data,
            'startdate' => $request->startdate,
            'deadline' => $result,

        ]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('notifications.index'));
    }

    public function alert()
    {
        $name=Input::get('startdate','nonti_data');

        if ($name) {
            echo "sussess";

            $notification = array(
                'message' => 'Successfully Alert!!',
                'alert-type' => 'success'
            );

        } else {

        }

        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        // return view('notifications.show')
        // ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
        // ->with('posts1', Post1::find($id));

        // return view('home.show')
        // ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
        // ->with('posts1', Post1::find($id));

        return view("mail.home", array('user' => Auth::user()))
        // ->with('posts1', Post1::find($id))
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get())
        // ->with('posts1' ,Post1::all())
        ->with('notification', $notification);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        return view('notifications.create')
        ->with('notification', $notification)
        ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $request->only([
            'nonti_data',
            'startdate'
        ]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('notifications.index'));
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
        return redirect(route('notifications.index'));
    }
}
