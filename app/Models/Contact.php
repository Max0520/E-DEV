<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message'];

    // Relation avec les réponses
    public function replies()
    {
        return $this->hasMany(ContactReply::class)->orderBy('created_at');
    }
}
