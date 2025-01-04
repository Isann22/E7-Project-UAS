<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($ticket_id)
    {
        $ticket = Ticket::with(['tournament'])->findorFail($ticket_id);
        return view('Orders.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'ticket_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required',
            'qty' => 'required',
        ]);

        $ticket = Ticket::find($request->ticket_id);


        if ($ticket->stock == 0) {
            return redirect()->back()->with('error', 'Sorry, the ticket is out of stock.');
        }

        $ticket->stock -= $request->qty;
        $ticket->save();

        $orderData = $request->all();

        $order = Order::create($orderData);
        return redirect()->route('orders.history')->with('success', 'Order successfully placed!');
    }

    public function show($id) {}

    /**
     * Display the specified resource.
     */
    public function history()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('orders.history', compact('orders'));
    }

    public function showOrderCount()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return $orders->count();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if ($order->delete()) {
         return redirect()->route('orders.history')->with('success', 'Order successfully deleted!');
        } else {
            return response()->json(['message' => 'Failed to delete order.'], 500);
        }
    }
}