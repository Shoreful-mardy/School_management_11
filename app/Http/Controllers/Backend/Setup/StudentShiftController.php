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

    public function EditStudentShift($id){
       $data = StudentShift::find($id);
       return view('Backend.setup.student_shift.edit_student_shift',compact('data'));

    }//End Method

    public function UpdateStudentShift(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $id = $request->id;


        StudentShift::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Student Shift Updated successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('student.shift')->with($notification);

    }//End Method

    public function DeleteStudentShift($id){

        StudentShift::find($id)->delete();
        $notification = array(
            'message' => 'Student Shift Deleted successfully!',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
   }//End Method












}
