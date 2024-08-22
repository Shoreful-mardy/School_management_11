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

    public function EditUser($id){
        $user = User::find($id);
        return view('backend.user.edit_user',compact('user'));
    }//End Method

    public function UpdateUser(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        $user = User::find($request->id);
        $user->user_type = $request->user_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

       $notification = array(
            'message' => 'User Update successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('user.view')->with($notification);

    }//End Method


















}
