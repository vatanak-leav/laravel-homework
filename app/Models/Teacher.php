<?php

namespace App\Models;

class Teacher {
    public static $teachers = [
        [
            'id' => 1,
            'name' => 'John Doe',
            'age' => 40,
            'gender' => 'Male'
        ]
    ];

    public static function all() {
        return self::$teachers;
    }

    public static function find($id) {
        foreach (self::$teachers as $teacher) {
            if ($teacher['id'] == $id) {
                return $teacher;
            }
        }
        return null;
    }

    public static function exists($id) {
        return collect(self::$teachers)->contains('id', $id);
    }

    public static function add($data) {
        self::$teachers[] = $data;
    }

    public static function update($id, $data) {
        foreach (self::$teachers as $index => $t) {
            if ($t['id'] == $id) {
                self::$teachers[$index] = array_merge($t, $data);
            }
        }
    }

    public static function delete($id) {
        self::$teachers = array_filter(self::$teachers, fn($t) => $t['id'] != $id);
    }
}
