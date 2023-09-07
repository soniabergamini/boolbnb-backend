@extends('layouts.admin')
@section('content')
    <div class="row my-5 border checkout rounded">

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
                <strong class="fs-4">RECEIPT SUMMARY</strong>
            </div>
            <div class="my-3 px-4">
                <div class="d-flex justify-content-between text-body-secondary">
                    <p class="mx-0 my-2">{{ $sponsorship->name }} Sponsorship</p>
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

            <hr class="mx-0 my-2 colPrimaryOrange border-3">

            {{-- Payment Form --}}
            <div class="px-4">
                <form id="payment-form" action="{{ route('admin.payment.process') }}" method="POST">
                    @csrf
                    <p class="fs-5 mt-3 mb-4"><strong>Payment Info</strong></p>
                    <input type="hidden" id="amount" name="amount" value="{{ $sponsorship->price }}">
                    <div class="d-flex justify-content-between text-body-secondary dateContainer">
                        <label for="spons_date">Choose the <strong>start date</strong> of your
                            sponsorship:</label>
                        <input type="date" name="spons_date" id="spons_date" required min="{{ date('Y-m-d') }}"
                            max="{{ date('Y-m-d', strtotime('+2 months')) }}" class="w-40">
                    </div>
                    <input type="hidden" id="spons_id" name="spons_id" value="{{ $sponsorship->id }}">
                    <input type="hidden" id="apartment_id" name="apartment_id" value="{{ $apartment->id }}">
                    <input type="hidden" id="payment_method_nonce" name="payment_method_nonce" value="">
                    <div id="dropin-container"></div>
                    <button id="submit-button" type="button"
                        class="btn castomButton text-white border border-light-subtle mt-2">Confirm Payment</button>
                </form>
            </div>
        </div>

        {{-- Braintree Script --}}
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
        <script>
            var button = document.querySelector('#submit-button');

            braintree.dropin.create({
                authorization: '{{ $token }}',
                container: '#dropin-container'
            }, function(createErr, instance) {
                button.addEventListener('click', function() {
                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.error(err);
                            return;
                        }

                        document.querySelector('#payment_method_nonce').value = payload.nonce;
                        document.querySelector('#payment-form').submit();
                    });
                });
            });
        </script>

    </div>
@endsection

<style>
    .checkout {
        background-image: url('{{ asset('/storage') . '/' . $apartment->image }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;

    }

</style>
