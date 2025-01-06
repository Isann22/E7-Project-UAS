<?php

namespace App\Imports;

use App\Models\Tournament;
use Maatwebsite\Excel\Concerns\ToModel;

class TournamentsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Tournament([
            //
            'name' => $row['name'],
            'time' => $row['time'],
            'description' => $row['description'],
            'user_id' => $row['user_id'],
            'venue_id' => $row['venue_id']
        ]);
    }
}
