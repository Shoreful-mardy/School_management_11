<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function ViewUser(){
        $user = User::where('user_type','Admin')->get();
        return view('backend.user.all_user',compact('user'));
    }//End Method

    public function AddUser(){

        return view('backend.user.add_user');
    }//End Method

    public function StoreUser(Request $request){

       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);
       $code = rand(0000,9999);

       User::insert([
        'user_type' => 'Admin',
        'role' => $request->role,
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($code),
        'code' => $code,
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
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

       $notification = array(
            'message' => 'User Update successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('user.view')->with($notification);

    }//End Method

    public function DeleteUser($id){

        User::find($id)->delete();
        $notification = array(
            'message' => 'User Deleted successfully!',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);

    }//End Method


















}
