<?php

namespace App\Http\Controllers;

use App\Meal;
use App\MealOption;
use Carbon\Carbon;
use App\MealOrder;
use App\MealOptionValue;
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

    public function order($id)
    {
    	$meal = Meal::find($id);
    	$orders = MealOrder::where('meal_id', $meal->id)->orderBy('created_at', 'ASC')->get();
    	return view('admin.meal.order', compact('meal', 'orders'));
    }

    public function orderStore(Request $request)
    {
    	//dd($request->all());
    	$now = Carbon::now()->format('Y-m-d');
    	$exist_order = MealOrder::where('meal_id', $request->meal_id)->where('order_date', $now)->where('is_active',1)->first();

    	if(is_null($exist_order)){
    	$order = new MealOrder();
	    	$order->meal_id = $request->meal_id;
	    	$order->order_date = $now;
	    	if($order->save())
			{
				flash('Order added.', 'success')->important();
				return redirect()->back();    			
			}
		}else{
			flash('Order already created for today.', 'danger')->important();
			return redirect()->back(); 
		}
    }

    public function orderDelete($id)
    {
    	$order = MealOrder::find($id);
    	$order->is_active = 0;

    	if($order->update())
		{
			flash('Order deleted.', 'danger')->important();
			return redirect()->back();    			
		}	
    }

    public function orderRestore($id)
    {
    	$order = MealOrder::find($id);
    	$order->is_active = 1;

    	if($order->update())
		{
			flash('Order restored.', 'success')->important();
			return redirect()->back();    			
		}	
    }

    public function options($id)
    {
        $meal = Meal::find($id);

        $options = MealOption::where('meal_id', $meal->id)->orderBy('created_at', 'ASC')->get();
        return view('admin.meal.option', compact('meal', 'options'));
    }

    public function optionStore(Request $request)
    {
        $option = new MealOption();
        $option->meal_id = $request->meal_id;
        $option->name = $request->name;

        if($option->save()){

            flash('Option addded.', 'success')->important();
            return redirect()->back();
        }
    }

    public function optionDelete($id)
    {
        $option = MealOption::find($id);

        //if($option->delete())
        //{
            foreach ($option->values as $value) {
                $value->delete();
            }
            $option->delete();
            flash('Option deleted.', 'danger')->important();
            return redirect()->back();        
        //}
    }

    public function optionValueStore(Request $request)
    {

        $value = new MealOptionValue();
        $value->option_id = $request->option_id;
        $value->name = $request->name;

        if($value->save())
        {
            flash('Value added.', 'success')->important();
            return redirect()->back();
        }
    }

    public function optionValueDelete($id)
    {

        $value = MealOptionValue::find($id);

        if($value->delete())
        {
            flash('Value deleted.', 'danger')->important();
            return redirect()->back();        
        }   
    }

}
