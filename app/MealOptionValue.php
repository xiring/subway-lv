<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealOptionValue extends Model
{
    public function option()
    {
    	return $this->hasOne('App\MealOption', 'id', 'option_id');
    }
}
