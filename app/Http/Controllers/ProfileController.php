<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;
use App\User;
use App\Department;
use Auth;


class ProfileController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index', array('user' => Auth::user()) );

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
    public function store(Request $request, User $user)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=height',
        ]);
        if($request->image->getClientOriginalName()) {
            $ext  = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1, 99999).'.'.$ext;
            $request->image->storeAs('public/user', $file);
        }else {
            $file = '';
        }    
        $user->image         = $file;    
        $user->name          = $request->name;
        $user->department_id = $request->department_id;
        $user->email         = $request->email;
        $user->phone         = $request->phone;
        $user->city          = $request->city;
        $user->state         = $request->state;
        $user->designation   = $request->designation;
        $user->save();
        return redirect()->route('profile.index');
    }

    public function save(Request $request){
        print_r($request);
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
    public function edit(User $user)
    {
        $users = User::all();
        return view('profile.edit', array('users' => Auth::user()));
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
        $user = User::find(auth()->user()->id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->validate($request, [
            'image' => 'dimensions:ratio=1/1'
       ]);

        if($request->image->getClientOriginalName()) {
            $ext  = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1, 99999).'.'.$ext;
            $request->image->storeAs('public/user', $file);
        }else {
            $file = '';
        }    
        $user->image         = $file;    
        $user->name          = $request->name;
        $user->department_id = $request->department_id;
        $user->email         = $request->email;
        $user->phone         = $request->phone;
        $user->city          = $request->city;
        $user->state         = $request->state;
        $user->designation   = $request->designation;
        $user->save();
        return redirect()->route('profile.index');
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
