<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpoyeeSalaryController extends Controller
{
    public function EmpployeSalaryView(){
        $data['alldata'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view',$data);
    }//End Method

    public function EmpployeSalaryIncrement($id){
        $data['editData'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment',$data);
    }//End Method

    public function UpdateIncrementStore(Request $request,$id){

        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + $request->increment_salary;
        $user->salary = $present_salary; 
        $user->save();

        $employee_salary = new EmployeeSalaryLog();
         $employee_salary->employee_id = $user->id;
         $employee_salary->previous_salary = $previous_salary;
         $employee_salary->present_salary = $present_salary;
         $employee_salary->increment_salary = $request->increment_salary;
         $employee_salary->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
         $employee_salary->save();
         $notification = array(
            'message' => 'Employee Salary Incremented!',
            'alert-type' => 'success'
        );
       return redirect()->route('employe.salary.view')->with($notification);

    }//End Method

    public function EmpployeSalaryDetails($id){

        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$id)->get();
        return view('backend.employee.employee_salary.employee_salary_log',$data);

    }//End Method

















}
