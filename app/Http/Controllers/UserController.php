<?php

//namespace App\Http\Controllers\Admin; //admin add
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $request = new Request();
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
        $user = User::find($id);
       return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        //
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        //
        $request = new Request();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'sex' => 'required|in:0,1',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('user.index')->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success','User deleted successfully');
    }

    
}
