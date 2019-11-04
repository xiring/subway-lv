@extends('layouts.admin')

@section('content')
    <div class="card-header" style="background-color: #a9d3f5; color: #31316e;">Dashboard</div>

    <div class="card-body" style="min-height: 420px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                       {{--  <div class="card-header" style="background-color: #2196f3; color: #ffff">Trips</div>
                        <div class="card-body" style="font-size: 40px">
                            {{ $number_of_trips }} <i class="fab fa-think-peaks" style="color: #2196f3;"></i>
                        </div>
                        <div class="card-footer" style="background-color: #31316e; color: #ffff">
                            <a class="card-link" href="{{ route('trip.index') }}" target="_blank"><i class="fas fa-arrow-right"></i>&nbsp;&nbsp;More Info</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
