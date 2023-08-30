<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function getUsers(){
        $users = User::orderBy('name')->get();
        $roles = Role::orderBy('name')->get();
        
        return view('layouts.users.users', compact('users', 'roles'));
    }

    public function saveUser(Request $request){

        // dd($request);

        $user = new User();
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('app.users.get');


    }
}
