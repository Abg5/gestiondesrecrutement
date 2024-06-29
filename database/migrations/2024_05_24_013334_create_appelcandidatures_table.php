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
        Schema::create('appelcandidatures', function (Blueprint $table) {
            $table->id();
            $table->string('intituler');
            $table->enum('departements', ['physique', 'chimie', 'mathematique'   , 'tic', 'ij',  'management', 'sante' , 'dd'])->nullable();
            $table->enum('ufr', ['SATIC', 'ECOMIJ' , 'SDD'])->nullable();
            $table->date('datelimite');
            $table-> time('heurelimite');
            $table->enum('contrat', ['cdd', 'cdi']);
            $table->enum('postes', ['per', 'pats'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appelcandidatures');
    }
};
