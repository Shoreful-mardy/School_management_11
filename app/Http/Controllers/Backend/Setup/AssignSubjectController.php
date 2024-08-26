<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\Subject;
use App\Models\StudentClass;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
        $data = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('Backend.setup.assign_subject.view_assign_subject',compact('data'));
    }//End Method

    public function AddAssignSubject(){
        $subject = Subject::all();
        $student_class = StudentClass::all();
        return view('Backend.setup.assign_subject.add_assign_subject',compact('subject','student_class'));
    }//End Method

    public function StoreAssignSubject(Request $request){

        $countsubject = count($request->subject_id);
        if ($countsubject != Null) {
            for ($i=0; $i < $countsubject; $i++) { 
                AssignSubject::insert([
                    'class_id' => $request->class_id,
                    'subject_id' => $request->subject_id[$i],
                    'full_mark' => $request->full_mark[$i],
                    'pass_mark' => $request->pass_mark[$i],
                    'subjective_mark' => $request->subjective_mark[$i],
                ]);
            }//End For
            $notification = array(
                'message' => 'Subject Assigned successfully!',
                'alert-type' => 'success'
            );
           return redirect()->route('assign.subject.view')->with($notification);
        }//End if

        $notification = array(
            'message' => 'Something Want Wrong',
            'alert-type' => 'error'
        );
       return redirect()->back()->with($notification);

    }//End Method
















}
