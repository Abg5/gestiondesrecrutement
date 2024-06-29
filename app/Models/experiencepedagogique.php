<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experiencepedagogique extends Model
{
    use HasFactory;
    protected $filable=['nombreanneepedagogiques','maitriseoutilanalyse','maitrisedeslogiciels','qualitedepresentation', 'attestationpedagogique'];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }
}
