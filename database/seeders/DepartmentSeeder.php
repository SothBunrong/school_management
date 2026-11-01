<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            [
                'dept_name' => 'Information Technology',
                'manager_id' => 101,
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'dept_name' => 'Business Management',
                'manager_id' => 102,
                'location_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'dept_name' => 'Accounting',
                'manager_id' => 103,
                'location_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
