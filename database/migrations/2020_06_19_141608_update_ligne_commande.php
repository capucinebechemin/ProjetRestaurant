<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLigneCommande extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('lignecommande', function (Blueprint $table) {
            $table->unsignedBigInteger('id_plat');
            $table->foreign('id_plat')->references('id')->on('plat');
            $table->unsignedBigInteger('id_commande');
            $table->foreign('id_commande')->references('id')->on('commande');


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
