<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'fin','debut','montant'
    ];
}