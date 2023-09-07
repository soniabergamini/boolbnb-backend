@extends('layouts.admin')
@section('content')


<div class="row my-5 border failed rounded">

    {{-- Apartment Image and Sponsorship Advantages --}}
    <div class="col-10 col-lg-5 p-0 leftCol d-flex align-items-end">
        <div class="overlay py-3 text-white text-center w-100">
            <h3>{{ $apartment->name }}</h3>
            <div class="text-start colPrimaryOrange px-4">
                <span>{{ $sponsorship->name }} Sponsorship </span>
                <strong class="fs-5">€ {{ $sponsorship->price }} </strong>
                <span class="separator mx-1">|</span>
                <span> {{ $sponsorship->hours }} Hours Featured</span>
            </div>
            <hr class="ms-3 mb-3 border-2 w-85">
            <div class="text-start px-4">
                <p class="m-2"><i class="fa-solid fa-user-plus me-1"></i> Reach more people</p>
                <p class="m-2"><i class="fa-solid fa-ranking-star me-1"></i> Put your apartment in the front row</p>
                <p class="m-2"><i class="fa-solid fa-medal me-1"></i> Featured among the most voted</p>
            </div>
        </div>
    </div>

    {{-- Summary & Checkout Form --}}
    <div class="col-10 col-lg-7 bg-white pt-4 pb-2 px-0 rightCol">

        {{-- Order Summary --}}
        <div class="px-4">
            <strong class="fs-4">PAYMENT FAILED</strong>
        </div>
        <div class="px-4 mt-3 text-body-secondary">
            <p class="alert alert-danger"><i class="fa-solid fa-xmark fa-lg me-2"></i>Something went wrong while processing your sponsorship. The payment has failed.</p>
            <p>Remember that to sponsor your apartment, you must enter a <strong>valid card number</strong>. Furthermore, we advise you to check that your card has not expired or disabled for online payments.</p>
            <p>If you need assistance, please <a href="tel:123456789" class="colPrimaryOrange"><strong>contact us</strong></a>. We'll be happy to help you.</p>
            <p>By completing the payment now, you will get much more visibility and <strong>more guests</strong>. {{ $apartment->name }} will appear among the first results on our pages.</p>
            <p><strong>Don't miss out the next traveler! Click Retry below to try again:</strong></p>
        </div>
        <div class="d-flex justify-content-center px-3 gap-3 buttons mt-1 mb-2">
            <button type="button" onclick="history.back();" class="btn castomButton retryBtn text-white border border-light-subtle my-1"><i class="fa-solid fa-arrow-left text-white"></i> RETRY</button>
            <button type="button" onclick="history.back();" class="btn castomButton text-white border border-light-subtle my-1"><i class="fa-solid fa-house text-white"></i> HOME</button>
        </div>



    </div>

</div>
@endsection

<style>
    .failed {
        background-image: url('{{ asset('/storage') . '/' . $apartment->image }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        min-height: 80%;
    }
</style>
