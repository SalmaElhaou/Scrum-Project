<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

class Compte extends Authenticatable
{
    use HasFactory;
    use CanResetPassword;

    protected $fillable = ['personne_id', 'login', 'password', 'role', 'enabled', 'locked'];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
    public function loginHistories()
    {
        return $this->hasMany(LoginHistory::class, 'compte_id');
    }
}

