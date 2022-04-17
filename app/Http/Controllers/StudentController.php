<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $students->load('class');
        return view('hoc_sinh.index', compact('students'));
    }
    public function addForm()
    {
        $classes = Clases::all();
        return view('hoc_sinh.add', compact('classes'));
    }
    public function saveAdd(Request $request)
    {
        // dd($request->toArray());
        Student::create($request->toArray());
        return redirect(route('hoc_sinh.index'));
    }
    public function editForm($id)
    {
        $clases = Clases::all();
        $student = Student::find($id);
        if (!$student) {
            return back();
        }
        return view('hoc_sinh.edit', compact('clases', 'student'));
    }
    public function saveEdit(Request $request, $id)
    {
        $model = Student::find($id);
        if (!$model) {
            return back();
        }
        $masv            = $model->ma_sv;
        // dd($request);
        $model->fill($request->all());
        // $model->ma_lop = $request->ma_lop;
        $model->ma_sv = $masv;
        $model->save();

        return redirect(route('hoc_sinh.index'));
    }
    public function remove($id)
    {
        Student::destroy($id);
        return redirect(route('hoc_sinh.index'));
    }
}