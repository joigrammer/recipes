<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            AllergenSeeder::class,
            //MeasurementSeeder::class                   
        ]);
        Category::factory(8)->create(); 
        Tag::factory(40)->create(); 
        $this->call([
            IngredientSeeder::class,
            RecipeSeeder::class
        ]);
    }
}
