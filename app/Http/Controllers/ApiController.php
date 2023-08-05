<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function getAvailableCourses()
    {
        return Course::all()->where('enrollment_deadline', '>=', Carbon::today())->map(function ($course) {
            return [
                'id' => $course->id,
                'name' => $course->name,
                'enrollment_deadline' => $course->enrollment_deadline
            ];
        });
    }
}
