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

















}
