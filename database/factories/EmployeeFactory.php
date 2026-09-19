<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->value('id'),

            'designation_id' => Designation::inRandomOrder()->value('id'),

            'employee_code' => 'EMP' . fake()->unique()->numberBetween(1000, 9999),

            'phone' => fake()->numerify('+91##########'),

            'address' => fake()->address(),

            'joining_date' => fake()
                ->dateTimeBetween('-2 years', 'now')
                ->format('Y-m-d'),

            'salary' => fake()->randomFloat(2, 20000, 100000),

            'profile_image' => null,

            'status' => 'active',
        ];
    }
}