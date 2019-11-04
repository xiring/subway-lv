@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 table-responsive">
        	<table class="table table-striped table-bordered" width="100$">
        		<thead>
        			<tr>
        				<th>Name</th>
        				<th></th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($meals as $row)
	            		<tr>
	            			<td>
	            				{{ $row->meal->name }}
	            			</td>
	            			<td>
	            				@guest
	            					<a href="{{ url('/login') }}">Order</a>
	            				@else
	            					<a href="{{ route('user.order', $row->id) }}">Order</a>
	            				@endguest
	            			</td>
	            		</tr>
	            	@endforeach
        		</tbody>
        	</table>
        </div>
    </div>
</div>
@endsection
