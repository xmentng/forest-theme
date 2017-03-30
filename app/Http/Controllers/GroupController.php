<?php

//namespace App\Http\Controllers\Admin; //admin add
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Group;
use App\Role;
use DB;
use Hash;


class GroupController extends Controller
{
    function __construct()
    {
        $this->middleware('role:superuser')->only('create');
        $this->middleware('role:superuser')->only('delete');
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = new Request();
        //$user = Auth::user();
        $groups = group::orderBy('id','DESC')->paginate(5);
        //$groups = $user->groups;
        return view('groups.index',compact('groups'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
            'name' => 'required',
            'user_id' => 'required',
            'church_id' => 'required',
        ]);

        $user = Auth::user();
        $group = $user->groups()->create($request->all());

        //group::create($request->all());

        return redirect()->route('groups.index')->with('success','Cell created successfully');
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = group::find($id);
        return view('groups.show',compact('group'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = group::find($id);
        return view('groups.edit',compact('group'));
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
            'name' => 'required',
            'user_id' => 'required',
            'church_id' => 'required',
        ]);


        group::find($id)->update($request->all());

        return redirect()->route('groups.index')->with('success','group updated successfully');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        group::find($id)->delete();
        return redirect()->route('groups.index')->with('success','Cell deleted successfully');
    }


}
