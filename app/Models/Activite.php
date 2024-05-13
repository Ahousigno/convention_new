<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function validation()
    {
        return $this->belongsTo(Validation::class, 'partenariat_id', 'id');
    }
}
