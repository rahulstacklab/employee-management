<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        Designation::create([
            'name' => 'Junior Developer',
            'description' => 'Entry-level software developer',
        ]);

        Designation::create([
            'name' => 'Senior Developer',
            'description' => 'Experienced software developer',
        ]);

        Designation::create([
            'name' => 'HR Manager',
            'description' => 'Human resources manager',
        ]);

        Designation::create([
            'name' => 'Sales Executive',
            'description' => 'Sales and client management executive',
        ]);
    }
}