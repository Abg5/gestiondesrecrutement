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
        Schema::create('postulers', function (Blueprint $table) {
            $table->id();
            $table->string('intituler');
            $table->enum('departements', ['physique', 'chimie', 'mathematique'   , 'tic', 'ij',  'management', 'sante' , 'dd']);
            $table->enum('ufr', ['SATIC', 'ECOMIJ', 'SDD']);
            $table->date('datelimite');
            $table-> time('heurelimite');
            $table->enum('contrat', ['cdd', 'cdi']);
            $table->enum('postes', ['per', 'pats'])->nullable();
            $table->string('fichier')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('iduser')->nullable();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulers');
    }
};
