<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    public function meal()
    {
    	return $this->hasOne('App\Meal', 'id', 'meal_id');
    }
}
