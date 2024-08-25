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
            'name' => 'required|unique:exam_types,name',
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

    public function EditExamType($id){

       $data = ExamType::find($id);
       return view('Backend.setup.exam_type.edit_exam_type',compact('data'));

    }//End Method

    public function UpdateExamType(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $id = $request->id;

        ExamType::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Exam Type Updated successfully!',
            'alert-type' => 'success'
        );

       return redirect()->route('exam.type')->with($notification);

    }//End Methon
    public function DeleteExamType($id){

        ExamType::find($id)->delete();
        $notification = array(
            'message' => 'Exam Type Deleted successfully!',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
    }//End Method
    



















}
