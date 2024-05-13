<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conventions', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 191)->nullable();
            $table->string('emailuvci', 191);
            $table->string('contact', 191)->nullable();
            $table->string('convention', 191);
            $table->mediumText('objet')->nullable();
            $table->mediumText('motif_rejet')->nullable();
            $table->string('status')->default('en_attente');
            // $table->string('partenaire_id')->require();
            // $table->unsignedBigInteger('partenaire_id');
            // $table->foreign('partenaire_id')->references('id')->on('validations')->onDelete('cascade');
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
        Schema::dropIfExists('conventions');
    }
}
