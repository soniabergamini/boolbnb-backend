@extends('layouts.admin')
@section('content')


<div class="row my-5 border success rounded">

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
            <hr class="mx-3 mb-3 border-2">
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
            <strong class="fs-4">PAYMENT SUCCESSFULL</strong>
        </div>
        <div class="px-4 mt-3 text-body-secondary">
            <p>Congratulations, your <strong>payment has been successful</strong> and your apartment {{ $apartment->name }} will be featured on our site starting on <strong>{{ \Carbon\Carbon::parse($startDate)->format('Y/m/d') }}</strong> and until {{ \Carbon\Carbon::parse($endDate)->format('Y/m/d') }}.</p>
        </div>
        <div class="px-4">
            <strong class="fs-4">Order Summary</strong>
        </div>
        <div class="my-3 px-4">
            <div class="d-flex justify-content-between text-body-secondary">
                <p class="mx-0 my-2">{{ $sponsorship->name }} Sponsorship ({{ $sponsorship->hours }} Hours Featured)</p>
                <span class="text-right mx-0 my-2"> € {{ $sponsorship->price }}</span>
            </div>
            <div class="d-flex justify-content-between text-body-secondary">
                <p class="mx-0 my-2">Discount</p>
                <span class="text-right mx-0 my-2"> € 0</span>
            </div>
            <div class="d-flex justify-content-between text-body-secondary">
                <p class="mx-0 my-2">Subtotal</p>
                <span class="text-right mx-0 my-2"> € {{ $sponsorship->price }}</span>
            </div>
            <hr class="my-1 mx-0">
            <div class="d-flex justify-content-between text-body-secondary">
                <strong class="mx-0 my-2">Total</strong>
                <strong class="text-right mx-0 my-2"> € {{ $sponsorship->price }}</strong>
            </div>
        </div>
        <div class="px-4 mt-2 mb-1 d-flex justify-content-center">
            <button type="button" onclick="window.location=`{{ route('admin.dashboard') }}`" class="btn castomButton text-white border border-light-subtle"><i class="fa-solid fa-arrow-left text-white"></i> Go Back Home</button>
        </div>

    </div>

</div>
@endsection

<style>
    .success {
        background-image: url('{{ asset('/storage') . '/' . $apartment->image }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        min-height: 80%;
    }
</style>
