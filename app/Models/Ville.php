<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'description'
    ];

    public function lieux():HasMany{
        return HasMany(Lieu::class);
    }

}
