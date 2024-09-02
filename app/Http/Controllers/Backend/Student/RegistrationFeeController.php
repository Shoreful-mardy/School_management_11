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
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationFeeController extends Controller
{
    public function StudentRollView(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        return view('backend.student.registration_fee.registration_view',compact('student_year','student_class'));
    }//End Method





























}
