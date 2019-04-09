<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tarif_interval extends Model
{
    protected $fillable = [
        'min', 'max', 'tarif', 'date_debut', 'date_fin', 'cree_par', 'modifier_par'
    ];
}
