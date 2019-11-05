@extends('layouts.admin')

@section('content')
    <div class="card-header" style="background-color: #a9d3f5;">All Orders</div>
    <div class="card-body">
        <table id="data-table-list" class="table table-bordered table-striped">
            <thead>
                <th>Ref Id</th>
                <th>Meal Name</th>
                <th>Options</th>
                <th>Order Date</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @php $n=0; @endphp
                @foreach($orders as $order)
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
                            <a href="{{ route('order.delete', $order->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('customScript')
@endsection