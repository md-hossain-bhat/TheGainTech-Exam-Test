<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;

class EmployeeController extends Controller
{
    public function employees(){
        $employees = Employee::paginate(5);
        // echo "<pre>"; print_r($employees);die;
        return view('employee.employees')->with(compact('employees'));
    }

    public function addEmployee(Request $request){
        $employee = new Employee;
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->address = $request->input('address');
            $employee->phone = $request->input('phone');
            $employee->save();
            $message ="Employee Add Successfully!";
            Session::flash('success_message',$message);
            return redirect()->back();
    }

    //edit employee
    public function EditEmployee($id){

        $employee = Employee::find($id);
        
        return view('employee.employees')->with(compact('employee'));
    }


    public function deleteEmployee($id){
        
    }
}
