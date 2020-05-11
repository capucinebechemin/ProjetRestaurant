<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Note extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_plat');
            $table->bigInteger('id_client');

            $table->integer('note')->nullable();
            $table->text('avis')->nullable();

            $table->foreign('id_plat')->references('id')->on('plat')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_client')->references('id')->on('client')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
