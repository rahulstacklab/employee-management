<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {

            $user = User::factory()->create([
                'role' => 'employee',
            ]);

            Employee::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}