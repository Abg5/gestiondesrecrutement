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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->integer('point')->nullable();
            $table->enum('typegrade', ['professeurtitulaire', 'Maitredeconference', 'MaitreAssistant' , 'Assistant'  , 'Debutant'])->nullable();
            $table->string('attestationgrade')->nullable();
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
        Schema::dropIfExists('grades');
    }
};
