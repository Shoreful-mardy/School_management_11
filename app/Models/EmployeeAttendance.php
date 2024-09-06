<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function employee(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
}
