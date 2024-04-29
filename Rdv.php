<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;

    protected $table = 'rdv';

    protected $fillable = [
        'Idrdv',
        'Nom',
        'Mail',
        'Message',
        'Prenom',
        'Naissance'
    ];

    protected $primaryKey = 'Idrdv';

    public $timestamps = false; // Désactiver les timestamps

    // Ajoutez les relations avec d'autres modèles ici, si nécessaire
}
