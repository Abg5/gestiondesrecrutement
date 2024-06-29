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
        Schema::create('postulerpats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('postuler_id');
            $table->unsignedBigInteger('experiencepedagogique_id')->nullable();
            $table->unsignedBigInteger('experienceprofessionnel_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('postuler_id')->references('id')->on('postulers')->onDelete('cascade');
            $table->foreign('experiencepedagogique_id')->references('id')->on('experiencepedagogiques')->onDelete('cascade');
            $table->foreign('experienceprofessionnel_id')->references('id')->on('experienceprofessionels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulerpats');
    }
};
