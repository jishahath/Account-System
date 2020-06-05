<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Income;
use App\User;
use DB;
use AuthenticatesUsers;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $users = User::all(); 

        if(auth()->user()->hasRole('Admin')) {
           
            return view('admin.users.index')->with('users', $users);
        }else {
            return view('user.dashboard')->with([
                'income'  => Income::where('user_id', auth()->user()->id)->get(),
                'expense' => Expense::where('user_id', auth()->user()->id)->get(),
            ]);  
        }        
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
        $user    = User::findOrFail($id); //Get user with specified id
        $expense = Expense::where('user_id', $id)->get(); 
        $income  = Income::where('user_id', $id)->get();
        // print_r($income);exit;

        return view('user.dashboard', compact('user', 'income', 'expense')); //pass user and roles data to view

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
