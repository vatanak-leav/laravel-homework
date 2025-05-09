<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        for ($x = 0; $x < 5; $x++) {
            DB::table(table: 'teachers')->insert(values: [
                'name' => Str::random(length: 10),
                'age' => rand(30, 60),
                'gender' => ['Male', 'Female'][rand(0, 1)],
            ]);
        }
    }
}

