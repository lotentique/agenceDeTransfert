<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class transfert extends Model
{
    protected $fillable = [
        'montant', 'code_transfer', 'tarif', 'status', 'date_recuperation', 'effectue_par', 'modifier_par',
        'nni_beneficiaire', 'id_expediteur', 'id_beneficiaire', 'id_ville', 'id_pnt'
    ];
}
