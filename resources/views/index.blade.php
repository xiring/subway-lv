@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 table-responsive">
            @include('flash::message')
        	<table class="table table-striped table-bordered" width="100%">
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
	            					<a href="" data-toggle="modal" data-target="#mealOption{{ $row->id }}">Order</a>
	            				@endguest
	            			</td>
	            		</tr>
	            	@endforeach
        		</tbody>
        	</table>
        </div>
    </div>
</div>
@foreach($meals as $row)
    <div class="modal fade" id="mealOption{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Meal Option for {{ $row->meal->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'user.order' , 'files' => true]) }}
                    <input type="hidden" name="meal_id" value="{{ $row->meal->id }}">
                    <div class="container-fluid">
                        @foreach($row->meal->options as $option)
                            <div class="form-group">
                                <label class="col-form-label text-md-right">{{ $option->name }} <b style="color: red;">*</b></label>
                                <select class="form-control" name="valuIds[]" required>
                                    <option value="" selected="" disabled="">Select Value</option>
                                    @foreach($option->values as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
@endforeach
@endsection
