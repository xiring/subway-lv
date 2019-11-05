<?php

namespace App\Http\Controllers;

use App\UserOrder;
use App\MessageBirdSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function orders()
    {
    	$orders = UserOrder::orderBy('created_at', 'ASC')->get();

    	return view('admin.orders', compact('orders'));
    }

    public function orderDelete($id)
    {
    	$user_order = UserOrder::find($id);

    	if($user_order->delete())
    	{
    		flash('Order delete.', 'danger')->important();
    		return redirect()->back();
    	}
    }

    public function messageBird()
    {
    	$setting = MessageBirdSetting::find(1);
    	return view('admin.setting', compact('setting'));
    }

    public function messageBirdUpdate(Request $request)
    {
    	$setting = MessageBirdSetting::find($request->id);
    	$setting->api_key = $request->api_key;
    	$setting->mobile_number = $request->mobile_number;

    	if($setting->update())
    	{
			flash('Setting updated.', 'success')->important();
    		return redirect()->back();    		
    	}
    }
}
