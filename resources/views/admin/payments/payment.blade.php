


@extends('layouts.admin')
@section('content')

<div class="py-12">
    @csrf
    <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
    <div style="display: flex;justify-content: center;align-items: center; color: black">
        <a id="submit-button" class="btn btn-sm btn-success db-dark">Submit payment</a>
    </div>
    <div id="checkout-message"></div>

    <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{-- <script>
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
            // Insert your tokenization key here
            authorization: 'sandbox_w362cfkp_htxcdmp9ttv73hz8',
            container: '#dropin-container'
        }, function(createErr, instance) {
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(requestPaymentMethodErr, payload) {
                    // When the user clicks on the 'Submit payment' button this code will send the
                    // encrypted payment information in a variable called a payment method nonce
                    $.ajax({
                        type: 'POST',
                        url: '/admin/payment/process',
                        data: {
                            'paymentMethodNonce': payload.nonce
                        }
                    }).done(function(result) {
                        // Tear down the Drop-in UI
                        instance.teardown(function(teardownErr) {
                            if (teardownErr) {
                                console.error('Could not tear down Drop-in UI!');
                            } else {
                                console.info('Drop-in UI has been torn down!');
                                // Remove the 'Submit payment' button
                                $('#submit-button').remove();
                            }
                        });

                        if (result.success) {
                            $('#checkout-message').html(
                                '<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>'
                            );
                        } else {
                            console.log(result);
                            $('#checkout-message').html(
                                '<h1>Error</h1><p>Check your console.</p>');
                        }
                    });
                });
            });
        });
    </script> --}}




    <script>
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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
                    $.post("{{ route('admin.payment.process') }}", {
                        _token: "{{ csrf_token() }}",
                        nonce: payload.nonce
                    }, function(data) {
                        console.log('success', payload.nonce);
                    }).fail(function(data) {
                        // console.log('error', payload.nonce);
                    });
                });
            });
        });
    </script>



    {{-- <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: '{{$token}}',
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err,payload{
                    // Submit payload.nonce to your server
                    if (err) {
                        console.error(err);
                        return;
                    }
                });
            });a
        });
    </script> --}}
</div>
@endsection
