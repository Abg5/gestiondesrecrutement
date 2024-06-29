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
        Schema::create('experienceprofessionels', function (Blueprint $table) {
            $table->id();
            $table->integer('nombreanneeprofessionnel')->nullable();
            $table->integer('point')->nullable();
            $table->enum('pertinanceformation', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->enum('pertinanceexperience', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->enum('maitriselangue', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->enum('maitriseas', ['non', 'assezproche', 'tresproche'])->nullable();
            $table->string('attestationprofessionnel')->nullable();
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
        Schema::dropIfExists('experienceprofessionels');
    }
};
