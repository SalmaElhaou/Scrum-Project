<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    use HasFactory;
    protected $table = 'login_histories'; // Vérifie le nom exact de ta table

    protected $fillable = [
        'compte_id',
        'ip_address',
        'login_time',
    ];
    public $timestamps = false;
    

    // Relation avec Compte
    public function compte()
    {
        return $this->belongsTo(Compte::class, 'compte_id');
    }
    public static function logLogin($compteId, $ipAddress)
    {
        self::create([
            'compte_id' => $compteId,
            'ip_address' => $ipAddress,
            'login_time' => now(),
        ]);
    }
}
