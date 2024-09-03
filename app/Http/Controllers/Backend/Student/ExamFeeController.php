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

    public function ExamFeeClassWise(Request $request){

        $year_id = $request->year_id;
        $class_id = $request->class_id;
         if ($year_id !='') {
            $where[] = ['year_id','like',$year_id.'%'];
         }
         if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
         }
         $allStudent = AssignStudent::with(['discount'])->where($where)->get();
         // dd($allStudent);
         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>ID No</th>';
         $html['thsource'] .= '<th>Student Name</th>';
         $html['thsource'] .= '<th>Roll No</th>';
         $html['thsource'] .= '<th>Exam Fee</th>';
         $html['thsource'] .= '<th>Discount </th>';
         $html['thsource'] .= '<th>Student Fee </th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($allStudent as $key => $v) {
            $registrationfee = FeeCategoryAmount::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discount']['discount'];
            $discounttablefee = $discount/100*$originalfee;
            $finalfee = (float)$originalfee-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.exam.fee.payslip").'?class_id='.$v->class_id.'&studetn_id='.$v->studetn_id.'&exam_type_id='.$request->exam_type_id.' ">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);


    }//End Method

    public function ExamFeePayslip(Request $request){
        $student_id = $request->studetn_id;
        $class_id = $request->class_id;
        $exam_type = ExamType::where('id',$request->exam_type_id)->first()['name'];
        $item = AssignStudent::with(['student','discount'])->where('studetn_id',$student_id)->where('class_id',$class_id)->first();
        $data = [
            'title' => 'Student Exam FeeCategoryAmount',
            'date' => date('m/d/y'),
            'item' => $item,
            'exam_type' => $exam_type,
        ];


        $pdf = Pdf::loadView('backend.student.exam_fee.exam_fee_slip', $data);
        
        return $pdf->stream('monthly_fee.pdf');
    }//End Method















}
