<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Notification;
use App\Post1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    public function home(Notification $notification)
    {
        return view("mail.home", array('user' => Auth::user()))
        ->with('posts1' ,Post1::all())
        ->with('notification', $notification);
        // ->with('posts1', Post1::where('user_id','=',auth()->user()->id)->get());

    }

    public function sendemail(Request $request)
    {
        $this->validate($request, [
            "subject" => "required",
            "nonti_data" => "required",
            "email" => "required",
            "message" => "required",

        ]);
        $subject = $request->subject;
        $nonti_data = $request->nonti_data;
        $email = $request->email;
        $message = $request->message;

        Mail::to($email)->send(new SendEmail($subject, $message, $nonti_data));

        // $when = Carbon::now()->addMinutes(5);
        // $mailJob = (new SendEmail($subject, $message, $nonti_data))->onQueue('mail');
        // Mail::to($email)->later($when, $mailJob);

        $adate = date($request->startdate);
        $result = date("Y-m-d", strtotime("+1 year, -3 days", strtotime($adate)));

        Notification::create([
            'user_id' => auth()->user()->id,
            'startdate' => $request->startdate,
            'nonti_data' => $request->nonti_data,
            'deadline' => $result,
        ]);

        // $when = Carbon::now()->addMinutes(2);
        // User::find(1)->notify((new TaskCompleted)->delay($when));

        // Session::flash("success");
        Session()->flash('success', 'บันทึกข้อมูลสำเร็จ! ระบบจะแจ้งเตือนอีกครั้งเมื่อถึงเวลา');
        return back();
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
