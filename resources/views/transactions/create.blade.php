@extends('layout')

@section('title', __('actions.create') . ' Transaction')

@section('body')
    <div class="wrapper mw-400 my-3 sk_dNone" style="box-shadow: 0 2px 10px #ddd;
  padding: 15px 20px;
  border-radius: 10px;">
        <h2 class="mb-3">{{ __('actions.create') }} Transaction</h2>
        <transaction-wizard
            :tags='@json($tags)'
            :currencies='@json($currencies)'
            default-transaction-type='{{ $defaultTransactionType }}'
            first-day-of-week='{{ $firstDayOfWeek }}'
            :default-currency-id='{{ $defaultCurrencyId }}'
            :recurrings-intervals='@json($recurringsIntervals)'
        ></transaction-wizard>
    </div>
@endsection
