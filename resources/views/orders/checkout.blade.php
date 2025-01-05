@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card order">
                    <div class="card-header">{{ __('DetailCheckout') }}</div>
                    <div class="card-body">
                        <p>Name : {{ Auth::user()->name }}</p>
                        <p>Tournament : {{ $payment->order->ticket->tournament->name }}</p>
                        <p> Amount :{{ $payment->amount }}</p>
                        <p>Payment Method : {{ $payment->payment_methode }}</p>
                        <button class="btn btn-primary" id="pay-button">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $payment->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    window.location.href = "{{ route('orders.history') }}";
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
