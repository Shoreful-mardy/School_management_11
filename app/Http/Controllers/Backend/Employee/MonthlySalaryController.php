<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlySalaryController extends Controller
{
    public function EmpployeeMonthlySalary(){
        return view('backend.employee.monthly_salary.monthly_salary_view');
    }//End Method

    public function EmpployeeMonthlySalaryGet(Request $request){

        $date = date('Y-m',strtotime($request->date));

         if ($date !='') {
            $where[] = ['date','like',$date.'%'];
         }
         $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['employee'])->where($where)->get();

         $html['thsource']  = '<th>SL</th>';
         $html['thsource'] .= '<th>Employee Name</th>';
         $html['thsource'] .= '<th>Basic Salary</th>';
         $html['thsource'] .= '<th>Salary This Month</th>';
         $html['thsource'] .= '<th>Action</th>';


         foreach ($data as $key => $v) {
            $totalattend = EmployeeAttendance::with('employee')->where($where)->where('employee_id',$v->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['employee']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['employee']['salary'].'$'.'</td>';
            
            $salary = (float)$v['employee']['salary'];
            $salary_perday = (float)$salary/30;
            $total_salary_minus = (float)$absentcount*(float)$salary_perday;
            $total_salary = (float)$salary-(float)$total_salary_minus;

            $html[$key]['tdsource'] .='<td>'.$total_salary.'$'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$v->employee_id).'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

         }  
        return response()->json(@$html);
    }//End Method

    public function EmpployeeMonthlySalaryPayslip(){

    }//End Method






















}
