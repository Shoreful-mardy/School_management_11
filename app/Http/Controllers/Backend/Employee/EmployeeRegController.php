<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;

class EmployeeRegController extends Controller
{
    public function EmpployeView(){
        $alldata = User::where('user_type','Employee')->get();
        return view('backend.employee.employee_reg.employee_view',compact('alldata'));
    }//End Method
















}
