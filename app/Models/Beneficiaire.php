<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'tel'
    ];
}
