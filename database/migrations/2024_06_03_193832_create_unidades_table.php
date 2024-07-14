<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //adicionar relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) { //seleciona a tabela produtos
            //cria o campo unidade_id na tabela produtos
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionar relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) { //seleciona a tabela produtos
            //cria o campo unidade_id na tabela produtos
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //Segue o método inverso do up, desfazendo as ações feitas
    {
        //remover relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) { //seleciona a tabela produtos
            //remover fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); // [table]_[coluna]_foreing
            //remover coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        //remover relacionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) { //seleciona a tabela produtos
            //remover fk
            $table->dropForeign('produtos_unidade_id_foreign'); // [table]_[coluna]_foreing
            //remover coluna unidade_id
            $table->dropColumn('unidade_id');
        });


        Schema::dropIfExists('unidades');
    }
}
