<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif_pourcentage extends Model
{
    protected $fillable = [
        'pourcentage', 'date_debut', 'date_fin', 'cree_par', 'modifier_par'
    ];
}
