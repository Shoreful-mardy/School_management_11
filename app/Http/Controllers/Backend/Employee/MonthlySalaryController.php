<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use Barryvdh\DomPDF\Facade\Pdf;

class MonthlySalaryController extends Controller
{
    public function EmpployeeMonthlySalary(){
        return view('backend.employee.monthly_salary.monthly_salary_view');
    }//End Method






















}
