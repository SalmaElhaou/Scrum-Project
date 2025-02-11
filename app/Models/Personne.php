<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'cin', 'email', 'telephone'];

    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}

