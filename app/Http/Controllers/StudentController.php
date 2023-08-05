<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class StudentController extends Controller
{

    public function index()
    {
        return Inertia::render('Student/Index', [
            'students' => Student::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Student/Create');
    }

    public function store(Student $student)
    {
        Student::create(
            Request::validate([
                'name' => ['required', 'string'],
            ])
        );

        return Redirect::route('students')->with('success', 'Aluno inserido com sucesso.');
    }

    public function edit(Student $student)
    {
        return Inertia::render('Student/Edit', [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'enrollments' => $student->enrollments()->with('course')->get()
            ]
        ]);
    }

    public function update(Student $student)
    {
        $student->update(
            Request::validate([
                'name' => ['required', 'string'],
            ])
        );

        return Redirect::back()->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return Redirect::to('students')->with('success', 'Aluno excluído com sucesso!');
    }
}
