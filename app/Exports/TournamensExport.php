<?php

namespace App\Exports;

use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class TournamensExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $organizerId = Auth::id();
        $tournaments = Tournament::where('user_id', $organizerId)->with('venue')->get();
        return $tournaments;
    }
}
