<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealOption extends Model
{
    public function values()
    {
    	return $this->hasMany('App\MealOptionValue', 'option_id', 'id')->orderBy('created_at', 'ASC');
    }
}
