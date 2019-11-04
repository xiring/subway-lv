<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
    	$meals = Meal::orderBy('created_at', 'ASC')->get();

    	return view('admin.meal.index', compact('meals'));
    }

    public function store(Request $request)
    {
    	$meal = new Meal();
    	$meal->name = $request->name;

    	if($meal->save())
		{
			flash('Meal Added.', 'success')->important();
			return redirect()->back();    			
		}
    }

    public function update(Request $request)
    {
    	$meal = Meal::find($request->id);
    	$meal->name = $request->name;

    	if($meal->update())
		{
			flash('Meal updated.', 'success')->important();
			return redirect()->back();    			
		}
    }

    public function delete($id)
    {
    	$meal = Meal::find($id);
    	$meal->is_active = 0;

    	if($meal->update())
		{
			flash('Meal deleted.', 'danger')->important();
			return redirect()->back();    			
		}
    }

    public function restore($id)
    {
    	$meal = Meal::find($id);
    	$meal->is_active = 1;

    	if($meal->update())
		{
			flash('Meal restored.', 'success')->important();
			return redirect()->back();    			
		}
    }

}
