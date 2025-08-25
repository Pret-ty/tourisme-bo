<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lieu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'images',
        // 'latitude',
        // 'longitude',
        'categorie_id',
        'ville_id',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function ville(): BelongsTo
    {
        return $this->belongsTo(Ville::class);
    }
}
