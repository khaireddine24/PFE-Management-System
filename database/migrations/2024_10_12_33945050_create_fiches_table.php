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
        Schema::create('fiches', function (Blueprint $table) {
            $table->id();
            $table->string('societe_acceuil');
            $table->string('encadrant_externe');
            $table->string('ntel_societe');
            $table->string('mail_societe');
            $table->string('intitule_pfe');
            $table->string('besions_fonctionnels');
            $table->string('technologies_utilisees');
            $table->string('langue');
            $table->string('Remarque')->default('en Attente');

            $table->timestamps();
            $table->bigInteger('enseignant_id')->unsigned();
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->uponUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('etudiant_id')->unsigned();
            $table->foreign('etudiant_id')->references('id')->on('users')->uponUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
