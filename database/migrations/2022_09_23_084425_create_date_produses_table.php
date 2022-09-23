<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_produses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nume');
            $table->integer('um');
            $table->integer('pret');
            $table->string('moneda');
            $table->integer('cota_tva');
            $table->boolean('tva');
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
        Schema::dropIfExists('date_produses');
    }
};
