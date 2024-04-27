<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Controller\ProduitController;
class Produit extends Model
{
    protected $primaryKey = 'IdProd';
    protected $table='produit';
    use HasFactory;

protected $fillable =[
    'idProd','NomProd','Prix','DescProd','Image'
 ];
}
