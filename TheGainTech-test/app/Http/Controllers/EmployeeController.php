<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function employees(){
        $employees = Employee::get()->toArray();
        // echo "<pre>"; print_r($employees);die;
        return view('employee.employees')->with(compact('employees'));
    }
}
