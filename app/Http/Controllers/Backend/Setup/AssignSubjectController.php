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
        $data = AssignSubject::all();
        // $data = AssignSubject::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('Backend.setup.assign_subject.view_assign_subject',compact('data'));
    }//End Method

    public function AddAssignSubject(){
        $subject = Subject::all();
        $student_class = StudentClass::all();
        return view('Backend.setup.assign_subject.add_assign_subject',compact('subject','student_class'));
    }//End Method
















}
