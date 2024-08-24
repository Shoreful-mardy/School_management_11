<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function StudentShift(){
        $data = StudentShift::all();
        return view('Backend.setup.student_shift.view_shift',compact('data'));
    }//End Method

    public function AddStudentShift(){
        return view('Backend.setup.student_shift.add_student_shift');
    }//End Method

    public function StoreStudentShift(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);
        StudentShift::insert([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Student Shift created successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('student.shift')->with($notification);
    }//End Method












}
