<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use Faker\Generator as Faker;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'deadline_date' => $this->faker->date,
            'deadline_time' => $this->faker->time,
            'priority' => $this->faker->randomElement(['High', 'Medium', 'Low']),
            'category_id' => function () {
                return $this->faker->randomElement(range(1, 10));
            },
            'description' => $this->faker->paragraph,
            'assignee' => $this->faker->name,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
