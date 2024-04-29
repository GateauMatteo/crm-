<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $table = 'achat';

    protected $fillable = [
        'IDAchat',
        'PrixTotal',
        'Qte',
        'IdLigne',
        'IdProd'
    ];

    protected $primaryKey = 'IDAchat';

    public $timestamps = false; // Désactiver les timestamps

    // Ajoutez les relations avec d'autres modèles ici, si nécessaire
}
