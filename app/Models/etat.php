<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etat extends Model
{
    use HasFactory;

    // Nom de la table associée au modèle
    protected $table = 'etats';

    // Attributs qui peuvent être assignés en masse
    protected $fillable = ['pre_selected'];




}
