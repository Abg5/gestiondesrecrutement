<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experienceprofessionel extends Model
{
    use HasFactory;
    protected $filable=['nombreanneeprofessionnel','pertinanceformation','pertinanceexperience','maitriselangue','maitriseas','attestationprofessionnel'];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }
}
