<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Faker\Provider\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index')
        // , array('user' => Auth::user()));
        ->with('users', User::where('user_id','=',auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('profile.create', array('user' => Auth::user()));

        // if($request->hasFile('photo')){
        //     $photo = $request->file('photo');
        //     $filename = time() . '.' . $photo->getClientOriginalExtension();

        //     Image::make($photo)->resize(300,300)->save( public_path('/img/no-image-profile/' . $filename ));

        //     $user = Auth::user();
        //     $user->photo = $filename;
        //     $user->save();

        //     Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        //     return redirect(route('profile.index'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $photo=$request->photo->store('photo');
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'idcard' => $request->idcard,
        //     'phone' => $request->phone,
        //     'photo'=> $photo,
        // ]);
        // return redirect(route('profile.index'));
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
    public function update(Request $request, User $user)
    {
        // $data = $request->only([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        //     'idcard' => $request->idcard,
        //     'phone' => $request->phone,
        // ]);
        // if($request->hasFile('photo')){
        //     $photo=$request->photo->store('photo');
        //     $user->deleteImage();
        //     $data['photo']=$photo;
        // }
        // $user->update($data);
        // return redirect(route('profile.index'));

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();

            Image::make($photo)->resize(300,300)->save( public_path('/img/no-image-profile/' . $filename ));

            $user = Auth::user();
            $user->photo = $filename;
            $user->save();
        }
        return view('profile.index', array('user' => Auth::user()));

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
