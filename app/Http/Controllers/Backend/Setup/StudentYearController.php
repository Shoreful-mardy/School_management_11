<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYear(){
        $data = StudentYear::all();
        return view('Backend.setup.student_year.view_year',compact('data'));
    }//End Method
    public function AddStudentYear(){
        return view('Backend.setup.student_year.add_student_year');
    }//End Method
     public function StoreStudentYear(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        StudentYear::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Student Year created successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('student.year')->with($notification);


    }//End Method
    public function EditStudentYear($id){

       $data = StudentYear::find($id);
       return view('Backend.setup.student_year.edit_student_year',compact('data'));

    }//End Method
    public function UpdateStudentYear(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $id = $request->id;


        StudentYear::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Student Year Updated successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('student.year')->with($notification);

    }//End Methon
    public function DeleteStudentYear($id){

        StudentYear::find($id)->delete();
        $notification = array(
            'message' => 'Student Year Deleted successfully!',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);

    }//End Method
}
