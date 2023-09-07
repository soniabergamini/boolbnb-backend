@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <h1>Payment successful!</h1>
        <p>Congratulations, your <strong>payment has been successful</strong> and your apartment {{ $apartment->name }} will be featured on our site starting on <strong>{{ $startDate }}</strong>.</p>
    </div>
    <div class="col-12">
        <h4>ORDER SUMMARY:</h4>
        <p>PLAN: <span>{{ $sponsorship->name }} Sponsorship </span></p>
        <p>PRICE: <span>{{ $sponsorship->price }} </span></p>
        <p>DURATION: <span>{{ $sponsorship->hours / 24 }} Days </span></p>
        <p>START DATE: <span>{{ $startDate }}</span></p>
        <p>END DATE: <span>{{ $endDate }}</span></p>
    </div>
</div>
@endsection
