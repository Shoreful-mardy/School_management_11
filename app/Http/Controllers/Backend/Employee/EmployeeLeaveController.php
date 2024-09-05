<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use App\Models\Designation;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeLeaveController extends Controller
{
    public function EmpployeLeaveView(){
        $data['alldata'] = EmployeeLeave::orderBy('id','DESC')->get();
        return view('backend.employee.employee_leave.employee_leave_view',$data);
    }//End Method    
}
