<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parametre_applique extends Model
{
    protected $fillable = [
        'regle', 'date_debut', 'date_fin', 'cree_par', 'modifier_par', 'description'
    ];
}
