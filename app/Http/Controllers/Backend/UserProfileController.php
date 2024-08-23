<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function ProfileView(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.profile_view',compact('user'));

    }//End Method
    public function ProfileEdit(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.profile_edit',compact('user'));
    }//End Method


    public function ProfileStore(Request $request){

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('photo')) {

            
            $file = $request->file('photo');
            @unlink(public_path('upload/users_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/users_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('profile.view')->with($notification);

    }//End Method

    public function PasswordView(){
        return view('backend.user.edit_password');
    }//End Method

    public function PasswordUpdate(Request $request){

        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ], [
            'password_confirmation.same' => 'The password and confirmation password do not match.',
        ]); 

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }



    }//End Method












}
