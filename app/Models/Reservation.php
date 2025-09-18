<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'place_id',
        'user_id',
        'guide_id',
        'date',
        'heure',
        'personnes',
        'transport',
        'statut',
    ];
}
