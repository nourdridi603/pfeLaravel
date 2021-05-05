<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->float('prix');
            $table->integer('qteStock');
            $table->string('image')->nullable();
            $table->string('description');
            $table->boolean('nouveauArrivage');
            $table->float('prixLivraison');
            $table->date('dateEntree');
            $table->date('dateSortie');
            $table->bigInteger('categorie_id')->unsigned();
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categorie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit');
    }
}
