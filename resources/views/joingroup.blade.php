@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Join a group') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('groups.join') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="id_group" class="col-md-4 col-form-label text-md-right">{{ __('Group') }}</label>
                            <div class="col-md-6">
                                <select name="id_group" id="id_group" class="form-control{{ $errors->has('id_group') ? ' is-invalid' : '' }}">
                                    <option value="" disabled selected></option>
                                    @foreach($groups as $group)

                                        <option value="{{ $group->id }}"{{ ($group->id == $myGroup) ? ' selected ' : '' }}>{{ $group->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Join') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Users</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usersFromMyGroup as $user)

                        <tr>
                            <td>{{ $user->name }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection