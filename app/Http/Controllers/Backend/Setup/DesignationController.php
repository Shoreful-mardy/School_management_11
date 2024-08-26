<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function DesignationView(){
        $data = Designation::all();
        return view('Backend.setup.designation.view_designation',compact('data'));
    }//End Method
    public function AddDesignation(){
        return view('Backend.setup.designation.add_designation');
    }//End Method
    public function StoreDesignation(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);
        Designation::insert([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Designation created successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('designation.view')->with($notification);
    }//End Method




















}
