@extends('layouts.admin')

@section('content')
    <div class="card-header" style="background-color: #a9d3f5;">{{ $meal->name }} Orders</div>
    <div class="card-body">
        <table id="data-table-list" class="table table-bordered table-striped">
            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryCreate"><i class="fas fa-plus-square"></i></a><br /><br />
            <thead>
                <th>S.N</th>
                <th>For Date</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @php $n=0; @endphp
                @foreach($orders as $row)
                    <tr>
                        <td>{{ ++$n }}</td>
                        <td>{{ Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
                        <td>
                            <?=($row->is_active == 0)?
                                '<span class="badge badge-danger">Deleted</span>'
                            :
                                '<span class="badge badge-success">Active</span>'
                            ;?>
                        </td>
                        <td>
                            @if($row->is_active == 0)
                                <a href="{{ route('meal.order.restore', $row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                            @else
                                <a href="{{ route('meal.order.delete', $row->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            @endif
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

                    <h4 class="modal-title" id="myModalLabel">Create Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'meal.order.store' , 'files' => true]) }}
                <div class="container-fluid">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Date <b style="color: red;">*</b></label>
                        <input type="hidden" name="meal_id" value="{{ $meal->id }}">
                        <input type="text" disabled="disabled" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" name="date" class="form-control" required >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('customScript')
@endsection