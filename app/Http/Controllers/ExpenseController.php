<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use AuthenticatesUsers;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['expenses']   = Expense::all();
        $array['expenses'] = Expense::where('user_id', auth()->user()->id)->get();
        //print_r($array);exit;

        if(auth()->user()->hasRole('Admin')) {
            return view('user.expense.index')->with($arr);
        }else {
            return view('user.expense.index')->with($array);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Expense $expense)
    {
        $expense->user_id = auth()->user()->id;
        $expense->amount  = $request->amount;
        $expense->purpose = $request->purpose;
        $expense->save();
        return redirect()->route('expense.index');
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
    public function edit(Expense $expense)
    {
        $arr['expense'] = $expense;
        return view('user.expense.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->amount  = $request->amount;
        $expense->purpose = $request->purpose;
        $expense->save();
        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::destroy($id);
        return redirect()->route('expense.index');
    }
}
