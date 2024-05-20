<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Soutenance;
class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'department'
    ];
    public function sales(){
        return $this->hasMany(Soutenance::class);
    }
  
}


