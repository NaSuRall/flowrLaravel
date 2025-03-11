<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Group;

class ListeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'lien' => $this->faker->url,
            'user_id' => 1,
            'group_id' => 1
//            'group_id' => Group::inRandomOrder()->first()->id,
        ];
    }
}
