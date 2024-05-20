<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Enseignant;
class Fiche extends Model
{
    use HasFactory;
    protected $table = 'fiches';

    protected $fillable = [
        'etudiant_id',
        'enseignant_id',
        'societe_acceuil',
        'encadrant_externe',
        'ntel_societe',
        'mail_societe',
        'intitule_pfe',
        'besions_fonctionnels',
        'technologies_utilisees',
        'langue',
    ];
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }
}
