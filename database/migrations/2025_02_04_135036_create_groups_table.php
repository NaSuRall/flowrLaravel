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
        Schema::create('groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->bigInteger('user_id')->unsigned(); // Si l'utilisateur peut être nullable, ajoute ->nullable()
            $table->string('name');
            $table->string('code', 5)->unique()->nullable();
            $table->timestamps();

            // Ajout d'une clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Index sur user_id (optionnel, mais peut être utile pour la performance)
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
