<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::insert([
            [
                'student_name' => 'John Smith',
                'gender' => 'Male',
                'dob' => '2003-05-15',
                'enrollment' => 'ST001',
                'enrollment_date' => '2025-01-10',
                'description' => 'IT Student',
                'dept_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_name' => 'Mary Johnson',
                'gender' => 'Female',
                'dob' => '2004-02-20',
                'enrollment' => 'ST002',
                'enrollment_date' => '2025-01-10',
                'description' => 'Business Student',
                'dept_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_name' => 'David Brown',
                'gender' => 'Male',
                'dob' => '2003-09-12',
                'enrollment' => 'ST003',
                'enrollment_date' => '2025-01-10',
                'description' => 'Accounting Student',
                'dept_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
