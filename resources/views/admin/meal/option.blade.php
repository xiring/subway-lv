@extends('layouts.admin')

@section('content')
    <div class="card-header" style="background-color: #a9d3f5;">{{ $meal->name }} Orders</div>
    <div class="card-body">
        <table id="data-table-list" class="table table-bordered table-striped">
            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryCreate"><i class="fas fa-plus-square"></i></a><br /><br />
            <thead>
                <th>S.N</th>
                <th>Name</th>
                <th>Values</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @php $n=0; @endphp
                @foreach($options as $row)
                    <tr>
                        <td>{{ ++$n }}</td>
                        <td>
                            {{ $row->name }} 
                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#valueCreate{{ $row->id }}"><i class="fas fa-plus-square"></i></a>
                        </td>
                        <td>
                            <table class="table">
                                <thead>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach($row->values as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                <a href="{{ route('meal.option.value.delete', $value->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <a href="{{ route('meal.option.delete', $row->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="categoryCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Create Meal Option</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'meal.option.store' , 'files' => true]) }}
                <div class="container-fluid">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name <b style="color: red;">*</b></label>
                        <input type="hidden" name="meal_id" value="{{ $meal->id }}">
                        <input type="text" name="name" class="form-control" required >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @foreach($options as $row)
        <div class="modal fade" id="valueCreate{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Create option value for {{ $row->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'meal.option.value.store' , 'files' => true]) }}
                <div class="container-fluid">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name <b style="color: red;">*</b></label>
                        <input type="hidden" name="option_id" value="{{ $row->id }}">
                        <input type="text" name="name" class="form-control" required >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('customScript')
@endsection