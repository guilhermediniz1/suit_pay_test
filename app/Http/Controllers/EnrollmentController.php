<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{
    public function store()
    {
        $request_data = Request::validate([
            'student_id' => ['required', 'integer'],
            'course_id' => ['required', 'integer'],
        ]);

        $course_to_enroll = Course::find($request_data['course_id']);

        $validator = Validator::make([
            'enrollment_deadline' => $course_to_enroll->enrollment_deadline
        ], [
            'enrollment_deadline' => ['required', 'date', 'after_or_equal:today'],
        ]);
    
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }

        Enrollment::create($request_data);

        return Redirect::back()->with('sucess', 'Aluno matriculado com sucesso');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return Redirect::back()->with('sucess', 'Matrícula deletada com sucesso');
    }
}
