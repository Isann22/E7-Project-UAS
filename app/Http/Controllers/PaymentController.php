<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayOrderRequest;
use Midtrans\Config;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class PaymentController extends Controller
{


  public function payOrder(PayOrderRequest $request)
  {
    try {
      $order = Order::findOrFail($request->order_id);

      \Midtrans\Config::$serverKey = config('midtrans.server_key');
      \Midtrans\Config::$isProduction = config('midtrans.is_production');
      \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
      \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

      $params = [
        'transaction_details' =>
        [
          'order_id' => $order->id,
          'gross_amount' => $request->amount,
        ],
        'customer_details' => [
          'first_name' => Auth::user()->name,
          'email' => Auth::user()->email,
        ],
        'item_details' => [
          [
            'id' => $order->id,
            'price' => $request->amount,
            'quantity' => $request->qty,
            'name' => "Pembayaran Order #{$order->id}"
          ]
        ],
        'enabled_payments' => [$request->payment_method],
      ];
      $snapToken = \Midtrans\Snap::getSnapToken($params);


      $payment = new Payment();
      $payment->order_id = $order->id;
      $payment->payment_methode = $request->payment_method;
      $payment->amount = $request->amount;
      $payment->snap_token = $snapToken;
      $payment->save();

      $order->status = 'completed';
      $order->save();

      return redirect()->route('payments.checkout', $payment->id);
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'error processing your payment.');
    }
  }

  public function checkout(Payment $payment)
  {
    $payment = Payment::with(['order.ticket.tournament'])->findOrFail($payment->id);
    return view('orders.checkout', compact('payment'));
  }
}
