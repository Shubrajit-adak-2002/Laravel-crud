<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class CRUDController extends Controller
{
    function store_student(Request $req){
        $student = new Student();
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        if ($student->save()) {
            return redirect()->route('display-student');
        }else{
            echo "Data not inserted";
        }

    }

    function display_student(){
        $students = Student::all();
        return view('display-student', compact('students'));
    }

    function edit_student($id){
        $student = Student::find($id);
        return view('edit-student', compact('student'));
    }

    function update_student(Request $req){
        $student = Student::find($req->id);
        $student->name = $req->name;
        $student->email = $req->email;
        $student->phone = $req->phone;
        if ($student->save()) {
            return redirect()->route('display-student');
        }else{
            echo "Data not inserted";
        }
    }

    function delete_student($id){
        $student = Student::find($id);
        if ($student->delete()) {
            return redirect()->route('display-student');
        }
    }
}
