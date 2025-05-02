<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;


// >>>===== STUDENT =====<<<

Route::get('/students', function () {
    return response()->json(Student::all());
});

Route::get('/students/{id}', function ($id) {
    $student = Student::find($id);
    return $student ? response()->json($student) : response()->json(['error' => 'Student not found'], 404);
});

Route::post('/students', function (Request $request) {
    if (Student::exists($request->id)) {
        return response()->json(['error' => 'Student ID already exists'], 400);
    }
    Student::add($request->all());
    return response()->json(['message' => 'Student added']);
});

Route::patch('/students/{id}', function (Request $request, $id) {
    if (!Student::find($id)) {
        return response()->json(['error' => 'Student ID not found'], 404);
    }

    Student::update($id, $request->all());
    return response()->json(['message' => 'Student updated']);
});


Route::delete('/students/{id}', function ($id) {
    if (!Student::find($id)) {
        return response()->json(['error' => 'Student not found'], 404);
    }
    Student::delete($id);
    return response()->json(['message' => 'Student deleted']);
});


// >>>===== TEACHER =====<<<

Route::get('/teachers', function () {
    return response()->json(Teacher::all());
});

Route::get('/teachers/{id}', function ($id) {
    $teacher = Teacher::find($id);
    return $teacher ? response()->json($teacher) : response()->json(['error' => 'Teacher not found'], 404);
});

Route::post('/teachers', function (Request $request) {
    if (Teacher::exists($request->id)) {
        return response()->json(['error' => 'Teacher ID already exists'], 400);
    }
    Teacher::add($request->all());
    return response()->json(['message' => 'Teacher added']);
});

Route::patch('/teachers/{id}', function (Request $request, $id) {
    if (!Teacher::find($id)) {
        return response()->json(['error' => 'Teacher not found'], 404);
    }

    Teacher::update($id, $request->all());
    return response()->json(['message' => 'Teacher updated']);
});


Route::delete('/teachers/{id}', function ($id) {
    if (!Teacher::find($id)) {
        return response()->json(['error' => 'Teacher not found'], 404);
    }

    Teacher::delete($id);
    return response()->json(['message' => 'Teacher deleted']);
});
