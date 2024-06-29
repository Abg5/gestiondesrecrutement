<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postuleruser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postuler_id',
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
     // Les relations avec les autres modèles
    public function etat()
    {
        return $this->belongsTo(etat::class);
    }

    public function enseignement()
    {
        return $this->belongsTo(enseignementuadb::class);
    }

    public function experiencepedagogique()
    {
        return $this->belongsTo(experiencepedagogique::class);
    }

    public function experienceprofessionnel()
    {
        return $this->belongsTo(experienceprofessionel::class);
    }

    public function grade()
    {
        return $this->belongsTo(grade::class);
    }

    public function adequation()
    {
        return $this->belongsTo(adequation::class);
    }

    public function publication()
    {
        return $this->belongsTo(publication::class);
    }

    public function diplome()
    {
        return $this->belongsTo(diplome::class);
    }

}
