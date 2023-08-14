<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    use HasFactory;

    protected $guarded = [
        
        'nom_convention',
        'image_convention',
        'date_debut',
        'date_fin',
        'file_convention',
        'categorie_id',
        'partenariat_id',
    ];
}