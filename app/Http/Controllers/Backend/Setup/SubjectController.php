<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function ExamType(){
        $data = Subject::all();
        return view('Backend.setup.subject.view_subject',compact('data'));
    }//End Method

    public function AddSubject(){
        return view('Backend.setup.subject.add_subject');
    }//End Method

    public function StoreSubject(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:subjects,name',
        ]);
        Subject::insert([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Subject Inserted successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('subject')->with($notification);
    }//End Method

    public function EditSubject($id){

       $data = Subject::find($id);
       return view('Backend.setup.subject.edit_subject',compact('data'));

    }//End Method
    public function UpdateSubject(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);
        $id = $request->id;
        Subject::findOrFail($id)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Subject Updated successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('subject')->with($notification);

    }//End Methon
    public function DeleteSubject($id){

        Subject::find($id)->delete();
        $notification = array(
            'message' => 'Subject Deleted successfully!',
            'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);
    }//End Method














}
