@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
        <div class="col-md-8 table-responsive">
            @include('flash::message')
            <table class="table table-striped table-bordered" width="100%">
            	<thead>
            		<tr>
            			<td>Ref Id</td>
            			<td>Meal Name</td>
            			<td>Options</td>
            			<td>Order Date</td>
            			<td>Actions</td>
            		</tr>
            	</thead>
            	<tbody>
            		@forelse($orders as $order)
            			<tr>
            				<td>
            					Ref-{{ strtotime($order->created_at) }}
            				</td>
            				<td>{{ $order->mealOrder->meal->name }}</td>
            				<td>
            					@php
            						$stored_values = json_decode($order->options)
            					@endphp

            					@foreach($stored_values as $stored_value)
            						@php
            							$value = \App\MealOptionValue::where('id', $stored_value)->first();
            						@endphp
            						{{ $value->option->name }} : {{ $value->name }}<br />
            					@endforeach
            				</td>
            				<td>{{ $order->order_date }}</td>
            				<td>
            					@if($order->order_date == \Carbon\Carbon::now()->format('Y-m-d') && ($order->is_active == 1))            						{{-- <a href="{{ route('user.order.edit', $order->id) }}">Edit</a> --}}
            						<a href="{{ route('user.order.cancel', $order->id) }}">Cancel</a>
            					@endif
            				</td>
            			</tr>
            		@empty
            			<h1 class="text-center">No Orders</h1>
            		@endforelse
            	</tbody>
            </table>
        </div>
    </div>
@endsection