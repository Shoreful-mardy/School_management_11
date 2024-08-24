<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function StudentGroup(){
        $data = StudentGroup::all();
        return view('Backend.setup.student_group.view_group',compact('data'));
    }//End Method
    public function AddStudentGroup(){
        return view('Backend.setup.student_group.add_student_group');
    }//End Method
    public function StoreStudentGroup(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        StudentGroup::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Student Group created successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('student.group')->with($notification);


    }//End Method
}
