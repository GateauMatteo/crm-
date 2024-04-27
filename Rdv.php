<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Controller\RendezvousController;
class Rdv extends Model
{
    protected $primaryKey = 'Idrdv';
    protected $table='rdv';
    use HasFactory;

    protected $fillable = ['Idrdv','Nom', 'Prenom', 'email', 'Message', 'Naissance'];

}
