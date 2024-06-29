<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postuler extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'intituler', 'departements', 'ufr', 'datelimite', 'heurelimite', 'contrat', 'postes', 'fichier',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class,'postulerusers');
    }



    public function postulerusers()
    {
        return $this->hasMany(Postuleruser::class);
    }
    public function postulerpats()
    {
        return $this->hasMany(Postulerpats::class);
    }

}
