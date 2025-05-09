<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($x = 0; $x < 10; $x++) {
            DB::table(table: 'students')->insert(values: [
                'name' => Str::random(length: 8),
                'age' => rand(18, 25),
                'gender' => ['Male', 'Female'][rand(0, 1)],
                'grade' => ['A', 'B', 'C', 'D', 'E'][rand(0, 4)],
            ]);
        }
    }
}
