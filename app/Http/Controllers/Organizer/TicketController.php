<?php

namespace App\Http\Controllers\Organizer;

use Log;
use App\Models\Ticket;
use App\Models\Tournament;
use App\Http\Requests\TicketRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::whereHas('tournament', function ($query) {
            $query->where('user_id', Auth::id());
        })->paginate(6);

        $organizerId = Auth::id();
        $tournaments = Tournament::where('user_id', $organizerId)->get();

        return view('organizer.ticket', compact('tickets', 'tournaments'));
    }

    public function store(TicketRequest $request)
    {
        try {
            $ticket = new Ticket([
                'tournament_id' => $request->tournament_id,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            $ticket->save();

            return redirect()->route('organizer.tickets.index')
                ->with('success', 'Tiket berhasil dibuat.');
        } catch (\Exception $e) {

            return redirect()->route('organizer.tickets.index')
                ->with('error', 'Terjadi kesalahan saat membuat tiket.');
        }
    }

    public function update(TicketRequest $request, Ticket $ticket, $id)
    {
        try {
            $ticket = Ticket::find($id);
            $ticket->tournament_id = $request->input('tournament_id');
            $ticket->price = $request->input('price');
            $ticket->stock = $request->input('stock');

            $ticket->save();

            return redirect()->route('organizer.tickets.index')
                ->with('success', 'Tiket berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('organizer.tickets.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui tiket.');
        }
    }


    public function destroy($id)
    {
        try {
            $ticket = Ticket::find($id);

            if (!$ticket) {
                return redirect()->route('organizer.tickets.index')
                    ->with('error', 'Tiket tidak ditemukan.');
            }

            $ticket->delete();

            return redirect()->route('organizer.tickets.index')
                ->with('success', 'Tiket berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('organizer.tickets.index')
                ->with('error', 'Terjadi kesalahan saat menghapus tiket.');
        }
    }
}
