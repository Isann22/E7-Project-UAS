<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Venue;
use App\Models\Tournament;
use App\Exports\TournamensExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;

class TournamentController extends Controller
{
    /**
     * Tampilkan daftar resource.
     */
    public function index()
    {
        $organizerId = Auth::id();
        $tournaments = Tournament::where('user_id', $organizerId)->with('venue')->paginate(6);
        $venues = Venue::all();
        return view('organizer.tournament', compact('tournaments', 'venues'));
    }

    public function create()
    {
        $venues = Venue::all();
        return view('create-modal', compact('venues'));
    }

    /**
     * Simpan resource yang baru dibuat.
     */
    public function store(StoreTournamentRequest $request)
    {
        $organizerId = Auth::id();

        try {
            $tournament = new Tournament();
            $tournament->name = $request->input('name');
            $tournament->time = $request->input('time');
            $tournament->description = $request->input('description');
            $tournament->user_id = $organizerId;
            $tournament->venue_id = $request->input('venue_id');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $tournament->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/', $imageName);
                $tournament->image = $imagePath;
            }

            $tournament->save();

            return redirect()->route('organizer.tournaments.index')->with('success', 'Turnamen berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('organizer.tournaments.index')->with('error', 'Terjadi kesalahan saat menambahkan turnamen.');
        }
    }

    /**
     * Perbarui resource yang ditentukan.
     */
    public function update(UpdateTournamentRequest $request, string $id)
    {
        $organizerId = Auth::id();

        try {
            $tournament = Tournament::where('id', $id)->where('user_id', $organizerId)->firstOrFail();

            $tournament->name = $request->input('name');
            $tournament->time = $request->input('time');
            $tournament->description = $request->input('description');
            $tournament->venue_id = $request->input('venue_id');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $tournament->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $imagePath = Storage::disk('public')->putFileAs('images', $image, $imageName);
                $tournament->image = $imagePath;
            }


            $tournament->save();

            return redirect()->route('organizer.tournaments.index')->with('success', 'Turnamen berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('organizer.tournaments.index')->with('error', 'Terjadi kesalahan saat memperbarui turnamen.');
        }
    }

    /**
     * Hapus resource yang ditentukan.
     */
    public function destroy(string $id)
    {
        $organizerId = Auth::id();

        try {
            $tournament = Tournament::where('id', $id)->where('user_id', $organizerId)->firstOrFail();

            $tournament->delete();

            return redirect()->route('organizer.tournaments.index')->with('success', 'Turnamen berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('organizer.tournaments.index')->with('error', 'Terjadi kesalahan saat menghapus turnamen.');
        }
    }

    public function export()
    {
        return Excel::download(new TournamensExport, 'Tournament.xlsx');
    }
}
