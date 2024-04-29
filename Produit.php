<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $table = 'produit';

    protected $fillable = [
        'IdProd',
        'NomProd',
        'Prix',
        'DescProd',
    ];

    protected $primaryKey = 'IdProd';

    public $timestamps = false; // Désactiver les timestamps

    // Ajoutez les relations avec d'autres modèles ici, si nécessaire
}

