@extends('admin.layouts.admin')

@section('title', 'Paysafecard Manual')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.user') }}</th>
                        <th scope="col">{{ trans('shop::messages.fields.price') }}</th>
                        <th scope="col">{{ trans('shop::admin.payments.fields.status') }}</th>
                        <th scope="col">{{ trans('shop::admin.payments.fields.payment-id') }}</th>
                        <th scope="col">{{ trans('messages.fields.date') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($payments as $payment)
                        <tr>
                            <th scope="row">{{ $payment->id }}</th>
                            <td>
                                <a href="{{ route('admin.users.edit', $payment->user) }}">{{ $payment->user->name }}</a>
                            </td>
                            <td>{{ $payment->price }} {{ currency_display($payment->currency) }}</td>
                            <td>{{ trans('shop::admin.payments.payment-status.'.strtolower($payment->status)) }}</td>
                            <td>{{ $payment->payment_id }}</td>
                            <td>{{ format_date_compact($payment->created_at) }}</td>
                            <td>
                                <form action="{{ route('paysafecardmanual.admin.accept_payment', ['payment' => $payment->id]) }}" method="post"> @csrf <button type="submit"  class="btn btn-success">Accept</button></form>
                                <form action="{{ route('paysafecardmanual.admin.refuse_payment', ['payment' => $payment->id]) }}" method="post"> @csrf <button type="submit"  class="btn btn-danger">Refuse</button></form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
        </div>
    </div>
@endsection
