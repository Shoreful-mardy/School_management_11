<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYear(){
        $data = StudentYear::all();
        return view('Backend.setup.student_year.view_year',compact('data'));
    }//End Method
}
