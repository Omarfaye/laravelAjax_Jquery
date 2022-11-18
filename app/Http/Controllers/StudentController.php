<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }

    public function fetchstudent(){
       $students = Student::all();
       return response()->json([
          'students'=>$students,
       ]);
    }

    public function store(){
        request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'course'=>'required'
        ]);

            $student = new Student();
            $student->name = request('name');
            $student->email = request('email');
            $student->phone = request('phone');
            $student->course = request('course');

            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully',
            ]);
    }

    public function edit($id){
        $student = Student::find($id);
        if($student){
              return response()->json([
                  'status'=>200,
                  'student'=>$student,
              ]);
        }else{
            return response()->json([
                'status'=>400,
                'message'=>'Student Not found',
            ]);
        }
    }

    public function update($id){
        request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'course'=>'required'
        ]);

        $student = Student::find($id);
        if($student){
            $student->name = request('name');
            $student->email = request('email');
            $student->phone = request('phone');
            $student->course = request('course');

            $student->update();
            return response()->json([
                'status'=>200,
                'message'=>'Student Updated Successfully',
            ]);
        }else{
            return response()->json([
                'status'=>400,
                'message'=>'Student Not found',
            ]);
        }
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Student Deleted Successfully',
        ]);
    }
}
