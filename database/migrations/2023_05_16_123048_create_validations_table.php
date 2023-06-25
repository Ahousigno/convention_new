<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_convention')->require();
            $table->string('categorie_id')->require();
            $table->string('date_debut', 191)->require();
            $table->text('date_fin')->require();
            $table->string('file_convention', 191)->require();
            $table->string('image_convention', 191)->require();
            $table->string('categorie_id', 191)->require();

            $table->unsignedBigInteger('partenariat_id');
            $table->foreign('partenariat_id')->references('id')->on('demandepartenariats')->onDelete('cascade');
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
        Schema::dropIfExists('validations');
    }
}
