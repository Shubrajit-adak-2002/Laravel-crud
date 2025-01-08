<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Intervention\Image\Laravel\Facades\Image;

class EmployeeController extends Controller
{
    function store_employee(Request $req)
    {
        $employee = new Employee();
        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->salary = $req->salary;

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $upload = public_path('upload');
            if (!file_exists($upload)) {
                mkdir($upload, 0777, true);
            }

            $resize_image = Image::read($image)
            ->resize(300,300,function($constraint){
                $constraint->aspectRatio();
                $constraint->upSize();
            });

            $resize_image->save($upload . '/' .$image_name);
            $employee->image = 'upload/' . $image_name;
        }

        $employee->save();
        return redirect()->route('employee.display');
    }

    function employee_form()
    {
        return view('employee.form');
    }

    function display()
    {
        $employees = Employee::all();
        return view('employee.display', compact('employees'));
    }

    function edit_employee($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    function update_employee(Request $req)
    {
        $employees = Employee::find($req->id);
        $employees->name = $req->name;
        $employees->email = $req->email;
        $employees->salary = $req->salary;
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $upload = public_path('upload');
            if (!file_exists($upload)) {
                mkdir($upload, 0777, true);
            }
            $resize_image = Image::read($image)
            ->resize(300,300,function($constraint){
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $resize_image->save($upload . '/' .$image_name);
            $employees->image = 'upload/' . $image_name;
        }
        $employees->save();
        return redirect()->route('employee.display');
    }

    function delete_employee($id){
        $employee = Employee::find($id);
        if ($employee->delete()) {
            return redirect()->route('employee.display');
        }
    }
}
