@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="mb-3 text-center text-light">Transaksi</h1>
        @if ($orders->count() > 0)
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Turnamen</th>
                        <th>Qty</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th class="text-center">Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $order->ticket->tournament->name }}</td>
                            <td>{{ $order->qty }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if ($order->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @else
                                    <span class="badge badge-secondary">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td class="d-flex gap-3 justify-content-center">
                                @if ($order->status != 'completed')
                                    <button type="button" class="btn btn-primary pay-button" data-bs-toggle="modal"
                                        data-bs-target="#payModal" data-price="{{ $order->amount }}"
                                        data-qty="{{ $order->qty }}" data-order-id="{{ $order->id }}">
                                        Checkout
                                    </button>
                                @else
                                    <button class="btn btn-success">
                                        Dibayar
                                    </button>
                                @endif
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete Order</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1 class="text-center text-light">Kosong</h1>
        @endif
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content order">
                <div class="modal-header">
                    <h5 class="modal-title" id="payModalLabel">Checkout</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payments.pay') }}" method="POST" class="pay-order-form">
                        @csrf
                        <input type="hidden" name="order_id" id="order-id">
                        <input type="hidden" name="qty" id="qty">
                        <div class="form-group my-3">
                            <label for="payment_method">Metode Pembayaran</label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="credit_card">Kartu Kredit</option>
                                <option value="shopeepay">ShopeePay</option>
                                <option value="dana">Dana</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="gopay">GoPay</option>
                            </select>
                        </div>
                        <div class="form-group my-3">
                            <label for="amount">Jumlah Pembayaran</label>
                            <input type="number" name="amount" id="amount" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="secondary-button" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submit" class="primary-button">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var payModal = document.getElementById('payModal');
            payModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var orderId = button.getAttribute('data-order-id');
                var amount = button.getAttribute('data-price');
                var qty = button.getAttribute('data-qty');

                var modal = payModal;
                modal.querySelector('#order-id').value = orderId;
                modal.querySelector('#amount').value = amount;
                modal.querySelector('#qty').value = qty;
            });
        });
    </script>
@endsection
