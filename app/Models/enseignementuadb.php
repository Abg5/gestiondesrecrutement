<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enseignementuadb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreanneeuadb',
        'point',
        'attestationuadb',
        'iduser',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }

}
