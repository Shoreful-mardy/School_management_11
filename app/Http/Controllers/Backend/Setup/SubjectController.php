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














}
