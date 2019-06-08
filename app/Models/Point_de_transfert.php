<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Point_de_transfert extends Model
{
    protected $fillable = [
        'nom', 'cartier', 'id_ville','caisse',
    ];
}