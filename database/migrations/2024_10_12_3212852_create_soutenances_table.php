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
        Schema::create('soutenances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('note')->nullable();
            $table->timestamps();
            $table->bigInteger('salle_id')->unsigned();
            $table->foreign('salle_id')->references('id')->on('sales')->uponUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('etudiant_id')->unsigned();
            $table->foreign('etudiant_id')->references('id')->on('users')->uponUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('enseignant_id')->unsigned();
            $table->foreign('enseignant_id')->references('id')->on('enseignants')->uponUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('jury_id')->unsigned();
            $table->foreign('jury_id')->references('id')->on('juries')->uponUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soutenances');
    }
};
