<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jury;
use App\Models\Sale;
use App\Models\User;
use App\Models\Enseignant;
class Soutenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'etudiant_id',
        'enseignant_id',
        'salle_id',
        'jury_id',

    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'salle_id');
    }
    public function jury()
    {
        return $this->belongsTo(Jury::class, 'jury_id');
    }
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'enseignant_id');
    }
    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }
}
