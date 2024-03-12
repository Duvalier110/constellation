<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('Chambre')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('num_chambre');
            $table->string('prix');
            $table->string('num_etage');
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->string('email');
            $table->string('telephone_client');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->string('total');
            $table->string('heur');
            $table->string('demande')->nullable();
            $table->string('statut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
