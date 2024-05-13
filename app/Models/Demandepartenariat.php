<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demandepartenariat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'continent',
        'pays',
        'ville',
        'decret',
        'regime',
        'status',
        'site',
        'nom',
        'prenoms',
        'libelle_structure',
        'contact_tel',
        'email',
        'situation_geo',
        'logo',
        'motif',
        'exemple_convention',
        'can_be_partner',
    ];


    public function validation()
    {
        return $this->hasOne(Validation::class, 'partenariat_id', 'id');
    }
}
