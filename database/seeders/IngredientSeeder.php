<?php

namespace Database\Seeders;

use App\Models\Allergen;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::factory(50)->create()->each(function ($ingredient){
            $ingredient->allergens()->saveMany(Allergen::all());
        });
        
    }
}
