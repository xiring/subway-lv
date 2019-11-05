<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function orders()
    {
    	return $this->hasMany('App\MealOrder', 'meal_id', 'id')->where('is_active',1);
    }

    public function options()
    {
    	return $this->hasMany('App\MealOption', 'meal_id', 'id');
    }
}
