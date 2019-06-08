<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historique_caisse extends Model
{
    protected $fillable = [
        'effectue_par', 'operation', 'montant', 'id_pnt'
    ];
}