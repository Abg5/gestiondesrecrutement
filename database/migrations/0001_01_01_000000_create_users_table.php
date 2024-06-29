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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->integer('phone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('ddn')->nullable();
            $table->string('paysDeNaissance')->nullable();
            $table->string('lieuDeNaissance')->nullable();
            $table->enum('profil', ['administrateur', 'candidat', 'chefdepartement' , 'chefdrh'  , 'dgrectorat', 'presidentcomissionmathematique', 'presidentcomissionphysique', 'presidentcomissionchimie', 'presidentcomissiontic', 'presidentcomissionij', 'presidentcomissionmanagement', 'presidentcomissionsante', 'presidentcomissiondd', 'presidentcommissionpats','membrepats','membremathematique', 'membrephysique','membrechimie','membretic','membreij','membremanagement','membresante','membredd', 'directionufr', 'vicerecteur','rapporteur'])->default('candidat');
            $table->enum('departement', ['PHYSIQUE', 'CHIMIE', 'MATHEMATIQUE', 'TIC', 'MANAGEMENT', 'SANTE',  'DD'])->nullable();
            $table->enum('ufr', ['SATIC', 'ECOMIJ', 'SDD'])->nullable();
            $table->string('password');
            $table->enum('etat', ['actif', 'inactif'])->default('actif');
            $table->tinyInteger('pre_selected')->default(0); // Utilisation de tinyInteger
            $table->rememberToken();
            $table->timestamps(); // Ajout automatique des colonnes 'created_at' et 'updated_at'
        });



        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
