<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\MealOrder;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$now = Carbon::now()->format('Y-m-d');
    	$meals = MealOrder::where('is_active',1)->where('order_date', $now)->latest()->get();
        return view('index', compact('meals'));
    }
}
