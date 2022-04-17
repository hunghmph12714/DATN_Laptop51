<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Clases::all();
        return view('lop_hoc.index', compact('classes'));
    }

    public function addForm()
    {
        return view('lop_hoc.add');
    }
    public function saveAdd(Request $request)
    {
        Clases::create(['ma_lop' => $request->ma_lop, 'ten_lop' => $request->ten_lop]);
        return redirect(route('lop_hoc.index'));
    }
    public function editForm($id)
    {
        $class = Clases::find($id);

        return view('lop_hoc.edit', compact('class'));
    }
    public function saveEdit(Request $request, $id)
    {
        $model = Clases::find($id);
        if (!$model) {
            return back();
        }
        // dd($request);
        $model->fill(['ma_lop' => $request->ma_lop, 'ten_lop' => $request->ten_lop]);
        // $model->ma_lop = $request->ma_lop;
        // $model->ten_lop = $request->ten_lop;
        $model->save();

        return redirect(route('lop_hoc.index'));
    }
    public function remove($id)
    {
        $class = Clases::find($id);
        if ($class) {
            // $class->students->destroy();
            $student = Student::where('ma_lop', $id)->delete();
            // foreach ($class->student as $a)
            Clases::destroy($id);
        }

        return redirect(route('lop_hoc.index'));
    }
}