@extends('layouts.admin')

@section('content')
    <div class="card-header" style="background-color: #a9d3f5; color: #31316e;">Message Bird Settings</div>

    <div class="card-body">
        <div class="col-md-12">
            <form method="post" action="{{ route('messagebird.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $setting->id }}">
                <div class="form-group">
                    <label class="col-form-label">Api Key</label>
                    <input type="text" name="api_key" class="form-control" value="{{ $setting->api_key }}" required>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" value="{{ $setting->mobile_number }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
