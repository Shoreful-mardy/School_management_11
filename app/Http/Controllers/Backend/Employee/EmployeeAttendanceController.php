<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeeAttendanceController extends Controller
{
    
    public function EmpployeeAttendanceView(){
        $data['alldata'] = EmployeeAttendance::orderBy('id','DESC')->get();
        return view('backend.employee.employee_attendance.employee_attend_view',$data);
    }//End Method

    public function EmpployeeAttendanceAdd(){
        $data['employee'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_attendance.employee_attend_add',$data);
    }//End Method












}
