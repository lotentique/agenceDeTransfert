<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Expediteur extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'tel', 'nni'
    ];
}
