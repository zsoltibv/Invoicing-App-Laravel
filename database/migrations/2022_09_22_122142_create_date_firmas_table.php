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
        Schema::create('date_firmas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('cui');
            $table->string('denumire');
            $table->string('judet');
            $table->string('localitate');
            $table->string('adresa');
            $table->string('reg_com');
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
        Schema::dropIfExists('date_firmas');
    }
};