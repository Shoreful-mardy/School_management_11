<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function StudentGroup(){
        $data = StudentGroup::all();
        return view('Backend.setup.student_group.view_group',compact('data'));
    }//End Method
}
