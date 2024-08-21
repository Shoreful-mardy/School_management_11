<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function ViewUser(){
        $user = User::all();
        return view('backend.user.all_user',compact('user'));
    }//End Method


















}
