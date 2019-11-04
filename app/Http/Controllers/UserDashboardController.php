<?php

namespace App\Http\Controllers;

use App\MealOrder;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
    	return redirect()->route('index');
    }

    public function order($id)
    {
    	$meal_order = MealOrder::find($id);
    	dd($meal_order);
    }
}
