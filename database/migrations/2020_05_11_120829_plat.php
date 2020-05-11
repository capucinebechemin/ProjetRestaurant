<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_restaurateur');

            $table->text('nom');
            $table->integer('prix');
            $table->text('photo')->nullable();

            /*$table->foreign('id_retaurateur')->references('id')->on('retaurateur')
                ->onDelete('restrict')
                ->onUpdate('restrict');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
