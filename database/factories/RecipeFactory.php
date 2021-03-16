<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->text(rand(16, 70));
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(rand(32, 155)),
            'body' => $this->faker->text(200),
            //'user_id' => User::all()->random()->id
        ];
    }
}
