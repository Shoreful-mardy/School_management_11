<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\FeeCategoryAmount;
use App\Models\ExamType;
use Barryvdh\DomPDF\Facade\Pdf;

class ExamFeeController extends Controller
{
    public function ExamFeeView(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        $exam_type = ExamType::all();
        return view('backend.student.exam_fee.exam_view',compact('student_year','student_class','exam_type'));
    }//End Method















}
