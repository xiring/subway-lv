<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    public function index()
    {
    	$users = User::orderBy('created_at', 'ASC')->where('user_type', 2)->get();

    	return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {

    	$existing_email = User::where('email', $request->email)->first();

    	if($existing_email){
    		flash('Email address already registered.', 'danger')->important();
    		return redirect()->back();
    	}else{

    		$user = new User();
    		$user->name = $request->name;
    		$user->email = $request->email;
    		$user->password = bcrypt($request->password);
    		$user->user_type = 2;

    		if($user->save())
    		{
				flash('User registered.', 'success')->important();
    			return redirect()->back();    			
    		}
    	}
    }

    public function update(Request $request)
    {
    	$user = User::find($request->id);
		$user->name = $request->name;

		if($user->update())
		{
			flash('User updated.', 'success')->important();
			return redirect()->back();    			
		}
    }

    public function delete($id)
    {
    	$user = User::find($id);
    	$user->is_active = 0;

    	if($user->update())
		{
			flash('User deleted.', 'danger')->important();
			return redirect()->back();    			
		}
    }

    public function restore($id)
    {
    	$user = User::find($id);
    	$user->is_active = 1;

    	if($user->update())
		{
			flash('User restored.', 'success')->important();
			return redirect()->back();    			
		}
    }
}
