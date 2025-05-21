<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("students")->insert([
            [
                'name' => 'Sifa Sahira',
                'student_id_number' => 'F55123059',
                'email' => 'Sif.asahira1@gmail.com',
                'phone_number' => '082194481337',
                'birth_date' => '2004-03-27',
                'gender' => 'Male',
                'status' => 'Active',
                'major_id' => 1,
            ],
            [
                'name' => 'Sahira Sifa',
                'student_id_number' => 'F55123095',
                'email' => 'sah.irasifa1@gmail.com',
                'phone_number' => '082194481373',
                'birth_date' => '2004-04-27',
                'gender' => 'Female',
                'status' => 'Inactive',
                'major_id' => 2,
            ],
        ]);
    }
}
