<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Importez la classe Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fiche;
use App\Models\User;
use App\Models\Soutenance;

class Enseignant extends Authenticatable
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function etudiants(){
        return $this->hasMany(User::class);
    }
    public function soutenances(){
        return $this->hasMany(Soutenance::class);
    }
    public function fiches()
    {
        return $this->hasMany(Fiche::class, 'enseignant_id');
    }
}