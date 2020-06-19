<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commande extends Migration
{
    public function up()
    {
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->timestamp('heure_commande')->default(null);
            $table->boolean('reception');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande');
    }
}

