<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [ 'name' => fake()->name(),
        'description' => fake()->name(),
        'owner_id' => '1',
        'creator_id' => '1',
        'github_link' => 'https://github.com/KarinaGanieva-sl/test_repository',
        ];
    }
}
