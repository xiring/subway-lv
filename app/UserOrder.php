<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    public function mealOrder()
    {
    	return $this->hasOne('App\MealOrder', 'id', 'order_id');
    }
}
