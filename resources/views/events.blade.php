@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajout d\'un nouvel évènement') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events.add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Event name') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" name="event_name" value="{{ old('event_name') }}" required autofocus>

                                @if ($errors->has('event_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('event_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="full_day" class="col-md-4 col-form-label text-md-right">{{ __('Full day') }}</label>

                            <div class="col-md-6">
                                <select name="full_day" id="full_day" class="form-control{{ $errors->has('full_day') ? ' is-invalid' : '' }}">
                                    <option value="" disabled selected></option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start date') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="datetime-local" class="form-control{{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ old('start_date') }}" required>

                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End date') }}</label>

                            <div class="col-md-6">
                                <input id="end_date" type="datetime-local" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ old('end_date') }}" required>

                                @if ($errors->has('end_date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{!! $calendarEvents->calendar() !!}
{!! $calendarEvents->script() !!}

@endsection