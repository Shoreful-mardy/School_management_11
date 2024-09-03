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
use App\Models\FeeCategoryAmount;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlyFeeController extends Controller
{
    public function MonthlyFeeView(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        return view('backend.student.monthly_fee.monthly_view',compact('student_year','student_class'));
    }//End Method


}
