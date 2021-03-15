<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Allergen extends Model
{
    use CrudTrait;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }
}
