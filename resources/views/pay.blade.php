@extends('layouts.app')

@section('title', trans('paysafecardmanual::messages.title'))

@section('content')
    <div class="card">
        <h5 class="card-header">
            {{ trans('paysafecardmanual::messages.title') }}
        </h5>

        <div class="card-body center">
            <form action="{{ route('paysafecardmanual.pay') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="code">{{ trans('paysafecardmanual::messages.fields.pin') }}</label>
                    <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                           value="{{ old('code') }}" required>

                    @error('code')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.send') }}
                </button>
            </form>
        </div>
    </div>
@endsection
