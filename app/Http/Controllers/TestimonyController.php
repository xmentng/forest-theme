<?php

//namespace App\Http\Controllers\Admin; //admin add
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Testimony;
use App\Role;
use DB;
use Hash;

class TestimonyController extends Controller
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
        $testimonies = testimony::orderBy('id','DESC')->paginate(5);
        return view('testimonies.index',compact('testimonies'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonies.create');
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
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
        ]);

        Testimony::create($request->all());

        return redirect()->route('testimonies.index')->with('success','Testimony created successfully');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimony = Testimony::find($id);
        return view('testimonies.show',compact('testimony'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimony = Testimony::find($id);
        return view('testimonies.edit',compact('testimony'));
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
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
        ]);


        Testimony::find($id)->update($request->all());

        return redirect()->route('testimonies.index')->with('success','Testimony updated successfully');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimony::find($id)->delete();
        return redirect()->route('testimonies.index')->with('success','Testimony deleted successfully');
    }
}
