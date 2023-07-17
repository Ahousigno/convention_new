<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandepartenariatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandepartenariats', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 191)->nullable();
            $table->string('prenoms', 191)->nullable();
            $table->text('libelle_structure')->nullable();
            $table->string('contact_tel', 191)->nullable();
            $table->string('email')->nullable();
            $table->string('situation_geo', 191)->nullable();
            $table->text('motif')->nullable();
            $table->string('logo', 191)->nullable();
            $table->string('exemple_convention', 191)->nullable();
            $table->string('can_be_partner')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandepartenariats');
    }
}
