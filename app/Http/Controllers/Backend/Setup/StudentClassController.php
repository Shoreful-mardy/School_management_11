<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    
    public function StudentClass(){
        $data = StudentClass::all();
        return view('Backend.setup.student_class.view_class',compact('data'));
    }//End Method




















}
