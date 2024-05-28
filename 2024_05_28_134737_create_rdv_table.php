<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdv', function (Blueprint $table) {
            $table->id('Idrdv'); // Clé primaire auto-incrémentée
            $table->string('Nom', 150); // Champ VARCHAR de longueur 150
            $table->string('Mail', 250); // Champ VARCHAR de longueur 250
            $table->string('Message', 250); // Champ VARCHAR de longueur 250
            $table->string('Prenom', 150); // Champ VARCHAR de longueur 150
            $table->date('Naissance'); // Champ DATE
            $table->timestamps(); // Ajoute les colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rdv');
    }
}
