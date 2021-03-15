<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allergen;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Gluten',
                'slug' => 'gluten',
                'img_icon_path' => 'public/assets/icons/allergens/gluten.svg'
            ],
            [
                'name' => 'Peanuts',
                'slug' => 'peanuts',
                'img_icon_path' => 'public/assets/icons/allergens/peanuts.svg'
            ],
            [
                'name' => 'Tree Nuts',
                'slug' => 'tree-nuts',
                'img_icon_path' => 'public/assets/icons/allergens/tree-nuts.svg'
            ],
            [
                'name' => 'Celery',
                'slug' => 'celery',
                'img_icon_path' => 'public/assets/icons/allergens/celery.svg'
            ],
            [
                'name' => 'Mustard',
                'slug' => 'mustard',
                'img_icon_path' => 'public/assets/icons/allergens/mustard.svg'
            ],
            [
                'name' => 'Eggs',
                'slug' => 'eggs',
                'img_icon_path' => 'public/assets/icons/allergens/eggs.svg'
            ],
            [
                'name' => 'Milk',
                'slug' => 'milk',
                'img_icon_path' => 'public/assets/icons/allergens/milk.svg'
            ],
            [
                'name' => 'Sesame',
                'slug' => 'sesame',
                'img_icon_path' => 'public/assets/icons/allergens/sesame.svg'
            ],
            [
                'name' => 'Fish',
                'slug' => 'fish',
                'img_icon_path' => 'public/assets/icons/allergens/fish.svg'
            ],
            [
                'name' => 'Crustaceans',
                'slug' => 'crustaceans',
                'img_icon_path' => 'public/assets/icons/allergens/crustaceans.svg'
            ],
            [
                'name' => 'Molluscs',
                'slug' => 'molluscs',
                'img_icon_path' => 'public/assets/icons/allergens/molluscs.svg'
            ],
            [
                'name' => 'Soya',
                'slug' => 'soya',
                'img_icon_path' => 'public/assets/icons/allergens/soya.svg'
            ],
            [
                'name' => 'Sulphites',
                'slug' => 'sulphites',
                'img_icon_path' => 'public/assets/icons/allergens/sulphites.svg'
            ],
            [
                'name' => 'Lupin',
                'slug' => 'lupin',
                'img_icon_path' => 'public/assets/icons/allergens/lupin.svg'
            ],
        ];
        Allergen::insert($data);
    }
}
