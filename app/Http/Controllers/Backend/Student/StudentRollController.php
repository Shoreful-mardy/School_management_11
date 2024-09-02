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

class StudentRollController extends Controller
{
    public function StudentRollView(){
        $student_year = StudentYear::all();
        $student_class = StudentClass::all();
        return view('backend.student.roll_generate.roll_generate_view',compact('student_year','student_class'));

    }//End Method
    public function GetStudents(Request $request){
        $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        return response()->json($allData);
    }//End Method

    public function RollGenerateStore(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        if ($request->student_id !=null) {
            for ($i=0; $i < count($request->student_id); $i++) { 
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('studetn_id',$request->student_id[$i])->update(['roll' => $request->roll[$i] ]);
            }//End For Loop
        }else{
            $notification = array(
                'message' => 'Sorry! There are no Student',
                'alert-type' => 'error'
            );
           return redirect()->back()->with($notification);
        }//End if else
        $notification = array(
            'message' => 'Well Done! Student Roll Updated Successfully',
            'alert-type' => 'success'
        );
       return redirect()->route('roll.generate.view')->with($notification);
    }//End Method


























}
