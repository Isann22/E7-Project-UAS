<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentController extends Controller
{


  public function payOrder(Request $request)
  {
    

    $order = Order::findOrFail($request->order_id);
   
    $payment = new Payment();
    $payment->order_id = $order->id;
    $payment->payment_methode = $request->payment_method;
    $payment->amount = $request->amount;
    $payment->save();

    return redirect()->route('payments.checkout', $payment->id);
  }

  public function checkout(Payment $payment)
  {
    $payment = Payment::with(['order.ticket.tournament'])->findOrFail($payment->id);
    return view('orders.checkout', compact('payment'));
  }

 
}