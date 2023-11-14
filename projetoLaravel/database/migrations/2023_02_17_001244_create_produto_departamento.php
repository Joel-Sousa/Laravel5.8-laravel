<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_departamento', function (Blueprint $table) {
            // $table->unsignedBigInteger('nome1');
            // $table->unsignedBigInteger('nome2');
            $table->foreignId('idProduto')->references('idProduto')->on('produtos')->onDelete('cascade');
            $table->foreignId('idDepartamento')->references('idDepartamento')->on('departamentos')->onDelete('cascade');
            // $table->primary(['idProduto', 'idDepartamento'], 'idProdutoDepartamento');
            $table->primary(['idProduto', 'idDepartamento']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_departamento');
    }
}
