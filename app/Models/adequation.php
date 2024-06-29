<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adequation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'degreadequation', 'actederecherche'];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }
}
