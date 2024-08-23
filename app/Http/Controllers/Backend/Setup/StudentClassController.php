<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    
    public function StudentClass(){
        $data = StudentClass::all();
        return view('Backend.setup.student_class.view_class',compact('data'));
    }//End Method

    public function AddStudentClass(){

        return view('Backend.setup.student_class.add_student_class');

    }//End Method

    public function StoreStudentClass(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        StudentClass::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Student Class created successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('student.class')->with($notification);


    }//End Method

    public function EditStudentClass($id){

       $data = StudentClass::find($id);
       return view('Backend.setup.student_class.edit_student_class',compact('data'));

    }//End Method

    public function UpdateStudentClass(Request $request){

        $id = $request->id;

        StudentClass::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Student Class Updated successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('student.class')->with($notification);

    }//End Methon




















}
