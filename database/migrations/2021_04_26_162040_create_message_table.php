<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('contenu');
            $table->bigInteger('envoyeur_id')->unsigned();
            $table->bigInteger('recepteur_id')->unsigned();
            $table->timestamps();
            $table->foreign('envoyeur_id')->references('id')->on('users');
            $table->foreign('recepteur_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
