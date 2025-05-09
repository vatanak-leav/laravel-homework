<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Teacher;

// ==== STUDENT ROUTES ====
Route::get('/students', fn() => response()->json(Student::allStudents()));

Route::get('/students/{id}', fn($id) =>
    ($student = Student::findStudent($id)) ? response()->json($student) : response()->json(['error' => 'Not found'], 404)
);

Route::post('/students', function (Request $request) {
    $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'gender' => 'required|string',
        'grade' => 'required|string',
    ]);
    Student::addStudent($request->all());
    return response()->json(['message' => 'Student added']);
});

Route::patch('/students/{id}', function (Request $request, $id) {
    if (!Student::findStudent($id)) return response()->json(['error' => 'Not found'], 404);
    Student::updateStudent($id, $request->all());
    return response()->json(['message' => 'Student updated']);
});

Route::delete('/students/{id}', function ($id) {
    if (!Student::findStudent($id)) return response()->json(['error' => 'Not found'], 404);
    Student::deleteStudent($id);
    return response()->json(['message' => 'Student deleted']);
});


// ==== TEACHER ROUTES ====
Route::get('/teachers', fn() => response()->json(Teacher::allTeachers()));

Route::get('/teachers/{id}', fn($id) =>
    ($teacher = Teacher::findTeacher($id)) ? response()->json($teacher) : response()->json(['error' => 'Not found'], 404)
);

Route::post('/teachers', function (Request $request) {
    $request->validate([
        'name' => 'required|string',
        'age' => 'required|integer',
        'gender' => 'required|string',
    ]);
    Teacher::addTeacher($request->all());
    return response()->json(['message' => 'Teacher added']);
});

Route::patch('/teachers/{id}', function (Request $request, $id) {
    if (!Teacher::findTeacher($id)) return response()->json(['error' => 'Not found'], 404);
    Teacher::updateTeacher($id, $request->all());
    return response()->json(['message' => 'Teacher updated']);
});

Route::delete('/teachers/{id}', function ($id) {
    if (!Teacher::findTeacher($id)) return response()->json(['error' => 'Not found'], 404);
    Teacher::deleteTeacher($id);
    return response()->json(['message' => 'Teacher deleted']);
});
