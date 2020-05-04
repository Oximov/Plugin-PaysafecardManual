@extends('layouts.app')

@section('title', 'PaysafeCard Manual')

@section('content')
    <div class="container content">
    <form action="{{ route('paysafecardmanual.pay') }}" method="post">
        @csrf
        <input type="text" name="code">
        <input type="hidden" name="payment_id" value="{{ $payment_id }}">
        <button type="submit">Payer</button>
    </form>
    </div>
@endsection
