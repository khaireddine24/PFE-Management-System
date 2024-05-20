<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soutenance;
class Jury extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function soutenances(){
        return $this->hasMany(Soutenance::class);
    }
}
