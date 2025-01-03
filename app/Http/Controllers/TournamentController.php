<?php

namespace App\Http\Controllers;
use App\Models\Tournament;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $tournaments = Tournament::with(['venue', 'tickets'])->orderBy('time')->take(6)->get();
            return view('dashboard', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showAllTournaments()
    {
    $tournaments = Tournament::with(['venue'])->orderBy('time', 'asc')->paginate(4);
    return view('Tournaments.index', compact('tournaments'));
    }public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.show', compact('tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function search(Request $request)
    {
        //
        $search = $request->input('search');
        $tournaments = Tournament::with(['venue'])->where('name', 'like', '%' . $search . '%')->paginate(6);
        return view('Tournaments.index', compact('tournaments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
