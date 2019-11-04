@extends('layouts.admin')

@section('content')
    <div class="card-header" style="background-color: #a9d3f5;">All Users</div>
    <div class="card-body">
        <table id="data-table-list" class="table table-bordered table-striped">
            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryCreate"><i class="fas fa-plus-square"></i></a><br /><br />
            <thead>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @php $n=0; @endphp
                @foreach($users as $row)
                    <tr>
                        <td>{{ ++$n }}</td>
                        <td>{{ $row->name }}</td>
                         <td>{{ $row->email }}</td>
                        <td>
                            <?=($row->is_active == 0)?
                                '<span class="badge badge-danger">Deleted</span>'
                            :
                                '<span class="badge badge-success">Active</span>'
                            ;?>
                        </td>
                        <td>
                            @if($row->is_active == 0)
                                <a href="{{ route('user.restore', $row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                            @else
                                <a href="" data-toggle="modal" data-target="#categoryEdit{{ $row->id }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a></a>
                                <a href="{{ route('user.delete', $row->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

                    <h4 class="modal-title" id="myModalLabel">Create User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                {{ Form::open(['route' => 'user.store' , 'files' => true]) }}
                <div class="container-fluid">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Name <b style="color: red;">*</b></label>
                        <input type="text" name="name" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Email <b style="color: red;">*</b></label>
                        <input type="email" name="email" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label text-md-right">Password <b style="color: red;">*</b></label>
                        <input type="password" name="password" class="form-control" required >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @foreach($users as $row)

        <div class="modal fade" id="categoryEdit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Edit User: {{ $row->name }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    {{ Form::open(['route' => 'user.update' , 'files' => true]) }}
                    <div class="container-fluid">
                        <div class="form-group">
                            <label class="col-form-label text-md-right">Name <b style="color: red;">*</b></label>
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <input type="text" name="name" class="form-control" value="{{ $row->name }}" required >
                        </div>
                        <div class="form-group">
                            <label class="col-form-label text-md-right">Email <b style="color: red;">*</b></label>
                            <input type="email" name="email" value="{{ $row->email }}" class="form-control" disabled="disabled" required >
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