<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategoryAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function FeeCategoryAmountView(){
        $data = FeeCategoryAmount::all();
        return view('Backend.setup.fee_amount.view_fee_amount',compact('data'));
    }//End Method

    public function AddFeeAmount(){
        $fee_category = FeeCategory::all();
        $student_class = StudentClass::all();
        return view('Backend.setup.fee_amount.add_fee_amount',compact('fee_category','student_class'));
    }//End Method


}
