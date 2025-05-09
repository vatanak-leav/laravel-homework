<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Teacher
{
    public static function allTeachers() {
        return DB::select("SELECT * FROM teachers");
    }

    public static function findTeacher($id) {
        $result = DB::select("SELECT * FROM teachers WHERE id = ?", [$id]);
        return $result ? $result[0] : null;
    }

    public static function addTeacher($data) {
        return DB::insert(
            "INSERT INTO teachers (name, age, gender) VALUES (?, ?, ?)",
            [$data['name'], $data['age'], $data['gender']]
        );
    }

    public static function updateTeacher($id, $data) {
        return DB::update(
            "UPDATE teachers SET name = ?, age = ?, gender = ? WHERE id = ?",
            [$data['name'], $data['age'], $data['gender'], $id]
        );
    }

    public static function deleteTeacher($id) {
        return DB::delete("DELETE FROM teachers WHERE id = ?", [$id]);
    }
}
