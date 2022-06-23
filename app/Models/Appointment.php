<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
