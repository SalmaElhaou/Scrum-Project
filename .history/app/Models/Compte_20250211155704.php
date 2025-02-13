<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    use CanResetPassword;

    protected $fillable = ['personne_id', 'login', 'password', 'role', 'enabled', 'locked'];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }
}
