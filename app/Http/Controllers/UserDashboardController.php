<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\MealOrder;
use App\UserOrder;
use App\MessageBirdSetting;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
    	return redirect()->route('home');
    }

    public function order(Request $request)
    {
    	//dd($request->all());
    	$meal_order = MealOrder::find($request->meal_id);
    	$now = Carbon::now()->format('Y-m-d');

    	$exist_order = UserOrder::where('is_active',1)->where('order_id', $meal_order->id)->where('order_date', $now)->first();
    	if(is_null($exist_order)){
	    	$order = new UserOrder();
	    	$order->order_id = $meal_order->id;
	    	$order->user_id = \Auth::user()->id;
	    	$order->order_date = $now;
	    	$order->options = json_encode($request->valuIds);

	    	if($order->save()){
                $setting = MessageBirdSetting::find(1);
                $MessageBird = new \MessageBird\Client($setting->api_key);
                $Message = new \MessageBird\Objects\Message();
                $Message->originator = $setting->mobile_number;
                $Message->recipients = array($setting->mobile_number);
                $ref_id = 'Ref-'.strtotime($order->created_at);
                $b = 'A new order has been received with Ref id ' . $ref_id; 
                $Message->body = $b;

                $MessageBird->messages->create($Message);
	    		flash('Order added successfully.', 'success')->important();
	    		return redirect()->back();
	    	}
	    }else{
	    	flash('You have already order that meal for today.', 'warning')->important();
    		return redirect()->back();
	    }
    }

    public function orders()
    {
    	$user = \Auth::user();
    	$orders = $user->orders;
    	return view('my-order',compact('user', 'orders'));
    }

    public function orderEdit($id)
    {
    	$user_order = UserOrder::find($id);
    	return view('edit-order',compact('user_order'));
    }

    public function orderCancel($id)
    {
		$user_order = UserOrder::find($id);

		$user_order->is_active = 0; 
		
		if($user_order->update()){
    		flash('Order cancelled successfully.', 'danger')->important();
    		return redirect()->back();
    	}   	
    }
}
