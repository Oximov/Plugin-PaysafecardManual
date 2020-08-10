@extends('admin.layouts.admin')

@section('title', 'Paysafecard Manual')

@push('footer-scripts')
    <script>
        function handleValid(element) {
            const priceMessage = '{{ trans('paysafecardmanual::messages.accept.price', ['currency' => currency()]) }}';
            const moneyMessage = '{{ trans('paysafecardmanual::messages.accept.money') }}';

            element.querySelector('input[name="price"]').value = prompt(priceMessage);
            element.querySelector('input[name="money"]').value = prompt(moneyMessage);
        }
    </script>
@endpush

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('messages.fields.user') }}</th>
                        <th scope="col">{{ trans('paysafecardmanual::messages.fields.code') }}</th>
                        <th scope="col">{{ trans('messages.fields.date') }}</th>
                        <th scope="col">{{ trans('messages.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($codes as $code)
                        <tr>
                            <th scope="row">{{ $code->id }}</th>
                            <td>
                                <a href="{{ route('admin.users.edit', $code->user) }}">{{ $code->user->name }}</a>
                            </td>
                            <td>{{ $code->code }}</td>
                            <td>{{ format_date_compact($code->created_at) }}</td>
                            <td>
                                <form action="{{ route('paysafecardmanual.admin.accept', $code) }}" method="POST" onsubmit="handleValid(this)" class="d-inline-block">
                                    @csrf

                                    <input type="hidden" name="price">
                                    <input type="hidden" name="money">

                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-check"></i> {{ trans('paysafecardmanual::messages.actions.accept') }}
                                    </button>
                                </form>

                                <form action="{{ route('paysafecardmanual.admin.refuse', $code) }}" method="POST" class="d-inline-block">
                                    @csrf

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i> {{ trans('paysafecardmanual::messages.actions.refuse') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
