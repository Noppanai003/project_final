<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('users.index')->with('users', User::paginate(5));
    }

    public function makeadmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        Session()->flash('success', 'เปลี่ยนแปลงสถานะเรียบร้อยแล้ว');
        return redirect(route('users.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    public function profile()
    {
        return view('userprofile.profile', array('user' => Auth::user()));
    }

    public function editprofile()
    {
        return view('userprofile.editprofile', array('user' => Auth::user()));
    }

    public function search3(Request $request)
    {
        $search3 = $request->get('search3');
        $users = DB::table('users')->where('name', 'like', '%'.$search3.'%')->paginate(5);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'id_card' => $request->id_card
        ]);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.create')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data=$request->only([
            'name',
            'email',
            'password',
            'id_card'
        ]);
        $user->update($data);
        Session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete(); //ลบข้อมูลในฐานข้อมูล

        Session()->flash('success', 'ลบข้อมูลเรียบร้อยแล้ว!');
        return redirect(route('users.index'));
    }
}
