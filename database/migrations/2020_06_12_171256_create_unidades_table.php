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
            $table->id()->unsigned();
            $table->char('tipo', 1);
            $table->integer('unidade')->unsigned();
            $table->string('nome');
            $table->string('rua')->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('cidade')->nullable();
            $table->char('uf', 2)->nullable();
            $table->string('email')->nullable();
            $table->string('site')->nullable();
            $table->string('telefone1')->nullable();
            $table->string('telefone2')->nullable();
            $table->string('foto')->nullable();
            $table->string('capa')->nullable();
            $table->text('descricao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}
