<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulerpats extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'postuler_id',
        'experiencepedagogique_id',
        'experienceprofessionnel_id',
    ];

     // Relation avec User
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     // Relation avec Postuler
     public function postuler()
     {
         return $this->belongsTo(Postuler::class);
     }
}
