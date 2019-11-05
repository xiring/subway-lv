@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
        <div class="col-md-8 table-responsive">
        	<div class="card">
        		<div class="card-header">Edit Order: Ref-{{ strtotime($user_order->created_at) }}</div>
        		<div class="card-body">
        		</div>
        	</div>
        </div>
    </div>
@endsection    	