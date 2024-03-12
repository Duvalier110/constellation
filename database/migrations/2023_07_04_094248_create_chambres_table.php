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
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User')->constrained()->nullable()->onUpdate('cascade');
            $table->string('nom')->nullable();
            $table->string('libelle')->nullable();
            $table->string('baignoire')->nullable();
            $table->string('lit')->nullable();
            $table->string('num_chambre')->nullable();
            $table->string('num_etage')->nullable();
            $table->string('photo')->nullable();
            $table->string('prix')->nullable();
            $table->string('statut')->nullable();
            $table->string('enfant')->nullable();
            $table->string('adulte')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
