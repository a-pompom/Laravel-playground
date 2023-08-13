<?php

namespace Database\Factories\Todo;

use App\Models\Todo\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Task Modelを生成することを責務に持つ
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name()
        ];
    }
}
