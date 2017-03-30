<?php

//namespace App\Http\Controllers\Admin; //admin add
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    //
     //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = new Request();
        $transactions = Transaction::orderBy('id','DESC')->paginate(5);
        return view('transactions.index',compact('transactions'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
            'church_id' => 'required',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success','Transaction created successfully');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.show',compact('transaction'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('transactions.edit',compact('transaction'));
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
        $this->validate($request, [
            'type' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
            'church_id' => 'required',
        ]);


        Transaction::find($id)->update($request->all());

        return redirect()->route('transactions.index')->with('success','transaction updated successfully');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return redirect()->route('transactions.index')->with('success','transaction deleted successfully');
    }
}
