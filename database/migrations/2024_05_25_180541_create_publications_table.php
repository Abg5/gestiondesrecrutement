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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->set('typepublication', ['abstract', 'comitedelecture', 'conferenceinternational', 'conferencenational'])->nullable();
            $table->string('nombrearticleabstract')->nullable();
            $table->string('nombrearticlecomitedelecture')->nullable();
            $table->string('nombrearticleconferenceinternational')->nullable();
            $table->string('nombrearticleconferencenational')->nullable();
            $table->integer('point')->nullable();
            $table->string('actedepublication')->nullable();

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
        Schema::dropIfExists('publications');
    }
};
