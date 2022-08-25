<?php

namespace App\Http\Controllers\Backend\Examination;

use App\Http\Controllers\Controller;
use App\Models\Backend\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('backend.pages.grade.index', compact('grades'));
    }

    public function create(Request $request)
    {
        $grade = null;
        return view('backend.pages.grade.create', compact('grade'));
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'grade_name' => 'required|string|max:50',
            'grade_point' => 'required|string',
            'number_from' => 'required|integer',
            'number_to' => 'required|integer',
        ]);

        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.examGrade.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
        try {
            $grade = Grade::create([
                'grade_name' => $request->grade_name,
                'grade_point' => $request->grade_point,
                'number_from' => $request->number_from,
                'number_to' => $request->number_to,
                'created_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Grade Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.examGrade.index')->with($status, $message);
        }

    }

    public function edit(Grade $grade)
    {
        return view('backend.pages.grade.create', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $validatorData = Validator::make($request->all(), [
            'grade_name' => 'required|string|max:50',
            'grade_point' => 'required|numeric',
            'number_from' => 'required|integer',
            'number_to' => 'required|integer',
        ]);
        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.examGrade.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
            try {
                $grade->update([
                    'grade_name' => $request->grade_name,
                    'grade_point' => $request->grade_point,
                    'number_from' => $request->number_from,
                    'number_to' => $request->number_to,
                    'updated_by' => Auth::id()
                ]);
    
    
                // $role->syncPermissions($request->permissions);
    
                $status = 'success';
                $message = 'Grade Updated Successfully';
    
            } catch (\Exception $exception) {
                $status = 'warning';
                $message = $exception->getMessage();
            }
        }
        

        return redirect()->route('admin.examGrade.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return response()->json([
            'success' => 'Grade deleted successfully!'
        ]);
    }
}
