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
        Schema::create('profilrecherchers', function (Blueprint $table) {
            $table->id();
            $table->text("description");
            $table->enum('departements', ['physique', 'chimie', 'mathematique'   , 'tic', 'ij',  'management', 'sante' , 'dd']);
            $table->enum('poste', ['per', 'pats'])->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('appelcandidature_id')->nullable();
            $table->foreign('appelcandidature_id')->references('id')->on('appelcandidatures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profilrecherchers');
    }
};
