<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ExamType(){
        $data = ExamType::all();
        return view('Backend.setup.exam_type.view_examtype',compact('data'));
    }//End Method
    public function AddExamType(){

        return view('Backend.setup.exam_type.add_exam_type');

    }//End Method
    public function StoreExamType(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        ExamType::insert([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Exam Type created successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('exam.type')->with($notification);


    }//End Method
    



















}
