<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory;

    // Forcer le vrai nom de la table
    protected $table = 'premiums';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
    ];
}
