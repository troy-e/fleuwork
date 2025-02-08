<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $grade = Grade::inRandomOrder()->first(); // Get a random existing grade

        // Check if a grade was found
        if (!$grade) {
            // Handle the case where no grades exist
            return [
                'name' => fake()->name(),
                'grade_id' => null, // or set a default value
                'department_id' => null, // or set a default value
                'email' => fake()->freeEmail(),
                'address' => fake()->state(),
            ];
        }

        return [
            'name' => fake()->name(),
            'grade_id' => $grade->id, // Use the existing grade's ID
            'department_id' => $grade->department_id, // Use the associated department ID
            'email' => fake()->freeEmail(),
            'address' => fake()->state(),
        ];
    }
}
