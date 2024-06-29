<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class diplome extends Model
// {
//     use HasFactory;
//     protected $filable=['nomdiplome','fichediplome'];

// }
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diplome extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nomdiplome', 'fichediplome'];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }
}
