<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        return Inertia::render('Course/Index', [ 
            'courses' => Course::all()->map(function ($course) {
                return [
                    'id' => $course->id,
                    'name' => $course->name, 
                    'is_online' => $course->is_online == 1 ? 'Sim' : 'Não',
                    'enrollment_deadline' => Carbon::parse($course->enrollment_deadline)->format('j/m/Y'),
                    'vacancies' => $course->vacancies
                ];
            })
        ]);
    }

    public function show(string $id)
    {
        return Inertia::render('Course/Show', [ 'course' => Course::find($id) ]);
    }

    public function create()
    {
        return Inertia::render('Course/Create');
    }

    public function store(Course $course)
    {
        Course::create(
            Request::validate([
                'name' => ['required', 'string'], 
                'is_online' => ['required', 'boolean'],
                'enrollment_deadline' => ['required', 'date', 'after:yesterday'],
                'vacancies' => ['required', 'int', 'min:0']
            ])
        );

        return Redirect::route('courses')->with('success', 'Curso inserido com sucesso.');
    }

    public function edit(Course $course)
    {
        return Inertia::render('Course/Edit', [
            'course' => [
                'id' => $course->id,
                'name' => $course->name, 
                'is_online' => $course->is_online,
                'enrollment_deadline' => $course->enrollment_deadline,
                'vacancies' => $course->vacancies
            ]
        ]);
    }

    public function update(Course $course)
    {
        $course->update(
            Request::validate([
                'name' => ['required', 'string'], 
                'is_online' => ['required', 'boolean'],
                'enrollment_deadline' => ['required', 'date', 'after:yesterday'],
                'vacancies' => ['required', 'int', 'min:0']
            ])
        );

        return Redirect::back()->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return Redirect::to('courses')->with('success', 'Curso excluído com sucesso!');
    }
}
