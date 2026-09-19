<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create([
            'name' => 'IT',
            'description' => 'Information Technology Department',
        ]);

        Department::create([
            'name' => 'HR',
            'description' => 'Human Resources Department',
        ]);

        Department::create([
            'name' => 'Sales',
            'description' => 'Sales and Business Development Department',
        ]);

        Department::create([
            'name' => 'Marketing',
            'description' => 'Marketing Department',
        ]);
    }
}