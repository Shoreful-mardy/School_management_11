<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ViewUser(){
        $user = User::all();
        return view('backend.user.all_user',compact('user'));
    }//End Method

    public function AddUser(){

        return view('backend.user.add_user');
    }//End Method

    public function StoreUser(Request $request){

       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required', 
        ]);

       User::insert([
        'user_type' => $request->user_type,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
       ]);
       $notification = array(
            'message' => 'User created successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('user.view')->with($notification);

    }//End Method


















}
