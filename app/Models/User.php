<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
//  implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'id',
        'prenom',
        'nom',
        'phone',
        'adresse',
        'email',
        'ddn',
        'paysDeNaissance',
        'lieuDeNaissance',
        'profil',
        'departement',
        'ufr',
        'password',
        'etat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function diplomes()
    {
        return $this->hasMany(diplome::class,'iduser');
    }

    public function adequations()
    {
        return $this->hasMany(adequation::class,'iduser');
    }

    public function enseignementuadbs()
    {
        return $this->hasMany(enseignementuadb::class,'iduser');
    }

    public function experiencepedagogiques()
    {
        return $this->hasMany(experiencepedagogique::class,'iduser');
    }

    public function experienceprofessionels()
    {
        return $this->hasMany(experienceprofessionel::class,'iduser');
    }

    public function grades()
    {
        return $this->hasMany(grade::class,'iduser');
    }

    public function publications()
    {
        return $this->hasMany(publication::class,'iduser');
    }

    public function posts()
    {
        return $this->hasMany(post::class,'iduser');
    }

    public function postuler()
    {
        return $this->belongsToMany(postuler::class,'postulerusers');
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function postulerpats()
    {
        return $this->belongsToMany(Postulerpats::class,'postulerpats');
    }
}
