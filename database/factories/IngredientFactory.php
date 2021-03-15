<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->text(rand(32, 64));
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(rand(32, 192)),
            'category_id' => Category::all()->random()->id
        ];
    }
}
