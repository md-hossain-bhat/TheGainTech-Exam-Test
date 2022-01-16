<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session;

class EmployeeController extends Controller
{
    public function employees(){
        $employees = Employee::get()->toArray();
        // echo "<pre>"; print_r($employees);die;
        return view('employee.employees')->with(compact('employees'));
    }

    public function addEmployee(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $rulse = [
                'name' => 'required',
                'email' => 'required|email|max:255',
                'address' => 'required',
                'phone' => 'required',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'email.required' =>'email is required',
                'email.email' =>'Valid Email is password',
                'address.required' =>'address is required',
                'phone.required' =>'phone is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            $employee = new Employee;
            $employee->name = $data['name'];
            $employee->email = $data['email'];
            $employee->address = $data['address'];
            $employee->phone = $data['phone'];
            $employee->save();
            $message ="Employee Add Successfully!";
            Session::flash('success_message',$message);
            return redirect()->back();
        }
    }
}
