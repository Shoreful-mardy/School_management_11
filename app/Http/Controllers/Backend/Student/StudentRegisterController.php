<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;

class StudentRegisterController extends Controller
{
    public function StudentRegisterView(){
        $data = AssignStudent::all();
        return view('backend.student.student_reg.student_view',compact('data'));
    }//End Method

    public function StudentRegisterAdd(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        $student_group = StudentGroup::all();
        $student_shift = StudentShift::all();
        return view('backend.student.student_reg.student_add',compact('student_year','student_class','student_group','student_shift'));
    }//End Method
















}
