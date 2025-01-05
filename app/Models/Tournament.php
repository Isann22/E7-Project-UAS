<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'tournaments'; // Nama tabel
    protected $guarded = []; // Atur ini sesuai kebutuhan

    public function venue()
    {
        return $this->belongsTo(Venue::class); // Relasi ke model Venue
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class); // Relasi ke model Ticket
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
