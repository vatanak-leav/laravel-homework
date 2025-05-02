<?php 


namespace App\Models;

class Student {
    public static $students = [
        [
            'id' => 1,
            'name' => 'Leav Sovatanak',
            'age' => 21,
            'gender' => 'Male',
            'grade' => 'E'
        ]
    ];

    public static function all() {
        return self::$students;
    }

    public static function find($id) {
        foreach (self::$students as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    public static function exists($id) {
        return collect(self::$students)->contains('id', $id);
    }

    public static function add($data) {
        self::$students[] = $data;
    }

    public static function update($id, $data) {
        foreach (self::$students as $index => $s) {
            if ($s['id'] == $id) {
                self::$students[$index] = array_merge($s, $data);
            }
        }
    }

    public static function delete($id) {
        self::$students = array_filter(self::$students, fn($s) => $s['id'] != $id);
    }
}
