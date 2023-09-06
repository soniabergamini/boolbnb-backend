@extends('layouts.admin')
@section('content')
    <div class="py-12">
        {{-- @csrf --}}
        <div id="dropin-container"></div>
        <form id="payment-form" action="{{ route('admin.payment.process') }}" method="POST">
            @csrf
            {{-- <label for="amount">Importo del pagamento:</label> --}}
            {{-- <input type="text" id="amount" name="amount" required> --}}
            <input type="hidden" id="amount" name="amount" value="{{ $sponsorship->price }}">
            <!-- Altri campi del form, se necessario -->
            <input type="hidden" id="payment_method_nonce" name="payment_method_nonce" value="">
            <button id="submit-button" type="button">Conferma Pagamento</button>
        </form>

        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

                        // Inserisci il nonce nel campo del form
                        document.querySelector('#payment_method_nonce').value = payload.nonce;

                        // Invia il form al controller
                        document.querySelector('#payment-form').submit();
                    });
                });
            });
        </script>


        {{-- <script>
            var button = document.querySelector('#submit-button');

            braintree.dropin.create({
                // Insert your tokenization key here
                authorization: 'sandbox_w362cfkp_htxcdmp9ttv73hz8',
                container: '#dropin-container'
            }, function(createErr, instance) {
                button.addEventListener('click', function() {
                    instance.requestPaymentMethod(function(err, payload) {
                        (function($) {
                            $(function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    }
                                });
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('admin.payment.token') }}",
                                    data: {
                                        nonce: payload.nonce
                                    },
                                    success: function(data) {
                                        console.log('success', payload.nonce)
                                    },
                                    error: function(data) {
                                        console.log('error', payload.nonce)
                                    }
                                });
                            });
                        })(jQuery);
                    });
                });
            });
        </script> --}}




        {{-- <script>
            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute(
                'content');

            console.log("CSRF Token:", "{{ csrf_token() }}");
            console.log("token:", '{{ $token }}');
            var button = document.querySelector('#submit-button');
            var instancee;

            braintree.dropin.create({
                authorization: '{{ $token }}',
                container: '#dropin-container'
            }, function(createErr, instance) {
                instancee = instance;
                button.addEventListener('click', function() {
                    instance.requestPaymentMethod(function(err, payload) {
                        $.post("{{ route('admin.payment.token') }}", {
                            _token: "{{ csrf_token() }}",
                            nonce: payload.nonce
                        }, function(data) {
                            console.log('success', payload.nonce);
                        }).fail(function(data) {
                            die(data);
                            // console.log('error', payload.nonce);
                        });
                    });
                });
            });
        </script> --}}




    </div>
@endsection
