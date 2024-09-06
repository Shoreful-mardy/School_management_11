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

    public function EmpployeLeaveAdd(){
        $data['employee'] = User::where('user_type','employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_add',$data);
    } //End Method

    public function EmpployeLeaveStore(Request $request){
        if ($request->leave_purpose_id == 0) {
            $leave_purpose = new LeavePurpose();
            $leave_purpose->name = $request->name;
            $leave_purpose->save();
            $leave_purpose_id = $leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id; 
        $data->leave_purpose_id = $leave_purpose_id; 
        $data->start_date = date('Y-m-d',strtotime($request->start_date)); 
        $data->end_date = date('Y-m-d',strtotime($request->end_date)); 
        $data->save(); 
        $notification = array(
            'message' => 'Employee Leave Stored Successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('employe.leave.view')->with($notification);
    }//End Method

    public function EmpployeLeaveEdit($id){

        $data['editData'] = EmployeeLeave::find($id);
        $data['leave_purpose'] = LeavePurpose::all();
        $data['employee'] = User::where('user_type','employee')->get();
        return view('backend.employee.employee_leave.employee_leave_edit',$data);

    }//End Method

    public function EmpployeLeaveUpdate(Request $request,$id){
        if ($request->leave_purpose_id == 0) {
            $leave_purpose = new LeavePurpose();
            $leave_purpose->name = $request->name;
            $leave_purpose->save();
            $leave_purpose_id = $leave_purpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = EmployeeLeave::find($id);
        $data->employee_id = $request->employee_id; 
        $data->leave_purpose_id = $leave_purpose_id; 
        $data->start_date = date('Y-m-d',strtotime($request->start_date)); 
        $data->end_date = date('Y-m-d',strtotime($request->end_date)); 
        $data->save(); 
        $notification = array(
            'message' => 'Employee Leave Updated Successfully!',
            'alert-type' => 'success'
        );
       return redirect()->route('employe.leave.view')->with($notification);
    }//End Method
    public function EmpployeLeaveDelete($id){
        EmployeeLeave::find($id)->delete();
        $notification = array(
            'message' => 'Employee Leave Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('employe.leave.view')->with($notification);
    }//End Method














}
