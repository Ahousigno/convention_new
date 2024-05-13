<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;

    protected $guarded = [

        'id',
    ];

    public function activites()
    {
        return $this->hasMany(Activite::class, 'partenariat_id', 'id');
    }
    public function demande()
    {
        return $this->belongsTo(Demandepartenariat::class, 'partenariat_id', 'id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
}
