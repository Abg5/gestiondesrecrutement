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
        Schema::create('experiencepedagogiques', function (Blueprint $table) {
            $table->id();
            $table->integer('nombreanneepedagogiques')->nullable();
            $table->integer('point')->nullable();
            $table->enum('maitriseoutilanalyse', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->enum('maitrisedeslogiciels', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->enum('qualitedepresentation', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->string('attestationpedagogique')->nullable();;
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
        Schema::dropIfExists('experiencepedagogiques');
    }
};
